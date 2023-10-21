<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
       
    </style>
</head>
<body>
        <div class="container mt-5">
            <div class="border-bottom">
                <h1 class="text-center">PT AZLOGISTIK.COM</h1>
                <h2 class="text-center">Surabaya, Jawa Timur, Indonesia</h1>
            </div>

            <div class="row text-center mt-5">
                <div class="col-md-12">
                    <h4><b>SLIP GAJI KARYAWAN</b></h3>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">NIK</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6">{{$karyawan->nik}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">Nama</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6">{{$karyawan->nama_karyawan}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">Golongan</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6">{{$karyawan->golongan->nama_golongan}}</div>
                    </div>
                </div>
            </div>

            {{-- SUMMARY --}}
            <div class="row mt-5">

                {{-- PENGHASILAN --}}
                <div class="col-md-6">
                    <h4><b>PENGHASILAN</b></h4>
                    <div class="row">
                        <div class="col-md-5">Gaji Pokok</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6">@currency($karyawan->golongan->gaji_pokok)</div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">Uang Kehadiran</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6">@currency($karyawan->total_uang_kehadiran)</div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">Uang Lembur</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6">@currency($karyawan->total_uang_lembur)</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3"><b>Total (A)</b></div>
                        <div class="col-md-3 border-top" style="border-width: 2px;">
                            @currency($karyawan->golongan->gaji_pokok + $karyawan->total_uang_kehadiran + $karyawan->total_uang_lembur)
                        </div>
                    </div>
                </div>

                {{-- POTONGAN --}}
                <div class="col-md-6">
                    <h4><b>POTONGAN</b></h4>
                    <div class="row">
                        <div class="col-md-5">Potongan Absen</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6">@currency($karyawan->total_potongan_absen)</div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">&nbsp;</div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">&nbsp;</div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3"><b>Total (B)</b></div>
                        <div class="col-md-3 border-top" style="border-width: 2px;">
                            @currency($karyawan->total_potongan_absen)
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 text-center" style="
            background: lightgray">
                <div class="col-md-12 p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>PENERIMAAN BERSIH (A-B)</b></h4>
                        </div>
                        <div class="col-md-6">
                            <h4><b>@currency($karyawan->thp)</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 border-top p-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h5><b>Terbilang: # {{ 
                               Terbilang::make($karyawan->thp, ' rupiah');}} #</b></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">&nbsp;</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-6">&nbsp;</div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">&nbsp;</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-6">&nbsp;</div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">&nbsp;</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-6">&nbsp;</div>
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <div>Manajer Operasional</div>
                    <div class="mt-5">
                        Vania Stepani
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>