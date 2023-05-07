<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url("guru"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("guru/pembelajaran"); ?>">Mata Pelajaran </a></div>
                <div class="breadcrumb-item">Tes</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-body">
                            <?= form_open('guru/updateTesRespon') ?>
                            <input type="hidden" class="form-control" name="id_tes" value="<?= $updateTes['id_tes'] ?>">
                            <div class="form-group">
                                <label for="jenis_tes">Jenis Tes</label>
                                <select name="jenis_tes" class="form-control">
                                    <option value="<?= $updateTes['jenis_tes'] ?>"><?= $updateTes['jenis_tes'] ?></option>
                                    <option value="Pretest">Pretest</option>
                                    <option value="Posttest">Posttest</option>
                                </select>
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