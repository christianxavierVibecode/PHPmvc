<?php
if(!session_id()) session_start();

require_once "../app/init.php"; // Memuat semua file inti: App, Controller, dan Constants

$app = new App; // Inisialisasi aplikasi, memicu routing otomatis via constructor

