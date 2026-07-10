<?php

class User_model {
    private $nama = "Christian"; // Data nama user yang di-hardcode (belum dari database)

    // Method untuk mengambil nama user, mengembalikan string nama
    public function getUser(){
        return $this->nama; // Kembalikan nilai properti $nama
    }
}