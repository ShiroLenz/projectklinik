<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['administrasi'] = \App\Models\Administrasi::paginate(5);
        $data['judul'] = 'Data-Data Administrasi';
        return view('administrasi_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['administrasi'] = new \App\Models\Administrasi();
        $data['route'] = 'administrasi.store';
        $data['method'] = 'post';
        $data['judul'] = 'Tambah Data Administrasi';
        $data['tombol'] = 'Simpan';
        $data['list_pasien'] =
        \App\Models\Pasien::selectRaw("id,concat(kode_pasien,'-',nama_pasien) as tampil")
        ->pluck('tampil','id');
        $data['list_dokter'] =
        \App\Models\Dokter::selectRaw("id,concat(kode_dokter,'-',nama_dokter) as tampil")
        ->pluck('tampil','id');

        return view('administrasi_form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_administrasi' => 'required|unique:administrasis,kode_administrasi',
            'tanggal' => 'required',
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'biaya' => 'required'         
        ]);

        $administrasi = new \App\Models\Administrasi();
        $administrasi->kode_administrasi = $request->kode_administrasi;
        $administrasi->tanggal = $request->tanggal;
        $administrasi->pasien_id = $request->pasien_id;
        $administrasi->dokter_id = $request->dokter_id;
        $administrasi->biaya = $request->biaya;
        $administrasi->save();

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
    public function edit(string $id)
    {
        $data['administrasi'] = \App\Models\Administrasi::findOrFail($id);
        $data['route'] = ['administrasi.update',$id];
        $data['method'] = 'put';
        $data['judul'] = 'Edit Data Administrasi';
        $data['tombol'] = 'Update';
        $data['list_pasien'] =
        \App\Models\Pasien::selectRaw("id,concat(kode_pasien,'-',nama_pasien) as tampil")
        ->pluck('tampil','id');
        $data['list_dokter'] =
        \App\Models\Dokter::selectRaw("id,concat(kode_dokter,'-',nama_dokter) as tampil")
        ->pluck('tampil','id');

        return view('administrasi_form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_administrasi' => 'required|unique:administrasis,kode_administrasi,'.$id,
            'tanggal' => 'required',
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'biaya' => 'required'         
        ]);

        $administrasi = \App\Models\Administrasi::findOrFail($id);
        $administrasi->kode_administrasi = $request->kode_administrasi;
        $administrasi->tanggal = $request->tanggal;
        $administrasi->pasien_id = $request->pasien_id;
        $administrasi->dokter_id = $request->dokter_id;
        $administrasi->biaya = $request->biaya;
        $administrasi->save();

        return redirect('/administrasi')->with('pesan','Data sudah diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $administrasi = \App\Models\Administrasi::findOrFail($id);
        $administrasi->delete();
        return back ()->with('pesan','Data Sudah Dihapus');
    }

    public function laporan()
    {
        $data['administrasi'] = \App\Models\Administrasi::all();
        $data['judul'] = 'Laporan Data administrasi';
        return view('administrasi_laporan',$data);
    }
}
