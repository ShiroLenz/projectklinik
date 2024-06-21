@extends('layouts.medilab')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ $judul }}
            </div>
            <div class="card-body">
                {!! Form::model($administrasi, ['route' =>$route,'method'=>$method]) !!}
                    <div class="form-group">
                            <label for="my-input">Kode Pasien</label>
                            <input id="my-input" class="form-control" type="text" name="kode_pasien" value="{{ old('kode_pasien') }}">
                            <span class="text-danger">{{ $errors->first('kode_pasien') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Nama Pasien</label>
                            <input id="my-input" class="form-control" type="text" name="nama_pasien" value="{{ old('nama_pasien') }}">
                            <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-select">Jenis Kelamin</label>
                            <select id="my-select" class="form-control" name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                                @foreach ( $list_jk as $a )
                                    <option value="{{ $a }}" @selected($a==old('jenis_kelamin'))>{{ $a }}</option>
                                    
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Status</label>
                            <input id="my-input" class="form-control" type="text" name="status" value="{{ old('status') }}">
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Alamat</label>
                            <input id="my-input" class="form-control" type="text" name="alamat" value="{{ old('alamat') }}">
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        </div>
                        {!! Form::submit($tombol, ['class' =>'btn btn-primary']) !!}
                {!! Form::close() !!}
               
            </div>
        </div>
    </div>
        
    </div>
</div>
@endsection