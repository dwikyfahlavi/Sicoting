<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Manajemen</h4>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= site_url("menu"); ?>" class="btn btn-primary mb-3">Kelola Menu</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sub Menu Manajemen</h4>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= site_url("menu/submenu"); ?>" class="btn btn-primary mb-3">Kelola Sub Menu</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Akun Manajemen</h4>
                        </div>
                        <div class="card-footer text-right">
                            <?= $this->session->flashdata('message'); ?>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAkunModal">Tambah Akun</a>
                            <a href="<?= site_url("menu/manajemenakun"); ?>" class="btn btn-primary mb-3">Kelola Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="newAkunModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/manajemenakun'); ?>" method="post">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Kontak">
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="">-- Pilih Role --</option>
                                            <?php foreach ($akun as $a) : ?>
                                                <option value="<?= $a['id_user_role']; ?>"><?= $a['role']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>