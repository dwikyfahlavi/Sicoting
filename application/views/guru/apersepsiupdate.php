<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Apersepsi</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('guru/updateApersepsiRespon') ?>
                            <input type="hidden" class="form-control" name="id_apersepsi" value="<?= $updateApersepsi['id_apersepsi'] ?>">
                            <input type="hidden" class="form-control" name="id_submateri" value="<?= $submateri['id_submateri'] ?>">
                            <div class="form-group">
                                <label>Pertanyaan Apersepsi</label>
                                <input type="text" class="form-control" name="pertanyaan_apersepsi" value="<?= $updateApersepsi['pertanyaan_apersepsi'] ?>">
                            </div>
                            <div class="form-group">
                                <label>File Apersepsi</label>
                                <input type="file" class="form-control" name="file_apersepsi">
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