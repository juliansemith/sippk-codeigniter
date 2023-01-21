<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $judul; ?></title>

    <!-- Icon -->
    <link rel="icon" href="<?= base_url('public/dist/img/BPBD.png') ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/css2/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/css2/style.css">
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top bg-primary" style="background-color: #ff8000;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand page-scroll" style="color: white;" href="#home">BPBD | SIPPK</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about" class="page-scroll" style="color: white;">Tentang</a></li>
                    <li><a href="#portfolio" class="page-scroll" style="color: white;">Galeri</a></li>
                    <li><a href="#support" class="page-scroll" style="color: white;">Support</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- jumbotron -->
    <div class="jumbotron text-center">
        <img src="<?= base_url(); ?>public/dist/img/BPBD.png" alt="Foto Profil" class="img-circle">
        <h1>Badan Penanggulangan Bencana Daerah</h1>
        <p>Kabupaten Karawang</p>
    </div>
    <!-- akhir jumbotron  -->

    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">Tentang</h2>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-2">
                    <p class="p_Kiri">BPBD Kabupaten Karawang memiliki tugas sebagai lembaga yang mengurusi kebijakan penanggulangan bencana serta penanganan pengungsi secara cepat dan efisien untuk daerah Kabupaten Karawang. Melalui kantor Badan Penanggulangan Bencana Daeraeh atau biasa juga disingkat BPBD melaksanakan fungsi dan tugas lainnya. Adapun tugas utama BPBD adalah sebagai badan pemerintah daeraeh yang memiliki tugas bidang penanggulangan bencana daerah.</p>
                </div>
                <div class="col-sm-4">
                    <p class="p_Kanan">Fungsi BPBD yaitu sebagai penentu pedoman dan arahan jika terjadi bencana daerah, menentukan standar keselamatan dan penanggulangan bencana, merumuskan peta daerah rawan bencana di wilayah kerjanya, pengendalian penyumpulan sumbangan dana dan bantuan lainnya jika ada bencana, merumuskan prosedur tetap penanganan bencana, hingga pelaporan dan evaluasi penanganan bencana.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about -->

    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">Galeri</h2>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <a href="" class="thumbnail">
                        <img src="<?= base_url(); ?>public/dist/img/galeri1.jpg" alt="Foto-1">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="" class="thumbnail">
                        <img src="<?= base_url(); ?>public/dist/img/galeri2.jpeg" alt="Foto-1">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="" class="thumbnail">
                        <img src="<?= base_url(); ?>public/dist/img/galeri3.jpg" alt="Foto-1">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="" class="thumbnail">
                        <img src="<?= base_url(); ?>public/dist/img/galeri4.jpg" alt="Foto-1">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="" class="thumbnail">
                        <img src="<?= base_url(); ?>public/dist/img/galeri5.jpeg" alt="Foto-1">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="" class="thumbnail">
                        <img src="<?= base_url(); ?>public/dist/img/galeri6.jpeg" alt="Foto-1">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Portfolio -->
    <section class="support" id="support">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">Support</h2>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a href=" https://horizon.ac.id/" class="thumbnail">
                        <img src="<?= base_url(); ?>public/dist/img/horizon.jpg">
                    </a>
                </div>
            </div>
    </section>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-center"><strong>&copy; Copyright <?= date('Y'); ?></strong> | Created with <i class="fas fa-heart"></i> <strong>By Julian & Vivi</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm12">
                    <p class="text-center"><a href="https://horizon.ac.id/" target="_blank">STMIK Horizon Karawang</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url(); ?>public/dist/js2/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/js2/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url(); ?>public/dist/js2/bootstrap.min.js"></script>

    <script src="<?= base_url(); ?>public/dist/js2/script.js"></script>
</body>

</html>