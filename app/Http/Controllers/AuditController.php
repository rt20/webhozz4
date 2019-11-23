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

        # query ke anggaran dengan id $audit->id
        $anggaran = Anggaran::find(request('anggaran_id'));

        if(request('biaya') > $anggaran->sisa) {
            flash('Biaya tidak boleh lebih dari anggaran sisa')->error();
            return redirect()->back();
        }

        # insert into table audit
        $audit = Audit::create([
            'anggaran_id' => request('anggaran_id'),
            'name' => request('name'),
            'biaya' => request('biaya'),
            'description' => request('description'),
        ]);

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
        $audit = Audit::find($id);
        $anggarans = Anggaran::all();
        return view('audits.edit', compact('audit', 'anggarans'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required|min:4',
        ]);

        $audit = Audit::find($id);
        $audit->update([
            'name' => request('name'),
            'description' => request('description')
        ]);

        flash('Your data has been edited successfully')->success();
        return redirect()->route('audit.index');
    }

    public function destroy($id)
    {
        $audit = Audit::find($id);
        $anggaran = Anggaran::find($audit->anggaran_id);

        # balikin lagi nilainya
        $anggaran->update([
            'biaya' => $anggaran->biaya - $audit->biaya,
            'sisa' => $anggaran->sisa + $audit->biaya
        ]);

        $audit->delete();

        flash('Your data has been deleted successfully')->error();
        return redirect()->route('audit.index');
    }
}
