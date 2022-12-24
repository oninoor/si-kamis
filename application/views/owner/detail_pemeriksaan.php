<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Detail Pemeriksaan Pasien</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pemeriksaan Pasien</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Pemeriksaan Pasien</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Owner/data_pemeriksaan') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="pd-20 card-box">
                        <h5 class="h4 text-blue mb-20">Detail Pemeriksaan</h5>
                        <div class="tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-blue" data-toggle="tab" href="#home" role="tab" aria-selected="true">Detail Medis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-blue" data-toggle="tab" href="#detail_medis" role="tab" aria-selected="false">Detail Diagnosa dan Tindakan</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="pd-20">
                                        <p>No Rekam Medis &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->no_rekmed ?></p>
                                        <p>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->nama_lengkap ?></p>
                                        <p>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $view->alamat ?></p>
                                        <p>No Telepon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp; : <?= $view->no_telp ?></p>
                                        <p>Dokter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->nama_dokter ?>
                                        </p>
                                        <p>Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= date('d F Y', strtotime($view->tanggal)) ?>
                                        </p>
                                        <p>No Antrian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;: <?= $view->no_antrian ?>
                                        </p>
                                        <p>Tinggi Badan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;: <?= $view->tinggi_badan ?> cm</p>
                                        <p>Berat Badan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $view->berat_badan ?> kg</p>
                                        <p>Suhu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->suhu ?>&deg; celcius
                                        </p>
                                        <p>Tekanan Darah Sistole &nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->tekanan_darah_sistole ?></p>
                                        <p>Tekanan Darah Diastole &nbsp;&nbsp;: <?= $view->tekanan_darah_diastole ?></p>
                                        <p>Nadi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $view->nadi ?> / menit
                                        </p>
                                        <p>
                                            Gejala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $view->gejala ?>
                                        </p>
                                        <p>
                                            Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php
                                                                                        if ($view->status == 0) {
                                                                                            echo "<span class='badge badge-pill badge-secondary' style='color: white;'>Pendaftaran</span>";
                                                                                        } else if ($view->status == 1) {
                                                                                            echo "<span class='badge badge-pill badge-warning' style='color: white;'>Pemeriksaan Dokter</span>";
                                                                                        } else if ($view->status == 2) {
                                                                                            echo "<span class='badge badge-pill badge-info' style='color: white;'>Pengambilan Obat</span>";
                                                                                        } else if ($view->status == 3) {
                                                                                            echo "<span class='badge badge-pill badge-primary' style='color: white;'>Pembayaran</span>";
                                                                                        } else if ($view->status == 4) {
                                                                                            echo "<span class='badge badge-pill badge-success' style='color: white;'>Selesai</span>";
                                                                                        }

                                                                                        ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="detail_medis" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="row">
                                            <?php if (empty($view1)) { ?>
                                                <div class="col-md-3"><span>Diagnosis 1</span></div>
                                                <div class="col-md-9"><span>: -</span></div>
                                                <div class="col-md-3 mt-3"><span>Diagnosis ICD 10</span></div>
                                                <div class="col-md-9 mt-3"><span>: -</span></div>
                                                <div class="col-md-3 mt-3"><span>Kode Diagnosis ICD 10</span></div>
                                                <div class="col-md-9 mt-3"><span>: -</span></div>
                                            <?php } else { ?>
                                                <div class="col-md-3"><span>Diagnosis 1</span></div>
                                                <div class="col-md-9"><span>: <?= $view1->nama_diagnosis ?></span></div>
                                                <div class="col-md-3 mt-3"><span>Diagnosis ICD 10</span></div>
                                                <div class="col-md-9 mt-3"><span>: <?= $view1->diagnosis_icd_10 ?></span></div>
                                                <div class="col-md-3 mt-3"><span>Kode Diagnosis ICD 10</span></div>
                                                <div class="col-md-9 mt-3"><span>: <?= $view1->kode_diagnosis_icd_10 ?></span></div>
                                            <?php }
                                            if (empty($view2)) { ?>
                                                <div class="col-md-3"><span>Diagnosis 1</span></div>
                                                <div class="col-md-9"><span>: -</span></div>
                                                <div class="col-md-3 mt-3"><span>Diagnosis ICD 10</span></div>
                                                <div class="col-md-9 mt-3"><span>: -</span></div>
                                                <div class="col-md-3 mt-3"><span>Kode Diagnosis ICD 10</span></div>
                                                <div class="col-md-9 mt-3"><span>: -</span></div>
                                            <?php } else { ?>
                                                <div class="col-md-3 mt-3"><span>Diagnosis 2</span></div>
                                                <div class="col-md-9 mt-3"><span>: <?= $view2->nama_diagnosis ?></span></div>
                                                <div class="col-md-3 mt-3"><span>Diagnosis ICD 10</span></div>
                                                <div class="col-md-9 mt-3"><span>: <?= $view2->diagnosis_icd_10 ?></span></div>
                                                <div class="col-md-3 mt-3"><span>Kode Diagnosis ICD 10</span></div>
                                                <div class="col-md-9 mt-3"><span>: <?= $view2->kode_diagnosis_icd_10 ?></span></div>
                                            <?php } ?>
                                            <?php $no = 1;
                                            foreach ($diagnosis as $tampil) { ?>
                                                <div class="col-md-3 mt-3"><span>Tindakan <?= $no++ ?></span></div>
                                                <div class="col-md-9 mt-3"><span>: <?= $tampil->tindakan ?></span></div>
                                                <div class="col-md-3 mt-3"><span>Tindakan ICD 9cm</span></div>
                                                <div class="col-md-9 mt-3"><span>: <?= $tampil->tindakan_icd_9cm ?></span></div>
                                                <div class="col-md-3 mt-3"><span>Kode Tindakan ICD 9cm</span></div>
                                                <div class="col-md-9 mt-3"><span>: <?= $tampil->kode_tindakan_icd_9cm ?></span></div>
                                            <?php } ?>
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