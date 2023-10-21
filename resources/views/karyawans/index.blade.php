<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Karyawans</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        /* Pagination styles */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
        }

        .pagination li {
            margin: 0 4px;
        }

        .pagination a, .pagination span {
            padding: 6px 12px;
            border: 1px solid #007BFF;
            border-radius: 4px;
            text-decoration: none;
            color: #007BFF;
        }

        .pagination a:hover {
            background-color: #007BFF;
            color: #fff;
        }

        .pagination .active span {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('karyawans.create') }}" class="btn btn-md btn-success mb-3">INPUT KARYAWAN</a>
                        <a href="{{ route('slip_gaji.form') }}" class="btn btn-md btn-primary mb-3">PILIH SLIP GAJI KARYAWAN</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nama Karyawan</th>
                                <th scope="col">Jumlah Kehadiran</th>
                                <th scope="col">Jumlah Cuti</th>
                                <th scope="col">Jumlah Lembur (1 Bulan dalam jam)</th>
                                <th scope="col">Hasil THP</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($karyawans as $karyawan)
                                <tr>
                                    <td>{{ $karyawan->nama_karyawan }}</td>
                                    <td>{{ $karyawan->jumlah_kehadiran }}</td>
                                    <td>{{ $karyawan->jumlah_cuti }}</td>
                                    <td>{{ $karyawan->jumlah_lembur }}</td>
                                    <td>{{ $karyawan->thp }}</td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Karyawan belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                            {{ $karyawans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
    </script>

</body>
</html>