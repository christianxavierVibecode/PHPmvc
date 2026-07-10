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
}