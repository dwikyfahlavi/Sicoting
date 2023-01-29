<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <?php foreach ($materi as $m) : ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image" data-background="../assets/img/news/img08.jpg">
                                </div>
                            </div>
                            <div class="article-title">
                                <h4><?= $m['judul'] ?></h4>
                            </div>
                            <div class="article-details">
                                <p><?= $m['deskripsi'] ?></p>
                                <div class="article-cta">
                                    <a href=" <?php echo site_url('siswa/media/' . $m['id_materi']); ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>