# HACI Project

HACI Project adalah aplikasi berbasis web yang dirancang untuk memudahkan manajemen data dan proses bisnis sesuai kebutuhan Anda.

## Fitur Utama

- Manajemen data website company profile
- Antarmuka pengguna yang intuitif
- Dukungan multi-user

## Cara Instalasi

## Persyaratan Sistem

Pastikan Anda telah menginstall:
- PHP >= 8.4
- Composer
- MySQL/MariaDB (atau database lain yang didukung Laravel)
- Git (opsional, jika ingin clone repository)

## Langkah Instalasi

1. **Unduh source code**
    - **Clone repository (opsional):**
        ```bash
        git clone https://github.com/username/haci-project.git
        cd haci-project
        ```
    - **Atau download ZIP:**
        1. Kunjungi [https://github.com/username/haci-project](https://github.com/username/haci-project)
        2. Klik tombol **Code** lalu pilih **Download ZIP**
        3. Ekstrak file ZIP dan buka folder `haci-project` di terminal

2. **Install dependensi**
    ```bash
    composer install
    ```

3. **Salin file environment**
    ```bash
    cp .env.example .env
    ```

4. **Konfigurasi environment**
    - Edit file `.env` sesuai kebutuhan (database, password dsb).

5. **Generate key aplikasi**
    ```bash
    php artisan key:generate
    ```

6. **Migrasi dan seeder database**
    ```bash
    php artisan migrate --seed
    ```
    > Atau jalankan seeder saja:
    > ```bash
    > php artisan db:seed
    > ```

7. **Jalankan aplikasi**
    ```bash
    php artisan serve
    ```