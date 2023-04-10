<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4>Soal Latihan - <?= $subMateri['sub_materi']; ?><br></h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <button class="btn btn-icon icon-left btn-primary" onclick="tambahSoal(2,1,'Dekomposisi')" id="tambah_soal"><i class="fas fa-plus"></i> Soal Latihan</button>

                        <a href="<?php echo site_url('guru/latihan/' . $subMateri['id_submateri']); ?>" class="btn btn-primary mb-3" style="float: right;">Hasil Siswa</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Soal</th>
                                        <th>File Soal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($latihan as $m) : ?>
                                        <tr>
                                            <td style="width:10%"><?= $i; ?></td>
                                            <td style="width:30%"><?= $m['soal']; ?></td>
                                            <td style="width:20%"><?= $m['file_latihan']; ?></td>
                                            <td style="width:40%">
                                                <a href="<?php echo site_url('guru/soalCT/' . $m['id_latihan']. '/' . $subMateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i>Soal CT</a>
                                                <a href="<?php echo site_url('guru/hasilLatihan/' . $m['id_latihan']. '/' . $subMateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i>Hasil Siswa</a>
                                                <a href="<?php echo site_url('guru/editLatihan/' . $m['id_latihan']);?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i>Edit</a>
                                                <a href="<?php echo site_url('guru/deleteSoalLatihan/' . $m['id_latihan'] . '/' . $subMateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
            </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="newTesModal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Soal Latihan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('guru/tambahLatihan') ?>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body" id="form1">

                        <div class="form-group">
                            <label for="soal">
                                <h6>Soal Latihan - <?= $subMateri['sub_materi'] ?></h6>
                            </label>
                            <div class="input-group mb-2">
                                <textarea class="form-control" id="soal" name="soal" placeholder="Example : Budi Membawa seekor karung" style="min-height:100wpx;height:100%"></textarea>
                            </div>
                            <div class="form-group">
                                <label>File Soal <br></label>
                                <input type="file" class="form-control" name="file_latihan" id="file_latihan">
                            </div>
                            <input type="hidden" class="form-control" name="id_materi" id="id_materi" value="<?php echo $subMateri['id_materi']?>">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
