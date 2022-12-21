<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Media</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('guru/updateMediaRespon') ?>
                            <input type="hidden" class="form-control" name="id_media" value="<?= $updateMedia['id_media'] ?>">
                            <input type="hidden" class="form-control" name="id_materi" value="<?= $materi ?>">
                            <div class="form-group">
                                <label>File (Media)</label>
                                <input type="file" class="form-control" name="file_media">
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