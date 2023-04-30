<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= site_url("siswa"); ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?= site_url("siswa/materi") ?>">Mata Pelajaran</a></div>
        <div class="breadcrumb-item">Materi</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <?php
        foreach ($submateri as $m) : ?>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
              <div class="article-header">
                <div class="article-image" data-background="<?php echo base_url('/assets/img/news/img08.jpg'); ?>">
                </div>
              </div>
              <div class="article-title">
                <h4><?= $m['sub_materi'] ?></h4>
              </div>
              <div class="article-details">
                <p><?= $m['tujuan'] ?></p>
                <div class="article-cta">
                  <td><button class="btn btn-icon icon-left btn-primary" onclick="getDetailSubMateri(<?php echo $m['id_submateri'] ?>)" id="view_detail">Detail</button></td>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
</div>

<div id="show_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;" id="title"></h3>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>

      </div>
      <div class="modal-body">
        <div class="column">
          <div class="row">
        <div class="col-3">
        </div>
          <div class="col-6">
          <div class="article-image" data-background="../assets/img/news/img08.jpg"></div><br>
          <button type="button" class="btn btn-warning" style="width: 100%;" onclick="showModalSecc(1)">Kompetensi Dasar</button><br><br>
          <button type="button" class="btn btn-warning" style="width: 100%;" onclick="showModalSecc(2)">Indikator Pencapaian Kompetensi</button><br><br>
          <button type="button" class="btn btn-warning" style="width: 100%;" onclick="showModalSecc(3)">Tujuan Pembelajaran</button>
        </div>
        <div class="col-3">
        </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="show_modalAperr()">Lanjut</button>

      </div>
    </div>
  </div>
</div>

<div id="show_modalsec" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;" id="titleSec"></h3>
      </div>
      <div class="modal-body">
        <p id="content"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<div id="show_modalAper" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;" id="titleAper"></h3>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
      </div>
      <?= form_open('guru/tambahLatihan') ?>
      <div class="modal-body">
        <img src="<?= base_url(); ?>/assets/img/news/img08.jpg" alt="Girl in a jacket" width="500" height="300">
        <div class="form-group">
          <h4 id="apersepsi">
            </h3>
        </div>
        <div class="form-group">
          <label id="jawabanAPolaId">Komentar Apersepsi <br></label>
          <textarea class="form-control" id="komenAper" name="komenAper" placeholder="Berikan Komentarmu..." style="min-height:100wpx;height:100%"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>