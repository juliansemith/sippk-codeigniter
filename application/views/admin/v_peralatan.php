<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peralatan Kebencanaan</h1>
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
                <h3 class="card-title">Halaman Peralatan</h3>

                <div class="btn-group float-right">
                    <button type="button" class="btn float-right btn-xs btn btn-primary" data-toggle="modal" data-target="#FormModal"><i class="fas fa-plus-circle mr-1"></i>Tambah Alat</button>
                </div>

                <div class="btn-group float-right">
                    <a href="<?= base_url(); ?>peralatan/cetak" name="print1" class="btn float-right btn-xs btn btn-success mr-2 pl-2 pr-3"><i class="fas fa-print mr-1"></i>Print</a>
                </div>
            </div>
            <div class="card-body">
                <?php if (empty($alat)) : ?>
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
                                    <a href="<?= base_url('peralatan') ?>" class="btn btn-outline-danger">Reset</a>
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
                                <th>Nama Alat</th>
                                <th>Merk</th>
                                <th>Spek</th>
                                <th>Jumlah</th>
                                <th>Kondisi Baik</th>
                                <th>Kondisi Rusak</th>
                                <th>Sumber</th>
                                <th>Keterangan</th>
                                <th width="10%">Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($alat as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['kode_alat']; ?></td>
                                    <td><?= $row['nama_alat']; ?></td>
                                    <td><?= $row['merk']; ?></td>
                                    <td><?= $row['spek']; ?></td>
                                    <td><?= $row['jumlah']; ?></td>
                                    <td><?= $row['kondisi_baik']; ?></td>
                                    <td><?= $row['kondisi_rusak']; ?></td>
                                    <td><?= $row['sumber']; ?></td>
                                    <td><?= format_indo('d-m-Y', $row['keterangan']); ?></td>
                                    <td>
                                        <?php
                                        if ($row['status'] == "1") {
                                            echo "<span class='badge badge-success'>Tersedia</span>";
                                        } else if ($row['status'] == "2") {
                                            echo "<span class='badge badge-warning'>Sedang dipinjam</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('peralatan/edit/') ?><?= $row['kode_alat'] ?>" class="badge badge-info">Edit</a>
                                        <a href="<?= base_url('peralatan/hapus/') ?><?= $row['kode_alat'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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
                <h5 class="modal-title" id="JudulModal">Tambah Alat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('peralatan/tambah_aksi') ?>" method="post">
                    <div class="form-group">
                        <label for="kode_alat">Kode Alat</label>
                        <input type="text " class="form-control" id="kode_alat" name="kode_alat" placeholder="masukkan kode alat.." required>
                    </div>

                    <div class="form-group">
                        <label for="nama_alat">Nama alat</label>
                        <input type="text " class="form-control" id="nama_alat" name="nama_alat" placeholder="masukkan nama alat.." required>
                    </div>

                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text " class="form-control" id="merek" name="merk" placeholder="masukkan merk.." required>
                    </div>

                    <div class="form-group">
                        <label for="spek">Spek</label>
                        <input type="text " class="form-control" id="spek" name="spek" placeholder="masukkan spek/no seri.." required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="masukkan jumlah.." required>
                    </div>
                    <div class="form-group">
                        <label for="kondisi_baik">Kondisi Baik</label>
                        <input type="number" class="form-control" id="kondisi_baik" name="kondisi_baik" placeholder="masukkan kondisibaik.." required>
                    </div>

                    <div class="form-group">
                        <label for="kondisi_rusak">Kondisi Rusak</label>
                        <input type="number" class="form-control" id="kondisi_rusak" name="kondisi_rusak" placeholder="masukkan kondisi rusak.." required>
                    </div>

                    <div class="form-group">
                        <label for="sumber">Sumber</label>
                        <input type="text" class="form-control" id="sumber" name="sumber" placeholder="masukkan sumber.." required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="date" class="form-control" placeholder="keterangan.." id="keterangan" name="keterangan" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>