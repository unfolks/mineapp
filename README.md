Mine App version 0.1

stack :
- framework : laravel inertia with vue
- php version : 8.2.28
- laravel version : 12
- node version : v24.2.0
- npm version : 11.3.0

1. instal :
- composer install
- npm install

2. Migrasi Database :
- php artisan migrate

3. auth login :
- Admin(email: admin@example.com, password: password)
- Approval 1 (email: atasan1@example.com, password: password)
- Approval 2 (email: atasan2@example.com, password: password)

panduan penggunaan aplikasi :
Pemesanan
1. masuk / login sebagai admin atau approval
2. masuk ke halaman order
3. pilih tombol "tambah"
4. masukkan data yang ingin di tambahkan
5. pilih tombol "ajukan pemesanan"
6. maka data akan muncul di halaman order

Approval
1. masuk / login menggunakan akun approval
2. masuk ke halaman order
3. periksa data dengan status menunggu atau dalam proses
4. tekan tombol di kolom menyetujui untuk menyetujui
5. maka status akan berubah
