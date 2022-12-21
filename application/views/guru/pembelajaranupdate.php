<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Pembelajaran</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('guru/updatePembelajaranRespon') ?>
                            <input type="hidden" class="form-control" name="id_kd" value="<?= $updatePembelajaran['id_kd'] ?>">
                            <div class="form-group">
                                <label>No. KD</label>
                                <input type="text" class="form-control" name="kd" value="<?= $updatePembelajaran['kd'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Kompetensi Dasar</label>
                                <input type="text" class="form-control" name="kompetensidasar" value="<?= $updatePembelajaran['kompetensidasar'] ?>">
                            </div>
                            <?php foreach ($updatePembelajaran1 as $up) : ?>
                                <input type="hidden" class="form-control" name="id_ip[]" value="<?= $up['id_ip'] ?>">
                                <div class="form-group">
                                    <label>No. IP</label>
                                    <input type="text" class="form-control" name="ip[]" value="<?= $up['ip'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Indikator Pencapaian</label>
                                    <input type="text" class="form-control" name="indikatorpencapaian[]" value="<?= $up['indikatorpencapaian'] ?>">
                                </div>
                            <?php endforeach; ?>
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