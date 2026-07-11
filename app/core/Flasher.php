<?php

class Flasher {
    // Method static untuk menyimpan data flash message ke dalam session
    public static function setFlash($pesan, $aksi, $tipe){
        $_SESSION["flash"] = [ // Menyimpan data pesan, aksi, dan tipe alert ke array session
            "pesan" => $pesan,
            "aksi" => $aksi,
            "tipe" => $tipe
        ];
    }

    // Method static untuk menampilkan flash message dan menghapusnya dari session
    public static function flash(){
        if (isset($_SESSION["flash"])) { // Memeriksa apakah data flash message ada di session
            echo '
            <div class="alert alert-' . $_SESSION["flash"]["tipe"] . ' alert-dismissible fade show" role="alert">
                <strong> Data Mahasiswa ' . $_SESSION["flash"]["pesan"] . '</strong> ' . $_SESSION["flash"]["aksi"] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            '; // Output tag HTML Bootstrap alert dengan tipe, pesan, dan aksi terkait
            
            unset($_SESSION["flash"]); // Menghapus flash message dari session setelah ditampilkan agar tidak muncul berulang
        }
    }
}