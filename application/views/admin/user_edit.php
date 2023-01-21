<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><b>Edit Data User</b></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url() . 'admin/data_user'; ?>" class="btn btn-sm btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>Kembali</a><br>
                            <!-- form -->
                            <?php foreach ($user as $row) { ?>
                                <form action="<?= base_url('admin/user_update'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="nama" class="font-weight-bold">Kode User</label>
                                        <input type="hidden" value="<?= $row['kode_user']; ?>" name="kode_user">
                                        <input type="text" class="form-control" name="kode_user" placeholder="Masukkan kode user" required="required" value="<?= $row['kode_user']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama" class="font-weight-bold">nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" value="<?= $row['nama']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="font-weight-bold">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" value="<?= $row['username']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="font-weight-bold">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
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