<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Administras</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <center>
                    <h2>{{ $judul }}</h2>
                </center>
    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Administrasi</th>
                            <th>Tanggal</th>
              
                            <th>Nama Pasien</th>
               
                            <th>Nama Dokter</th>                           
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($administrasi as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_administrasi }}</td>
                                <td>{{ \Carbon\Carbon::parse($a->tanggal)->format('d M Y') }}</td>
                       
                                <td>{{ $a->pasien->nama_pasien ?? 'none' }}</td>
                          
                                <td>{{ $a->dokter->nama_dokter ?? 'none' }}</td>
                                <td>Rp.{{ number_format($a->biaya) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <h5>Mengetahui</h5>
                    <br>
                    <br>
                    <br>
                    <h5>Admin</h5>
                </div>
            </div>
        </div>
    </div>


</body>
</html>