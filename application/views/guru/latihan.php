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
                        <h4>Soal Latihan - <?= $materi['judul'] ?><br></h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?> 
                        <button class="btn btn-icon icon-left btn-primary" onclick="tambahSoal(2,1,'Dekomposisi')"  id="tambah_soal" ><i class="fas fa-plus"></i> Soal Latihan</button>
                    
                        <a href="<?php echo site_url('guru/latihan/' . $materi['id_materi']); ?>" class="btn btn-primary mb-3" style="float: right;">Hasil Siswa</a>
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
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan']?>,1,'Dekomposisi')"  id="view_detail" >Dekomposisi</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan']?>,2,'Abstraksi')"  id="view_detail" >Abstraksi</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan']?>,3,'Pengenalan Pola')"  id="view_detail" >Pengenalan Pola</button></td>
                                            <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetail(<?php echo $m['id_latihan']?>,4,'Algoritma')"  id="view_detail" >Algoritma</button></td>
                                            <td>
                                                <!-- <a href="<?php echo site_url('guru/media/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Details</a>  -->
                                                <a href="<?php echo site_url('guru/updateTes/' . $m['id_latihan'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                                                <a href="<?php echo site_url('guru/deleteTes/' . $m['id_latihan'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('guru/tesRespon'); ?>" form id="form1" method="post">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_tes"><h6>Nama Tes</h6></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="nama_tes" name="nama_tes" placeholder="Contoh : Tes for">
                                </div>
                                <label for="jenis_tes"><h6>Jenis Tes</h6></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="jenis_tes" name="jenis_tes" placeholder="Contoh : Pretest">
                                </div>
                                <label for="jenis_tes"><h6>URL (Google Form)</h6></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Contoh : https://www.google.com">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?= $materi['id_materi'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form id="form2">
                <h1>memek</h1>
            </form>
            <form id="form3">
                <h1>kontol</h1>
            </form>
                <button id="nextBtn">Next</button>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
        </div>
    </div>
</div>

<div id="show_modal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;" id="title"></h3>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
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
              <td><p id="jenis_jawaban"></p></td> 
              <td><p id="bobot"></p></td>
              <td><p id="jawaban_benar"></p></td>
              <td><p id="soal_sub_latihan"></p></td>
              <td><p id="file_soal"></p></td>
            </tr>
          </tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>

