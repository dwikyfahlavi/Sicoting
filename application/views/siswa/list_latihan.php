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

                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Soal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($latihan as $m) : ?>
                                        <tr>
                                            <td style="width:10%"><?= $i; ?></td>
                                            <td style="width:50%"><?= $m['soal']; ?></td>
                                            <td style="width:40%">
                                                <a href="<?php echo site_url('siswa/nilai_latihan/' . $subMateri['id_submateri']. '/' . $user['id_user']); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i>Lihat Nilai</a>
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
