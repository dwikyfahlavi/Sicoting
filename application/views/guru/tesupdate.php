<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Tes</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('guru/updateTesRespon') ?>
                            <input type="hidden" class="form-control" name="id_tes" value="<?= $updateTes['id_tes'] ?>">
                            <div class="form-group">
                                <label>Nama Tes</label>
                                <input type="text" class="form-control" name="nama_tes" value="<?= $updateTes['nama_tes'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Tes</label>
                                <input type="text" class="form-control" name="jenis_tes" value="<?= $updateTes['jenis_tes'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Url</label>
                                <input type="text" class="form-control" name="url" value="<?= $updateTes['url'] ?>">
                            </div>
                            <div class="input-group mb-2">
                                <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?= $updateMateri['id_materi'] ?>">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>