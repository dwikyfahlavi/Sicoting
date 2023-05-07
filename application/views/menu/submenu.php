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
                        <h4>Daftar Sub Menu</h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Submenu</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Menu</th>
                                        <th>Url</th>
                                        <th>Icon</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $sm['title']; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><?= $sm['icon']; ?></td>
                                            <td><?= $sm['is_active']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('menu/updateSubmenu/' . $sm['id_user_sub_menu']); ?>" class="btn btn-success">Edit</a>
                                                <a href="<?php echo site_url('menu/deleteSubmenu/' . $sm['id_user_sub_menu']); ?>" class="btn btn-danger">Delete</a>
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
<div class="modal fade" tabindex="-1" role="dialog" id="newSubMenuModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Nama Sub Menu">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <option value="">Select Menu</option>
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id_user_menu']; ?>"><?= $m['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Url Sub Menu">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Kode icon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="custom-switch mb-2">
                                    <input type="checkbox" id="is_active" value="1" name="is_active" class="custom-switch-input" checked>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Active?</span>
                                </label>
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