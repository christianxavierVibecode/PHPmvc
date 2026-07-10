<?php

// Controller Home: menangani halaman utama aplikasi
class Home extends Controller {

    // Method default yang dipanggil saat mengakses URL root atau /home
    public function index(){
        $data["judul"] = "home"; // Set judul halaman untuk ditampilkan di title tag
        $data["nama"] = $this->model("User_model")->getUser(); // Muat User_model dan ambil nama user
        $this->view("templates/header", $data); // Render bagian header dengan data judul
        $this->view("home/index", $data);        // Render konten utama halaman home dengan data nama
        $this->view("templates/footer");         // Render bagian footer
    }
}