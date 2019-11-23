<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index()
    {
        $data = Audit::all();
        return view('audits.index', compact('data'));
    }

    public function create()
    {
        $anggarans = Anggaran::all();
        return view('audits.create', compact('anggarans'));
    }

    public function store()
    {
        # validasi form input
        $this->validate(request(), [
            'anggaran_id' => 'required',
            'name' => 'required|min:4',
            'biaya' => 'numeric',
        ]);

        # insert into table audit
        $audit = Audit::create([
            'anggaran_id' => request('anggaran_id'),
            'name' => request('name'),
            'biaya' => request('biaya'),
            'description' => request('description'),
        ]);

        # query ke anggaran dengan id $audit->id
        $anggaran = Anggaran::find($audit->anggaran_id);

        # update anggaran
        $anggaran->update([
            'biaya' => $anggaran->biaya + $audit->biaya,
            'sisa' => $anggaran->budget - ($anggaran->biaya + $audit->biaya)
        ]);

        # redirect
        flash('Data has been created successfully')->success();
        return redirect()->route('audit.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
