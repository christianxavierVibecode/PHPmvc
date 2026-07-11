<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-4 tampilModalTambah" data-bs-toggle="modal" data-bs-target="#formModal">
                + Tanbah Data Mahasiswa
            </button>

            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data["mhs"] as $mhs) : ?> <!-- Iterasi setiap baris data mahasiswa dari array hasil query -->
                    <li class="list-group-item">
                        <?= $mhs["nama"]; ?>
                        <a href="<?= BASE_URL;?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge text-bg-danger text-decoration-none float-end mx-1" onclick='return confirm("Yakin ingin menghapus ?");'>Hapus</a>
                        <a href="<?= BASE_URL;?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge text-bg-warning text-decoration-none float-end mx-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $mhs['id']; ?>>Ubah</a>
                        <a href="<?= BASE_URL;?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-primary text-decoration-none float-end mx-1">Detail</a>
                    </li>
                <?php endforeach; ?> <!-- Akhir loop iterasi data mahasiswa -->
            </ul>
        </div>
    </div>

</div>


<!-- Hidden Modal Box -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASE_URL; ?>/mahasiswa/tambah" method="POST">
        <!-- Hidden Input -->
         <input type="hidden" name="id" id="id">

        <!-- Inputan Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
        </div>

        <!-- Inputan NRP -->
        <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="number" class="form-control" id="nrp" name="nrp" placeholder="Masukan NRP">
        </div>

        <!-- Inputan Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
        </div>
        
        <!-- Inputan Jurusan -->
        <div class="mb-3">
            <label for="jurudan" class="form-label">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan" aria-label="Default select example">
                <option selected>Silahkan Pilih Jurusan</option>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Bisnis Digital">Bisnis Digital</option>
                <option value="Manajemen Retail">Manajemen Retail</option>
            </select>
        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>