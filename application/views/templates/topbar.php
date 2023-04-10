<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>

                <div class="search-element">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    <div class="search-backdrop"></div>
                    <div class="search-result">
                        <div class="search-header">
                            Histories
                        </div>
                        <!-- <div class="search-item">
                             <a href="#">How to hack NASA using CSS</a>
                             <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                         </div> -->
                    </div>
                </div>
            </form>

            <!-- navbar kanan -->
            <ul class="navbar-nav navbar-right">
                <!-- Profile -->
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="<?= base_url("assets/profile/" . $user['image']) ?>" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, <?= $user['nama'] ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">Logged in 5 min ago</div>
                        <?php if( $user['nip']==NULL):?>
                        <a href="<?= base_url('siswa/profile'); ?>" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <?php else:?>
                            <a href="<?= base_url('guru/profile'); ?>" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <?php endif;?>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>