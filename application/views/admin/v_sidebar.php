<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('public/dist/img/BPBD.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SIPPK | BPBD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('public/dist/img/eren.png'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['username']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Pengguna
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>admin/data_admin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>admin/data_user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Peralatan Kebencanaan
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>peralatan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Peralatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>peminjam" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Peminjam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>peminjaman" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Peminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>peminjaman/peminjaman_laporan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/tentang') ?>" class="nav-link" target="_blank">
                        <i class="nav-icon fas fa-fw fa-address-card"></i>
                        <p>
                            Tentang Kami
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/ganti_password') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-key"></i>
                        <p>
                            Ganti Password
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <hr class="sidebar-divider my-0">
                </li>
                <i class="nav-icon far fa-circle text-stripped text-center"></i>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>