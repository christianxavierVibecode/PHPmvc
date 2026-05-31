<?php

class About extends Controller{
    public function page(){
        $data["judul"] = "Page";
        $this->view("templates/header", $data);
        $this->view("about/page");
        $this->view("templates/footer");
    }

    public function index($nama = "Xavier", $pekerjaan = "Programmer", $role = "Junior"){
        $data["nama"] = $nama;
        $data["pekerjaan"] = $pekerjaan;
        $data["role"] = $role;
        $data["judul"] = "Utama";
        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }
}