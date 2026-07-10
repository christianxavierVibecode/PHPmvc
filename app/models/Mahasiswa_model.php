<?php

class Mahasiswa_model {
    private $dbh; // Database handler: objek koneksi PDO ke database
    private $stmt; // Statement: objek prepared statement PDO

    // Constructor: membuka koneksi ke database menggunakan PDO saat model diinstansiasi
    public function __construct() {
        // Data Source Name
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME; // Buat DSN string untuk koneksi MySQL

        try {
            $this->dbh = new PDO($dsn, DB_USER, DB_PASS); // Buka koneksi PDO dengan kredensial dari Constants
        } catch (PDOException $e){
            die($e->getMessage()); // Hentikan eksekusi dan tampilkan pesan error jika koneksi gagal
        }
    }

    // Method untuk mengambil semua data mahasiswa, mengembalikan array asosiatif
    public function getAllMahasiswa() {
        $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa"); // Menyiapkan query SQL
        $this->stmt->execute(); // Mengeksekusi query SQL
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan semua baris hasil dalam format array asosiatif
    }

}