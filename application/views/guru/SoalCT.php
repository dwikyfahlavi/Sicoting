<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url("guru"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("guru/pembelajaran"); ?>">Mata Pelajaran</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("guru/submateri/" . $subMateri['id_materi']); ?>">Materi</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("guru/latihan/" . $subMateri['id_submateri']); ?>">Latihan</a></div>
                <div class="breadcrumb-item">Soal CT</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4>Soal CT - <?= $subMateri['sub_materi']; ?><br></h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <button class="btn btn-icon icon-left btn-primary" onclick="tambahSoal(2,1,'Dekomposisi')" id="tambah_soal"><i class="fas fa-plus"></i> Soal CT</button>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Jenis Sub Soal</th>
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
                                            <td style="width:20%"><?= $m['jenis_sub_soal']; ?></td>
                                            <td style="width:20%"><?= $m['pertanyaan']; ?></td>
                                            <td style="width:20%"><?= $m['file_soal']; ?></td>
                                            <td style="width:30%">
                                                <a href="<?php echo site_url('guru/editSubLatihan/' . $m['id_sub_latihan'] . '/' . $subMateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                                <a href="<?php echo site_url('guru/deleteSubSoalLatihan/' . $m['id_sub_latihan'] . '/' . $m['id_latihan']  . '/' . $subMateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
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
                <h5 class="modal-title">Tambah Sub Soal Latihan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('guru/tambahSubLatihan') ?>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body" id="form1">

                        <div class="form-group">
                            <label for="soal">
                                <h6>Soal Latihan - <?= $subMateri['sub_materi'] ?></h6>
                            </label>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Soal</label>
                                <div class="col-sm-12 col-md-7">
                                    <select required="required" name="jenis_sub_soal" class="form-control">
                                        <option value="" disabled selected>Pilih Jenis Soal</option>
                                        <option value="Dekomposisi">Dekomposisi</option>
                                        <option value="Abstraksi">Abstraksi</option>
                                        <option value="Pengenalan Pola">Pengenalan Pola</option>
                                        <option value="Algoritma">Berpikir Algoritma</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">pertanyaan</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Example : Budi Membawa seekor karung" style="min-height:100wpx;height:100%"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File Soal</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="file_soal" id="file_soal">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi A</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="opsi_a" class="form-control summernote-simple"><?= set_value('opsi_a') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi B</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="opsi_b" class="form-control summernote-simple"><?= set_value('opsi_a') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi C</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="opsi_c" class="form-control summernote-simple"><?= set_value('opsi_b') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi D</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="opsi_d" class="form-control summernote-simple"><?= set_value('opsi_d') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi E</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="opsi_e" class="form-control summernote-simple"><?= set_value('opsi_e') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jawaban Benar</label>
                                <div class="col-sm-12 col-md-7">
                                    <select required="required" name="jawaban_benar" class="form-control">
                                        <option value="" disabled selected>Pilih Kunci Jawaban</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alasan Siswa</label>
                                <div class="col-sm-12 col-md-7">
                                    <select required="required" name="alasan" class="form-control">
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="1">Ada Alasan</option>
                                        <option value="0">Tidak Ada Alasan</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="id_latihan" id="id_latihan" value="<?php echo $subLatihan['id_latihan'] ?>">
                            <input type="hidden" class="form-control" name="id_submateri" id="id_submateri" value="<?php echo $subMateri['id_submateri'] ?>">
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