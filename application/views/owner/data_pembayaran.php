<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Pembayaran</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pembayaran</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel List Data Pembayaran</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">List Data Pembayaran</h4>
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
                                <th>Petugas Loket</th>
                                <th>Total Pembayaran</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($riwayat as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= $view->kode_kunjungan ?></td>
                                    <td><?= $view->no_rekmed ?></td>
                                    <td><?= $view->nama_pasien ?></td>
                                    <td><?= date('d F Y', strtotime($view->tgl_payment)) ?></td>
                                    <td><?= $view->nama_petugas ?></td>
                                    <td><?= 'Rp. ' . number_format($view->total_biaya) ?></td>
                                    <td>
                                        <a href="<?= base_url('Owner/detail_pembayaran/' . $view->id) ?>" title="Detail Pembayaran" class="badge bg-success" style="color: white;"><i class="fa fa-eye"></i></a>
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

<?php $this->load->view('partials/footer') ?>