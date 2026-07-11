<?php

class Mahasiswa_model {
    private $table = "mahasiswa"; // Nama tabel database yang digunakan
    private $db; // Objek Database untuk koneksi dan query

    // Constructor: inisialisasi objek wrapper Database saat model diinstansiasi
    public function __construct() {
        $this->db = new Database(); // Inisialisasi objek Database
    }

    // Method untuk mengambil semua data mahasiswa, mengembalikan array asosiatif
    public function getAllMahasiswa() {
        $this->db->query("SELECT * FROM " . $this->table); // Siapkan query untuk mengambil semua data mahasiswa
        return $this->db->resultSet(); // Eksekusi query dan kembalikan hasil sebagai array asosiatif
    }

    // Method untuk mengambil satu data mahasiswa berdasarkan ID
    public function getMahasiswaById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id"); // Siapkan query untuk mengambil data mahasiswa berdasarkan ID
        $this->db->bind(':id', $id); // Bind parameter ID ke query
        return $this->db->single(); // Eksekusi query dan kembalikan hasil sebagai array asosiatif
    }

    // Method untuk menyisipkan data mahasiswa baru ke dalam database
    public function tambahDataMahasiswa($postData){
        $query = "INSERT INTO mahasiswa
                    VALUES
                  ('', :nama, :nrp, :email, :jurusan)"; // Menyiapkan string query INSERT SQL
        
        $this->db->query($query); // Siapkan query ke objek database
        $this->db->bind('nama',$postData["nama"]); // Bind parameter nama
        $this->db->bind('nrp',$postData["nrp"]); // Bind parameter nrp
        $this->db->bind('email',$postData["email"]); // Bind parameter email
        $this->db->bind('jurusan',$postData["jurusan"]); // Bind parameter jurusan

        $this->db->execute(); // Eksekusi prepared statement ke database

        return $this->db->rowCount(); // Mengembalikan jumlah baris yang terpengaruh (1 jika sukses, 0 jika gagal)
    }

    // Method untuk menghapus data mahasiswa berdasarkan ID dari database
    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id"; // Menyiapkan string query DELETE SQL
        $this->db->query($query); // Siapkan query ke objek database
        $this->db->bind('id', $id); // Bind parameter ID ke query

        $this->db->execute(); // Eksekusi query ke database

        return $this->db->rowCount(); // Mengembalikan jumlah baris yang terhapus (1 jika sukses, 0 jika gagal)
    }

    // Method untuk memperbarui data mahasiswa di database
    public function ubahDataMahasiswa($postData){
        $query = "UPDATE mahasiswa SET 
            nama = :nama,
            nrp = :nrp,
            email = :email,
            jurusan = :jurusan
        WHERE id= :id"; // Menyiapkan string query UPDATE SQL
        
        $this->db->query($query); // Siapkan query ke objek database
        $this->db->bind('nama',$postData["nama"]); // Bind parameter nama
        $this->db->bind('nrp',$postData["nrp"]); // Bind parameter nrp
        $this->db->bind('email',$postData["email"]); // Bind parameter email
        $this->db->bind('jurusan',$postData["jurusan"]); // Bind parameter jurusan
        $this->db->bind('id',$postData["id"]); // Bind parameter id

        $this->db->execute(); // Eksekusi query ke database

        return $this->db->rowCount(); // Mengembalikan jumlah baris yang terpengaruh (1 jika sukses, 0 jika gagal)
    }

    // Method untuk mencari data mahasiswa berdasarkan nama/keyword
    public function cariDataMahasiswa(){
        $keyword = $_POST["keyword"]; // Ambil nilai keyword dari data POST
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword"; // Menyiapkan string query SELECT dengan klausa LIKE

        $this->db->query($query); // Siapkan query ke objek database
        $this->db->bind('keyword', "%$keyword%"); // Bind parameter keyword dengan wildcard persen (%)

        return $this->db->resultSet(); // Eksekusi query dan kembalikan seluruh hasil pencarian dalam array asosiatif
    }
}