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
                    <table class="table table-bordered table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Alamat</th>
                                <th>Created</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_pasien }}</td>
                                <td>{{ $a->nama_pasien }}</td>
                                <td>{{ $a->jenis_kelamin }}</td>
                                <td>{{ $a->status }}</td>
                                <td>{{ $a->alamat }}</td>
                                <td>{{ $a->created_at }}</td>
                                <td>
                                    <a href="{{ url('pasien/'. $a->id. '/edit', []) }}"
                                        class ="btn btn-primary btn-sm">Edit</a>
                                    <form action= "{{ url('pasien/' .$a->id, []) }}"method="post" class="d-inline"
                                        onsubmit="return confirm('Apakah Dihapus?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    {{ $pasien->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                {{ $judul }}
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            {!! Form::open(['method'=>'get','role'=>'search','url'=>'pasien/cari']) !!}
                <div class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="search"
                    aria-label="Search" name="search">
                    &nbsp;
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

