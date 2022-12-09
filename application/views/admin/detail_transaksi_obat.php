<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Detail Transaksi Obat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Transaksi Obat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Transaksi Obat</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Admin/data_transaksi_obat') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="pd-20 card-box">
                        <h5 class="h4 text-blue mb-20">Detail Transaksi Obat</h5>
                        <div class="tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-blue" data-toggle="tab" href="#home" role="tab" aria-selected="true">Data Transaksi Obat</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="row">
                                            <div class="col-md-3"><span>Kode Kunjungan</span></div>
                                            <div class="col-md-9"><span>: <?= $view->kd_kunjungan ?></span></div>
                                            <div class="col-md-3 mt-3"><span>No Rekam Medis</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view->no_rekmed ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Nama Pasien</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view->nama_pasien ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Jenis Pasien</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view->jenis_pasien ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Dokter</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view2->nama_dokter ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Tanggal Transaksi</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= date('d-m-Y', strtotime($view->tgl_trans)) ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Petugas Obat</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= $view->nama_petugas ?></span></div>
                                            <div class="col-md-3 mt-3"><span>Total Biaya Obat</span></div>
                                            <div class="col-md-9 mt-3"><span>: <?= 'Rp. ' . number_format($view->total_biaya) ?></span></div>
                                        </div>
                                        <div class="row mt-4">
                                            <h6>List obat pada transaksi</h6>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Obat</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; foreach ($detail as $tampil) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $tampil->nama_obat ?></td>
                                                            <td><?= $tampil->qty ?></td>
                                                            <td><?= 'Rp. ' . number_format($tampil->subtotal) ?></td>
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