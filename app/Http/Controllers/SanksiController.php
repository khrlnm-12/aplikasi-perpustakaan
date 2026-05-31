<?php

namespace App\Http\Controllers;

use App\Models\Sanksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SanksiController extends Controller
{
    public function index()
    {
        $sanksi = Sanksi::all();

        return view(
            'sanksi.index',
            compact('sanksi')
        );
    }

    public function create()
    {
        return view('sanksi.create');
    }

    public function store(Request $request)
    {
        Sanksi::create([

            'jenis_sanksi' =>
                $request->jenis_sanksi
        ]);

        return redirect('/sanksi');
    }

    public function edit($id)
    {
        $sanksi =
            Sanksi::findOrFail($id);

        return view(
            'sanksi.edit',
            compact('sanksi')
        );
    }

    public function update(Request $request, $id)
    {
        $sanksi =
            Sanksi::findOrFail($id);

        $sanksi->update([

            'jenis_sanksi' =>
                $request->jenis_sanksi
        ]);

        return redirect('/sanksi');
    }

    public function destroy($id)
    {
        $sanksi =
            Sanksi::findOrFail($id);

        $sanksi->delete();

        return redirect('/sanksi');
    }
public function detailkepsek($id)
{
    $transaksi = Transaksi::with([

            'siswa',
            'buku',
            'sanksi'

        ])
        ->where(
            'id_transaksi',
            $id
        )
        ->firstOrFail();

    $sanksi = $transaksi->sanksi;

    return view(

        'kepsek.detail_sanksi',

        compact(

            'transaksi',
            'sanksi'

        )

    );
}

}