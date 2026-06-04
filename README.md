# Sistem Informasi Akademik Telkom

Tugas Besar Pemrograman Berbasis Objek - Sistem Informasi Akademik berbasis web untuk mengelola data mahasiswa, dosen, mata kuliah, jadwal, dan bimbingan.

## Fitur

- 🔐 **Autentikasi** - Login & manajemen akun pengguna
- 👨‍🎓 **Manajemen Mahasiswa** - CRUD data mahasiswa
- 👨‍🏫 **Manajemen Dosen** - CRUD data dosen
- 📚 **Manajemen Mata Kuliah** - CRUD data mata kuliah
- 🗓️ **Manajemen Jadwal** - Pengelolaan jadwal kuliah
- 📝 **Manajemen Bimbingan** - Pengelolaan sesi bimbingan akademik

## Tech Stack

**Backend:** PHP 8.2, Laravel 12

**Frontend:** Blade Template, Vite

**Auth:** Laravel Breeze

**Database:** MySQL

## Setup Project

### Prerequisites

Pastikan kamu sudah menginstall:

- [PHP](https://www.php.net/) versi 8.2 atau lebih baru
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) versi 18.x atau lebih baru
- [MySQL](https://www.mysql.com/) / [MariaDB](https://mariadb.org/)

### Step 1: Clone Repository

```bash
git clone https://github.com/username-kamu/sistem-informasi-akademik-telkom.git
cd sistem-informasi-akademik-telkom
```

### Step 2: Install Dependencies

```bash
composer install
npm install
```

### Step 3: Konfigurasi Environment

Copy file `.env.example` menjadi `.env`:

**Windows (Command Prompt):**
```bash
cat .env.example > .env
```

**Windows (PowerShell) / Linux / Mac:**
```bash
cp .env.example .env
```

### Step 4: Generate App Key

```bash
php artisan key:generate
```

### Step 5: Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_siakad_telkom
DB_USERNAME=root
DB_PASSWORD=
```

### Step 6: Migrasi Database

```bash
php artisan migrate
```

### Step 7: Build Assets

```bash
npm run build
```

### Step 8: Jalankan Aplikasi

```bash
php artisan serve
```

Atau jalankan semua sekaligus (server + queue + vite):

```bash
composer run dev
```

Akses aplikasi di browser:

```
http://localhost:8000
```

## Struktur Proyek

```
├── app/
│   ├── Http/
│   │   ├── Controllers/    # Controller aplikasi
│   │   └── Requests/       # Form request validation
│   ├── Models/             # Eloquent models
│   └── Policies/           # Authorization policies
├── bootstrap/
├── resources/
│   └── views/              # Blade templates
├── routes/
├── .env.example
└── composer.json
```

## Tim Pengembang

| Nama | NIM |
|------|-----|
| Nama Anggota 1 | 123456789 |
| Nama Anggota 2 | 123456789 |
| Nama Anggota 3 | 123456789 |
