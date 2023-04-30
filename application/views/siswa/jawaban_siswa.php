<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url("siswa"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("siswa/nilai"); ?>">Nilai</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("siswa/nilai_detail/" . $breadcrump['id_submateri']); ?>">Detail</a></div>
                <div class="breadcrumb-item">Jawaban</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4>Latihan - <?= $subMateri->sub_materi; ?><br></h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Jenis Sub Soal</th>
                                        <th>Soal</th>
                                        <th>Jawaban Benar</th>
                                        <th>Jawaban Siswa</th>
                                        <th>Alasan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($latihan as $m) : ?>
                                        <tr>
                                            <td style="width:10%"><?= $i + 1; ?></td>
                                            <td style="width:10%"><?= $m['jenis_sub_soal']; ?></td>
                                            <td style="width:30%"><?= $m['pertanyaan']; ?></td>
                                            <td style="width:10%"><?= $m['jawaban_benar']; ?></td>
                                            <td style="width:10%"><?= $jwbn1[$i]; ?></td>
                                            <td style="width:30%"><?= $alsn1[$i]; ?></td>
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
                <h5 class="modal-title">Tambah Nilai Siswa - <?= $akun->nama; ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('guru/tambahNilai') ?>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body" id="form1">

                        <div class="form-group">
                            <label for="soal">
                                <h6>Nilai Dekomposisi</h6>
                            </label>
                            <div class="form-group row mb-4">
                                <div class="col-sm-12 col-md-12">
                                    <input type="number" value="0" class="form-control" name="nilai_dekomposisi" id="nilai_dekomposisi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="soal">
                                    <h6>Nilai Abstraksi</h6>
                                </label>
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="number" value="0" class="form-control" name="nilai_abstraksi" id="nilai_dekomposisi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="soal">
                                        <h6>Nilai Pengenalan Pola</h6>
                                    </label>
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-12 col-md-12">
                                            <input type="number" value="0" class="form-control" name="nilai_pp" id="nilai_dekomposisi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="soal">
                                            <h6>Nilai Berpikir Algoritma</h6>
                                        </label>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-12">
                                                <input type="number" value="0" class="form-control" name="nilai_ba" id="nilai_dekomposisi">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="soal">
                                                <h6>Nilai Akhir</h6>
                                            </label>
                                            <div class="form-group row mb-4">
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="number" value="0" class="form-control" name="nilai_akhir" id="nilai_dekomposisi">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?php echo $akun->id_user ?>">
                                            <input type="hidden" class="form-control" name="id_latihan" id="id_latihan" value="<?php echo $latihan1['id_latihan']; ?>">
                                            <input type="hidden" class="form-control" name="id_submateri" id="id_submateri" value="<?php echo $subMateri->id_submateri ?>">
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
            </div>
        </div>
    </div>
</div>