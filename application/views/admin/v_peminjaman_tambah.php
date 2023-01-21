<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center bg-dark">
                            <h4><b>Tambah Data Peminjaman</b></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url() . 'peminjaman'; ?>" class="btn btn-sm btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>Kembali</a><br>
                            <!-- form -->

                            <form action="<?= base_url('peminjaman/peminjaman_aksi'); ?>" method="post">
                                <div class="form-group">
                                    <label for="kode_alat">Kode Alat</label>
                                    <select name="kode_alat" id="" class="form-control">
                                        <option value="">--Kode Alat--</option>
                                        <?php foreach ($alat as $a) { ?>
                                            <option value="<?= $a['kode_alat']; ?>"><?= $a['kode_alat']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_alat">Nama Alat</label>
                                    <select name="nama_alat" id="alat" class="form-control">
                                        <option value="">--Pilih Alat--</option>
                                        <?php foreach ($alat as $row) { ?>
                                            <option value="<?= $row['nama_alat']; ?>"><?= $row['nama_alat']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kode_peminjam">Kode Peminjam</label>
                                    <select name="kode_peminjam" id="" class="form-control">
                                        <option value="">--Kode Peminjam--</option>
                                        <?php foreach ($peminjam as $a) { ?>
                                            <option value="<?= $a['kode_peminjam']; ?>"><?= $a['kode_peminjam']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_pinjam">Jumlah Pinjam</label>
                                    <input type="number" class="form-control" name="jumlah_pinjam" placeholder="masukkan jumlah peminjam">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai Pinjam</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="masukkan ntanggal mulai pinjam.." required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_sampai">Tanggal Sampai Pinjam</label>
                                    <input type="date" class="form-control" id="tanggal_sampai" name="tanggal_sampai" placeholder="masukkan ntanggal sampai pinjam.." required>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>