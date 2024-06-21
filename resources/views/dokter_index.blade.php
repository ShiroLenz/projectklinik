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
                                <th>Kode Dokter</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>No Hp</th>
                                <th>Created</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokter as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_dokter }}</td>
                                <td>{{ $a->nama_dokter }}</td>
                                <td>{{ $a->spesialis }}</td>
                                <td>{{ $a->nomor_hp }}</td>
                                <td>{{ $a->created_at }}</td>
                                <td>
                                    <a href="{{ url('dokter/'. $a->id. '/edit', []) }}"
                                        class ="btn btn-primary btn-sm">Edit</a>
                                    <form action= "{{ url('dokter/' .$a->id, []) }}"method="post" class="d-inline"
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
                    {{ $dokter->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

