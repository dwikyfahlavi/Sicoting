<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Akun Siswa</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('guru/updateAkunRespon') ?>
                            <input type="hidden" class="form-control" name="id_user" value="<?= $updateAkun['id_user'] ?>">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $updateAkun['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $updateAkun['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $updateAkun['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Kontak</label>
                                <input type="text" class="form-control" name="kontak" value="<?= $updateAkun['kontak'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="<?= $updateAkun['password'] ?>">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>