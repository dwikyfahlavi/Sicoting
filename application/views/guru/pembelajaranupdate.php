<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Materi</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('guru/updatePembelajaranRespon') ?>
                            <input type="hidden" class="form-control" name="id_materi" value="<?= $updateMateri['id_materi'] ?>">
                            <div class="form-group">
                                <label>Materi</label>
                                <input type="text" class="form-control" name="materi" value="<?= $updateMateri['materi'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Capaian Pembelajaran</label>
                                <input type="text" class="form-control" name="cp_pembelajaran" value="<?= $updateMateri['cp_pembelajaran'] ?>">
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