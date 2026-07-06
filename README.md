# Sistem Informasi Perpustakaan

## Deskripsi

Aplikasi Sistem Informasi Perpustakaan berbasis Laravel yang digunakan untuk mengelola data buku, anggota, dan transaksi peminjaman buku.

## Fitur Utama

### 1. Manajemen Buku

* Tambah buku
* Edit buku
* Hapus buku
* Lihat daftar buku

### 2. Manajemen Anggota

* Tambah anggota
* Edit anggota
* Hapus anggota
* Lihat daftar anggota

### 3. Transaksi Peminjaman

* Peminjaman buku
* Pengembalian buku
* Update stok otomatis saat pengembalian
* Perhitungan denda keterlambatan Rp5.000 per hari

### 4. Laporan Transaksi

* Filter berdasarkan tanggal
* Filter berdasarkan status
* Filter berdasarkan anggota
* Menampilkan total transaksi
* Menampilkan total denda
* Export laporan ke PDF

### 5. Notifikasi Keterlambatan

* Widget jumlah buku terlambat pada dashboard
* Daftar anggota yang terlambat
* Badge "Terlambat" pada transaksi
* Reminder pada detail transaksi yang melewati batas pengembalian

## Teknologi yang Digunakan

* Laravel
* PHP
* MySQL
* Bootstrap

## Screenshot

### Pengembalian Buku

* Detail transaksi sebelum pengembalian
* Detail transaksi setelah pengembalian
* Tampilan perhitungan denda
* Bukti update stok buku

### Laporan Transaksi

* Halaman laporan transaksi
* Filter laporan
* Total transaksi dan total denda
* Export PDF

### Notifikasi Keterlambatan

* Dashboard widget buku terlambat
* Badge terlambat pada transaksi
* Reminder pada detail transaksi

## Cara Menjalankan Project

1. Clone repository
2. Install dependency

```bash
composer install
```

3. Copy file environment

```bash
cp .env.example .env
```

4. Generate application key

```bash
php artisan key:generate
```

5. Konfigurasi database pada file .env

6. Jalankan migration

```bash
php artisan migrate
```

7. Jalankan server

```bash
php artisan serve
```

