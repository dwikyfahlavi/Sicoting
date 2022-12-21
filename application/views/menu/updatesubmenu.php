<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Sub Menu</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('menu/updateSubmenuRespon') ?>
                            <input type="hidden" class="form-control" name="id_user_sub_menu" value="<?= $updateSubmenu->id_user_sub_menu ?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $updateSubmenu->title ?>">
                            </div>
                            <div class="form-group">
                                <label>Menu</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="<?= $updateSubmenu->menu_id ?>"><?= $updateSubmenu->menu ?></option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Url</label>
                                <input type="text" class="form-control" name="url" value="<?= $updateSubmenu->url ?>">
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" class="form-control" name="icon" value="<?= $updateSubmenu->icon ?>">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
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