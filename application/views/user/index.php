<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <div class="col-sm-8 mx-auto">
                    <h1>Selamat Datang, <b><?= $user['nama']; ?>!</b></h1>
                    <p>Sistem Informasi Pendataan Peralatan Kebencanaan Berbasis Web</p>
                    <p>STMIK Horizon Karawang - Badan Penanggulangan Bencana Daerah Karawang</p>

                    Anda telah login sebagai <b><?= $this->session->userdata('username'); ?></b> [User].
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>