<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTesModal"><i class="fas fa-plus"></i> Tes</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Jenis Tes</th>
                                        <th>Url</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tes as $m) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $m['jenis_tes']; ?></td>
                                            <td><a href="<?= $m['url']; ?>" class="btn btn-primary"><?= $m['jenis_tes']; ?></a></td>
                                            <td>
                                                <a href="<?php echo site_url('guru/updateTes/' . $m['id_tes'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                                                <a href="<?php echo site_url('guru/deleteTes/' . $m['id_tes'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
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

<div class="modal fade" tabindex="-1" role="dialog" id="newTesModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('guru/tesRespon/' . $materi['id_materi']); ?>" method="post">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenis_tes">Jenis Tes</label>
                                <select name="jenis_tes" class="form-control">
                                    <option value="Pretest">Pretest</option>
                                    <option value="Posttest">Posttest</option>
                                </select>
                                <label for="url">
                                    <h6>URL (Google Form)</h6>
                                </label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Contoh : https://www.google.com">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?= $materi['id_materi'] ?>">
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