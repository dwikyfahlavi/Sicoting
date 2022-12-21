  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4 class="mx-auto">Register</h4>
              </div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('auth/registration'); ?>">
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class = "text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class = "text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class = "text-danger">', '</small>'); ?>
                  </div>
                  <div class=" form-group">
                    <label for="kontak">Kontak</label>
                    <input id="kontak" type="text" class="form-control" name="kontak" value="<?= set_value('kontak'); ?>">
                    <?= form_error('kontak', '<small class = "text-danger">', '</small>'); ?>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password1" class="d-block">Password</label>
                      <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Konfirmasi Password</label>
                      <input id="password2" type="password" class="form-control" name="password2">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                  <div class="mt-5 text-muted text-center">
                    Sudah punya akun? <a href="<?= base_url('auth'); ?>">Login!</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>