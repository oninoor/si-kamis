<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Kunjungan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Kunjungan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel List Kunjungan</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <!-- <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Loket/tambah_Kunjungan') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Kunjungan</a>
                    </div> -->
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">List Data Kunjungan</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Kode</th>
                                <th>No Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal</th>
                                <th>Dokter</th>
                                <th>No Antrian</th>
                                <th>Status</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kunjungan as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= $view->kd_kunjungan ?></td>
                                    <td><?= $view->no_rm ?></td>
                                    <td><?= $view->nama_lengkap ?></td>
                                    <td><?= date('d F Y', strtotime($view->tanggal)) ?></td>
                                    <td><?= $view->nama_dokter ?></td>
                                    <td><?= $view->no_antrian ?></td>
                                    <td>
                                        <?php
                                        if ($view->status == 0) {
                                            echo "<span class='badge badge-secondary' style='color: white;'>Pendaftaran</span>";
                                        } else if ($view->status == 1) {
                                            echo "<span class='badge badge-warning' style='color: white;'>Pemeriksaan Dokter</span>";
                                        } else if ($view->status == 2) {
                                            echo "<span class='badge badge-info' style='color: white;'>Pengambilan Obat</span>";
                                        } else if ($view->status == 3) {
                                            echo "<span class='badge badge-primary' style='color: white;'>Pembayaran</span>";
                                        } else if ($view->status == 4) {
                                            echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('Loket/detail_kunjungan/' . $view->kd_kunjungan) ?>" title="detail kunjungan" class="badge bg-success" style="color: white;"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($kunjungan as $detail) { ?>
    <div class="modal fade" id="detail<?= $detail->kd_kunjungan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Kunjungan Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tinggi Badan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $gejala->tinggi_badan ?> cm</p>
                    <p>Berat Badan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $gejala->berat_badan ?> kg</p>
                    <p>Suhu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $gejala->suhu ?>&deg; celcius
                    </p>
                    <p>Tekanan Darah Sistole &nbsp;&nbsp;&nbsp;: <?= $gejala->tekanan_darah_sistole ?></p>
                    <p>Tekanan Darah Diastole &nbsp;: <?= $gejala->tekanan_darah_diastole ?></p>
                    <p>Nadi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $gejala->nadi ?> / menit
                    </p>
                    <p>Gejala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; : <?= $gejala->gejala ?>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php $this->load->view('partials/footer') ?>