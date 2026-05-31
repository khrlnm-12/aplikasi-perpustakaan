<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();

        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/petugas');
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);

        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect('/petugas');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);

        $petugas->delete();

        return redirect('/petugas');
    }
    
}