# PHP MVC - Belajar Konsep MVC Native

Repository ini digunakan sebagai sarana pembelajaran untuk memahami konsep design pattern **MVC (Model-View-Controller)** menggunakan **PHP Native (murni)** sebelum melangkah ke framework PHP modern seperti Laravel, Symfony, atau CodeIgniter.

Melalui proyek ini, konsep dasar arsitektur aplikasi web modern diimplementasikan secara manual untuk memahami bagaimana request didelegasikan dari URL hingga menghasilkan output.

---

## 📂 Struktur Direktori

Aplikasi ini dibagi menjadi dua bagian utama:

```text
PHPMVC/
├── app/                  # Berisi seluruh logika dan core sistem aplikasi (Private)
│   ├── config/           # File konfigurasi global dan database
│   ├── controllers/      # Controller untuk menangani request dan logika bisnis
│   ├── core/             # Kelas inti (Router, Base Controller, DB Wrapper, Flasher)
│   ├── models/           # Model untuk interaksi langsung dengan database
│   ├── views/            # Template tampilan (HTML, CSS, Bootstrap)
│   ├── .htaccess         # Keamanan folder app
│   └── init.php          # File bootstrap untuk memuat semua dependency
└── public/               # Folder publik yang dapat diakses langsung (Public Document Root)
    ├── css/              # File stylesheet (Bootstrap)
    ├── js/               # File script client-side (AJAX)
    ├── img/              # File aset gambar
    ├── .htaccess         # Mengarahkan semua request ke index.php (Pretty URL)
    └── index.php         # Entry point tunggal aplikasi
```

---

## 🛠️ Fitur & Konsep Utama yang Dipelajari

1. **Routing & Pretty URL**
   Menggunakan `.htaccess` untuk mengarahkan seluruh URL request menuju `public/index.php`. URL di-parsing secara dinamis dengan format `localhost/phpmvc/public/[controller]/[method]/[parameter]`.

2. **Koneksi Database Aman (PDO Wrapper)**
   Membuat database wrapper menggunakan **PDO (PHP Data Objects)** dengan prepared statements untuk mencegah ancaman keamanan SQL Injection.

3. **CRUD Data Mahasiswa**
   Implementasi proses *Create, Read, Update, dan Delete* data secara terstruktur dengan memisahkan fungsi database di Model dan pemanggilan di Controller.

4. **Flash Messages (Session)**
   Menampilkan notifikasi umpan balik sementara (*success* atau *danger*) ke pengguna setelah melakukan aksi manipulasi data menggunakan session PHP.

5. **Integrasi AJAX (Asynchronous JavaScript and XML)**
   Menggunakan JavaScript `fetch` API di sisi client untuk mengambil data spesifik secara asinkron (tanpa reload halaman) saat melakukan proses pembaruan data (Ubah Data).
