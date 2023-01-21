<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><b>Edit Data Peminjam</b></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url() . 'peminjam'; ?>" class="btn btn-sm btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>Kembali</a><br>
                            <!-- form -->
                            <?php foreach ($peminjam as $row) { ?>
                                <form action="<?= base_url('peminjam/update'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="nama" class="font-weight-bold">Kode Peminjam</label>
                                        <input type="hidden" value="<?= $row['kode_peminjam']; ?>" name="kode_peminjam">
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan kode peminjam" required="required" value="<?= $row['kode_peminjam']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_peminjam" class="font-weight-bold">Nama Peminjam</label>
                                        <input type="text" class="form-control" name="nama_peminjam" placeholder="Masukkan nama_peminjam" value="<?= $row['nama_peminjam']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan" class="font-weight-bold">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" placeholder="Masukkan jabatan" value="<?= $row['jabatan']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="instansi" class="font-weight-bold">Instansi</label>
                                        <input type="text" class="form-control" name="instansi" placeholder="Masukkan instansi" value="<?= $row['instansi']; ?>">
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>