<?= $maps['js']; ?>
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>

    <div class="row">

        <div class="col-lg-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Maps</h6>
                </div>
                <div class="card-body">
                    <?= $maps['html']; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= base_url('desa/simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="">Nama Dusun</label>
                            <div class="form-group input-group">
                                <input type="hidden" name="dusun_id" id="dusun_id">
                                <input type="text" name="dusun" id="dusun" class="form-control" placeholder="Cari Nama Dusun" readonly required>
                                <span>
                                    <button type="button" class="btn btn-primary btn-flat toggle" data-toggle="modal" data-target="#modal_desa">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="perempuan">Total</label>
                                    <input type="number" readonly name="total" id="total" value="" class="form-control" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="warkin"> Warga Miskin</label>
                                    <div class="form-group input-group">
                                        <input type="number" name="warkin" class="form-control">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="warme"> Warga Menengah</label>
                                    <div class="form-group input-group">
                                        <input type="number" name="warme" class="form-control">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="warka">Warga Kaya</label>
                                    <div class="form-group input-group">
                                        <input type="number" name="warka" class="form-control">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" readonly name="latitude" id="latitude" class="form-control" class="form-control" placeholder="Masukan Latitude...">
                        </div>

                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" readonly name="longitude" id="longtude" class="form-control" class="form-control" placeholder="Masukan Longtude...">
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="save"><i class="fas fa-save"> Simpan</i></button>
                            <button class="btn btn-danger" name="cancel"><i class="fas fa-times"> Cancel</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_desa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Desa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">Nama Dusun</th>
                            <th scope="col">Jumlah Laki-laki</th>
                            <th scope="col">Jumlah Perempuan</th>
                            <th scope="col">Total Penduduk</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_desa as $i => $data) { ?>
                            <tr>
                                <td><?= $data->nama_dusun ?></td>
                                <td><?= $data->jml_laki ?></td>
                                <td><?= $data->jml_perempuan ?></td>
                                <td><?= $data->total ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" name="in_add" id="modal" 
                                    data-id="<?= $data->dusun_id; ?>"
                                     data-nama_dusun="<?= $data->nama_dusun; ?>"
                                     data-jml_laki="<?= $data->jml_laki; ?>"
                                     data-jml_perempuan="<?= $data->jml_perempuan; ?>"
                                     data-total="<?= $data->total; ?>">
                                        <i class="fa fa-check"> Pilih</i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/sbadmin/vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#modal', function() {
            var desa_id = $(this).data('id');
            var nama_dusun = $(this).data('nama_dusun');
            var jml_laki = $(this).data('jml_laki');
            var jml_perempuan = $(this).data('jml_perempuan');
            var total = $(this).data('total');

            $('#dusun_id').val(desa_id);
            $('#dusun').val(nama_dusun);
            $('#laki').val(jml_laki);
            $('#perempuan').val(jml_perempuan);
            $('#total').val(total);
            $('#modal_desa').modal('hide');
        });
    });
</script>