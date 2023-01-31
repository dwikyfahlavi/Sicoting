<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Daftar Media</h2>
            <div class="row">
                <div class="col-20 col-md col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h6>Silahkan pilih media yang ingin anda gunakan untuk belajar</h6>
                        </div>
                        <?php foreach ($media as $med) : ?>
                            <div class="card-footer text-left">
                                <a href=""><button class="btn btn-primary"><?= $med['jenis_media'] ?></button></a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <h2 class="section-title">Latihan</h2>
            <div class="row">
                <div class="col-20 col-md col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h6>Setelah belajar melalui media yang kamu pilih, lanjutkan pembelajaran dengan menyelesaikan latihan!</h6>
                        </div>
                        <div class="card-footer text-left">
                            <a href=""><button class="btn btn-primary">Mulai Latihan</button></a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>