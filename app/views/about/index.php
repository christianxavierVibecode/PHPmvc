<div class="container mt-4">
    <h1>Halo ini adalah halaman index about</h1>
    <img src="<?= BASE_URL ?>/img/profile.png" alt="" width="200" class="rounded mb-2"> <!-- Foto profil diambil dari folder public/img -->
    <p>
        Halo nama saya <?= $data["nama"] ?>, saya adalah seorang <?= $data["pekerjaan"]?>, dan role saya adalah <?= $data["role"] ?> <!-- Tampilkan nama, pekerjaan, dan role dari parameter URL atau nilai default -->
    </p>
</div>