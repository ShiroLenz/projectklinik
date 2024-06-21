@extends('layouts.sbadmin2')
@section('isinya')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-18">
            <div class="card">
                <div class="card-header">
                    {{ $judul }}
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Administrasi</th>
                                <th>Tanggal</th>
                                <th>Kode Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Kode Dokter</th>
                                <th>Nama Dokter</th>                           
                                <th>Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($administrasi as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_administrasi }}</td>
                                <td>{{ \Carbon\Carbon::parse($a->tanggal)->format('d M Y') }}</td>
                                <td>{{ $a->pasien->kode_pasien ?? 'none' }}</td>
                                <td>{{ $a->pasien->nama_pasien ?? 'none' }}</td>
                                <td>{{ $a->dokter->kode_dokter ?? 'none' }}</td>
                                <td>{{ $a->dokter->nama_dokter ?? 'none' }}</td>
                                <td>Rp.{{ number_format($a->biaya) }}</td>
                                <td>
                                    <a href="{{ url('administrasi/' . $a->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ url('administrasi/' . $a->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Dihapus?')">
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
                    {{ $administrasi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
