<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $materi['materi']; ?></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Sub Materi</h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMateriModal">Tambah Sub Materi</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sub Materi</th>
                                        <th>Kompetensi Dasar</th>
                                        <th>Indikator Pencapaian Kompetensi</th>
                                        <th>Tujuan Pembelajaran</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($submateri as $sm) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $sm['sub_materi']; ?></td>
                                            <td><?= $sm['kompetensidasar']; ?></td>
                                            <td><?= $sm['ipk']; ?></td>
                                            <td><?= $sm['tujuan']; ?></td>
                                            <td>
                                                <div>
                                                    <div class="btn-group" style="margin-bottom: auto;">
                                                        <button type="button" class="btn btn-danger">Action</button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?php echo site_url('guru/apersepsi/' . $sm['id_submateri']); ?>">Apersepsi</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('guru/media/' . $sm['id_submateri']); ?>">Media</a>
                                                            <a class="dropdown-item" href="#">Latihan</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="<?php echo site_url('guru/updateSubMateri/' . $materi['id_materi'] . '/' . $sm['id_submateri']); ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('guru/deleteSubMateri/' . $materi['id_materi'] . '/' . $sm['id_submateri']); ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
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

<!-- Modal Tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="newSubMateriModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sub Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('guru/submateri/' . $materi['id_materi']) ?>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="sub_materi" name="sub_materi" placeholder="Nama Sub Materi">
                            </div>
                            <div class="input-group mb-2">
                                <textarea name="kompetensidasar" id="kompetensidasar" placeholder="Kompetensi Dasar" style="width: 100%"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <textarea name="ipk" id="ipk" placeholder="Indikator Pencapaian Kompetensi" style="width: 100%"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <textarea name="tujuan" id="tujuan" placeholder="Tujuan Pembelajaran" style="width: 100%"></textarea>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>