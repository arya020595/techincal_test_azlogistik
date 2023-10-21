# TECHNICAL TEST (AZLOGISTIK)

## Setup:
- php artisan serve
- php artisan migrate
- php artisan db:seed --class=GolonganSeeder
- php artisan db:seed --class=KaryawanSeeder

## The URL:
- http://127.0.0.1:8000/karyawans (Data Karyawan)
- http://127.0.0.1:8000/karyawans/create (Input Karyawan)
- http://127.0.0.1:8000/slip-gaji (Select Slip Gaji Karyawan)
- http://127.0.0.1:8000/slip-gaji/show/2 (Detail Slip Gaji Karyawan) -> {2} is parameter
