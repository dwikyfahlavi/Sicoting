<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Menu</h4>
                        </div>
                        <div class="card-body">
                            <?= form_open('menu/updateMenuRespon') ?>
                            <input type="hidden" class="form-control" name="id_user_menu" value="<?= $updateMenu->id_user_menu ?>">
                            <div class="form-group">
                                <label>Menu</label>
                                <input type="text" class="form-control" name="menu" value="<?= $updateMenu->menu ?>">
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