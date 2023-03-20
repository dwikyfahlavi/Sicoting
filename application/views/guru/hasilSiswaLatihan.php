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
                        <h4>Soal Latihan - <?= $materi['sub_materi'] ?><br></h4>
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
                                        <th>Nis</th>
                                        <th>Nama Siswa</th>
                                        <th>Dekomposisi</th>
                                        <th>Abstraksi</th>
                                        <th>Pengenalan Pola</th>
                                        <th>Algoritma</th>
                                        <th>Nilai Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $newData= []; 
                                    $totalNilai = 0;
                                    $index = 0;
                                    $tempNis = $hasil[0]['nis'];

                                    foreach ($hasil as $row) {
                                        $nis = $row['nis'];
                                        $nilai = $row['nilai'];
                                        $nama = $row['nama'];
                                        $jenis_soal = $row['jenis_soal'];
                                        $id_sub_soal = $row['id_sub_soal'];
                                        $id_user = $row['id_user'];
                                        $result = "id_sub_soal" . $jenis_soal;
                                        if($tempNis == $nis){
                                          $totalNilai += $nilai;
                                         
                                        }else{
                                          $tempNis = $nis;
                                          $totalNilai = 0;
                                          $totalNilai += $nilai;
                                          $index = 0;
                                        }
                                       
                                        if (!array_key_exists($nis, $newData)) {
                                            $newData[$nis] = [
                                                'nis' => $nis,
                                                'nama' => $nama,
                                                // 'id_sub_soal' => $id_sub_soal,
                                                'id_user' => $id_user,   
                                            ];
                                        }
                                       
                                        $newData[$nis][$jenis_soal] = $nilai;
                                        $newData[$nis][$result] = $id_sub_soal;
                                        $newData[$nis]['nilai'] = $totalNilai; 
                                        $index ++;
                                    } 
                                    
                                  ?>
                                    <?php $i = 0; ?>
                                    
                                    <?php foreach ($newData as $m) : ?>
                                   
                                        <tr>
                                            <td><?= $newData[$m['nis']]["nis"]; ?></td>
                                            <td><?= $newData[$m['nis']]["nama"]; ?></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetailHasilSiswa(<?php echo $newData[$m['nis']]['id_sub_soal1'] ?>,<?php echo $newData[$m['nis']]['id_user']?>,1)"  id="view_detail" ><?= $newData[$m['nis']][1]; ?></button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetailHasilSiswa(<?php echo $newData[$m['nis']]['id_sub_soal2'] ?>,<?php echo $newData[$m['nis']]['id_user']?>,2)"><?= $newData[$m['nis']][2]; ?></button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetailHasilSiswa(<?php echo $newData[$m['nis']]['id_sub_soal3'] ?>,<?php echo $newData[$m['nis']]['id_user']?>,3)"><?= $newData[$m['nis']][3]; ?></button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetailHasilSiswa(<?php echo $newData[$m['nis']]['id_sub_soal4'] ?>,<?php echo $newData[$m['nis']]['id_user']?>,4)"><?= $newData[$m['nis']][4]; ?></button></td>
                                            <td><?= $newData[$m['nis']]['nilai']/4; ?></td>
                                             <!-- <button class="btn btn-primary view_detail" relid="<?php echo $m['id_latihan'];  ?>"id="view_detail">Dekomposisi</button> -->
                                            <!--<td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan']?>,1,'Dekomposisi')"  id="view_detail" >Dekomposisi</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan']?>,2,'Abstraksi')"  id="view_detail" >Abstraksi</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan']?>,3,'Pengenalan Pola')"  id="view_detail" >Pengenalan Pola</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan']?>,4,'Algoritma')"  id="view_detail" >Algoritma</button></td>
                                            <td> -->
                                                <!-- <a href="<?php echo site_url('guru/media/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Details</a>  
                                                <a href="<?php echo site_url('guru/updateTes/' . $m['id_latihan'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a> -->
                                                <!--<a href="<?php echo site_url('guru/deleteSoalLatihan/' . $m['id_latihan'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
                                                <a href="<?php echo site_url('guru/hasilLatihanSiswa/' . $m['id_latihan'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i>Hasil Siswa</a>-->
                                           <!-- </td>-->
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



<div id="show_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;" id="title">Nama Siswa: </h3>
      </div>
      <div class="modal-body">
        <h4>ini file soal</h4>
        <p id="file_soal"></p>
        <h4>ini soal latihan</h4>
        <p id="soal_latihan"></p>
        <h4>ini sub soal latihan</h4>
        <p id="soal_sub_latihan"></p>
        <h4>ini opsi soal</h4>
        <table id="table">
          <tr>
            <td>
              <input id="opsi_a" type="radio" name="opsi" disabled/>
              <label id="label_a"></label>
            </td>
          </tr>
          <tr>
            <td>
              <input id="opsi_b" type="radio" name="opsi" disabled/>
              <label id="label_b"></label>
            </td>
          <tr>
            <td>
              <input id="opsi_c" type="radio" name="opsi" disabled/>
              <label id="label_c"></label>
            </td>
          <tr>
            <td>
              <input id="opsi_d" type="radio" name="opsi" disabled/>
              <label id="label_d"></label>
            </td>
          <tr>
            <td>
              <input id="opsi_e" type="radio" name="opsi" disabled/>
              <label id="label_e"></label>
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>

