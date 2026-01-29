# CineStream - Discover Movies
**Tugas Besar Pemrograman Web**

## 1. Identitas Mahasiswa
- **Nama**: Nayla Nur Faridah
- **NIM**: 2307026

## 2. Deskripsi Aplikasi
CineStream adalah platform penemuan film modern yang dirancang untuk memberikan pengalaman eksplorasi film yang personal dan interaktif.

### Tujuan Aplikasi
- Memudahkan pengguna dalam menemukan film-film terbaru dan populer dari seluruh dunia.
- Memberikan wadah bagi pecinta film untuk mengelola daftar tontonan (Watchlist) pribadi mereka.
- Menyediakan sistem manajemen konten dan pengguna yang aman bagi administrator.

### Target Pengguna
- **Pecinta Film Umum**: Orang yang mencari rekomendasi tontonan berkualitas.
- **Kolektor Informasi Film**: Pengguna yang ingin mendata film-film yang pernah atau akan ditonton beserta catatan pribadi.
- **Administrator Situs**: Tim teknis yang bertugas mengelola integritas data pengguna.

## 3. Sumber Data (API Eksternal)
Aplikasi ini menggunakan data real-time dari **The Movie Database (TMDB) API**, salah satu public API film terbesar di dunia. Data yang diambil meliputi:
- Daftar film populer, trending, dan rating tertinggi.
- Detail rinci film (sinopsis, tanggal rilis, rating).
- Gambar poster dan backdrop film.

## 4. Sistem Role (Hak Akses)
Aplikasi ini menerapkan Multi-User Role untuk memisahkan fungsi operasional:

### 👤 Role: User (Standard)
- **Akses**: Halaman Dashboard dan Watchlist.
- **Fitur**:
    - Eksplorasi film dari API eksternal.
    - Pencarian film secara spesifik.
    - Menambahkan film ke koleksi "My Watchlist" pribadi.
    - Memberikan catatan/review pribadi pada film di koleksi (CRUD Lokal).
    - Data bersifat terisolasi (User A tidak bisa melihat data milik User B).

### 🛡️ Role: Admin (Superuser)
- **Akses**: Dashboard Khusus Admin (Admin Control Center).
- **Fitur**:
    - Melihat statistik total pengguna dan total data di database.
    - Manajemen Pengguna (CRUD Penuh): Menambah user baru, Mengedit profil/password user, Mengubah Role user, hingga Menghapus user.
    - Memiliki kendali penuh atas keamanan akses platform.

## 5. Teknologi yang Digunakan
- **Framework**: Laravel 11 (Elequent ORM, Blade, Middleware)
- **Frontend**: Tailwind CSS, Alpine.js (Modern & Responsive UI)
- **Database**: MySQL (Penggunaan Migrasi & Seeder)
- **API**: TMDB API (Guzzle HTTP Request)
- **Design Style**: Glassmorphism & Modern Dark Theme

## 4. Fitur Utama
- **Autentikasi**: Sistem Login & Register menggunakan Laravel Breeze.
- **Multi-User (Role-Based)**: 
  - **User**: Mencari film dan mengelola Watchlist pribadi.
  - **Admin**: Dashboard statistik dan manajemen penuh data pengguna (CRUD User).
- **Integrasi API**: Menampilkan film populer dan fitur pencarian secara real-time dari TMDB.
- **CRUD Lokal**: Pengguna dapat menambah, melihat, mengedit catatan, dan menghapus film dari Watchlist.

## 5. Cara Instalasi & Menjalankan Aplikasi
### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- Laragon / XAMPP (MySQL)

### Langkah-langkah
1. **Clone Repository**
   ```bash
   git clone <url-repository>
   cd 2307026_Nayla_Nur_Faridah_TB_PEMROB
   ```

2. **Instal Dependensi**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   - Salin `.env.example` menjadi `.env`
   - Sesuaikan konfigurasi database di `.env`
   - Tambahkan TMDB API Key: `TMDB_TOKEN=your_token_here`

4. **Generate Key & Migrate**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. **Seed Data Admin**
   ```bash
   php artisan db:seed --class=AdminSeeder
   ```

6. **Jalankan Aplikasi**
   - Di terminal 1: `npm run dev`
   - Di terminal 2: `php artisan serve`
   - Akses di: `http://localhost:8000`

## 6. Tangkapan Layar (Screenshot)
*(Silakan tambahkan tangkapan layar aplikasi di sini)*

---
*Dibuat untuk memenuhi Tugas Besar mata kuliah Pemrograman Web.*
