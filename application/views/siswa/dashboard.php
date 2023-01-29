<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Selamat Datang, <?= $user['nama'] ?>!</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-20 col-md col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sistem Informasi Computational Thinking (SICOTING)</h4>
                        </div>
                        <div class="card-body">
                            Penjelasan singkat mengenai aplikasi
                        </div>
                        <div class="card-footer text-left">
                            <a href="<?= site_url("siswa/materi"); ?>"><button class="btn btn-primary">Mulai Belajar</button></a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>