# Roadmap & Prompts Project CI4 CRUD + Login

## Status Project
- [x] Step 1: Scaffolding Project & DB Config
- [x] Step 2: Planning High-Level (`issue.md`)
- [ ] Step 3: Auth System (Register, Login, Logout)
- [ ] Step 4: CRUD Product Modul
- [ ] Step 5: Automated Testing & Refactoring

---

## Prompt Log & Notes

### 1
Tolong buatkan scaffolding project CodeIgniter 4 baru di direktori workspace ini menggunakan Composer.

Setelah project ter-install:
1. Copy file `env` menjadi `.env`.
2. Ubah konfigurasi `.env`:
   - Set `CI_ENVIRONMENT = development`
   - Set `app.baseURL = 'http://localhost:8080/'`
   - Konfigurasi koneksi MySQL ke database lokal bernama `ci4_crud_db` (hostname: localhost, username: root, password: sesuaikan/kosongkan jika tanpa password, driver: MySQLi).
3. Buatkan skrip/command SQL sederhana atau perintahkan saya jika perlu membuat database `ci4_crud_db` di MySQL lokal terlebih dahulu.
4. Tes jalankan `php spark serve` dan pastikan halaman utama CodeIgniter 4 dapat diakses.

### 2
Tolong baca file `issue.md` khususnya bagian "Step 2.1 — Database Migration".

Tugas Anda:
1. Buatkan file Migration untuk tabel `users` dan `products` menggunakan perintah `php spark make:migration`.
2. Definisikan kolom-kolomnya sesuai skema di `issue.md`:
   - Tabel `users`: id, name, email (unique), password, created_at, updated_at.
   - Tabel `products`: id, name, description, price, stock, created_at, updated_at.
3. Jalankan migrasi dengan perintah `php spark migrate`.

Pastikan skema yang dibuat menggunakan CI4 DBForge dan timestamps aktif.

