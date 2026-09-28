# CI4 CRUD & Authentication System

Aplikasi web manajemen data produk (CRUD) dengan sistem autentikasi pengguna berbasis framework CodeIgniter 4.

---

## 1. Penjelasan Project

Project ini merupakan aplikasi web yang dibangun menggunakan arsitektur **Model-View-Controller (MVC)** pada framework **CodeIgniter 4**. Aplikasi ini dirancang untuk mengelola data produk secara aman, di mana fitur manajemen produk diproteksi oleh sistem autentikasi akun (hanya pengguna yang telah terdaftar dan login yang dapat mengelola data).

---

## 2. Tech Stack yang Digunakan

- **Backend Framework:** CodeIgniter 4 (PHP 8.2+)
- **Database:** MySQL / MariaDB (menggunakan CI4 Database Migration & DBForge)
- **Dependency Manager:** Composer
- **Frontend / UI:** Bootstrap 5.3 & Bootstrap Icons
- **Keamanan:** Password Hashing (`PASSWORD_BCRYPT`), CSRF Protection, dan Session Filter

---

## 3. Cara Kerja Sistem

1. **Alur Autentikasi (Register & Login)**
   - **Registrasi:** Calon pengguna mendaftarkan akun dengan nama, email unik, dan password. Data password di-hash secara aman menggunakan algoritma bcrypt sebelum disimpan ke database.
   - **Login:** Pengguna masuk dengan memasukkan email dan password. Sistem memvalidasi input, mencocokkan hash password, dan menyimpan sesi login (`is_logged_in`, `user_id`, `user_name`, `user_email`).
   - **Logout:** Sesi pengguna dihancurkan (`destroy`) dan dialihkan kembali ke halaman login.

2. **Proteksi Route (`AuthFilter`)**
   - Rute grup `/products` dilindungi oleh filter otentikasi (`AuthFilter`).
   - Jika pengguna yang belum login mencoba mengakses halaman data produk, sistem otomatis memblokir akses dan mengarahkannya ke halaman `/login` dengan notifikasi peringatan.
   - Jika pengguna yang sudah login mengakses halaman awal (`/`) atau form login, sistem otomatis mengarahkannya langsung ke halaman dashboard produk.

3. **Alur Manajemen Produk (CRUD)**
   - **Create:** Menambahkan produk baru (nama, deskripsi, harga, stok) yang divalidasi oleh sistem sebelum disimpan ke database.
   - **Read:** Menampilkan daftar seluruh produk dalam bentuk tabel dengan format mata uang (Rupiah) dan penanda ketersediaan stok.
   - **Update:** Memperbarui informasi produk yang sudah ada melalui form edit yang terisi otomatis dengan data lama.
   - **Delete:** Menghapus data produk dari database dengan konfirmasi penghapusan.

---

## 4. Hasil yang Didapatkan

- **Modul Autentikasi Lengkap:**
  - Halaman Register dengan validasi unik pada email dan konfirmasi password.
  - Halaman Login dengan penanganan error dan umpan balik flash session yang informatif.
  - Fitur Logout yang membersihkan sesi pengguna dengan aman.

- **Modul CRUD Data Produk:**
  - Halaman Daftar Produk (`/products`) berformat tabel rapi dan responsif.
  - Form Tambah Produk (`/products/create`) dan Form Edit Produk (`/products/edit/{id}`) dengan pesan validasi interaktif.
  - Fitur Hapus Produk dengan modal konfirmasi.

- **Struktur Database Terkelola:**
  - Migrasi skema database terstruktur untuk tabel `users` dan tabel `products` yang mendukung pencatatan waktu otomatis (`created_at` dan `updated_at`).

- **Antarmuka Responsif:**
  - Tampilan antarmuka modern dan responsif untuk perangkat desktop maupun mobile menggunakan Bootstrap 5.
# ci4-vibe-coding-test
