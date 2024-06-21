@extends('layouts.sbadmin2')
@section('isinya')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ $judul }}
            </div>
            <div class="card-body">
                {!! Form::model($administrasi, ['route' =>$route,'method'=>$method]) !!}
                        <div class="form-group">
                            <label for="my-input">Kode Administrasi</label>
                            {!! Form::text('kode_administrasi', null, ['class' =>'form-control']) !!}
                            <span class="text-helper">{{ $errors->first('kode_administrasi') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Tanggal</label>
                            {!! Form::date('tanggal', $administrasi->tanggal ?? now(), ['class' =>'form-control']) !!}
                            <span class="text-helper">{{ $errors->first('tanggal') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Data Pasien</label>
                            {!! Form::select('pasien_id', $list_pasien, null, ['class' =>'form-control']) !!}
                            <span class="text-helper">{{ $errors->first('pasien_id') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Data Dokter</label>
                            {!! Form::select('dokter_id', $list_dokter, null, ['class' =>'form-control']) !!}
                            <span class="text-helper">{{ $errors->first('dokter_id') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Biaya</label>
                            {!! Form::number('biaya', null, ['class' =>'form-control']) !!}
                            <span class="text-helper">{{ $errors->first('biaya') }}</span>
                        </div>
                        {!! Form::submit($tombol, ['class' =>'btn btn-primary']) !!}
                {!! Form::close() !!}
               
            </div>
        </div>
    </div>
        
    </div>
</div>
@endsection