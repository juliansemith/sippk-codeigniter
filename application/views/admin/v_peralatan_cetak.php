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
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.css') ?>" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Overlayy Scrollbars -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.css') ?>">

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
            /* size: portrait; */
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
            <th>Nama Alat</th>
            <th>Merk</th>
            <th>Spek</th>
            <th>Jumlah</th>
            <th>Kondisi Baik</th>
            <th>Kondisi Rusak</th>
            <th>Sumber</th>
            <th>Keterangan</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($alat as $row) : ?>
            <tr>
                <td class="text-center" width="20"><?= $no; ?></td>
                <td><?= $row['kode_alat']; ?></td>
                <td><?= $row['nama_alat']; ?></td>
                <td><?= $row['merk']; ?></td>
                <td><?= $row['spek']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['kondisi_baik']; ?></td>
                <td><?= $row['kondisi_rusak']; ?></td>
                <td><?= $row['sumber']; ?></td>
                <td><?= $row['keterangan']; ?></td>
            </tr>
        <?php
            $no++;
        endforeach; ?>
    </table>
    <div class="ttd" style="margin-top: 50%;">
        <div style="width: 50%; text-align:center; float:right;">Karawang, 31 Desember 2021</div><br>
        <div style="width: 50%; text-align:center; float:right;"><b>PENGURUS BARANG</b></div><br><br><br><br>
        <div style="width: 50%; text-align:center; float:right; text-decoration:underline"><b>HERI PURBOYO, S.Sos</b></div><br>
        <div style="width: 50%; text-align:center; float:right;"><b>NIP.19710506 2003121 005</b></div>
    </div>

    <script type="text/javascript">
        window.print();

        var dt = new Date();
        document.getElementById("tanggal").innerHTML = dt.toLocaleDateString();
    </script>


</body>

</html>