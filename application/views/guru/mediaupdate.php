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
                            <input type="hidden" class="form-control" name="id_submateri" value="<?= $submateri['id_submateri'] ?>">
                            <div class="form-group">
                                <!-- <label value="<?= $updateMedia['jenis_media'] ?>"></label> -->
                                <select class="form-control" id="jenis_media" name="jenis_media">
                                    <option value="">-- Jenis Media --</option>
                                    <option value="pdf">PDF</option>
                                    <option value="docs">DOCS</option>
                                    <option value="ppt">POWER POINT</option>
                                    <option value="video">VIDEO</option>
                                    <option value="audio">AUDIO</option>
                                </select>
                            </div>
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