# Authentication & Authorization AsramaApp

## Menjalankan fitur baru

1. Pastikan konfigurasi database pada file `.env` sudah benar.
2. Jalankan migrasi: `php artisan migrate`.
3. Buat akun demo: `php artisan db:seed --class=UserSeeder` (atau `php artisan db:seed` untuk menjalankan seluruh seeder).
4. Jalankan aplikasi: `php artisan serve`.
5. Buka `/login` atau `/register`.

## Akun demo

- Admin: `admin@asrama.test` / `admin12345`
- User: `user@asrama.test` / `user12345`

Segera ganti password akun demo sebelum aplikasi dipakai sungguhan.

## Hak akses

- Admin: Create, Read, Update, Delete pada seluruh fitur CRUD.
- User: Create dan Read. Route edit, update, dan delete dilindungi middleware `role:admin`.
- Semua dashboard dan route CRUD memerlukan login (`auth`).
- Registrasi publik selalu membuat role `user`; role admin hanya diberikan melalui seeder atau pengelolaan database oleh admin.

## Catatan

Proyek ini menggunakan Laravel 9 dan autentikasi bawaan Laravel (session guard), tanpa menambah dependency Breeze/UI. Middleware alias `role` didaftarkan di `app/Http/Kernel.php`.
