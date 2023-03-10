<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Laporan 10 Besar Penyakit / Diagnosa</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Laporan 10 Besar Penyakit / Diagnosa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel Laporan 10 Besar Penyakit / Diagnosa</li>
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
                    <h4 class="text-blue h4">List Laporan 10 Besar Penyakit / Diagnosa</h4>
                    <br>
                    <a href="<?= base_url('Laporan/cetak_laporan_10_penyakit') ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a> 
                </div>
                <div class="pb-20 mt-4">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Diagnosis ICD 10</th>
                                <th>Kode ICD 10</th>
                                <th>Jumlah</th>
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
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer') ?>