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
                        <h4>Hasil Latihan - <?= $materi['sub_materi']; ?><br></h4>
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
                                        <th>Nama Siswa</th>
                                        <th>Nilai Dekomposisi</th>
                                        <th>Nilai Abstraksi</th>
                                        <th>Nilai Pengenalan Pola</th>
                                        <th>Nilai Berpikir Algoritma</th>
                                        <th>Nilai Akhir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style="width:20%"><?= $user['nama']; ?></th>
                                        <th style="width:10%"><?= $hasil['nilai_dekomposisi']; ?></th>
                                        <th style="width:10%"><?= $hasil['nilai_abstraksi']; ?></th>
                                        <th style="width:10%"><?= $hasil['nilai_pp']; ?></th>
                                        <th style="width:10%"><?= $hasil['nilai_ba']; ?></th>
                                        <th style="width:10%"><?= $hasil['nilai_akhir']; ?></th>
                                        <td style="width:20%">
                                            <a href="<?php echo site_url('siswa/LihatJawabanSiswa/' . $hasil['id_submateri'] . '/' . $hasil['id_user']); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-search"></i>Lihat Jawaban</a>
                                        </td>
                                    </tr>
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