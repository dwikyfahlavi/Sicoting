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
                                        <th>Dekomposisi</th>
                                        <th>Abstraksi</th>
                                        <th>Pengenalan Pola</th>
                                        <th>Algoritma</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($latihan as $m) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $m['soal']; ?></td>

                                            <!-- <button class="btn btn-primary view_detail" relid="<?php echo $m['id_latihan'];  ?>"id="view_detail">Dekomposisi</button> -->
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan'] ?>,1,'Dekomposisi')" id="view_detail">Dekomposisi</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan'] ?>,2,'Abstraksi')" id="view_detail">Abstraksi</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan'] ?>,3,'Pengenalan Pola')" id="view_detail">Pengenalan Pola</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan'] ?>,4,'Algoritma')" id="view_detail">Algoritma</button></td>
                                            <td>
                                                <!-- <a href="<?php echo site_url('guru/media/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Details</a>  -->
                                                <!-- <a href="<?php echo site_url('guru/updateTes/' . $m['id_latihan'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a> -->
                                                <a href="<?php echo site_url('guru/deleteSoalLatihan/' . $m['id_latihan'] . '/' . $subMateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
                                                <a href="<?php echo site_url('guru/hasilLatihan/' . $m['id_latihan']. '/' . $subMateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i>Hasil Siswa</a>
                                                
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
                                <h6>Soal Latihan - <?= $materi['judul'] ?></h6>
                            </label>
                            <div class="input-group mb-2">
                                <textarea class="form-control" id="soal" name="soal" placeholder="Example : Budi Membawa seekor karung" style="min-height:100wpx;height:100%"></textarea>
                            </div>
                            <div class="form-group">
                                <label>File Soal <br></label>
                                <input type="file" class="form-control" name="file_latihan" id="file_latihan">
                            </div>
                            <div class="input-group mb-2">
                                <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?= $materi['id_materi'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="form2">
                        <label for="soal">
                            <h6>Soal Latihan - Dekomposisi</h6>
                        </label>
                        <div class="input-group mb-2">
                            <input type="hidden" class="form-control" id="jenisSoalDekom" name="jenisSoalDekom" value="1">
                        </div>
                        <div class="form-group">
                            <label>Jenis Jawaban <br></label>
                            <select class="form-control" id="jenisJawabanDecom" name="jenisJawabanDecom">
                                <option disabled selected>---Pilih Jenis---</option>
                                <option value="1">Pilihan Ganda</option>
                                <option value="2">CheckBox</option>
                                <option value="3">True or False</option>
                            </select>
                        </div>
                        <label>Soal<br></label>
                        <div class="input-group mb-2">
                            <textarea class="form-control" id="soalDecom" name="soalDecom" placeholder="Example : Budi Membawa seekor" style="min-height:100wpx;height:100%"></textarea>
                        </div>
                        <div class="form-group">
                            <label>File Media <br></label>
                            <input type="file" class="form-control" name="fileMediaDecom" id="fileMediaDecom">
                        </div>
                        <div class="form-group">
                            <label id="jawabanADecomId">Jawaban A <br></label>
                            <input type="text" class="form-control" name="jawabanADecom" id="jawabanADecom">
                        </div>
                        <div class="form-group">
                            <label id="jawabanBDecomId">Jawaban B <br></label>
                            <input type="text" class="form-control" name="jawabanBDecom" id="jawabanBDecom">
                        </div>
                        <div class="form-group">
                            <label id="jawabanCDecomId">Jawaban C <br></label>
                            <input type="text" class="form-control" name="jawabanCDecom" id="jawabanCDecom">
                        </div>
                        <div class="form-group">
                            <label id="jawabanDDecomId">Jawaban D <br></label>
                            <input type="text" class="form-control" name="jawabanDDecom" id="jawabanDDecom">
                        </div>
                        <div class="form-group">
                            <label id="jawabanEDecomId">Jawaban E <br></label>
                            <input type="text" class="form-control" name="jawabanEDecom" id="jawabanEDecom">
                        </div>
                        <div class="form-group">
                            <label id="jawabanBenarDecomId">Jawaban Benar <br></label>
                            <select class="form-control" id="jawabanBenar1Decom" name="jawabanBenar1Decom">
                                <option disabled selected>---Jawaban Benar---</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                            </select>
                            <select class="form-control" id="jawabanBenar2Decom" name="jawabanBenar2Decom">
                                <option disabled selected>---Jawaban Benar---</option>
                                <option value="true">True</option>
                                <option value="false">False</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label id="jawabanBenar3DecomId">Jawaban Benar <br></label>
                            <input type="text" class="form-control" name="jawabanBenar3Decom" id="jawabanBenar3Decom" placeholder="a,b,c">
                        </div>
                        <div class="form-group">
                            <label id="bobotJawabanDecomId">Bobot Jawaban <br></label>
                            <input type="number" class="form-control" name="bobotJawabanDecom" id="bobotJawabanDecom" placeholder="0 - 100">
                        </div>
                        <div class="input-group mb-2">
                            <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?= $materi['id_materi'] ?>">
                        </div>
                    </div>

                    <div class="card-body" id="form3">
                        <label for="soal">
                            <h6>Soal Latihan - Abstraksi</h6>
                        </label>
                        <div class="input-group mb-2">
                            <input type="hidden" class="form-control" id="jenisSoalAbstrak" name="jenisSoalAbstrak" value="2">
                        </div>
                        <div class="form-group">
                            <label>Jenis Jawaban <br></label>
                            <select class="form-control" id="jenisJawabanAbstrak" name="jenisJawabanAbstrak">
                                <option disabled selected>---Pilih Jenis---</option>
                                <option value="1">Pilihan Ganda</option>
                                <option value="2">CheckBox</option>
                                <option value="3">True or False</option>
                            </select>
                        </div>
                        <label>Soal<br></label>
                        <div class="input-group mb-2">
                            <textarea class="form-control" id="soalAbstrak" name="soalAbstrak" placeholder="Example : Budi Membawa seekor" style="min-height:100wpx;height:100%"></textarea>
                        </div>

                        <div class="form-group">
                            <label>File Media <br></label>
                            <input type="file" class="form-control" name="file_mediaAbstrak" id="file_mediaAbstrak">
                        </div>
                        <div class="form-group">
                            <label id="jawabanAAbstrakId">Jawaban A <br></label>
                            <input type="text" class="form-control" name="jawabanAAbstrak" id="jawabanAAbstrak">
                        </div>
                        <div class="form-group">
                            <label id="jawabanBAbstrakId">Jawaban B <br></label>
                            <input type="text" class="form-control" name="jawabanBAbstrak" id="jawabanBAbstrak">
                        </div>
                        <div class="form-group">
                            <label id="jawabanCAbstrakId">Jawaban C <br></label>
                            <input type="text" class="form-control" name="jawabanCAbstrak" id="jawabanCAbstrak">
                        </div>
                        <div class="form-group">
                            <label id="jawabanDAbstrakId">Jawaban D <br></label>
                            <input type="text" class="form-control" name="jawabanDAbstrak" id="jawabanDAbstrak">
                        </div>
                        <div class="form-group">
                            <label id="jawabanEAbstrakId">Jawaban E <br></label>
                            <input type="text" class="form-control" name="jawabanEAbstrak" id="jawabanEAbstrak">
                        </div>
                        <div class="form-group">
                            <label id="jawabanBenarAbstrakId">Jenis Jawaban <br></label>
                            <select class="form-control" id="jawabanBenar1Abstrak" name="jawabanBenar1Abstrak">
                                <option disabled selected>---Jawaban Benar---</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                            </select>
                            <select class="form-control" id="jawabanBenar2Abstrak" name="jawabanBenar2Abstrak">
                                <option disabled selected>---Jawaban Benar---</option>
                                <option value="true">True</option>
                                <option value="false">False</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label id="jawabanBenar3Abstrak">Jawaban Benar <br></label>
                            <input type="text" class="form-control" name="jawabanBenar3Abstrak" id="jawabanBenar3Abstrak" placeholder="a,b,c">
                        </div>
                        <div class="form-group">
                            <label id="bobotJawabanAbstrakId">Bobot Jawaban <br></label>
                            <input type="number" class="form-control" name="bobotJawabanAbstrak" id="bobotJawabanAbstrak" placeholder="0 - 100">
                        </div>
                    </div>
                    <div class="card-body" id="form4">
                        <label for="soal">
                            <h6>Soal Latihan - Pengenalan Pola</h6>
                        </label>
                        <div class="input-group mb-2">
                            <input type="hidden" class="form-control" id="jenisSoalPola" name="jenisSoalPola" value="3">
                        </div>
                        <div class="form-group">
                            <label>Jenis Jawaban <br></label>
                            <select class="form-control" id="jenisJawabanPola" name="jenisJawabanPola">
                                <option disabled selected>---Pilih Jenis---</option>
                                <option value="1">Pilihan Ganda</option>
                                <option value="2">CheckBox</option>
                                <option value="3">True or False</option>
                            </select>
                        </div>
                        <label>Soal<br></label>
                        <div class="input-group mb-2">
                            <textarea class="form-control" id="soalPola" name="soalPola" placeholder="Example : Budi Membawa seekor" style="min-height:100wpx;height:100%"></textarea>
                        </div>

                        <div class="form-group">
                            <label>File Media <br></label>
                            <input type="file" class="form-control" name="file_mediaPola" id="file_mediaPola">
                        </div>
                        <div class="form-group">
                            <label id="jawabanAPolaId">Jawaban A <br></label>
                            <input type="text" class="form-control" name="jawabanAPola" id="jawabanAPola">
                        </div>
                        <div class="form-group">
                            <label id="jawabanBPolaId">Jawaban B <br></label>
                            <input type="text" class="form-control" name="jawabanBPola" id="jawabanBPola">
                        </div>
                        <div class="form-group">
                            <label id="jawabanCPolaId">Jawaban C <br></label>
                            <input type="text" class="form-control" name="jawabanCPola" id="jawabanCPola">
                        </div>
                        <div class="form-group">
                            <label id="jawabanDPolaId">Jawaban D <br></label>
                            <input type="text" class="form-control" name="jawabanDPola" id="jawabanDPola">
                        </div>
                        <div class="form-group">
                            <label id="jawabanEPolaId">Jawaban E <br></label>
                            <input type="text" class="form-control" name="jawabanEPola" id="jawabanEPola">
                        </div>
                        <div class="form-group">
                            <label id="jawabanBenarPolaId">Jawaban Benar <br></label>
                            <select class="form-control" id="jawabanBenar1Pola" name="jawabanBenar1Pola">
                                <option disabled selected>---Jawaban Benar---</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                            </select>
                            <select class="form-control" id="jawabanBenar2Pola" name="jawabanBenar2Pola">
                                <option disabled selected>---Jawaban Benar---</option>
                                <option value="true">True</option>
                                <option value="false">False</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="jawabanBenar3Pola" id="jawabanBenar3Pola" placeholder="a,b,c">
                        </div>
                        <div class="form-group">
                            <label id="bobotJawabanPolaId">Bobot Jawaban <br></label>
                            <input type="number" class="form-control" name="bobotJawabanPola" id="bobotJawabanPola" placeholder="0 - 100">
                        </div>
                    </div>
                    <div class="card-body" id="form5">
                        <label for="soal">
                            <h6>Soal Latihan - Algoritma</h6>
                        </label>
                        <div class="input-group mb-2">
                            <input type="hidden" class="form-control" id="jenisSoalAlgo" name="jenisSoalAlgo" value="4">
                        </div>
                        <div class="form-group">
                            <label>Jenis Jawaban <br></label>
                            <select class="form-control" id="jenisJawabanAlgo" name="jenisJawabanAlgo">
                                <option disabled selected>---Pilih Jenis---</option>
                                <option value="4">Choose and Arrange</option>
                            </select>
                        </div>
                        <label>Soal<br></label>
                        <div class="input-group mb-2">
                            <textarea class="form-control" id="soalAlgo" name="soalAlgo" placeholder="Example : Budi Membawa seekor" style="min-height:100wpx;height:100%"></textarea>
                        </div>

                        <div class="form-group">
                            <label>File Media <br></label>
                            <input type="file" class="form-control" name="file_mediaAlgo" id="file_mediaAlgo">
                        </div>
                        <div class="form-group">
                            <label id="jawabanAAlgo">Jawaban A <br></label>
                            <input type="text" class="form-control" name="jawabanAAlgo" id="jawabanAAlgo">
                        </div>
                        <div class="form-group">
                            <label id="jawabanBAlgo">Jawaban B <br></label>
                            <input type="text" class="form-control" name="jawabanBAlgo" id="jawabanBAlgo">
                        </div>
                        <div class="form-group">
                            <label id="jawabanCAlgo">Jawaban C <br></label>
                            <input type="text" class="form-control" name="jawabanCAlgo" id="jawabanCAlgo">
                        </div>
                        <div class="form-group">
                            <label id="jawabanDAlgo">Jawaban D <br></label>
                            <input type="text" class="form-control" name="jawabanDAlgo" id="jawabanDAlgo">
                        </div>
                        <div class="form-group">
                            <label id="jawabanEAlgo">Jawaban E <br></label>
                            <input type="text" class="form-control" name="jawabanEAlgo" id="jawabanEAlgo">
                        </div>
                        <div class="form-group">
                            <label id="jawabanBenarAlgoId">Jenis Jawaban <br></label>
                            <select class="form-control" id="jawabanBenar1Algo" name="jawabanBenar1Algo">
                                <option disabled selected>---Jawaban Benar---</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                            </select>
                            <select class="form-control" id="jawabanBenar2Algo" name="jawabanBenar2Algo">
                                <option disabled selected>---Jawaban Benar---</option>
                                <option value="true">True</option>
                                <option value="false">False</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label id="jawabanBenar3Algo">Jawaban Benar <br></label>
                            <input type="text" class="form-control" name="jawabanBenar3Algo" id="jawabanBenar3Algo" placeholder="a,b,c">
                        </div>
                        <div class="form-group">
                            <label id="bobotJawabanAlgoId">Bobot Jawaban <br></label>
                            <input type="number" class="form-control" name="bobotJawabanAlgo" id="bobotJawabanAlgo" placeholder="0 - 100">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?= form_close() ?>
            <button id="backBtn">Back</button>
            <button id="nextBtn">Next</button>
        </div>
    </div>
</div>

<div id="show_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;" id="title"></h3>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('guru/tambahLatihan') ?>
                <div class="card-body" id="form2">
                    <label for="soal">
                        <h6>Soal Latihan - Dekomposisi</h6>
                    </label>
                    <div class="input-group mb-2">
                        <input type="hidden" class="form-control" id="jenisSoalDekom" name="jenisSoalDekom" value="1">
                    </div>
                    <div class="form-group">
                        <label>Jenis Jawaban <br></label>
                        <select class="form-control" id="jenisJawabanDecom" name="jenisJawabanDecom">
                            <option disabled selected>---Pilih Jenis---</option>
                            <option value="1">Pilihan Ganda</option>
                            <option value="2">CheckBox</option>
                            <option value="3">True or False</option>
                        </select>
                    </div>
                    <label>Soal<br></label>
                    <div class="input-group mb-2">
                        <textarea class="form-control" id="soalDecom" name="soalDecom" placeholder="Example : Budi Membawa seekor" style="min-height:100wpx;height:100%"></textarea>
                    </div>
                    <div class="form-group">
                        <label>File Media <br></label>
                        <input type="file" class="form-control" name="fileMediaDecom" id="fileMediaDecom">
                    </div>
                    <div class="form-group">
                        <label id="jawabanADecomId">Jawaban A <br></label>
                        <input type="text" class="form-control" name="jawabanADecom" id="jawabanADecom">
                    </div>
                    <div class="form-group">
                        <label id="jawabanBDecomId">Jawaban B <br></label>
                        <input type="text" class="form-control" name="jawabanBDecom" id="jawabanBDecom">
                    </div>
                    <div class="form-group">
                        <label id="jawabanCDecomId">Jawaban C <br></label>
                        <input type="text" class="form-control" name="jawabanCDecom" id="jawabanCDecom">
                    </div>
                    <div class="form-group">
                        <label id="jawabanDDecomId">Jawaban D <br></label>
                        <input type="text" class="form-control" name="jawabanDDecom" id="jawabanDDecom">
                    </div>
                    <div class="form-group">
                        <label id="jawabanEDecomId">Jawaban E <br></label>
                        <input type="text" class="form-control" name="jawabanEDecom" id="jawabanEDecom">
                    </div>
                    <div class="form-group">
                        <label id="jawabanBenarDecomId">Jawaban Benar <br></label>
                        <select class="form-control" id="jawabanBenar1Decom" name="jawabanBenar1Decom">
                            <option disabled selected>---Jawaban Benar---</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                            <option value="e">E</option>
                        </select>
                        <select class="form-control" id="jawabanBenar2Decom" name="jawabanBenar2Decom">
                            <option disabled selected>---Jawaban Benar---</option>
                            <option value="true">True</option>
                            <option value="false">False</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label id="jawabanBenar3DecomId">Jawaban Benar <br></label>
                        <input type="text" class="form-control" name="jawabanBenar3Decom" id="jawabanBenar3Decom" placeholder="a,b,c">
                    </div>
                    <div class="form-group">
                        <label id="bobotJawabanDecomId">Bobot Jawaban <br></label>
                        <input type="number" class="form-control" name="bobotJawabanDecom" id="bobotJawabanDecom" placeholder="0 - 100">
                    </div>
                    <div class="input-group mb-2">
                        <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?= $materi['id_materi'] ?>">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?= form_close() ?>
                <!-- <?php echo '<p id=$file_soal> </p>' ?> -->
                <!-- <img src="<?php echo base_url("/assets/materi/latihan/<p id=$file_soal></p>") ?>" alt=""> -->
                <!-- <div style="border-style:solid;">
                    <p id="soal_sub_latihan"></p>
                    <p id="jenis_jawaban"></p>
                </div> -->

                <!-- <table class="table table-bordered table-striped">
                    <thead class="btn-primary">
                        <tr>
                            <th>Jenis Jawaban</th>
                            <th>Bobot</th>
                            <th>Jawaban Benar</th>
                            <th>Soal Sub Latihan</th>
                            <th>File Soal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p id="jenis_jawaban"></p>
                            </td>
                            <td>
                                <p id="bobot"></p>
                            </td>
                            <td>
                                <p id="jawaban_benar"></p>
                            </td>
                            <td>
                                <p id="soal_sub_latihan"></p>
                            </td>
                            <td>
                                <p id="file_soal"></p>
                            </td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
        </div>
    </div>
</div>