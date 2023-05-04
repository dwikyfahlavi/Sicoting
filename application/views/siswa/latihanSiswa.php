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

                            <div class="form-group">
                                <h4><?= $latihan->soal; ?></h4>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 40%;">
                            <button class="btn btn-primary mr-1" onclick="showDekom()">Dekomposisi</button>
                            <button class="btn btn-primary mr-1" onclick="showAbstraksi()">Abstraksi</button>
                            <button class="btn btn-primary mr-1" onclick="showPola()">Pengenalan Pola</button>
                            <button class="btn btn-primary mr-1" onclick="showAlgo()">Algoritma</button>
                        </div>


                    </div>
                    <?= form_open('siswa/latihanTestRespon') ?>
                    <?php
                    $alasan = '';
                    $titleAlasan = "";

                    if ($sublatihan[0]['alasan'] == 1) {
                        $alasan = '
                        <div class="input-group mb-2">
                                    <textarea class="form-control" name="alasanDekom" placeholder="Alasan Jawaban..." style="min-height:100wpx;height:100%" required></textarea>
                                </div>
                        ';
                        $titleAlasan = "+ Alasan";
                    } else {
                        $alasan = '<input type="hidden" class="form-control" name="alasanDekom" value="-" style="min-height:100wpx;height:100%">';
                    }
                    ?>
                    <div class="card" id="content-dekomposisi" style="display: none;">
                        <div class="card-header">
                            <h3>Soal Latihan - Pilihan Ganda <?= $titleAlasan; ?></h3>
                        </div>
                        <div class="card-body">
                            <h5><?= $sublatihan[0]['pertanyaan']; ?></h5>
                            <input type="hidden" class="form-control" name="id_user" value="<?= $user['id_user'] ?>">
                            <input type="hidden" class="form-control" name="id_submateri" value="<?= $idsubmateri ?>">
                            <input type="hidden" class="form-control" name="id_materi" value="<?= $id_materi ?>">
                            <input type="radio" name="opsiDekom" value="A" required>
                            <label for="opsi_a"><?= $sublatihan[0]['opsi_a']; ?></label><br>
                            <input type="radio" name="opsiDekom" value="B">
                            <label for="opsi_b"><?= $sublatihan[0]['opsi_b']; ?></label><br>
                            <input type="radio" name="opsiDekom" value="C">
                            <label for="opsi_c"><?= $sublatihan[0]['opsi_c']; ?></label><br>
                            <input type="radio" name="opsiDekom" value="D">
                            <label for="opsi_d"><?= $sublatihan[0]['opsi_d']; ?></label><br>
                            <input type="radio" name="opsiDekom" value="E">
                            <label for="opsi_e"><?= $sublatihan[0]['opsi_e']; ?></label><br>

                            <?= $alasan; ?>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-primary mr-1" onclick="showAbstraksi()" style="color: white;">Lanjut</a>
                        </div>
                    </div>
                    <?php
                    $alasan = '';
                    $titleAlasan = "";

                    if ($sublatihan[1]['alasan'] == 1) {
                        $alasan = '
                        <div class="input-group mb-2">
                                    <textarea class="form-control" name="alasanAbstraksi" placeholder="Alasan Jawaban..." style="min-height:100wpx;height:100%" required></textarea>
                                </div>
                        ';
                        $titleAlasan = "+ Alasan";
                    } else {
                        $alasan = '<input type="hidden" class="form-control" name="alasanAbstraksi" value="-" style="min-height:100wpx;height:100%">';
                    }
                    ?>
                    <div class="card" id="content-abstraksi" style="display: none;">
                        <div class="card-header">
                            <h3>Soal Latihan - Pilihan Ganda <?= $titleAlasan; ?></h3>
                        </div>
                        <div class="card-body">
                            <h5><?= $sublatihan[1]['pertanyaan']; ?></h5>
                            <input type="radio" name="opsiabstraksi" value="A" required>
                            <label for="opsi_a"><?= $sublatihan[1]['opsi_a']; ?></label><br>
                            <input type="radio" name="opsiabstraksi" value="B">
                            <label for="opsi_b"><?= $sublatihan[1]['opsi_b']; ?></label><br>
                            <input type="radio" name="opsiabstraksi" value="C">
                            <label for="opsi_c"><?= $sublatihan[1]['opsi_c']; ?></label><br>
                            <input type="radio" name="opsiabstraksi" value="D">
                            <label for="opsi_d"><?= $sublatihan[1]['opsi_d']; ?></label><br>
                            <input type="radio" name="opsiabstraksi" value="E">
                            <label for="opsi_e"><?= $sublatihan[1]['opsi_e']; ?></label><br>

                            <?= $alasan; ?>

                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-primary mr-1" onclick="showPola()" style="color: white;">Lanjut</a>
                        </div>
                    </div>
                    <?php
                    $alasan = '';
                    $titleAlasan = "";

                    if ($sublatihan[2]['alasan'] == 1) {
                        $alasan = '
                        <div class="input-group mb-2">
                                    <textarea class="form-control" name="alasanPola" placeholder="Alasan Jawaban..." style="min-height:100wpx;height:100%" required></textarea>
                                </div>
                        ';
                        $titleAlasan = "+ Alasan";
                    } else {
                        $alasan = '<input type="hidden" class="form-control" name="alasanPola" value="-" style="min-height:100wpx;height:100%">';
                    }
                    ?>
                    <div class="card" id="content-pola" style="display: none;">
                        <div class="card-header">
                            <h3>Soal Latihan - Pilihan Ganda <?= $titleAlasan; ?></h3>
                        </div>
                        <div class="card-body">
                            <h5><?= $sublatihan[2]['pertanyaan']; ?></h5>
                            <input type="radio" name="opsiPola" value="A" required>
                            <label for="opsi_a"><?= $sublatihan[2]['opsi_a']; ?></label><br>
                            <input type="radio" name="opsiPola" value="B">
                            <label for="opsi_b"><?= $sublatihan[2]['opsi_b']; ?></label><br>
                            <input type="radio" name="opsiPola" value="C">
                            <label for="opsi_c"><?= $sublatihan[2]['opsi_c']; ?></label><br>
                            <input type="radio" name="opsiPola" value="D">
                            <label for="opsi_d"><?= $sublatihan[2]['opsi_d']; ?></label><br>
                            <input type="radio" name="opsiPola" value="E">
                            <label for="opsi_e"><?= $sublatihan[2]['opsi_e']; ?></label><br>

                            <?= $alasan; ?>

                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-primary mr-1" onclick="showAlgo()" style="color: white;">Lanjut</a>
                        </div>
                    </div>
                    <?php
                    $alasan = '';
                    $titleAlasan = "";

                    if ($sublatihan[3]['alasan'] == 1) {
                        $alasan = '
                        <div class="input-group mb-2">
                                    <textarea class="form-control" name="alasanAlgo" placeholder="Alasan Jawaban..." style="min-height:100wpx;height:100%" required></textarea>
                                </div>
                        ';
                        $titleAlasan = "+ Alasan";
                    } else {
                        $alasan = '<input type="hidden" class="form-control" name="alasanAlgo" value="-" style="min-height:100wpx;height:100%">';
                    }
                    ?>
                    <div class="card" id="content-algoritma" style="display: none;">
                        <div class="card-header">
                            <h3>Soal Latihan - Pilihan Ganda <?= $titleAlasan; ?></h3>
                        </div>
                        <div class="card-body">
                            <h5><?= $sublatihan[3]['pertanyaan']; ?></h5>
                            <input type="radio" name="opsiAlgo" value="A" required>
                            <label for="opsi_a"><?= $sublatihan[3]['opsi_a']; ?></label><br>
                            <input type="radio" name="opsiAlgo" value="B">
                            <label for="opsi_b"><?= $sublatihan[3]['opsi_b']; ?></label><br>
                            <input type="radio" name="opsiAlgo" value="C">
                            <label for="opsi_c"><?= $sublatihan[3]['opsi_c']; ?></label><br>
                            <input type="radio" name="opsiAlgo" value="D">
                            <label for="opsi_d"><?= $sublatihan[3]['opsi_d']; ?></label><br>
                            <input type="radio" name="opsiAlgo" value="E">
                            <label for="opsi_e"><?= $sublatihan[3]['opsi_e']; ?></label><br>

                            <?= $alasan; ?>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" id="btn-algoritma">Submit</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>