<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="<?php echo base_url(); ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Login</h4>
            </div>

            <?= $this->session->flashdata('message'); ?>

            <div class="card-body">
              <form method="POST" action="<?= base_url('auth'); ?>">
                <div class="form-group">
                  <label for="username" class="control-label">Username</label>
                  <input type="text" class="form-control" name="username" tabindex="2" value="<?= set_value('username'); ?>">
                  <?= form_error('username', '<small class = "text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="password" class="control-label">Password</label>
                  <input type="password" class="form-control" name="password" tabindex="2">
                  <?= form_error('password', '<small class = "text-danger">', '</small>'); ?>
                  <div class="float-right">
                    <a href="auth-forgot-password.html" class="text-small">
                      Lupa Password?
                    </a>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="mt-5 text-muted text-center">
            Belum punya akun? <a href="<?= base_url('auth/registration'); ?>">Daftar Disini</a>
          </div>
          <div class="simple-footer">
            Copyright &copy; SIKOTING
          </div>
        </div>
      </div>
    </div>
  </section>
</div>