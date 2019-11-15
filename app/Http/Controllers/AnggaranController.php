<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;

class AnggaranController extends Controller
{
    public function index()
    {
        $data = Anggaran::all();
        return view('anggaran.index', compact('data'));
    }

    public function create()
    {
        return view('anggaran.create');
    }

    public function store()
    {
        Anggaran::create([
            'code' => request('kode'),
            'name' => request('name'),
            'budget' => request('budget'),
            'biaya' => request('biaya'),
            'sisa' => request('sisa'),
        ]);

        return redirect('/anggaran');
    }
}
