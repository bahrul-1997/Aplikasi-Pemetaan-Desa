<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Desa</h1>
        <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Tambah Data</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </div>
    <div class="col-lg-12 mb-4" id="container">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info') ?>"></div>
        <?php if ($this->session->flashdata('info')) : ?>
        <?php endif; ?>
        <!-- Illustrations -->
        <div class="card border-bottom-primary shadow mb-4 bounce animated">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Dusun</th>
                                <th>Jumlah Laki-Laki</th>
                                <th>Jumlah Perempuan</th>
                                <th>Total Penduduk</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_desa as $key => $data) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->nama_dusun ?></td>
                                    <td><?= $data->jml_laki ?></td>
                                    <td><?= $data->jml_perempuan ?></td>
                                    <td><?= $data->total ?></td>
                                    <td><?php if ($data->deskripsi == '') : ?>
                                            <i> (Tidak diisi) </i>
                                        <?php else : ?>
                                            <?= $data->keterangan ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#modaledit<?php echo $data->desa_id ?>" class="btn btn-circle btn-success btn-sm"><i class="fas fa-pen"></i></button>

                                        <a href="<?= base_url('data_desa/hapus/' . $data->desa_id) ?>" class="btn btn-circle btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="modaltambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white font-weight-bold">Tambah Data Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('data_desa/simpan') ?>" name="tambah_desa" method="POST" onsubmit="return form_desa()">
                <div class="modal-body">
                    <div class="form-group"><label>Nama Dusun</label>
                        <select name="dusun" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <?php foreach ($dusun as $k) : ?>
                                <option value="<?= $k->dusun_id ?>"><?= $k->nama_dusun ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jml_laki">Jumalah Laki-Laki</label>
                        <input type="number"  name="jml_laki"  class="form-control" placeholder="Masukan Jumlah Laki-laki">
                    </div>

                    <div class="form-group">
                        <label for="jml_perempuan">Jumalah Perempuan</label>
                        <input type="number" name="jml_perempuan"  class="form-control" placeholder="Masukan Jumlah Perempuan">
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea type="text" name="ket" id="ket" class="form-control" placeholder="Masukan  Deskripsi"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup <i class="fas fa-times"></i></button>
                    <button type="submit" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal-edit -->
<?php
foreach ($data_desa as $i) {
    $desa_id = $i->desa_id;
    $jml_laki = $i->jml_laki;
    $nama_dusun = $i->nama_dusun;
    $jml_perempuan = $i->jml_perempuan;
    $deskripsi = $i->deskripsi;
?>
    <div class="modal fade" id="modaledit<?php echo $desa_id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Edit Data Penduduk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('data_desa/edit') ?>" name="edit_desa" method="POST" onsubmit="return form_edit_desa()">
                    <?php echo form_hidden('id', $i->desa_id); ?>
                    <div class="modal-body">

                        <div class="form-group"><label>Nama Dusun</label>
                            <select name="dusun" class="form-control chosen">
                                <option value="">--Pilih--</option>
                                <option value="<?= $k->dusun_id ?>" selected><?=$nama_dusun?></option>
                                <?php foreach ($dusun as $k) : ?>
                                    <option value="<?= $k->dusun_id ?>"><?= $k->nama_dusun ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Laki-Laki</label>
                            <input type="number" name="jml_laki"  class="form-control" value="<?= $jml_laki ?>" >
                        </div>

                        <div class="form-group">
                            <label>Jumlah Perempuan</label>
                            <input type="number" name="jml_perempuan"   class="form-control" value="<?= $jml_perempuan ?>" >
                        </div>

                        <div class="form-group">
                            <label for="ket">Deskripsi</label>
                            <input type="text" name="ket" value="<?php echo $deskripsi; ?>" class="form-control" placeholder="masukan Keterangan...">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup <i class="fas fa-times"></i></button>
                        <button type="submit" class="btn btn-success">Update <i class="fas fa-pen"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

