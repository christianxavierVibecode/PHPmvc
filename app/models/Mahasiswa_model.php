<?php

class Mahasiswa_model {
    private $table = "mahasiswa"; // Nama tabel database yang digunakan
    private $db; // Objek Database untuk koneksi dan query

    public function __construct() {
        $this->db = new Database(); // Inisialisasi objek Database saat model diinstansiasi
    }

    public function getAllMahasiswa() {
        $this->db->query("SELECT * FROM " . $this->table); // Siapkan query untuk mengambil semua data mahasiswa
        return $this->db->resultSet(); // Eksekusi query dan kembalikan hasil sebagai array asosiatif
    }

    public function getMahasiswaById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id"); // Siapkan query untuk mengambil data mahasiswa berdasarkan ID
        $this->db->bind(':id', $id); // Bind parameter ID ke query
        return $this->db->single(); // Eksekusi query dan kembalikan hasil sebagai array asosiatif
    }

    public function tambahDataMahasiswa($postData){
        $query = "INSERT INTO mahasiswa
                    VALUES
                  ('', :nama, :nrp, :email, :jurusan)";
        
        $this->db->query($query);
        $this->db->bind('nama',$postData["nama"]);
        $this->db->bind('nrp',$postData["nrp"]);
        $this->db->bind('email',$postData["email"]);
        $this->db->bind('jurusan',$postData["jurusan"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($postData){
        $query = "UPDATE mahasiswa SET 
            nama = :nama,
            nrp = :nrp,
            email = :email,
            jurusan = :jurusan
        WHERE id= :id";
        
        $this->db->query($query);
        $this->db->bind('nama',$postData["nama"]);
        $this->db->bind('nrp',$postData["nrp"]);
        $this->db->bind('email',$postData["email"]);
        $this->db->bind('jurusan',$postData["jurusan"]);
        $this->db->bind('id',$postData["id"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa(){
        $keyword = $_POST["keyword"];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}