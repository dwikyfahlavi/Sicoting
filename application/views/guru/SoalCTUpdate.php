<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Uptade Latihan</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('guru/updateSubLatihanRespon') ?>
                            <div class="form-group">
                        <label for="soal">
                            <h6>Sub Soal Latihan - <?= $subMateri['sub_materi'] ?></h6>
                        </label>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Soal</label>
                      <div class="col-sm-12 col-md-7">
                      <select required="required" name="jenis_sub_soal" class="form-control">
                                <option value="<?= $latihan['jenis_sub_soal'];?>"  selected><?= $latihan['jenis_sub_soal'];?></option>
                                <option value="Dekomposisi">Dekomposisi</option>
                                <option value="Abstraksi">Abstraksi</option>
                                <option value="Pengenalan Pola">Pengenalan Pola</option>
                                <option value="Algoritma">Algoritma</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">pertanyaan</label>
                      <div class="col-sm-12 col-md-7">
                      <textarea class="form-control" id="pertanyaan" name="pertanyaan" value="<?= $latihan['pertanyaan'];?>" style="min-height:100wpx;height:100%"><?= $latihan['pertanyaan'];?></textarea>
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
                      <textarea name="opsi_a" value="<?= $latihan['opsi_a'];?>" class="form-control summernote-simple"><?= $latihan['opsi_a'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi B</label>
                      <div class="col-sm-12 col-md-7">
                      <textarea name="opsi_b" value="<?= $latihan['opsi_b'];?>" class="form-control summernote-simple"><?= $latihan['opsi_b'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi C</label>
                      <div class="col-sm-12 col-md-7">
                      <textarea name="opsi_c" value="<?= $latihan['opsi_c'];?>" class="form-control summernote-simple"><?= $latihan['opsi_c'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi D</label>
                      <div class="col-sm-12 col-md-7">
                      <textarea name="opsi_d" value="<?= $latihan['opsi_d'];?>" class="form-control summernote-simple"><?= $latihan['opsi_d'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opsi E</label>
                      <div class="col-sm-12 col-md-7">
                      <textarea name="opsi_e" value="<?= $latihan['opsi_e'];?>" class="form-control summernote-simple"><?= $latihan['opsi_e'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jawaban Benar</label>
                      <div class="col-sm-12 col-md-7">
                      <select required="required" name="jawaban_benar" class="form-control">
                                <option value="<?= $latihan['jawaban_benar'];?>"  selected><?= $latihan['jawaban_benar'];?></option>
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
                                <option value="<?= $latihan['alasan'];?>"  selected><?= $latihan['alasan'];?></option>
                                <option value="1">Ada Alasan</option>
                                <option value="0">Tidak Ada Alasan</option>
                        </select>
                      </div>
                    </div>
                            <input type="hidden" class="form-control" name="id_sub_latihan" id="id_sub_latihan" value="<?php echo $latihan['id_sub_latihan']?>">
                            <input type="hidden" class="form-control" name="id_latihan" id="id_latihan" value="<?php echo $latihan['id_latihan']?>">
                            <input type="hidden" class="form-control" name="id_submateri" id="id_submateri" value="<?php echo $subMateri['id_submateri']?>">
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