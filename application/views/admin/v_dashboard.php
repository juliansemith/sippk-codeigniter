<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h2 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12 mr-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $this->m_data->get_data('user')->num_rows(); ?></h3>

                            <p>Jumlah User</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="<?= base_url(); ?>admin/data_user" class="small-box-footer">Detail<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12 mr-4">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $this->m_data->get_data('admin')->num_rows(); ?></h3>

                            <p>Jumlah Admin</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="<?= base_url(); ?>admin/data_admin" class="small-box-footer">Detail<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $this->m_data->get_data('alat')->num_rows(); ?></h3>

                            <p>Data Peralatan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-tools"></i>
                        </div>
                        <a href="<?= base_url(); ?>peralatan" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $this->m_data->get_data('peminjaman')->num_rows(); ?></h3>

                            <p>Total Peminjaman</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <a href="<?= base_url(); ?>peminjaman" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>