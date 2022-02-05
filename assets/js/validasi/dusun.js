function form_dusun() {
    var dusun = document.forms["tambah_dusun"]["dusun"].value;

    if (dusun == "") {
        validasi('Nama dusun wajib di isi!', 'warning');
        return false;
    }

}

function form_edit_dusun() {
    var dusun = document.forms["edit_dusun"]["dusun"].value;

    if (dusun == "") {
        validasi('Nama dusun wajib di isi!', 'warning');
        return false;
    }

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}