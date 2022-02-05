function form_desa() {
    var dusun = document.forms["tambah_desa"]["dusun"].value;
    var laki = document.forms["tambah_desa"]["jml_laki"].value;
    var perempuan = document.forms["tambah_desa"]["jml_perempuan"].value;

    if (dusun == "") {
        validasi('Nama Dusun wajib di Pilih!', 'warning');
        return false;
    }else if(laki == ""){
        validasi('Jumlah Penduduk Laki-Laki Wajib Di Isi!', 'warning')
        return false;
    }else if(perempuan == ""){
        validasi('Jumlah Penduduk Perempuan Wajib!', 'warning')
        return false;
    }

}

function form_edit_desa() {
    var dusun = document.forms["edit_desa"]["dusun"].value;
    var laki = document.forms["edit_desa"]["jml_laki"].value;
    var perempuan = document.forms["edit_desa"]["jml_perempuan"].value;

    if (dusun == "") {
        validasi('Nama Dusun wajib di Pilih!', 'warning');
        return false;
    }else if (laki == ""){
        validasi('Jumlah Penduduk Laki-Laki wajib di isi!', 'warning');
        return false;
    }
    else if (perempuan == ""){
        validasi('Jumlah Penduduk Perempuan wajib di isi!', 'warning');
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