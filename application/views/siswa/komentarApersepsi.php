<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Apersepsi</h4>
                        </div>
                        <div class="card-body">
                             <img src="<?= base_url(); ?>/assets/img/news/img08.jpg" alt="Girl in a jacket" width="500" height="300">   
                            <?= form_open('siswa/komenApersepsiRespon') ?>
                            <input type="hidden" class="form-control" name="id_apersepsi" value="<?= $apersepsi->id_apersepsi ?>" >
                            <input type="hidden" class="form-control" name="id_user" value="<?= $user['id_user']?>" >
                            <input type="hidden" class="form-control" name="id_submateri" value="<?= $id_submateri?>" >
                            <div class="form-group">
                                
                                <h4><?= $apersepsi->pertanyaan_apersepsi ?></h4>
                            </div>
                            <div class="form-group">
                                <label>Komentar Apersepsi</label>
                                <textarea class="form-control" id="komenAper" name="komenAper" placeholder="Berikan Komentarmu..." style="min-height:100wpx;height:100%"></textarea>
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