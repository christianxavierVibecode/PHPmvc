<div class="container mt-4">

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>

            <?php foreach($data["mhs"] as $mhs) : ?> <!-- Iterasi setiap baris data mahasiswa dari array hasil query -->
                <ul>
                    <li><?= $mhs['nama']; ?></li>     <!-- Tampilkan nama mahasiswa -->
                    <li><?= $mhs['nrp']; ?></li>      <!-- Tampilkan NRP mahasiswa -->
                    <li><?= $mhs['email']; ?></li>    <!-- Tampilkan email mahasiswa -->
                    <li><?= $mhs['jurusan']; ?></li>  <!-- Tampilkan jurusan mahasiswa -->
                </ul>
                <?php endforeach; ?> <!-- Akhir loop iterasi data mahasiswa -->
        </div>
    </div>

</div>