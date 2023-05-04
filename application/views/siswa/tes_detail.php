<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Tes Materi: <?= $materi['materi'] ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo site_url("Siswa"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo site_url("Siswa/tes"); ?>">Tes</a></div>
                <div class="breadcrumb-item">Tes Detail</div>
            </div>
        </div>
        <?php foreach ($tes as $t) : ?>
            <div class="section-body">
                <div class="row">
                    <div class="col-20 col-md col-lg">
                        <div class="card">
                            <div class="card-header">
                                <h2><?= $t['jenis_tes'] ?></h2>
                            </div>
                            <div class="card-body">
                                Silahkan kerjakan tes <?= $materi['materi'] ?>. Kerjakan secara mandiri dan teliti.
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= $t['url'] ?>"><button class="btn btn-primary">Mulai Tes</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</div>