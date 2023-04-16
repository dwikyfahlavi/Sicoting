<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Tes Materi: <?= $materi['materi'] ?></h1>
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
    </section>
<?php endforeach ?>
</section>
</div>