<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url("siswa"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("siswa/materi"); ?>">Mata Pelajaran</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("siswa/submateri/" . $materi['id_materi']); ?>">Materi</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("siswa/komenApersepsi/" . $idsubmateri); ?>">Media</a></div>
                <div class="breadcrumb-item">Latihan</div>
            </div>
        </div>


        <?php
        $index = 1;
        foreach ($latihan as $m) : ?>
            <div class="section-body">
                <div class="row">
                    <div class="col-20 col-md col-lg">
                        <div class="card">
                            <div class="card-header">
                                <h4 style="width: 99%;">Latihan <?= $index ?></h4>
                                <?php if ($hasil == null) { ?>
                                    <img src='<?= site_url(); ?>/assets/img/remove.png' style='width:30px;height:30px;'>
                                <?php } else { ?>
                                    <img src='<?= site_url(); ?>/assets/img/yes.png' style='width:30px;height:30px;'>

                                <?php } ?>

                            </div>
                            <div class="card-body">
                                <?= $m['soal'] ?>
                            </div>
                            <div class="card-footer text-left">
                                <a href="<?= site_url('siswa/latihanSiswa' . '/' . $m['id_latihan'] . '/' . $idsubmateri); ?>"><button class="btn btn-primary">Kerjakan</button></a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

<?php
            $index++;
        endforeach ?>
</section>
</div>