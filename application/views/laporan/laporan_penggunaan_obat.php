<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Laporan Penggunaan Obat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Laporan Penggunaan Obat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel Laporan Penggunaan Obat</li>
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
                    <h4 class="text-blue h4">List Laporan Penggunaan Obat</h4>
                </div>
                <?php if (empty($tgl_awal) && empty($tgl_akhir)) { ?>
                    <form method="post" action="<?= base_url('Laporan/filter_laporan_penggunaan_obat') ?>">
                        <div class="row ml-2">
                            <div class="form-group col-md-3">
                                <label>Tanggal Kunjungan Awal</label>
                                <input type="date" name="tgl_awal" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Kunjungan Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Jenis Pasien</label><br>
                                <input type="radio" class="jenis-pasien-umum" name="jenis_pasien" value="umum"> Umum
                                <input type="radio" class="jenis-pasien-bpjs" name="jenis_pasien" value="bpjs"> BPJS <br>
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 35px;">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                <a href="<?= base_url('Laporan/cetak_laporan_penggunaan_obat') ?>" target="_blank" type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                                <?php if ($this->session->userdata('role') == 0) { ?>
                                    <a href="<?= base_url('Laporan/laporan_penggunaan_obat_owner') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } else if ($this->session->userdata('role') == 1) { ?>
                                    <a href="<?= base_url('Laporan/laporan_penggunaan_obat_admin') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } else if ($this->session->userdata('role') == 4) { ?>
                                    <a href="<?= base_url('Laporan/laporan_penggunaan_obat_petugas') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form method="post" action="<?= base_url('Laporan/filter_laporan_penggunaan_obat') ?>">
                        <div class="row ml-2">
                            <div class="form-group col-md-3">
                                <label>Tanggal Kunjungan Awal</label>
                                <input type="date" name="tgl_awal" value="<?= $tgl_awal ?>" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Kunjungan Akhir</label>
                                <input type="date" name="tgl_akhir" value="<?= $tgl_akhir ?>" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Jenis Pasien</label><br>
                                <input type="radio" class="jenis-pasien-umum" <?php echo ($jenis_pasien == 'umum') ? 'checked' : '' ?> name="jenis_pasien" value="umum"> Umum
                                <input type="radio" class="jenis-pasien-bpjs" <?php echo ($jenis_pasien == 'bpjs') ? 'checked' : '' ?> name="jenis_pasien" value="bpjs"> BPJS <br>
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 35px;">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                <a href="<?= base_url("Laporan/cetak_laporan_penggunaan_obat?tgl_awal=" . $tgl_awal . "&tgl_akhir=" . $tgl_akhir . "&jenis_pasien=" . $jenis_pasien) ?>" type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                                <?php if ($this->session->userdata('role') == 0) { ?>
                                    <a href="<?= base_url('Laporan/laporan_penggunaan_obat_owner') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } else if ($this->session->userdata('role') == 1) { ?>
                                    <a href="<?= base_url('Laporan/laporan_penggunaan_obat_admin') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                                <?php } else if ($this->session->userdata('role') == 4) { ?>
                                    <a href="<?= base_url('Laporan/laporan_penggunaan_obat_petugas') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
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
                                <th>Nama Obat</th>
                                <th>Jenis Pasien</th>
                                <th>Jumlah Obat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($laporan as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($view->tanggal)) ?></td>
                                    <td><?= $view->no_rm ?></td>
                                    <td><?= $view->nama_obat ?></td>
                                    <td><?= $view->jenis_pasien ?></td>
                                    <td><?= $view->qty ?></td>
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