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
                        <h4><?= $updatePembelajaran['kd'] ?></h4>
                        <h4><?= $updatePembelajaran['kompetensidasar'] ?></h4>
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger"> <?= validation_errors(); ?> </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPembelajaranModal">Tambah Pembelajaran</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Pembelajaran</th>
                                        <th>Topik Pembelajaran</th>
                                        <th>Tujuan Pembelajaran</th>
                                        <th>Masalah (Apersepsi)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($materi as $m) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $m['judul']; ?></td>
                                            <td><?= $m['topik']; ?></td>
                                            <td><?= $m['tujuan']; ?></td>
                                            
                                            <td><a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#apersepsi-<?= $m['id_materi']?>"><i class="fas fa-info-circle"></i>Detail Apersepsi</a></td>
                                            
                                                      
                                            <td>
                                                <a href="<?php echo site_url('guru/media/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Details</a>
                                                <a href="<?php echo site_url('guru/updateMateri/' . $updatePembelajaran['id_kd'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                                                <a href="<?php echo site_url('guru/deleteMateri/' . $updatePembelajaran['id_kd'] . '/' . $m['id_materi']); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Delete</a>
                                            </td>
       
                                        </tr>
                                        <div class="modal fade" tabindex="1" role="dialog" id="apersepsi-<?= $m['id_materi']?>" data-backdrop="false" style="backround:grey;">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Apersepsi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <div class="input-group mb-2">
                                                                            <img src="<?= base_url()?>/assets/materi/apersepsi/<?= $m['file_apersepsi']?>" alt="apersepsi" width="500" height="400">
                                                                            
                                                                        </div>
                                                                        <div class="input-group mb-2">
                                                                            <input type="text" class="form-control" id="topik" name="topik" value="<?= $m['apersepsi']?>"disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
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
 <!-- Modal Ubah -->


<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="newPembelajaranModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('guru/materiRespon') ?>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Pembelajaran">
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="topik" name="topik" placeholder="Topik Pembelajaran">
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Pembelajaran">
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan Pembelajaran">
                            </div>
                            <div class="input-group mb-2">
                                <textarea class="form-control" id="apersepsi" name="apersepsi" placeholder="Apersepsi"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <input type="file" class="form-control" id="file_apersepsi" name="file_apersepsi">
                            </div>
                            <div class="input-group mb-2">
                                <input type="hidden" class="form-control" id="id_kd" name="id_kd" value="<?= $updatePembelajaran['id_kd'] ?>">
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