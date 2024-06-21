<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dokter'] = \App\Models\Dokter::paginate(5);
        $data['judul'] = 'Data-Data Dokter';
        return view('dokter_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_sp'] = ['umum','kandungan', 'anak', 'THT'];
        return view('dokter_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter',
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required'
        ]);

        $dokter = new \App\Models\Dokter();
        $dokter->kode_dokter = $request->kode_dokter;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->nomor_hp = $request->nomor_hp;
        $dokter->save();
    
        return back()->with('pesan','Data sudah disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['dokter']= \App\Models\Dokter::findOrFail($id);
        $data['list_sp']=['umum', 'kandungan', 'Anak', 'THT'];
        return view ('dokter_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter,'.$id,
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required'
        ]);

        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->kode_dokter = $request->kode_dokter;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->nomor_hp = $request->nomor_hp;
        $dokter->save();
    
        return redirect('/dokter')->with('pesan','Data sudah diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->delete();
        return back ()->with('pesan','Data Sudah Dihapus');
    }

    public function laporan()
    {
        $data['dokter'] = \App\Models\Dokter::all();
        $data['judul'] = 'Laporan Data Dokter';
        return view('dokter_laporan',$data);
    }
}
