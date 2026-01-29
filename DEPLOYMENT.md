# Panduan Deployment CineStream 🚀

Panduan ini akan membantu Anda mendeploy aplikasi CineStream ke server agar bisa diakses oleh publik.

## Opsi 1: Menggunakan Railway.app (Paling Mudah)
Railway sangat cocok untuk Laravel karena mendukung database MySQL secara otomatis.

1.  **Hubungkan ke GitHub**: Upload folder proyek ini ke repository GitHub Anda.
2.  **Buat Proyek Baru**: Di [Railway.app](https://railway.app), pilih "New Project" -> "Deploy from GitHub repo".
3.  **Pengaturan Variabel Link (Environment Variables)**:
    Tambahkan variabel berikut di panel Railway:
    - `APP_KEY`: (Gunakan hasil dari `php artisan key:generate --show`)
    - `APP_ENV`: `production`
    - `APP_DEBUG`: `false`
    - `TMDB_TOKEN`: (Token API TMDB Anda)
    - `DB_CONNECTION`: `mysql` (Railway akan memberikan detail DB otomatis)
4.  **Selesai**: Railway akan melakukan build dan memberikan URL publik.

## Opsi 2: Deploy ke VPS (Ubuntu/Debian)
Jika Anda menggunakan VPS (seperti DigitalOcean atau Linode):

1.  **Instalasi Server**: Pastikan server memiliki PHP 8.2+, Nginx, dan MySQL.
2.  **Clone Repository**:
    ```bash
    git clone [url-repo-anda]
    cd 2307026_Nayla_Nur_Faridah_TB_PEMROB
    ```
3.  **Instal Dependensi**:
    ```bash
    composer install --no-dev --optimize-autoloader
    npm install && npm run build
    ```
4.  **Konfigurasi .env**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Sesuaikan detail DB_DATABASE, DB_USERNAME, dan DB_PASSWORD.*
5.  **Migrasi Database**:
    ```bash
    php artisan migrate --force --seed
    ```
6.  **Setting Permission**:
    ```bash
    sudo chown -R www-data:www-data storage bootstrap/cache
    chmod -R 775 storage bootstrap/cache
    ```

## Hal Penting Sebelum Online! ⚠️
1.  **Ganti URL**: Ubah `APP_URL` di file `.env` menjadi alamat domain asli Anda.
2.  **Matikan Debug**: Selalu pastikan `APP_DEBUG=false` di lingkungan produksi demi keamanan.
3.  **API TMDB**: Pastikan `TMDB_TOKEN` sudah terisi dengan benar agar film muncul.

---
Dikembangkan oleh: **Nayla Nur Faridah**
Aplikasi: **CineStream - Platform Eksplorasi Film Premium**
