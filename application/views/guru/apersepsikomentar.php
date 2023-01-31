<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h3>Pertanyaan Apersepsi:</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4">
                                <article class="article article-style-c">
                                    <div class="article-header">
                                        <!-- <div class="article-image" data-background="<?= base_url("assets/materi/apersepsi" . $apersepsi['file_apersepsi']) ?>"></div> -->
                                        <div class="article-image">
                                            <img alt="image" src="<?= base_url("assets/materi/apersepsi/" . $apersepsi['file_apersepsi']) ?>" style="height:150px;width:200px;object-fit:scale-down"></object>
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <h4><?= $apersepsi['pertanyaan_apersepsi'] ?></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Komentar Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($komentar as $k) : ?>
                                            <tr>
                                                <td><?= $k['nis']; ?></td>
                                                <td><?= $k['nama']; ?></td>
                                                <td><?= $k['komentar']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>