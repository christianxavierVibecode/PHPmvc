<?php

class Controller {
    // Method untuk memuat dan merender file view, menerima nama view dan data opsional
    public function view($view, $data = []){
        require_once "../app/views/" . $view . ".php"; // Muat file view berdasarkan path relatif
    }

    // Method untuk memuat model dan mengembalikan instance-nya agar bisa digunakan di controller
    public function model($model){
        require_once "../app/models/" . $model . ".php"; // Muat file model berdasarkan nama kelas
        return new $model(); // Buat dan kembalikan objek model
    }
}