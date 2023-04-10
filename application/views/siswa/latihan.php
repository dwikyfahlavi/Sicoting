<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        

        <?php 
        $index =- 0;
        foreach ($latihan as $m) : ?>
       <div class="section-body">
            <div class="row">
                <div class="col-20 col-md col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latihan <?= $index ?></h4>
                        </div>
                        <div class="card-body">
                            <?= $m['soal'] ?>
                        </div>
                        <div class="card-footer text-left">
                            <a href="<?= site_url('siswa/subMateri'. '/'. $m['id_latihan'] ); ?>"><button class="btn btn-primary">Lihat Materi</button></a>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php 
        $index ++;
        endforeach ?>
    </section>
</div>