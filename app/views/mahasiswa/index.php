<div class="container mt-4">

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data["mhs"] as $mhs) : ?> <!-- Iterasi setiap baris data mahasiswa dari array hasil query -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mhs["nama"]; ?>
                        <a href="<?= BASE_URL;?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-primary text-decoration-none">Detail</a>
                    </li>
                <?php endforeach; ?> <!-- Akhir loop iterasi data mahasiswa -->
            </ul>
        </div>
    </div>

</div>