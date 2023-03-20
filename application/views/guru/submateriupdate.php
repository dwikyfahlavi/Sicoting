<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Sub Materi</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('guru/updateSubMateriRespon') ?>
                            <input type="hidden" class="form-control" name="id_submateri" value="<?= $updateSubMateri['id_submateri'] ?>">
                            <div class="form-group">
                                <label>Sub Materi</label>
                                <input type="text" class="form-control" name="sub_materi" value="<?= $updateSubMateri['sub_materi'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Kompetensi Dasar</label><br>
                                <textarea name="kompetensidasar" id="kompetensidasar" style="width: 100%" value="<?= $updateSubMateri['kompetensidasar'] ?>"><?= $updateSubMateri['kompetensidasar'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Indikator Pencapaian Kompetensi</label><br>
                                <textarea name="ipk" id="ipk" style="width: 100%" value="<?= $updateSubMateri['ipk'] ?>"><?= $updateSubMateri['ipk'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tujuan Pembelajaran</label><br>
                                <textarea name="tujuan" id="tujuan" style="width: 100%" value="<?= $updateSubMateri['tujuan'] ?>"><?= $updateSubMateri['tujuan'] ?></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?= $materi['id_materi'] ?>">
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