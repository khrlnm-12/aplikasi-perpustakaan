<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Transaksi;
use App\Mail\ReminderMail;

use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;

class SendReminderEmails extends Command
{
    protected $signature =
        'app:send-reminder-emails';

    protected $description =
        'Send reminder email';

    public function handle()
    {
        $today = now()->startOfDay();

        $transaksi = Transaksi::with([

                            'siswa',
                            'buku',
                            'sanksi'

                        ])
                        ->where(
                            'status',
                            'dipinjam'
                        )
                        ->get();

        foreach ($transaksi as $t) {

            // VALIDASI
            if (
                !$t->siswa ||
                !$t->buku ||
                empty($t->siswa->email)
            ) {

                continue;
            }

            // ======================
            // TANGGAL KEMBALI
            // ======================

            $kembali = Carbon::parse(
                            $t->tanggal_kembali
                        )->startOfDay();

            $remaining =
                $today->diffInDays(
                    $kembali,
                    false
                );

            // ======================
            // REMINDER H-2
            // ======================

            if ((int)$remaining === 2) {

                Mail::to(
                    $t->siswa->email
                )->send(

                    new ReminderMail(
                        $t,
                        'reminder'
                    )

                );

                $this->info(

                    'Reminder sent to: ' .
                    $t->siswa->email

                );
            }

            // ======================
            // TERLAMBAT
            // ======================

            if ($remaining < 0) {

                // DEFAULT SANKSI
                $id_sanksi = 1;

                // 4 - 7 HARI
                if (

                    abs($remaining) >= 4 &&

                    abs($remaining) <= 7

                ) {

                    $id_sanksi = 2;
                }

                // > 7 HARI
                if (abs($remaining) > 7) {

                    $id_sanksi = 3;
                }

                // UPDATE TRANSAKSI
                $t->update([

                    'status' => 'terlambat',

                    'id_sanksi' => $id_sanksi

                ]);

                // KIRIM EMAIL
                Mail::to(
                    $t->siswa->email
                )->send(

                    new ReminderMail(
                        $t,
                        'late'
                    )

                );

                $this->info(

                    'Late email sent to: ' .
                    $t->siswa->email

                );
            }
        }

        $this->info(
            'Reminder process completed.'
        );
    }
}