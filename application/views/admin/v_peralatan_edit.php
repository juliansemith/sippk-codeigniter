<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center bg-dark">
                            <h4><b>Edit Data Peralatan</b></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url() . 'peralatan'; ?>" class="btn btn-sm btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>Kembali</a><br>
                            <!-- form -->
                            <?php foreach ($alat as $row) { ?>
                                <form action="<?= base_url('peralatan/update'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="kode_alat">Kode Alat</label>
                                        <input type="text " class="form-control" id="kode_alat" name="kode_alat" placeholder="masukkan kode alat.." required="required" value="<?= $row['kode_alat']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_alat">Nama alat</label>
                                        <input type="text " class="form-control" id="nama_alat" name="nama_alat" placeholder="masukkan nama alat.." required="required" value="<?= $row['nama_alat']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="merk">Merk</label>
                                        <input type="text " class="form-control" id="merek" name="merk" placeholder="masukkan merk.." required="required" value="<?= $row['merk']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="spek">Spek</label>
                                        <input type="text " class="form-control" id="spek" name="spek" placeholder="masukkan spek/no seri.." required="required" value="<?= $row['spek']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number " class="form-control" id="jumlah" name="jumlah" placeholder="masukkan jumlah.." required="required" value="<?= $row['jumlah']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="kondisi_baik">Kondisi Baik</label>
                                        <input type="number" class="form-control" id="kondisi_baik" name="kondisi_baik" placeholder="masukkan kondisi baik.." required="required" value="<?= $row['kondisi_baik']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="kondisi_rusak">Kondisi Rusak</label>
                                        <input type="number" class="form-control" id="kondisi_rusak" name="kondisi_rusak" placeholder="masukkan kondisi baik.." required="required" value="<?= $row['kondisi_rusak']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="sumber">Sumber</label>
                                        <input type="text " class="form-control" id="sumber" name="sumber" placeholder="masukkan sumber.." required="required" value="<?= $row['sumber']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="date" class="form-control" placeholder="keterangan.." id="keterangan" name="keterangan" required="required" value="<?= $row['keterangan']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status Alat</label>
                                        <select name="status" id="" class="form-control" required="required">
                                            <option value="">--Pilih Status--</option>
                                            <option <?php if ($row['status'] == "1") {
                                                        echo "selected='selected'";
                                                    } ?> value="1">Tersedia</option>
                                            <option <?php if ($row['status'] == "2") {
                                                        echo "selected='selected'";
                                                    }; ?> value="2">Sedang dipinjam</option>
                                        </select>
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