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

    // Method untuk menampilkan detail data mahasiswa berdasarkan ID
    public function detail($id){
        $data['judul'] = "Daftar Mahasiswa"; // Set judul halaman
        // Cari data mahasiswa berdasarkan ID, jika tidak ada kembalikan array placeholder data tidak ditemukan
        $data['mhs'] = $this->model("Mahasiswa_model")->getMahasiswaById($id) ? $this->model("Mahasiswa_model")->getMahasiswaById($id) : [
            "id" => "Data tidak ditemukan", 
            "nama" => "Data tidak ditemukan", 
            "nrp" => "Data tidak ditemukan", 
            "email" => "Data tidak ditemukan", 
            "jurusan" => "Data tidak ditemukan"
        ];
        $this->view("templates/header", $data); // Render header dengan judul halaman
        $this->view("mahasiswa/detail", $data);  // Render detail view mahasiswa dengan data dari model
        $this->view("templates/footer");        // Render footer
    }

    // Method untuk memproses penambahan data mahasiswa baru
    public function tambah(){
        if($this->model("Mahasiswa_model")->tambahDataMahasiswa($_POST) > 0){ // Cek jika data berhasil ditambahkan ke database (> 0 baris)
            Flasher::setFlash("Berhasil", "Ditambahkan", "success"); // Set flash message berhasil
            header("Location: " . BASE_URL . "/mahasiswa"); // Redirect kembali ke halaman mahasiswa
            exit; // Hentikan eksekusi script setelah redirect
        } else {
            Flasher::setFlash("Gagal", "Ditambahkan", "danger"); // Set flash message gagal
            header("Location: " . BASE_URL . "/mahasiswa"); // Redirect kembali ke halaman mahasiswa
            exit; // Hentikan eksekusi script setelah redirect
        }
    }

    // Method untuk menghapus data mahasiswa berdasarkan ID
    public function hapus($id){
        if($this->model("Mahasiswa_model")->hapusDataMahasiswa($id) > 0){ // Cek jika data berhasil dihapus dari database (> 0 baris)
            Flasher::setFlash("Berhasil", "Dihapuskan", "success"); // Set flash message berhasil
            header("Location: " . BASE_URL . "/mahasiswa"); // Redirect kembali ke halaman mahasiswa
            exit; // Hentikan eksekusi script setelah redirect
        } else {
            Flasher::setFlash("Gagal", "Dihapuskan", "danger"); // Set flash message gagal
            header("Location: " . BASE_URL . "/mahasiswa"); // Redirect kembali ke halaman mahasiswa
            exit; // Hentikan eksekusi script setelah redirect
        }
    }

    // Method untuk mengambil data mahasiswa secara asynchronous untuk form ubah (AJAX request)
    public function getUbah() {
        // Baca data JSON dari body request
        $input = file_get_contents('php://input'); // Ambil raw request payload
        $postData = json_decode($input, true); // Decode JSON menjadi array PHP
    
        // Ambil idUser dari data JSON
        $id = isset($postData['idUser']) ? $postData['idUser'] : null; // Dapatkan ID dari array request
    
        // Jika id tidak ditemukan, kembalikan error
        if (!$id) {
            echo json_encode(["error" => "ID tidak ditemukan"]); // Output response error format JSON
            return; // Hentikan eksekusi method
        }
    
        // Ambil data mahasiswa berdasarkan ID
        $data = $this->model('Mahasiswa_model')->getMahasiswaById($id); // Ambil data dari database melalui model
    
        // Kembalikan data dalam format JSON
        echo json_encode($data); // Output data mahasiswa ke format JSON untuk client-side
    }

    // Method untuk memproses pembaruan data mahasiswa
    public function ubah(){
        if($this->model("Mahasiswa_model")->ubahDataMahasiswa($_POST) > 0){ // Cek jika data berhasil diubah di database (> 0 baris)
            Flasher::setFlash("Berhasil", "Diubahkan", "success"); // Set flash message berhasil
            header("Location: " . BASE_URL . "/mahasiswa"); // Redirect kembali ke halaman mahasiswa
            exit; // Hentikan eksekusi script setelah redirect
        } else {
            Flasher::setFlash("Gagal", "Diubahkan", "danger"); // Set flash message gagal
            header("Location: " . BASE_URL . "/mahasiswa"); // Redirect kembali ke halaman mahasiswa
            exit; // Hentikan eksekusi script setelah redirect
        }
    }

    // Method untuk melakukan pencarian data mahasiswa berdasarkan kata kunci
    public function cari(){
        $data['judul'] = "Daftar Mahasiswa"; // Set judul halaman
        $data['mhs'] = $this->model("Mahasiswa_model")->cariDataMahasiswa(); // Cari data mahasiswa dari DB via model
        $this->view("templates/header", $data); // Render header
        $this->view("mahasiswa/index", $data);  // Render index view mahasiswa dengan data pencarian
        $this->view("templates/footer");        // Render footer
    }
}