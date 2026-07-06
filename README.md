# 📚 Sistem Informasi Perpustakaan

## Deskripsi

Sistem Informasi Perpustakaan merupakan aplikasi berbasis Laravel yang digunakan untuk mengelola data buku, anggota, serta transaksi peminjaman dan pengembalian buku. Aplikasi ini juga dilengkapi dengan fitur laporan transaksi, perhitungan denda keterlambatan, serta notifikasi buku yang terlambat dikembalikan.

---

## 👤 Identitas

**Nama :** Zahra Zahrani
**NIM :** 60324011
**Mata Kuliah :** Pemrograman Web 2

---

# ✨ Fitur Aplikasi

## 📖 Manajemen Buku

* Menampilkan daftar buku
* Menambah data buku
* Mengubah data buku
* Menghapus data buku
* Mengelola stok buku

## 👥 Manajemen Anggota

* Menampilkan daftar anggota
* Menambah anggota
* Mengubah anggota
* Menghapus anggota

## 🔄 Transaksi Peminjaman

* Menambah transaksi peminjaman
* Menampilkan detail transaksi
* Pengembalian buku
* Update stok otomatis saat buku dikembalikan
* Perhitungan denda sebesar **Rp5.000/hari** apabila terlambat mengembalikan buku

## 📄 Laporan Transaksi

* Filter berdasarkan tanggal
* Filter berdasarkan status transaksi
* Filter berdasarkan anggota
* Menampilkan total transaksi
* Menampilkan total denda
* Export laporan ke PDF

## 🔔 Notifikasi Keterlambatan

* Widget jumlah buku terlambat pada dashboard
* Daftar anggota yang terlambat
* Badge **"Terlambat"** pada daftar transaksi
* Reminder pada halaman detail transaksi apabila melewati tanggal pengembalian

---

# 🖼️ Screenshot Aplikasi

## 1. Dashboard

Halaman utama aplikasi yang menampilkan ringkasan informasi.

![Dashboard](screenshot/01-dashboard.png)

---

## 2. Data Buku

Menampilkan seluruh data buku yang tersedia di perpustakaan.

![Data Buku](screenshot/02-daftar-buku.png)

---

## 3. Data Anggota

Menampilkan daftar anggota perpustakaan.

![Data Anggota](screenshot/03-daftar-anggota.png)

---

## 4. Daftar Transaksi

Halaman yang menampilkan seluruh transaksi peminjaman buku.

![Daftar Transaksi](screenshot/04-daftar-transaksi.png)

---

## 5. Detail Transaksi

Menampilkan informasi lengkap mengenai transaksi peminjaman.

![Detail Transaksi](screenshot/05-detail-transaksi-sebelum.png)

---

## 6. Pengembalian Buku

Proses pengembalian buku melalui tombol **Kembalikan Buku**.

![Pengembalian Buku](screenshot/06-detail-transaksi-sesudah.png)

---

## 7. Perhitungan Denda

Denda dihitung secara otomatis sebesar **Rp5.000 per hari** apabila melewati batas tanggal pengembalian.

![Perhitungan Denda](screenshot/07-perhitungan-denda.png)

---

## 8. Laporan Transaksi

Halaman laporan seluruh transaksi perpustakaan.

![Stok Buku](screenshot/08-stok-buku-bertambah.png)

---

## 9. Filter Laporan

Laporan dapat difilter berdasarkan tanggal, status transaksi, dan anggota.

![Laporan](screenshot/09-laporan-transaksi.png)

---

## 10. Export PDF

Laporan transaksi dapat diekspor menjadi file PDF.

![Filter](screenshot/10-filter-laporan.png)
---

## 11. Dashboard Buku Terlambat

Widget yang menampilkan jumlah transaksi yang terlambat beserta daftar anggotanya.

![Export PDF](screenshot/11-export-pdf.png)

---

## 12. Badge Terlambat

Badge berwarna merah akan muncul pada transaksi yang melewati batas pengembalian.

![Widget](screenshot/12-widget-buku-terlambat.png)

---

## 13. Reminder Keterlambatan

Peringatan akan muncul pada halaman detail transaksi jika buku belum dikembalikan setelah tanggal jatuh tempo.

![Badge](screenshot/13-badge-terlambat.png)
---

## 14. Database Transaksi

Struktur tabel transaksi pada database.

![Database Transaksi](screenshot/14-database-transaksi.png)

---

## 15. Database Buku

Struktur tabel buku yang menunjukkan perubahan stok setelah pengembalian.

![Database Buku](screenshot/15-database-buku.png)

---

# ⚙️ Cara Menjalankan Project

## 1. Clone Repository

```bash
git clone https://github.com/username/nama-repository.git
```

## 2. Masuk ke Folder Project

```bash
cd nama-repository
```

## 3. Install Dependency

```bash
composer install
```

## 4. Salin File Environment

```bash
cp .env.example .env
```

## 5. Generate Application Key

```bash
php artisan key:generate
```

## 6. Atur Konfigurasi Database

Sesuaikan file **.env** dengan database MySQL yang digunakan.

## 7. Jalankan Migration

```bash
php artisan migrate
```

## 8. Jalankan Seeder (jika ada)

```bash
php artisan db:seed
```

## 9. Jalankan Server Laravel

```bash
php artisan serve
```

---

# 🛠️ Teknologi yang Digunakan

* Laravel
* PHP
* MySQL
* Bootstrap
* HTML
* CSS
* JavaScript

---

# 📌 Fitur yang Dikerjakan

## ✅ Tugas 1

* Pengembalian buku
* Update stok otomatis
* Perhitungan denda Rp5.000/hari
* Menampilkan total denda pada detail transaksi

## ✅ Tugas 2

* Halaman laporan transaksi
* Filter tanggal
* Filter status
* Filter anggota
* Total transaksi
* Total denda
* Export PDF

## ✅ Tugas 3

* Widget buku terlambat
* Badge terlambat
* Reminder keterlambatan pada detail transaksi

---

# 📄 Lisensi

Project ini dibuat untuk memenuhi tugas mata kuliah **Pemrograman Web 2**.
