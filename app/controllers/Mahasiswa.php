<?php

// Controller Mahasiswa: menangani halaman daftar mahasiswa dari database
class Mahasiswa extends Controller {

    // Method default untuk menampilkan seluruh data mahasiswa dari database
    public function index(){
        $data['judul'] = "Daftar Mahasiswa"; // Set judul halaman
        $data['mhs'] = $this->model("Mahasiswa_model")->getAllMahasiswa(); // Muat model dan ambil semua data mahasiswa dari DB
        $this->view("templates/header", $data); // Render header dengan judul halaman
        $this->view("mahasiswa/index", $data);  // Render tabel/list mahasiswa dengan data dari model
        $this->view("templates/footer");        // Render footer
    }

    public function detail($id){
        $data['judul'] = "Daftar Mahasiswa"; 
        // Jika data mahasiswa dengan ID tertentu tidak ditemukan, tampilkan pesan "Data tidak ditemukan" untuk setiap field
        $data['mhs'] = $this->model("Mahasiswa_model")->getMahasiswaById($id) ? $this->model("Mahasiswa_model")->getMahasiswaById($id) : [
            "id" => "Data tidak ditemukan", 
            "nama" => "Data tidak ditemukan", 
            "nrp" => "Data tidak ditemukan", 
            "email" => "Data tidak ditemukan", 
            "jurusan" => "Data tidak ditemukan"
        ];
        $this->view("templates/header", $data); 
        $this->view("mahasiswa/detail", $data);  
        $this->view("templates/footer");        
    }

    public function tambah(){
        if($this->model("Mahasiswa_model")->tambahDataMahasiswa($_POST) > 0){
            Flasher::setFlash("Berhasil", "Ditambahkan", "success");
            header("Location: " . BASE_URL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("Gagal", "Ditambahkan", "danger");
            header("Location: " . BASE_URL . "/mahasiswa");
            exit;
        }
    }

    public function hapus($id){
        if($this->model("Mahasiswa_model")->hapusDataMahasiswa($id) > 0){
            Flasher::setFlash("Berhasil", "Dihapuskan", "success");
            header("Location: " . BASE_URL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("Gagal", "Dihapuskan", "danger");
            header("Location: " . BASE_URL . "/mahasiswa");
            exit;
        }
    }
}