<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Materi</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('guru/updateMateriRespon') ?>
                            <input type="hidden" class="form-control" name="id_materi" value="<?= $updateMateri['id_materi'] ?>">
                            <div class="form-group">
                                <label>Judul Pembelajaran</label>
                                <input type="text" class="form-control" name="judul" value="<?= $updateMateri['judul'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Topik Pembelajaran</label>
                                <input type="text" class="form-control" name="topik" value="<?= $updateMateri['topik'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" value="<?= $updateMateri['deskripsi'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" value="<?= $updateMateri['tujuan'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Apersepsi</label>
                                <input type=" text" class="form-control" name="apersepsi" value="<?= $updateMateri['apersepsi'] ?>">
                            </div>
                            <div class="form-group">
                                <label>File (Apersepsi)</label>
                                <input type="file" class="form-control" name="file_apersepsi">
                            </div>
                            <div class="input-group mb-2">
                                <input type="hidden" class="form-control" id="id_kd" name="id_kd" value="<?= $updatePembelajaran['id_kd'] ?>">
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