@extends('layouts.sbadmin2')
@section('isinya')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Tambah Data Dokter
            </div>
            <div class="card-body">
               <form action="{{ url('dokter', []) }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="my-input">Kode Dokter</label>
                        <input id="my-input" class="form-control" type="text" name="kode_dokter" value="{{ old('kode_dokter') }}">
                        <span class="text-danger">{{ $errors->first('kode_dokter') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Nama Dokter</label>
                        <input id="my-input" class="form-control" type="text" name="nama_dokter" value="{{ old('nama_dokter') }}">
                        <span class="text-danger">{{ $errors->first('nama_dokter') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-select">Spesialis</label>
                        <select id="my-select" class="form-control" name="spesialis">
                        <option value="">Pilih Spesialis</option>
                            @foreach ( $list_sp as $a )
                                <option value="{{ $a }}" @selected($a==old('spesialis'))>{{ $a }}</option>
                                
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('spesialis') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Nomor Hp</label>
                        <input id="my-input" class="form-control" type="text" name="nomor_hp" value="{{ old('nomor_hp') }}">
                        <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                    </div>
               <form>
            </div>
            <div class="card-footer">
                <button type="sumbit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
        
    </div>
</div>
@endsection