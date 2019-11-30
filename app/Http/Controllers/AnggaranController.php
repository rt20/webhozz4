<?php

namespace App\Http\Controllers;

use App\Exports\AnggaranExport;
use App\Imports\AnggaranImport;
use App\Models\Anggaran;
use Maatwebsite\Excel\Facades\Excel;

class AnggaranController extends Controller
{
    # Tugasnya nampilin data di table
    public function index()
    {
        if (request()->search) {
            $data = Anggaran::where('name', 'like', '%' . request()->search . '%')->paginate(1000);
        } else {
            $data = Anggaran::paginate(1000);
        }
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
        # validasi form input
        $this->validate(request(), [
            'kode' => 'required|min:4',
            'name' => 'required|min:4',
            'budget' => 'required|numeric',
            'biaya' => 'numeric',
            'sisa' => 'numeric',
        ]);

        # Insert ke database
        # insert into anggaran blablabla
        Anggaran::create([
            'code' => request('kode'),
            'name' => request('name'),
            'budget' => request('budget'),
            'biaya' => request('biaya'),
            'sisa' => request('sisa'),
        ]);

        # Tampilin flash message
        flash('Selamat data telah berhasil di buat')->success();

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

        # Tampilin flash message
        flash('Selamat data telah berhasil di update')->success();

        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('anggaran.index');
    }

    public function destroy($param)
    {
        # query database dengan id sekian
        $row = Anggaran::find($param);
        if (!$row) return abort(404);

        $row->delete();

        # Tampilin flash message
        flash('Selamat data telah berhasil di delete')->error();

        # Kalo udah insert data, redirect ke halaman anggaran
        return redirect()->route('anggaran.index');
    }

    public function export()
    {
        return Excel::download(new AnggaranExport, 'anggran.xls');
    }

    public function import()
    {
        Excel::import(new AnggaranImport, request()->file('file'));

        flash('Success all good!')->success();
        return redirect()->route('anggaran.index');
    }
}
