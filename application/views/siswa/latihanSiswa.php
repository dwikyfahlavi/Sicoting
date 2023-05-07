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
                             <img src="<?= base_url(); ?>/assets/img/news/<?= $latihan->file_latihan ?>" alt="Girl in a jacket" width="500" height="300">   
                            
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

                    if(sizeof($dekomposisi) > 0 ){
                        ?>
                        <div id="content-dekomposisi" style="display: none;">
                            <?php 
                            
                            $index = 0;
                            foreach ($dekomposisi as $data) : 
                            if($data['alasan'] == 1) {
                                $alasan = '
                                <div class="input-group mb-2">
                                            <textarea class="form-control" name="alasanDekom'.$index.'" placeholder="Alasan Jawaban..." style="min-height:100wpx;height:100%" required></textarea>
                                        </div>
                                ';
                                $titleAlasan = "+ Alasan";
                            }
                            
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="column">
                                        <?php if($data['file_soal'] != null){?>
                                            <img  src="<?= base_url(); ?>/assets/img/news/<?= $data['file_soal'] ?>" alt="Girl in a jacket" width="500" height="300">
                                        <?php }?>
                                        <h3 >Soal Latihan - Pilihan Ganda <?=$titleAlasan; ?></h3>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <input type="hidden" class="form-control" name="id_user" value="<?= $user['id_user']?>" >
                                    <input type="hidden" class="form-control" name="id_submateri" value="<?= $idsubmateri?>" >
                                    <input type="hidden" class="form-control" name="id_latihan" value="<?= $latihan->id_latihan?>" >
                                    <h4><?=$data['pertanyaan']; ?></h4>
                                    <input type="radio" name="opsiDekom<?=$index?>" value="A" required>
                                    <label for="opsi_a"><?= $data['opsi_a']; ?></label><br>
                                    <input type="radio" name="opsiDekom<?=$index?>" value="B">
                                    <label for="opsi_b"><?= $data['opsi_b']; ?></label><br>
                                    <input type="radio" name="opsiDekom<?=$index?>" value="C">
                                    <label for="opsi_c"><?= $data['opsi_c']; ?></label><br>
                                    <input type="radio" name="opsiDekom<?=$index?>" value="D">
                                    <label for="opsi_d"><?= $data['opsi_d']; ?></label><br>
                                    <input type="radio" name="opsiDekom<?=$index?>" value="E">
                                    <label for="opsi_e"><?= $data['opsi_e']; ?></label><br>
                                    
                                    <?= $alasan;?>
                                </div>
                            </div>
                            <?php 
                            $alasan = '';
                            $titleAlasan = "";
                            $index++;
                        endforeach;?>
                             <div class="card-footer text-right">
                                <a class="btn btn-primary mr-1" onclick="showAbstraksi()" style="color: white;">Lanjut</a>
                            </div>
                        </div>
                    <?php }else {?>
                    <div class="card" id="content-algoritma" style="display: none;">
                            <div class="card-header">
                                    <h3 >Soal Latihan Tidak Ada</h3>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary mr-1" onclick="showAbstraksi()" style="color: white;">Lanjut</a>
                            </div>
                        </div>
                    <?php }
                    if(sizeof($abstraksi) >0 ){
                        
                        ?>
                        <div id="content-abstraksi" style="display: none;">
                            <?php 
                            $index = 0;
                            foreach ($abstraksi as $data) : 
                            if($data['alasan'] == 1) {
                                $alasan = '
                                <div class="input-group mb-2">
                                            <textarea class="form-control" name="alasanAbstraksi'.$index.'" placeholder="Alasan Jawaban..." style="min-height:100wpx;height:100%" required></textarea>
                                        </div>
                                ';
                                $titleAlasan = "+ Alasan";
                            }
                            ?>
                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="column">
                                         <?php if($data['file_soal'] != null){?>
                                            <img  src="<?= base_url(); ?>/assets/img/news/<?= $data['file_soal'] ?>" alt="Girl in a jacket" width="500" height="300">
                                        <?php }?>
                                        <h3 >Soal Latihan - Pilihan Ganda <?=$titleAlasan; ?></h3>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <h4><?=$data['pertanyaan']; ?></h4>
                                    <input type="radio" name="opsiabstraksi<?=$index?>" value="A" required>
                                    <label for="opsi_a"><?= $data['opsi_a']; ?></label><br>
                                    <input type="radio" name="opsiabstraksi<?=$index?>" value="B">
                                    <label for="opsi_b"><?= $data['opsi_b']; ?></label><br>
                                    <input type="radio" name="opsiabstraksi<?=$index?>" value="C">
                                    <label for="opsi_c"><?= $data['opsi_c']; ?></label><br>
                                    <input type="radio" name="opsiabstraksi<?=$index?>" value="D">
                                    <label for="opsi_d"><?= $data['opsi_d']; ?></label><br>
                                    <input type="radio" name="opsiabstraksi<?=$index?>" value="E">
                                    <label for="opsi_e"><?= $data['opsi_e']; ?></label><br>
                                    
                                    <?= $alasan;?>
                                </div>
                            </div>
                            <?php 
                            $alasan = '';
                            $titleAlasan = "";
                        endforeach;?>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary mr-1" onclick="showPola()" style="color: white;">Lanjut</a>
                            </div>
                        </div>
                    <?php }else {?>
                    <div class="card" id="content-algoritma" style="display: none;">
                            <div class="card-header">
                                    <h3 >Soal Latihan Tidak Ada</h3>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary mr-1" onclick="showPola()" style="color: white;">Lanjut</a>
                            </div>
                        </div>
                    <?php }
                    if(sizeof($pengenalanPola) > 0 ){?>
                        <div id="content-pola" style="display: none;">
                            <?php 
                            $index = 0;
                            foreach ($pengenalanPola as $data) : 
                            if($data['alasan'] == 1) {
                                $alasan = '
                                <div class="input-group mb-2">
                                            <textarea class="form-control" name="alasanPola'.$index.'" placeholder="Alasan Jawaban..." style="min-height:100wpx;height:100%" required></textarea>
                                        </div>
                                ';
                                $titleAlasan = "+ Alasan";
                            }
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="column">
                                         <?php if($data['file_soal'] != null){?>
                                            <img  src="<?= base_url(); ?>/assets/img/news/<?= $data['file_soal'] ?>" alt="Girl in a jacket" width="500" height="300">
                                        <?php }?>
                                        <h3 >Soal Latihan - Pilihan Ganda <?=$titleAlasan; ?></h3>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <h4><?=$data['pertanyaan']; ?></h4>
                                    <input type="radio" name="opsiPola<?=$index?>" value="A" required>
                                    <label for="opsi_a"><?= $data['opsi_a']; ?></label><br>
                                    <input type="radio" name="opsiPola<?=$index?>" value="B">
                                    <label for="opsi_b"><?= $data['opsi_b']; ?></label><br>
                                    <input type="radio" name="opsiPola<?=$index?>" value="C">
                                    <label for="opsi_c"><?= $data['opsi_c']; ?></label><br>
                                    <input type="radio" name="opsiPola<?=$index?>" value="D">
                                    <label for="opsi_d"><?= $data['opsi_d']; ?></label><br>
                                    <input type="radio" name="opsiPola<?=$index?>" value="E">
                                    <label for="opsi_e"><?= $data['opsi_e']; ?></label><br>
                                    
                                    <?= $alasan;?>
                                </div>
                            </div>
                            <?php 
                            $alasan = '';
                            $titleAlasan = "";
                        endforeach;?>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary mr-1" onclick="showAlgo()" style="color: white;">Lanjut</a>
                            </div>
                        </div>
                    <?php }else {?>
                    <div class="card" id="content-algoritma" style="display: none;">
                            <div class="card-header">
                                    <h3 >Soal Latihan Tidak Ada</h3>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary mr-1" onclick="showAlgo()" style="color: white;">Lanjut</a>
                            </div>
                        </div>
                    <?php }
                    if(sizeof($algoritma) > 0 ){?>
                        <div id="content-algoritma" style="display: none;">
                            <?php 
                            $index = 0;
                            foreach ($algoritma as $data) : 
                            if($data['alasan'] == 1) {
                                $alasan = '
                                <div class="input-group mb-2">
                                            <textarea class="form-control" name="alasanAlgo'.$index.'" placeholder="Alasan Jawaban..." style="min-height:100wpx;height:100%" required></textarea>
                                        </div>
                                ';
                                $titleAlasan = "+ Alasan";
                            }
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="column">
                                        <?php if($data['file_soal'] != null){?>
                                            <img  src="<?= base_url(); ?>/assets/img/news/<?= $data['file_soal'] ?>" alt="Girl in a jacket" width="500" height="300">
                                        <?php }?>
                                        <h3 >Soal Latihan - Pilihan Ganda <?=$titleAlasan; ?></h3>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <h4><?=$data['pertanyaan']; ?></h4>
                                    <input type="radio" name="opsiAlgo<?=$index?>" value="A" required>
                                    <label for="opsi_a"><?= $data['opsi_a']; ?></label><br>
                                    <input type="radio" name="opsiAlgo<?=$index?>" value="B">
                                    <label for="opsi_b"><?= $data['opsi_b']; ?></label><br>
                                    <input type="radio" name="opsiAlgo<?=$index?>" value="C">
                                    <label for="opsi_c"><?= $data['opsi_c']; ?></label><br>
                                    <input type="radio" name="opsiAlgo<?=$index?>" value="D">
                                    <label for="opsi_d"><?= $data['opsi_d']; ?></label><br>
                                    <input type="radio" name="opsiAlgo<?=$index?>" value="E">
                                    <label for="opsi_e"><?= $data['opsi_e']; ?></label><br>
                                    
                                    <?= $alasan;?>
                                </div>
                            </div>
                            <?php 
                            $alasan = '';
                            $titleAlasan = "";
                        endforeach;?>
                            <div class="card-footer text-right">
                                 <button class="btn btn-success mr-1" id="btn-algoritma">Submit</button>
                            </div>
                        </div>
                    <?php }else {?>
                    <div class="card" id="content-algoritma" style="display: none;">
                            <div class="card-header">
                                    <h3 >Soal Latihan Tidak Ada</h3>
                            </div>
                            <div class="card-footer text-right">
                                 <button class="btn btn-success mr-1" id="btn-algoritma">Submit</button>
                            </div>
                        </div>
                    <?php }?>
                    
                    
                <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>