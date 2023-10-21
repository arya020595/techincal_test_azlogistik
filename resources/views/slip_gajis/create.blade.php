<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Gaji Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <label for="karyawan_id">Pilih Karyawan:</label>
            <select class="form-control" name="karyawan_id" id="karyawan_id">
                <option value="">Pilih Karyawan</option>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}" data-url="{{ route('slip_gaji.show', $karyawan->id) }}">{{ $karyawan->nama_karyawan }}</option>
                @endforeach
            </select>
        </div>
    </div>
</body>

<script>
    document.getElementById('karyawan_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        debugger
        var url = selectedOption.getAttribute('data-url');
        if (url) {
            window.location.href = url;
        }
    });

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</script>
</html>