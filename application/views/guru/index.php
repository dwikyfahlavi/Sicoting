<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="section-body">
      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Jumlah Siswa</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa; ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Jumlah Mata Pelajaran</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $materi; ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Jumlah Materi</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $submateri; ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 style="color:#182c44;">SIKOTING (GURU)</h4>
            </div>
            <div class="card-body">
              <p class="text-justify">SICOTING merupakan sistem pembelajaran berbasis website yang bertujuan untuk meningkatkan kemampuan Berpikir Komputasi siswa. Dalam website ini anda sebagai guru dapat membuat materi pelajaran dengan berbagai media yang berbeda-beda (pdf, ppt, video). Serta akan membuat pembelajaran mengikuti tahapan model pembelajaran <em>Problem Based Learning</em>.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 style="color:#182c44;">Siswa</h4>
            </div>
            <div class="card-body">
              <ul class="nav">
                <li class="nav-item">
                  <!--<a class="nav-link active" href="<?php echo site_url('Guru/create_siswa'); ?>">Tambah Siswa</a>-->
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('Guru/akunsiswa'); ?>">Kelola Siswa</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 style="color:#182c44;">Pembelajaran</h4>
            </div>
            <div class="card-body">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('Guru/pembelajaran'); ?>">Kelola Pembelajaran</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>