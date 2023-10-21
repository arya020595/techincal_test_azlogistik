<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('karyawans.store') }}" method="POST">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Karyawan</label>
                                <select class="form-control @error('karyawan_id') is-invalid @enderror" name="karyawan_id" id="karyawan_id" >
                                    <option value="">Pilih Karyawan</option>
                                    @foreach($karyawans as $karyawan)
                                        <option value="{{ $karyawan->id }}">{{ $karyawan->nama_karyawan }}</option>
                                    @endforeach
                                </select>
                            
                                <!-- error message untuk title -->
                                @error('karyawan_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Kehadiran</label>
                                <input type="number" class="form-control @error('jumlah_kehadiran') is-invalid @enderror" name="jumlah_kehadiran" value="{{ old('jumlah_kehadiran') }}" placeholder="Masukkan Jumlah Kehadiran">
                            
                                <!-- error message untuk jumlah_kehadiran -->
                                @error('jumlah_kehadiran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Cuti</label>
                                <input type="number" class="form-control @error('jumlah_cuti') is-invalid @enderror" name="jumlah_cuti" value="{{ old('jumlah_cuti') }}" placeholder="Masukkan Jumlah Cuti">
                            
                                <!-- error message untuk jumlah_cuti -->
                                @error('jumlah_cuti')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Lembur (Dalam Jam)</label>
                                <input type="number" class="form-control @error('jumlah_lembur') is-invalid @enderror" name="jumlah_lembur" value="{{ old('jumlah_lembur') }}" placeholder="Masukkan Jumlah Lembur">
                            
                                <!-- error message untuk jumlah_lembur -->
                                @error('jumlah_lembur')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>