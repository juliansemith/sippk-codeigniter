<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman Peralatan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Halaman Peminjaman</h3>

                <div class="btn-group float-right">
                    <a href="<?= base_url('peminjaman/tambah') ?>" class="btn float-right btn-xs btn btn-primary ml-2">
                        <i class="fas fa-plus-circle mr-1"></i>Tambah Peminjaman
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php if (empty($peminjaman)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan!
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari alat.." name="keyword" id="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari</button>
                                    <a href="<?= base_url('dataperalatan') ?>" class="btn btn-outline-danger">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Kode Alat</th>
                                <th>Kode Peminjam</th>
                                <th>Nama Alat</th>
                                <th>Peminjam</th>
                                <th>Jumlah Pinjam</th>
                                <th>Mulai Pinjam</th>
                                <th>Pinjam Sampai</th>
                                <th>Status</th>
                                <th width="18%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($peminjaman as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['kode_alat']; ?></td>
                                    <td><?= $row['kode_peminjam']; ?></td>
                                    <td><?= $row['nama_alat']; ?></td>
                                    <td><?= $row['nama_peminjam']; ?></td>
                                    <td><?= $row['jumlah_pinjam']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($row['tanggal_mulai'])); ?></td>
                                    <td><?= date('d-m-Y', strtotime($row['tanggal_sampai'])) ?></td>
                                    <td>
                                        <?php
                                        if ($row['status_peminjaman'] == "1") {
                                            echo "<span class='badge badge-success'>Selesai</span>";
                                        } else if ($row['status_peminjaman'] == "2") {
                                            echo "<span class='badge badge-warning'>Dipinjam</span>";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($row['status_peminjaman'] == "1") {
                                            echo "-";
                                        } else if ($row['status_peminjaman'] == "2") {
                                        ?>
                                            <a href="<?= base_url('peminjaman/peminjaman_selesai/') ?><?= $row['id_peminjaman'] ?>" class="btn btn sm btn-success"><i class="fa fa-refresh"></i>Selesai</a>
                                            <a href="<?= base_url('peminjaman/peminjaman_batal/') ?><?= $row['id_peminjaman'] ?>" class="btn btn sm btn-danger"><i class="fa fa-close"></i>Batalkan</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
        
        </div> -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="JudulModal">Tambah Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('peminjaman/tambah_aksi') ?>" method="post">
                    <div class="form-group">
                        <label for="kode_alat">Kode Alat</label>
                        <select name="kode_alat" id="" class="form-control">
                            <option value="">--Kode Alat--</option>
                            <?php foreach ($alat as $row) { ?>
                                <option value="<?= $row['kode_alat']; ?>"></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_alat">Nama Alat</label>
                        <select name="alat" id="" class="form-control">
                            <option value="">--Pilih Alat--</option>
                            <?php foreach ($alat as $row) { ?>
                                <option value="<?= $row['nama_alat']; ?>"></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="peminjam">Peminjam</label>
                        <select name="peminjam" id="" class="form-control">
                            <option value="">--Pilih User--</option>
                            <?php foreach ($user as $row) { ?>
                                <option value="<?= $row['nama']; ?>"></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai Pinjam</label>
                        <input type="date " class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="masukkan ntanggal mulai pinjam.." required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_sampai">Tanggal Sampai Pinjam</label>
                        <input type="date " class="form-control" id="tanggal_sampai" name="tanggal_sampai" placeholder="masukkan ntanggal sampai pinjam.." required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>