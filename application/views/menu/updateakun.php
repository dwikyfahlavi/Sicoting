<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Akun</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('menu/updateAkunRespon') ?>
                            <?php if ($updateAkun['role_id'] == 2) : ?>
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
                                    <label>NIP</label>
                                    <input type="text" class="form-control" name="nip" value="<?= $updateAkun['nip'] ?>">
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
                                    <label>Mata Pelajaran</label>
                                    <input type="text" class="form-control" name="mapel" value="<?= $updateAkun['mapel'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="<?= $updateAkun['role_id'] ?>"><?= $updateAkun['role'] ?></option>
                                        <?php foreach ($akun as $a) : ?>
                                            <option value="<?= $a['id_user_role']; ?>"><?= $a['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="<?= $updateAkun['password'] ?>">
                                </div>
                            <?php elseif ($updateAkun['role_id'] == 3) : ?>
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
                                    <label>NIS</label>
                                    <input type="text" class="form-control" name="nis" value="<?= $updateAkun['nis'] ?>">
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
                                    <label>Role</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="<?= $updateAkun['role_id'] ?>"><?= $updateAkun['role'] ?></option>
                                        <?php foreach ($akun as $a) : ?>
                                            <option value="<?= $a['id_user_role']; ?>"><?= $a['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="<?= $updateAkun['password'] ?>">
                                </div>
                            <?php endif; ?>
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