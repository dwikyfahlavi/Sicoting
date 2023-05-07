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
                            SICOTING merupakan sistem pembelajaran <em>computational thinking</em> berbasis website. Dalam website ini, anda akan belajar memecahkan permasalahan dengan tahapan <em>computational thinking</em> yang terdiri dari Dekomposisi, Abstraksi, Pengenalan Pola, dan Berpikir Algoritma. Selain itu, anda akan belajar mengikuti 5 tahapan belajar <em>Problem Based Learning</em>. Dalam SICOTING, anda dapat belajar menggunakan media pembelajaran sesuai selera anda seperti PDF, PowerPoint, dan Video.
                        </div>
                        <div class="card-footer text-left">
                            <a href="<?= site_url("siswa/materi"); ?>"><button class="btn btn-primary">Mulai Belajar</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="color:#182c44;">BANTUAN</h4>
                        </div>
                        <div class="card-body">
                            <div class="login-box">
                                <a href="<?= site_url("siswa/chat"); ?>"><button class="btn btn-primary">Chat Room</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>