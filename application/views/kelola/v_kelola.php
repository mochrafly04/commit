<?php if($this->session->flashdata('flash')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
Data
<strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
            </div>
<div class="content">
    <div class="container-fluid">
        <?php endif; ?>
        
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('kelola/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> Tambah Data</a>
        <a href="<?= base_url('') ?>" class="btn btn-danger btn-sm"><i class="fas fa-print"></i> Print</a>

    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Dokumen</th>
                    <th>Nama Dokumen</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1;
                foreach ($tbl_coba as $c) : ?>
                    <tr>
                        <td><?= $id++ ?></td>
                        <td><img src="<?= base_url('file/' . $c->jenis_dokumen) ?>" width="50px"></td>
                        <td><?= $c->nama_dokumen ?></td>
                        <td><?= $c->keterangan ?></td>
                        <td>
                            <a href="<?= base_url('kelola/ubah/'. $c->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('kelola/hapus/'. $c->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>