<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;

class AnggaranController extends Controller
{
    # Tugasnya nampilin data di table
    public function index()
    {
        $data = Anggaran::all();
        return view('anggaran.index', compact('data'));
    }

    # Tugasnya cuma nampilin form
    public function create()
    {
        return view('anggaran.create');
    }

    # Tugasnya untuk aksi insert data
    public function store()
    {
        # Insert ke database
        # insert into anggaran blablabla
        Anggaran::create([
            'code' => request('kode'),
            'name' => request('name'),
            'budget' => request('budget'),
            'biaya' => request('biaya'),
            'sisa' => request('sisa'),
        ]);

        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('anggaran.index');
    }

    public function edit($param)
    {
        # Query database
        # select * from anggarans where id = $param
        $anggaran = Anggaran::find($param);
        if (!$anggaran) return abort(404);

        return view('anggaran.edit', compact('anggaran'));
    }

    public function update($param)
    {
        # query database dengan id sekian
        $row = Anggaran::find($param);
        if (!$row) return abort(404);

        # update data
        $row->update([
            'code' => request('kode'),
            'name' => request('name'),
            'budget' => request('budget'),
            'biaya' => request('biaya'),
            'sisa' => request('sisa'),
        ]);

        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('anggaran.index');
    }

    public function destroy($param)
    {
        # query database dengan id sekian
        $row = Anggaran::find($param);
        if (!$row) return abort(404);

        $row->delete();

        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('anggaran.index');
    }
}
