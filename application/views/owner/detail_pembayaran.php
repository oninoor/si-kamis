<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Detail Pembayaran</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pembayaran</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Pembayaran</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Owner/data_pembayaran') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="pd-20 card-box">
                        <h5 class="h4 text-blue mb-20">Detail Pembayaran</h5>
                        <div class="tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-blue" data-toggle="tab" href="#home" role="tab" aria-selected="true">Detail Pembayaran</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="row">
                                            <div class="col-md-3"><span>Kode Kunjungan</span></div>
                                            <div class="col-md-9"><span>: <?= $view->kode_kunjungan ?></span></div>
                                            <div class="col-md-3 mt-3"><span>No Rekam Medis</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view->no_rekmed ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Nama Pasien</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view->nama_pasien ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Dokter</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view2->nama_dokter ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Tanggal Transaksi</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= date('d-m-Y', strtotime($view->tgl_payment)) ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Petugas Obat</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view->nama_petugas ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Total Pembayaran</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= 'Rp. ' . number_format($view->total_biaya) ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Nominal Dibayar</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= 'Rp. ' . number_format($view->nominal_bayar) ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Nominal Kembalian</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= 'Rp. ' . number_format($view->nominal_kembalian) ?></span></div>
                                        </div>
                                        <div class="row mt-4">
                                            <h6>List Detail Pembayaran</h6>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Biaya</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?= '1' ?></td>
                                                        <td>Pelayanan Obat</td>
                                                        <td><?= $obat->total_biaya ?></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 2;
                                                    foreach ($detail as $tampil) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $tampil->keterangan ?></td>
                                                            <td><?= $tampil->biaya ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer') ?>