<?php

// Controller About: menangani halaman tentang/profil dengan dua method berbeda
class About extends Controller{

    // Method untuk menampilkan halaman statis 'page' pada section about
    public function page(){
        $data["judul"] = "Page"; // Set judul halaman
        $this->view("templates/header", $data); // Render header dengan judul
        $this->view("about/page");              // Render konten halaman page (tanpa data dinamis)
        $this->view("templates/footer");        // Render footer
    }

    // Method untuk menampilkan profil dengan parameter URL opsional (nama, pekerjaan, role)
    public function index($nama = "Xavier", $pekerjaan = "Programmer", $role = "Junior"){
        $data["nama"]     = $nama;       // Set nama dari parameter URL, default: "Xavier"
        $data["pekerjaan"] = $pekerjaan; // Set pekerjaan dari parameter URL, default: "Programmer"
        $data["role"]     = $role;       // Set role dari parameter URL, default: "Junior"
        $data["judul"]    = "Utama";     // Set judul halaman
        $this->view("templates/header", $data); // Render header dengan data judul
        $this->view("about/index", $data);      // Render konten profil dengan semua data
        $this->view("templates/footer");        // Render footer
    }
}