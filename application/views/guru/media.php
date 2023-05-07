<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url("guru"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("guru/pembelajaran"); ?>">Mata Pelajaran</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("guru/submateri/" . $submateri['id_materi']); ?>">Materi</a></div>
                <div class="breadcrumb-item">Media</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4><?= $submateri['sub_materi'] ?></h4>
                    </div>
                    <div class="card-header">
                        <h4><?= $submateri['tujuan'] ?></h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="<?php echo site_url('guru/tambahMedia/' . $submateri['id_submateri']); ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Media</a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Jenis Media</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($media as $m) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $m['jenis_media']; ?></td>
                                            <td><?= $m['file_media']; ?></td>
                                            <td>
                                                <!-- <a href="<?php echo site_url('guru/media/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Details</a>  -->
                                                <a href="<?php echo site_url('guru/updateMedia/' . $m['id_media'] . '/' . $m['id_submateri']); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                                                <a href="<?php echo site_url('guru/deleteMedia/' . $m['id_media'] . '/' . $m['id_submateri']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
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