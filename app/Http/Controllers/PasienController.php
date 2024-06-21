<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::paginate(5);
        $data['judul'] = 'Data-Data Pasien';
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_jk'] = ['Laki-laki','perempuan'];
        return view('pasien_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required'
        ]);

        $pasien = new \App\Models\Pasien();
        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat; 
        $pasien->save();
    
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
        $data['pasien']= \App\Models\Pasien::findOrFail($id);
        $data['list_lk']=['Laki-laki','perempuan'];
        return view ('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien,'.$id,
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required'
        ]);

        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat; 
        $pasien->save();
    
        return redirect('/pasien')->with('pesan','Data sudah diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->delete();
        return back ()->with('pesan','Data Sudah Dihapus');
    }
    public function laporan()
    {
        $data['pasien'] = \App\Models\Pasien::all();
        $data['judul'] = 'Laporan Data Pasien';
        return view('pasien_laporan',$data);
    }

    public function cari(Request $request)
    {
        $cari = $request->get('search');
        $data['pasien']= \App\Models\Pasien::where('nama_pasien','like','%'.$cari.'%')
                                ->orwhere('alamat','like','%'.$cari.'%')->paginate(5);
        $data['judul']='Data-Data Pasien';
        return view('pasien_index',$data);
    }
    public function registrasi()
    {
        $data['pasien'] = new \App\Models\Pasien();
        $data['route'] = 'pasien.simpan';
        $data['method'] = 'post';
        $data['tombol'] = 'registrasi';
        $data['judul'] = 'Registrasi Data Pasien';
        $data['list_jk'] = ['' =>'Pilih Jenis Kelamin', 'Pria' =>'Pria','Perempuan' =>'Perempuan'];
        return view('registrasi_form', $data);
    }
}
