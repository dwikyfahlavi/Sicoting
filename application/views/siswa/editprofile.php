<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('siswa/editProfileRespon') ?>
                            <input type="hidden" class="form-control" name="id_user" value="<?= $editProfile->id_user ?>">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="<?= $editProfile->nama ?>">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $editProfile->username ?>">
                            </div>
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" class="form-control" name="nis" value="<?= $editProfile->nis ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $editProfile->email ?>">
                            </div>
                            <div class="form-group">
                                <label>Kontak</label>
                                <input type="text" class="form-control" name="kontak" value="<?= $editProfile->kontak ?>">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <input type="hidden" class="form-control" name="role_id" value="<?= $editProfile->role_id ?>">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="<?= $editProfile->password ?>">
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