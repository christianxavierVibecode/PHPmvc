<?php

class App {
    protected $controller = "home"; // Default controller jika URL tidak menyebutkan controller
    protected $method = "index";    // Default method yang dipanggil jika tidak ada di URL
    protected $params = [];         // Array parameter tambahan dari URL setelah method

    // Constructor: otomatis mem-parsing URL dan mendispatch ke controller + method yang sesuai
    public function __construct(){
        $url = $this->parseURL(); // Pecah URL menjadi segmen: [controller, method, ...params]
        
        // controller
        if(file_exists("../app/controllers/" . $url[0] . ".php")){ // Cek apakah file controller ada
            $this->controller = $url[0]; // Set controller sesuai segmen pertama URL
            unset($url[0]); // Hapus elemen controller dari array agar tidak masuk ke params
        };

        require_once "../app/controllers/" . $this->controller . ".php"; // Muat file controller
        $this->controller = new $this->controller; // Instansiasi objek controller

        // method
        if(isset($url[1])){ // Cek apakah ada segmen kedua URL (nama method)
            if(method_exists($this->controller, $url[1])){ // Validasi method ada di controller
                $this->method = $url[1]; // Set method sesuai segmen kedua URL
                unset($url[1]); // Hapus elemen method dari array agar tidak masuk ke params
            };
        }

        // params
        if(!empty($url)){ // Jika masih ada sisa segmen URL setelah controller & method
            $this->params = array_values($url); // Re-index array dan simpan sebagai params
        }

        // Jalankan Controller dan method + kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params); // Panggil method controller dengan params sebagai argumen
    }

    // Method untuk mem-parsing URL dari query string menjadi array segmen
    public function parseURL(){
        if(isset($_GET['url'])) { // Cek apakah parameter 'url' ada di query string
            $url = rtrim($_GET['url'], "/"); // Hapus trailing slash di akhir URL
            $url = filter_var($url, FILTER_SANITIZE_URL); // Sanitasi URL untuk keamanan
            $url = explode("/", $url); // Pecah URL berdasarkan "/" menjadi array segmen
            return $url; // Kembalikan array segmen URL
        } else {
            return [""]; // Kembalikan array kosong jika tidak ada URL (gunakan default)
        }
    }
}