<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <title> <?= $title ?></title>
</head>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<!-- onload="window.print();" -->

<body>

    <div bgcolor="white">
        <!-- <td><img src="<?= base_url('assets/img/lumajang.png') ?>" height="100" width="100" /></td> -->
        <font face="Times New Roman" color="black" size="4">
            <p align="center"><b> PRAKTIK UMUM dr. ALFI YUDISIANTO</b></p>
        </font>
        <font face="Times New Roman" color="black" size="4">
            <p align="center"><b>No. SIP. 440/243.DU/414/2016</b></p>
        </font>
        <font face="Times New Roman" color="black" size="4">
            <p align="center"><b>Jl. Srikaya No. 88 Kabupaten Jember 68111 </b></p>
        </font>
        <hr color="black" style="size: 3px;">

        <font face="Times New Roman" color="black" size="4">
            <p align="center"> <u> <b> LAPORAN 10 BESAR PENYAKIT </b></u>
        </font>


        <div class="table-laporan-kunjungan">
            <table>
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">No</th>
                        <th>Diagnosis ICD 10</th>
                        <th>Kode ICD 10</th>
                        <th>Jumlah Pasien</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data['10_penyakit'] as $view) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $view->diagnosis_icd_10 ?></td>
                            <td><?= $view->kode_diagnosis_icd_10 ?></td>
                            <td><?= $view->jml_gejala ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <br>
        <br>

        <font face="Times New Roman" color="black" size="4">
            <p style="margin-left: 40%;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dr. Alfi Yudisianto
            </p>
        </font>
    </div>

    <script>
        window.print();
    </script>

</html>