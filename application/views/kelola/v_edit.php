<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $tbl_coba['id']; ?>">
                        <div class="custom-file">
                            <label>Dokumen</label>
                            <input type="file" name="dokumen" class="form-control" id="dokumen" value="<?= $tbl_coba['dokumen'] ?>">
                        </div><br><br>
                        <div class="form-group">
                            <label for="jenis_dokumen">Jenis Dokumen</label>
                            <select class="form-control" id="jenis_dokumen" name="jenis_dokumen">
                                <?php foreach ($jenis_dokumen as $jd) : ?>
                                    <?php if ($jd == $tbl_coba['jenis_dokumen']) : ?>
                                        <option value="<?= $jd; ?>" selected><?= $jd; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $jd; ?>"><?= $jd; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_dokumen">Nama Dokumen</label>
                            <input type="text" name="nama_dokumen" class="form-control" id="nama_dokumen" value="<?= $tbl_coba['nama_dokumen']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama dokumen'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $tbl_coba['keterangan']; ?>">
                            <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>