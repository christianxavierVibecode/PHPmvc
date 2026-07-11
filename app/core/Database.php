<?php

class Database {
    private $host = DB_HOST; // Host server database
    private $user = DB_USER; // Username koneksi database
    private $pass = DB_PASS; // Password koneksi database
    private $dbname = DB_NAME; // Nama database yang digunakan

    private $dbh; // Database handler: objek koneksi PDO
    private $stmt; // Statement: objek prepared statement PDO

    // Constructor: membuka koneksi ke database menggunakan PDO saat model diinstansiasi
    public function __construct() {
        // Data Source Name (DSN) untuk koneksi PDO ke MySQL
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname; // Buat DSN string untuk koneksi MySQL

        $option = [
            PDO::ATTR_PERSISTENT => true, // Gunakan koneksi persisten untuk efisiensi
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Set mode error ke exception agar mudah ditangani
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); // Buka koneksi PDO dengan kredensial dari Constants
        } catch (PDOException $e){
            die($e->getMessage()); // Hentikan eksekusi dan tampilkan pesan error jika koneksi gagal
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query); // Siapkan query SQL untuk dieksekusi
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT; // Jika nilai integer, set tipe parameter ke INT
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL; // Jika nilai boolean, set tipe parameter ke BOOL
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL; // Jika nilai null, set tipe parameter ke NULL
                    break;
                default:
                    $type = PDO::PARAM_STR; // Default: set tipe parameter ke STRING
            }
        }

        $this->stmt->bindValue($param, $value, $type); // Bind nilai ke parameter query dengan tipe yang sesuai
    }

    public function execute(){
        $this->stmt->execute(); // Eksekusi statement yang telah disiapkan
    }

    public function resultSet(){
        $this->execute(); // Eksekusi statement
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // Ambil semua hasil sebagai array asosiatif
    }

    public function single(){
        $this->execute(); // Eksekusi statement
        return $this->stmt->fetch(PDO::FETCH_ASSOC); // Ambil satu baris hasil sebagai array asosiatif
    }

    public function rowCount(){ //rowCount disini merupakan method costum
        return $this->stmt->rowCount(); //rowCount disini merupakan method milik PDO
    }
}