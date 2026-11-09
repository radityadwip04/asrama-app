PEMBARUAN DASHBOARD ADMIN & USER

- Admin diarahkan ke /admin/dashboard.
- User diarahkan ke /user/dashboard.
- Menu dashboard disesuaikan dengan role dan menampilkan keterangan hak akses.
- Admin dapat mengakses index/create/store/edit/update/destroy untuk seluruh CRUD.
- User hanya dapat mengakses index/create/store.
- Route edit/update/delete dilindungi middleware role:admin di routes/web.php.
- Akun yang mendaftar sendiri otomatis mendapat role user.

Setelah menyalin file proyek, jalankan:
php artisan route:clear
php artisan view:clear

Tidak perlu migrate ulang untuk perubahan dashboard dan route ini.
