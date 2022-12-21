<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="card author-box card-primary" style="height: 10cm;">
                        <div class="card-body">
                            <div class="author-box-left">
                                <div class="user-item">
                                    <img alt="image" src="<?= base_url("assets/profile/" . $user1['image']) ?>" height="150" width="200" class="rounded-circle">
                                    <div class="user-details">
                                        <div class="user-name" style="font-size: 20pt ;"><?= $user1['nama'] ?></div>
                                        <div class="dropdown-divider" style="height: 20px;"></div>
                                        <div class="text-job text-muted" style="font: size 16pt;">Pemrograman Dasar</div>
                                    </div>
                                </div>
                            </div>

                            <div class="author-box-details">
                                <div class="author-box-description" style="margin-left: 150px;">
                                    <div class="text-medium font-weight-bold" style="font-size: 14pt ;">Nama Lengkap: <?= $user1['nama'] ?></div>
                                    <br>
                                    <div class="text-medium font-weight-bold" style="font-size: 14pt ;">Username: <?= $user1['username'] ?> </div>
                                    <br>
                                    <div class="text-medium font-weight-bold" style="font-size: 14pt ;">Email: <?= $user1['email'] ?></div>
                                    <br>
                                    <div class="text-medium font-weight-bold" style="font-size: 14pt ;">Kontak: <?= $user1['kontak'] ?> </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <div class="w-100 d-sm-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>