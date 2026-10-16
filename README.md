# GymMember Backend

REST API untuk aplikasi GymMember, yaitu sistem pengelolaan anggota gym, paket membership, pendaftaran membership, dan pembayaran.

## Teknologi

- Laravel
- PHP
- MySQL/MariaDB
- Laravel Sanctum untuk autentikasi API

## Fitur

- Login admin
- Pengelolaan data anggota
- Pengelolaan paket membership
- Pendaftaran membership
- Pencatatan pembayaran

## Kebutuhan Sistem

- PHP dengan versi yang sesuai dengan `composer.json`
- Composer
- MySQL atau MariaDB
- Git

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/mutiarahanum/GymMember-Backend.git
```

### 2. Masuk ke folder project

```bash
cd GymMember-Backend
```

### 3. Instal dependensi

```bash
composer install
```

### 4. Siapkan environment

Salin `.env.example` menjadi `.env`.

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

### 5. Buat application key

```bash
php artisan key:generate
```

### 6. Siapkan database

Buat database MySQL bernama `gymmember`, kemudian sesuaikan konfigurasi database di file `.env`.

Contoh:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gymmember
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL lokal.

### 7. Jalankan migration

```bash
php artisan migrate
```

### 8. Buat akun demo dan data awal

Pastikan konfigurasi seeder sudah benar, kemudian jalankan:

```bash
php artisan db:seed
```

Jika hanya ingin membuat atau memperbarui akun admin:

```bash
php artisan db:seed --class=UserSeeder
```

### 9. Jalankan server

```bash
php artisan serve
```

Backend tersedia di:

http://127.0.0.1:8000

## Endpoint API


Semua endpoint API menggunakan prefix `/api`.

| Method | Endpoint | Fungsi |
|---|---|---|
| POST | `/api/login` | Login admin |
| GET | `/api/user` | Melihat data pengguna yang login |
| GET | `/api/members` | Melihat daftar anggota |
| POST | `/api/members` | Menambah anggota |
| GET | `/api/members/{member}` | Melihat detail anggota |
| PUT/PATCH | `/api/members/{member}` | Memperbarui anggota |
| DELETE | `/api/members/{member}` | Menghapus anggota |
| GET | `/api/membership-packages` | Melihat daftar paket |
| POST | `/api/membership-packages` | Menambah paket |
| GET | `/api/membership-packages/{membership_package}` | Melihat detail paket |
| PUT/PATCH | `/api/membership-packages/{membership_package}` | Memperbarui paket |
| DELETE | `/api/membership-packages/{membership_package}` | Menghapus paket |
| GET | `/api/memberships` | Melihat daftar membership |
| POST | `/api/memberships` | Mendaftarkan membership |
| GET | `/api/memberships/{membership}` | Melihat detail membership |
| PUT/PATCH | `/api/memberships/{membership}` | Memperbarui membership |
| DELETE | `/api/memberships/{membership}` | Menghapus membership |
| GET | `/api/payments` | Melihat daftar pembayaran |
| POST | `/api/payments` | Mencatat pembayaran |
| GET | `/api/payments/{payment}` | Melihat detail pembayaran |
| PUT/PATCH | `/api/payments/{payment}` | Memperbarui pembayaran |
| DELETE | `/api/payments/{payment}` | Menghapus pembayaran |

Endpoint tersedia sesuai implementasi pada `routes/api.php` dan controller terkait. Aturan autentikasi mengikuti middleware yang diterapkan pada masing-masing route.


## Akun Demo

Email: `hanum@gymmember.com`
Password: gunakan password demo yang ditetapkan di `UserSeeder`.

## Catatan Keamanan

- Jangan mengunggah file `.env` asli.
- Jangan menyimpan password atau token rahasia di repository.
- Gunakan kredensial khusus untuk demo dan pengujian.

## Repository

Backend: https://github.com/mutiarahanum/GymMember-Backend
Frontend: https://github.com/mutiarahanum/GymMember-Frontend
