<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data dusun</h1>
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
                    <table class="table text-center"  id="dataTable" width="100%" cellspacing="0" >
                        <thead class="bg-primary text-white">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama dusun</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    $no = 1;
                    foreach ($dusun->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data->nama_dusun ?></td>
                            <td><?php if($data->keterangan == ''): ?>
                                    <i> (Tidak diisi) </i>
                                    <?php else: ?>
                                    <?= $data->keterangan ?>
                                    <?php endif; ?>
							</td>
                            <td>
                                <button data-toggle="modal" data-target="#modaledit<?php echo $data->dusun_id ?>" class="btn btn-circle btn-success btn-sm"><i class="fas fa-pen"></i></button>

                                <a href="<?= base_url('dusun/hapus/' . $data->dusun_id) ?>" class="btn btn-circle btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></a>
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

<!-- /.modal-tambah -->
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white font-weight-bold">Tambah Data dusun</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dusun/simpan') ?>" name="tambah_dusun" method="POST" onsubmit="return form_dusun()">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama dusun</label>
                        <input type="text" name="dusun" class="form-control" placeholder="Masukan Nama dusun...">
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" class="form-control" placeholder="Masukan Nama Keterangan..."></textarea>
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
foreach ($dusun->result_object() as $i) {
    $dusun_id = $i->dusun_id;
    $nama_dusun = $i->nama_dusun;
    $keterangan = $i->keterangan;
?>
    <div class="modal fade" id="modaledit<?php echo $dusun_id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Edit Data dusun</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dusun/edit') ?>" name="edit_dusun" method="POST" onsubmit="return form_edit_dusun()">
                    <?php echo form_hidden('id', $i->dusun_id); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="dusun" value="<?php echo $nama_dusun; ?>" class="form-control" placeholder="masukan nama dusun...">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" name="ket" value="<?php echo $keterangan; ?>" class="form-control" placeholder="masukan Keterangan...">
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