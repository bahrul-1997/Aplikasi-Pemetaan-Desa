<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemetaan Desa</h1>
        <a href="<?= base_url('desa/tambah') ?>" class="btn btn-sm btn-primary btn-icon-split">
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
                                <th>Total Penduduk</th>
                                <th>Warga Miskin</th>
                                <th>Warga Menengah</th>
                                <th>Warga Kaya</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($desa->result_object() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->dusun_nama ?></td>
                                    <td><?= $data->total ?></td>
                                    <td><?=round($data->warkin * 100 / $data->total)?>%</td>
                                    <td><?=round($data->warme * 100 / $data->total)?>%</td>
                                    <td><?=round($data->warka * 100 / $data->total)?>%</td>
                                    <td><?= $data->latitude ?></td>
                                    <td><?= $data->longitude ?></td>
                                    
                                    <td>
                                        <a href="<?= base_url('desa/edit_desa/' . $data->pemetaan_id) ?>" class="btn btn-circle btn-success btn-sm "><i class="fas fa-pen"></i></a>
                                        <a href="<?= base_url('desa/hapus/' . $data->pemetaan_id) ?>" class="btn btn-circle btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></a>
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
