<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url("guru"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("guru/pembelajaran"); ?>">Mata Pelajaran</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("guru/submateri/" . $submateri['id_materi']); ?>">Materi</a></div>
                <div class="breadcrumb-item">Apersepsi</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4>Nama Materi: <?= $submateri['sub_materi'] ?></h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newApersepsiModal">Tambah Apersepsi</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Pertanyaan Apersepsi</th>
                                        <th>File Apersepsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($apersepsi as $a) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><a href="<?php echo site_url('guru/detailApersepsi/' . $a['id_apersepsi'] . '/' . $submateri['id_submateri']); ?>"></i><?= $a['pertanyaan_apersepsi']; ?></a>
                                            </td>
                                            <td><?= $a['file_apersepsi']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('guru/updateApersepsi/' . $a['id_apersepsi'] . '/' . $submateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                                                <a href="<?php echo site_url('guru/deleteApersepsi/' . $a['id_apersepsi'] . '/' . $submateri['id_submateri']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
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
        </div>
    </section>
</div>


<!-- Modal Apersepsi-->
<div class="modal fade" tabindex="-1" role="dialog" id="newApersepsiModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Apersepsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('guru/apersepsi/' . $submateri['id_submateri']) ?>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <textarea class="form-control" id="pertanyaan_apersepsi" name="pertanyaan_apersepsi" placeholder="Pertanyaan Apersepsi"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <input type="file" class="form-control" id="file_apersepsi" name="file_apersepsi">
                            </div>
                            <div class="input-group mb-2">
                                <input type="hidden" class="form-control" id="id_submateri" name="id_submateri" value="<?php echo $submateri['id_submateri']; ?> ">
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