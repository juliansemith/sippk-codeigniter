<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="stylesheet" href="<?= base_url('public/dist/css/style.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- ICON -->
    <link rel="icon" href="<?= base_url('public/dist/img/BPBD.png') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.css') ?>" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/sweetalert2/sweetalert2.min.css') ?>">
    <!-- Overlayy Scrollbars -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.css') ?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->


    <!-- Load Paper.css for happy printing -->


    <!-- Set page size here : A5, A4, or A3 -->
    <!-- Set also "landscape" if you need -->
    <style type="text/css">
        @media print and (width: 8.5in) and (height: 11in) {
            @page {
                margin: 0cm;

            }
        }

        .justify {
            text-align: justify;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            text-align: center;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }

        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -20px;
        }

        #lead {
            width: auto;
            position: relative;
            margin: 15px 0 0 55%;
        }
    </style>

    <style>
        @page {
            size: auto;
            margin: 0mm;
        }

        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body class="A4 potrait">
    <img src="<?= base_url(); ?>public/dist/img/BPBD.png" style="position: absolute; width:85px; height:auto; margin-top:14px">

    <center>
        <font size="5px"><b>BADAN PENANGGULANGAN BENCANA DAERAH</b></font><br />
        <font size="5px"><b>KABUPATEN KARAWANG</b></font><br />
        <font size="4px"><b>Alamat : Jl. Mangga No.13, Nagasari, Kec. Karawang Bar., Kabupaten Karawang, Jawa Barat 41314. </b></font><br />
    </center>
    <hr size="1px">
    <center>
        <font size="5px"><b>LAPORAN PERALATAN KEBENCANAAN</b></font>
        <hr width="400px">
    </center>

    <br>
    <table class="table table-hovered">
        <tr>
            <th>No</th>
            <th>Kode Alat</th>
            <th>Kode Peminjam</th>
            <th>Nama Alat</th>
            <th>Peminjam Alat</th>
            <th>Tanggal Mulai Pinjam</th>
            <th>Tanggal Sampai Pinjam</th>
            <th>Status</th>
        </tr>
        <?php $no = 1;
        foreach ($peminjaman as $row) :
        ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['kode_alat']; ?></td>
                <td><?= $row['kode_peminjam']; ?></td>
                <td><?= $row['nama_alat']; ?></td>
                <td><?= $row['nama_peminjam']; ?></td>
                <td><?= date('d-m-Y', strtotime($row['tanggal_mulai'])); ?></td>
                <td><?= date('d-m-Y', strtotime($row['tanggal_sampai'])); ?></td>
                <td>
                    <center>
                        <?php
                        if ($row['status'] == "1") {
                            echo "<div class='badge badge-success'>Selesai</div>";
                        } else if ($row['status'] == "2") {
                            echo "<div class='badge badge-success'>Dipinjam</div>";
                        }
                        ?>
                    </center>
                </td>
            </tr>
        <?php
            $no++;
        endforeach; ?>
    </table>
    <!-- <div style="width: 50%; text-align:center; float:right; position:absolute; bottom:0;">Karawang, 20 Januari 2021</div><br> -->
    <div class="ttd" style="margin-top: 50%;">
        <div style="width: 50%; text-align:center; float:right;">Karawang, 31 Desember 2021</div><br>
        <div style="width: 50%; text-align:center; float:right;"><b>PENGURUS BARANG</b></div><br><br><br><br>
        <div style="width: 50%; text-align:center; float:right; text-decoration:underline"><b>HERI PURBOYO, S.Sos</b></div><br>
        <div style="width: 50%; text-align:center; float:right;"><b>NIP.19710506 2003121 005</b></div>
    </div>

    <script type=" text/javascript">
        window.print();

        var dt = new Date();
        document.getElementById("tanggal").innerHTML = dt.toLocaleDateString();
    </script>
</body>

</html>