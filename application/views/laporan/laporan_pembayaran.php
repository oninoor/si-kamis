<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Laporan Pembayaran</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Laporan Pembayaran</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel Laporan Pembayaran</li>
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
                    <h4 class="text-blue h4">List Laporan Pembayaran</h4>
                </div>
                <?php if (empty($tgl_awal) && empty($tgl_akhir)) { ?>
                    <form method="post" action="<?= base_url('Laporan/filter_laporan_pembayaran') ?>">
                        <div class="row ml-2">
                            <div class="form-group col-md-3">
                                <label>Tanggal Kunjungan Awal</label>
                                <input type="date" name="tgl_awal" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Kunjungan Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control">
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 35px;">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                <a href="<?= base_url('Laporan/cetak_laporan_pembayaran') ?>" type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                                <?php if ($this->session->userdata('role') == 0) { ?>
                                    <a href="<?= base_url('Laporan/laporan_pembayaran_owner') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } else if ($this->session->userdata('role') == 1) { ?>
                                    <a href="<?= base_url('Laporan/laporan_pembayaran_admin') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } else if ($this->session->userdata('role') == 2) { ?>
                                    <a href="<?= base_url('Laporan/laporan_pembayaran_loket') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form method="post" action="<?= base_url('Laporan/filter_laporan_pembayaran') ?>">
                        <div class="row ml-2">
                            <div class="form-group col-md-3">
                                <label>Tanggal Kunjungan Awal</label>
                                <input type="date" name="tgl_awal" value="<?= $tgl_awal ?>" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Kunjungan Akhir</label>
                                <input type="date" name="tgl_akhir" value="<?= $tgl_akhir ?>" class="form-control">
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 35px;">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                <a href="<?= base_url("Laporan/cetak_laporan_pembayaran?tgl_awal=" . $tgl_awal . "&tgl_akhir=" . $tgl_akhir) ?>" type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                                <?php if ($this->session->userdata('role') == 0) { ?>
                                    <a href="<?= base_url('Laporan/laporan_pembayaran_owner') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } else if ($this->session->userdata('role') == 1) { ?>
                                    <a href="<?= base_url('Laporan/laporan_pembayaran_admin') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } else if ($this->session->userdata('role') == 2) { ?>
                                    <a href="<?= base_url('Laporan/laporan_pembayaran_loket') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                <?php } ?>
                <div class="pd-20">
                    <p>Jumlah Kunjungan : <?= $jumlah ?></p>
                </div>
                <hr>
                <div class="pb-20 mt-4">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Tanggal Kunjungan</th>
                                <th>No Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Total Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($laporan as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($view->tanggal_kunjungan)) ?></td>
                                    <td><?= $view->no_rekmed ?></td>
                                    <td><?= $view->nama_pasien ?></td>
                                    <td><?= $view->total_biaya ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer') ?>