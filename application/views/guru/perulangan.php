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
                        <h4>Pemrograman Dasar - Perulangan</h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKDModal">Tambah KD</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>No. KD</th>
                                        <th>Kompetensi Dasar</th>
                                        <th>No. IP</th>
                                        <th>Indikator Pencapaian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <tr>
                                        <?php foreach ($perulangan as $p) : ?>
                                            <?php
                                            $kd = $p['kd'];
                                            $kd1 = $p['kompetensidasar'];
                                            ?>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                        <td><?= $kd ?></td>
                                        <td><?= $kd1 ?></td>
                                        <?php $n = 0; ?>
                                        <td>
                                            <?php foreach ($perulangan as $indikator) : ?>
                                                <?= $indikator['ip']; ?><br><br>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($perulangan as $indikator1) : ?>
                                                <?= $indikator1['indikatorpencapaian']; ?><br>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('guru/materi/' . $p['id_kd']); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Detail</a>&nbsp;
                                            <br><a href="<?php echo site_url('guru/updatePembelajaran/' . $p['id_kd']); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>&nbsp;
                                            <br><br><a href="<?php echo site_url('guru/deletePembelajaran/' . $p['id_kd']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="section-body">
            </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="newKDModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah KD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('guru/pembelajaran'); ?>" method="post">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="kd" name="kd" placeholder="No. KD">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="kompetensidasar" name="kompetensidasar" placeholder="Kompetensi Dasar">
                                </div>
                                <div id="ip">
                                    <input type="text" class="form-control" id="ip" name="ip[]" placeholder="No. IP">
                                </div>
                                <div class="controls">
                                    <a href="#" id="add_more_ip"><i class="fa fa-plus"></i>Add More</a>
                                    <a href="#" id="remove_ip"><i class="fa fa-plus"></i>Remove Field</a>
                                </div>
                                <div id="indikator">
                                    <input type="text" class="form-control" id="indikatorpencapaian" name="indikatorpencapaian[]" placeholder="Indikator Pencapaian">
                                </div>
                                <div class="controls">
                                    <a href="#" id="add_more_indikator"><i class="fa fa-plus"></i>Add More</a>
                                    <a href="#" id="remove_indikator"><i class="fa fa-plus"></i>Remove Field</a>
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