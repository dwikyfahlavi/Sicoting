<!-- sidebar -->

<body>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="#">SICOTING</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="#">CT</a>
            </div>
            <ul class="sidebar-menu">
                <!-- HEADER -->
                <!-- Query Menu -->
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT user_menu.id_user_menu, menu
                            FROM user_menu JOIN user_access_menu
                              ON user_menu.id_user_menu = user_access_menu.menu_id
                           WHERE user_access_menu.role_id = $role_id
                        ORDER BY user_access_menu.menu_id ASC
            ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <!-- Looping Menu -->
                <?php foreach ($menu as $m) : ?>
                    <li class="menu-header">
                        <?= $m['menu'] ?>
                    </li>

                    <!-- SUB MENU -->
                    <?php
                    $menuId = $m['id_user_menu'];
                    $querySubMenu = "SELECT *
                            FROM user_sub_menu 
                           WHERE menu_id = $menuId
                             AND is_active = 1
                ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>
                        <li>
                            <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                                <i class="<?php echo $sm['icon']; ?>"></i>
                                <span><?= $sm['title']; ?></span></a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>