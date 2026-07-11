// Mengambil semua elemen DOM yang diperlukan untuk manipulasi modal data mahasiswa
const tampilModalUbah = document.querySelectorAll(".tampilModalUbah"); // Tombol-tombol untuk memicu modal ubah data
const tampilModalTambah = document.querySelector(".tampilModalTambah"); // Tombol untuk memicu modal tambah data
const formModal = document.querySelector("#formModal .modal-body form"); // Form element di dalam body modal
const formModalLabel = document.querySelector("#formModalLabel"); // Label judul di header modal
const submitBtn = document.querySelector(".modal-footer button[type='submit']"); // Tombol submit modal
const id = document.querySelector("#id"); // Input hidden ID mahasiswa
const Inputnama = document.querySelector("#nama"); // Input text nama mahasiswa
const Inputnrp = document.querySelector("#nrp"); // Input text NRP mahasiswa
const Inputemail = document.querySelector("#email"); // Input text email mahasiswa
const Inputjurusan = document.querySelector("#jurusan"); // Select option jurusan mahasiswa

// Event listener saat tombol tambah diklik untuk menyiapkan form tambah data
tampilModalTambah.addEventListener("click", function () {
  formModalLabel.textContent = "Tambah Data Mahasiswa"; // Ubah judul modal menjadi tambah data
  submitBtn.textContent = "Tambah Data"; // Ubah teks tombol submit
  formModal.setAttribute(
    "action",
    "http://localhost/phpmvc/public/mahasiswa/tambah"
  ); // Atur action form ke route tambah data
  formModal.reset(); // Reset form dari inputan sebelumnya
});

// Event listener saat salah satu tombol ubah diklik untuk menyiapkan form dan fetch data lama via AJAX
tampilModalUbah.forEach((btnUbah) => {
  btnUbah.addEventListener("click", async function () {
    formModalLabel.textContent = "Ubah Data Mahasiswa"; // Ubah judul modal menjadi ubah data
    submitBtn.textContent = "Ubah Data"; // Ubah teks tombol submit
    formModal.setAttribute(
      "action",
      "http://localhost/phpmvc/public/mahasiswa/ubah"
    ); // Atur action form ke route ubah data

    const dataId = this.dataset.id; // Ambil ID mahasiswa dari attribute data-id tombol
    const result = await getData(dataId); // Fetch data mahasiswa dari server berdasarkan ID

    // Mengisi kolom input form modal dengan data yang diperoleh dari server
    id.value = result.id; // Set value input hidden ID
    Inputnama.value = result.nama; // Set value input nama
    Inputnrp.value = result.nrp; // Set value input NRP
    Inputemail.value = result.email; // Set value input email
    Inputjurusan.value = result.jurusan; // Set value input select jurusan
  });
});

// Fungsi async untuk melakukan fetch request data mahasiswa ke controller getUbah berdasarkan ID
async function getData(idUser) {
  try {
    const res = await fetch(
      "http://localhost/phpmvc/public/mahasiswa/getubah",
      {
        method: "POST", // Menggunakan method POST
        headers: {
          "Content-Type": "application/json", // Set header konten berupa JSON
        },
        body: JSON.stringify({ idUser: idUser }), // Kirim payload ID mahasiswa ter-encode JSON
      }
    );

    if (!res.ok) { // Jika status response tidak sukses (bukan 200-299)
      throw new Error(`HTTP error! status: ${res.status}`); // Lempar error
    }

    const data = await res.json(); // Decode JSON response menjadi objek
    return data; // Kembalikan objek data mahasiswa
  } catch (err) {
    console.log(err); // Log error ke console browser jika terjadi kegagalan fetch
  }
}
