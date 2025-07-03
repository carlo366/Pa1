# Website Toko Obat Wijaya Farma
Proyek Berbasic laravel framework
Toko Wijaya Farma merupakan toko yang menjual beberapa obat melalui website.


demo : http://wijayafarma.sanbercodeapp.com/
# 💊 Toko Obat Wijaya Farma

![Laravel](https://img.shields.io/badge/Laravel-11-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)
![MySQL](https://img.shields.io/badge/Database-MySQL-blue?logo=mysql)
![Status](https://img.shields.io/badge/Status-Production-green)

> **Toko Obat Wijaya Farma** adalah aplikasi monolitik berbasis **Laravel 11** untuk manajemen apotek: mencakup inventaris obat, penjualan resep & non-resep, pelacakan kadaluarsa, laporan stok dan transaksi.

---

## 📌 Deskripsi Umum
Sistem apotek lengkap yang dirancang untuk kebutuhan **Toko Obat Wijaya Farma**. Semua modul dibangun dalam satu aplikasi Laravel (monolit), tanpa microservice. Fitur utama meliputi:
- Manajemen data obat & kategori  
- Pengelolaan stok masuk/kadaluarsa  
- Transaksi penjualan resep & non-resep  
- Laporan harian, mingguan, bulanan  
- Otentikasi & hak akses (Admin, Kasir, Apoteker)

---

## ✨ Fitur Utama

1. **Manajemen Obat & Kategori**  
   - CRUD data obat (nama, kode, merek, kategori, harga, stok minimal, tanggal kadaluarsa)  
   - CRUD kategori & supplier  

2. **Pengelolaan Stok**  
   - Input stok masuk dengan batch & tanggal kadaluarsa  
   - Peringatan stok menipis dan obat akan kadaluarsa  

3. **Transaksi Penjualan**  
   - Penjualan resep dan non-resep  
   - Pencarian cepat obat (kode, nama, kategori)  
   - Cetak struk/nota penjualan  

4. **Hak Akses & User Management**  
   - **Admin**: akses penuh (master data, transaksi, laporan)  
   - **Kasir**: input & kelola transaksi penjualan  
   - **Apoteker**: verifikasi resep & cek stok  

5. **Laporan & Statistik**  
   - Laporan penjualan harian, mingguan, bulanan  
   - Laporan stok akhir & stok kadaluarsa  
   - Grafik omzet penjualan & stok per kategori  
   - Export ke PDF & Excel  

---

## 🧱 Teknologi & Arsitektur

| Layer       | Teknologi                                               |
|-------------|---------------------------------------------------------|
| Framework   | Laravel 11                                              |
| Frontend    | Blade Templating, HTML5, CSS3, JavaScript (jQuery/Axios)|
| Database    | MySQL                                                   |
| Auth        | Laravel Breeze / Sanctum (session-based)                |
| Charting    | Chart.js                                                |
| Export      | Laravel-Excel, DomPDF                                   |
| Keamanan    | SSL/TLS, Middleware Role-Based                          |

**Arsitektur Monolit**:  
