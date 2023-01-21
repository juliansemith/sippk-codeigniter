<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-center">
                    <h4><b>Laporan Peminjaman Alat</b></h4>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><b>Filter Berdasarkan Tanggal</b></h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == "sukses") {
                                    echo '<div class="alert alert-success">Password  Berhasil diganti.</div>';
                                }
                            }
                            ?>

                            <?= validation_errors(); ?>
                            <form action="" method="get">
                                <div class="form-group">
                                    <label for="tanggal_mulai" class="font-weight-bold">Tanggal Mulai Pinjam</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" placeholder="Masukkan Tanggal mulai pinjam">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_sampai" class="font-weight-bold">Tanggal Sampai Pinjam</label>
                                    <input type="date" class="form-control" name="tanggal_sampai" placeholder="Masukkan Tanggal Sampai Pinjam">
                                </div>

                                <input type="submit" class="btn btn-primary" value="Filter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // tombol cetak jika data sudah di filter
            if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
                $mulai = $_GET['tanggal_mulai'];
                $sampai = $_GET['tanggal_sampai'];
            ?>
                <a class="btn btn-primary" href="<?= base_url() . 'peminjaman/peminjaman_cetak/?tanggal_mulai=' . $mulai . '&tanggal_sampai=' . $sampai ?>" i target="_blank"><i class="fa fa-print"></i>Print</a>
                <a class="btn btn-success" href="<?= base_url(); ?>peminjaman/peminjaman_laporan"><i class=" fa fa-refresh"></i>Segarkan</a>
            <?php } ?>
            <br><br>

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
                            <th>Sampai Pinjam</th>
                            <th>Status</th>
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
                                <td><?= format_indo('d-m-Y', $row['tanggal_mulai']); ?></td>
                                <td><?= format_indo('d-m-Y', $row['tanggal_sampai']); ?></td>
                                <td>
                                    <?php
                                    if ($row['status_peminjaman'] == "1") {
                                        echo "<div class='badge badge-success'>Selesai</div>";
                                    } else if ($row['status_peminjaman'] == "2") {
                                        echo "<div class='badge badge-warning'>Dipinjam</div>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>