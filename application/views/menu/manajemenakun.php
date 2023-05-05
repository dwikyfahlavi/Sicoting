<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Akun</h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAkunModal">Tambah Akun</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($akun as $a) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $a['nama']; ?></td>
                                            <td><?= $a['email']; ?></td>
                                            <td><?= $a['role']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('menu/updateAkun/' . $a['id_user'] . '/' . $a['role_id']); ?>" class="btn btn-success">Edit</a>
                                                <a href="<?php echo site_url('menu/deleteAkun/' . $a['id_user']); ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
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