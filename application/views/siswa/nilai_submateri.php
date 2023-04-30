<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url("siswa"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("siswa/nilai"); ?>">Nilai</a></div>
                <div class="breadcrumb-item">Detail</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4>Soal Latihan - <?= $submateri['materi']; ?><br></h4>
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
                                        <th>Sub Materi</th>
                                        <th>Nilai Dekomposisi</th>
                                        <th>Nilai Abstraksi</th>
                                        <th>Nilai Pengenalan Pola</th>
                                        <th>Nilai Berpikir Algoritma</th>
                                        <th>Nilai Akhir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($nilai as $m) : ?>
                                        <tr>
                                            <td style="width:10%"><?= $i; ?></td>
                                            <td style="width:20%"><?= $m['sub_materi']; ?></td>
                                            <th style="width:10%"><?= $m['nilai_dekomposisi']; ?></th>
                                            <th style="width:10%"><?= $m['nilai_abstraksi']; ?></th>
                                            <th style="width:10%"><?= $m['nilai_pp']; ?></th>
                                            <th style="width:10%"><?= $m['nilai_ba']; ?></th>
                                            <th style="width:10%"><?= $m['nilai_akhir']; ?></th>
                                            <td style="width:30%">
                                                <a href="<?php echo site_url('siswa/LihatJawabanSiswa/' . $m['id_submateri'] . '/' . $m['id_user']); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-search"></i>Lihat Jawaban</a>
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
                            <input type="hidden" class="form-control" name="id_materi" id="id_materi" value="<?php echo $subMateri['id_materi'] ?>">
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