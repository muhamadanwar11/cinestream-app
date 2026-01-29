# Rancangan Aplikasi Tugas Besar Pemrograman Web

## 1. Topik & Deskripsi Aplikasi
**Nama Aplikasi**: "CineStream - Discover Movies"
**Deskripsi Singkat**:
CineStream adalah platform penemuan film modern yang dirancang untuk pecinta sinema. Aplikasi ini memungkinkan pengguna untuk menjelajahi film yang sedang tayang (Now Playing), populer, dan rating tertinggi. Pengguna dapat melihat detail film, trailer, dan aktor, serta menyimpan film favorit mereka ke koleksi pribadi.
**Target Pengguna**: Pecinta film umum yang mencari rekomendasi tontonan.

## 2. Sumber Data (Public API)
**API**: The Movie Database (TMDB) API
**URL Dokumentasi**: https://developer.themoviedb.org/docs
**Fitur API yang digunakan**:
- Get Trending Movies (Film populer saat ini)
- Get Movie Details (Detail, Overview, Rating)
- Get Movie Credits (Daftar Aktor)
- Search Movies (Pencarian Film)

## 3. Fitur Utama
1.  **Autentikasi (Multi-User)**:
    - Register & Login (Laravel Breeze).
    - Data Isolation: Koleksi favorit User A tidak bisa dilihat/diedit User B.
    - Security: Password hashing (Bcrypt), CSRF protection.

2.  **Integrasi API**:
    - Halaman Utama menampilkan daftar film populer (Grid View).
    - Fitur Pencarian Film berdasarkan judul.
    - Halaman Detail Film.

3.  **CRUD Lokal (My List / Favorites)**:
    - **Create**: Tambahkan film ke daftar "My Watchlist".
    - **Read**: Lihat daftar Watchlist pribadi.
    - **Update**: Tambahkan review/catatan pribadi untuk film di Watchlist.
    - **Delete**: Hapus film dari Watchlist.

## 4. Desain & UI/UX
- **Tema**: Modern Dark Theme dengan aksen warna vibran (Neon Purple/Blue).
- **Style**: Glassmorphism pada kartu film dan navigasi.
- **Responsif**: Tampilan mobile-friendly.
