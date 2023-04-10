<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Uptade Latihan</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('guru/updateLatihanRespon') ?>
                            <input type="hidden" class="form-control" name="id_latihan" value="<?= $latihan['id_latihan'] ?>">
                            <input type="hidden" class="form-control" name="id_sub_materi" value="<?= $latihan['id_sub_materi'] ?>">
                            <div class="form-group">
                                <label>Soal</label>
                                <textarea class="form-control" id="soal" name="soal" value="<?= $latihan['soal'] ?>" style="min-height:100wpx;height:100%"><?= $latihan['soal'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>File Soal</label>
                                <input type="file" class="form-control" name="file_latihan" id="file_latihan">
                            </div>
                            <div class="input-group mb-2">
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