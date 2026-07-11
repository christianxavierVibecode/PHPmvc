const tampilModalUbah = document.querySelectorAll(".tampilModalUbah");
const tampilModalTambah = document.querySelector(".tampilModalTambah");
const formModal = document.querySelector("#formModal .modal-body form");
const formModalLabel = document.querySelector("#formModalLabel");
const submitBtn = document.querySelector(".modal-footer button[type='submit']");
const id = document.querySelector("#id");
const Inputnama = document.querySelector("#nama");
const Inputnrp = document.querySelector("#nrp");
const Inputemail = document.querySelector("#email");
const Inputjurusan = document.querySelector("#jurusan");

tampilModalTambah.addEventListener("click", function () {
  formModalLabel.textContent = "Tambah Data Mahasiswa";
  submitBtn.textContent = "Tambah Data";
  formModal.setAttribute(
    "action",
    "http://localhost/phpmvc/public/mahasiswa/tambah"
  );
  formModal.reset();
});

tampilModalUbah.forEach((btnUbah) => {
  btnUbah.addEventListener("click", async function () {
    formModalLabel.textContent = "Ubah Data Mahasiswa";
    submitBtn.textContent = "Ubah Data";
    formModal.setAttribute(
      "action",
      "http://localhost/phpmvc/public/mahasiswa/ubah"
    );

    const dataId = this.dataset.id;
    const result = await getData(dataId);

    id.value = result.id;
    Inputnama.value = result.nama;
    Inputnrp.value = result.nrp;
    Inputemail.value = result.email;
    Inputjurusan.value = result.jurusan;
  });
});

async function getData(idUser) {
  try {
    const res = await fetch(
      "http://localhost/phpmvc/public/mahasiswa/getubah",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ idUser: idUser }),
      }
    );

    if (!res.ok) {
      throw new Error(`HTTP error! status: ${res.status}`);
    }

    const data = await res.json();
    return data;
  } catch (err) {
    console.log(err);
  }
}
