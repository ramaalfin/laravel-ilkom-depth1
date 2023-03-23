import Swal from "sweetalert2";

let semuaTombolHapus = document.querySelectorAll('.btn-hapus');
semuaTombolHapus.forEach(function (item) {
    item.addEventListener('click', konfirmasi);
})

// todo Buat pesan error untuk setiap tabel
function konfirmasi(e) {
    let tombol = e.currentTarget;
    let judulAlert;
    let textAlert;

    switch (tombol.getAttribute('data-table')) {
        case 'jurusan':
            judulAlert = 'Hapus Jurusan ' + tombol.getAttribute('data-name') + ' ?';
            textAlert = 'Semua data <b>Dosen</b>, <b>Mahasiswa</b> dan <b>Mata Kuliah</b> untuk jurusan ini akan ikut terhapus';
            break;
        case 'dosen':
            judulAlert = 'Hapus Dosen ' + tombol.getAttribute('data-name') + ' ?';
            textAlert = 'Semua data <b>Mata Kuliah</b> untuk dosen ini akan ikut terhapus';
            break;
        case 'mahasiswa':
            judulAlert = 'Hapus Mahasiswa ' + tombol.getAttribute('data-name') + ' ?';
            textAlert = 'Data <b>Mahasiswa</b> ini akan terhapus';
            break;
        case 'matakuliah':
            judulAlert = 'Hapus Mata Kuliah ' + tombol.getAttribute('data-name') + ' ?';
            textAlert = 'Data <b>Mata Kuliah</b> ini akan terhapus';
            break;
        default:
            judulAlert = 'Apakah Anda yakin ?';
            textAlert = 'Hapus data <b>' + tombol.getAttribute('data-name') + '</b>';
            break;
    }

    e.preventDefault();
    Swal.fire({
        title: judulAlert,
        html: textAlert,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#6c757d',
        confirmButtonColor: '#dc3545',
        reserveButtons: true
    })
        .then((result) => {
            if (result.value) {
                tombol.parentElement.submit();
            }
        })
}
