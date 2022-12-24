<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Riwayat Rekam Medis (<?= $data_rekmed[0]->nama_lengkap ?>)</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Riwaya Rekam Medis</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Riwayat Rekam Medis</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Owner/riwayat_rekam_medis') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <?php $no = 1;
            foreach ($data_rekmed as $rekmed) { ?>
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Kunjungan ke <?= $no++ ?></h4>
                    </div>
                    <div class="pd-20">
                        <div class="row">
                            <div class="col-md-3">
                                <p>No Rekam Medis</p>
                                <p>Nama</p>
                                <p>Dokter</p>
                                <p>Tanggal</p>
                                <p>Waktu</p>
                                <p>Tinggi Badan</p>
                                <p>Berat Badan</p>
                                <p>Suhu</p>
                                <p>Tekanan Darah Sistole</p>
                                <p>Tekanan Darah Diastole</p>
                                <p>Nadi</p>
                                <p>Gejala</p>
                                <p>Status</p>
                                <p>Diagnosa</p>
                                <p>Tindakan</p>
                                <p>Terapi Obat</p>
                            </div>
                            <div class="col-md-9">
                                <p>: <?= $rekmed->no_rekmed ?></p>
                                <p>: <?= $rekmed->nama_lengkap ?></p>
                                <p>: <?= $rekmed->nama_dokter ?></p>
                                <p>: <?= date('d-m-Y', strtotime($rekmed->tanggal)) ?></p>
                                <p>: <?= date('H:i', strtotime($rekmed->waktu)) . ' WIB' ?></p>
                                <p>: <?= $rekmed->tinggi_badan ?></p>
                                <p>: <?= $rekmed->berat_badan ?></p>
                                <p>: <?= $rekmed->suhu ?></p>
                                <p>: <?= $rekmed->tekanan_darah_sistole ?></p>
                                <p>: <?= $rekmed->tekanan_darah_diastole ?></p>
                                <p>: <?= $rekmed->nadi ?></p>
                                <p>: <?= $rekmed->gejala ?></p>
                                <p>: <?= $rekmed->status ?></p>
                                <p>: <a href="#data_diagnosa<?= $rekmed->kd_kunjungan ?>" data-toggle="modal" class="text-primary">Diagnosa</a></p>
                                <p>: <a href="#tindakan<?= $rekmed->kd_kunjungan ?>" data-toggle="modal" class="text-primary">Tindakan</a></p>
                                <p>: <?= $rekmed->terapi_obat ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php foreach ($diagnosis as $view) { ?>
    <div class="modal fade" id="data_diagnosa<?= $view->kd_kunjungan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Diagnosis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Diagnosis 1</p>
                            <p>Diagnosis ICD 10</p>
                            <p>Kode Diagnosis ICD 10</p>
                        </div>
                        <div class="col-md-8">
                            <p>: <?= $view->nama_diagnosis ?></p>
                            <p>: <?= $view->diagnosis_icd_10 ?></p>
                            <p>: <?= $view->kode_diagnosis_icd_10 ?></p>
                        </div>
                        <hr>
                        <?php
                        $diagnosis2 = $this->db->select('kunjungan.*, diagnosis.nama_diagnosis, diagnosis.diagnosis_icd_10, diagnosis.kode_diagnosis_icd_10')
                            ->from('kunjungan')
                            ->join('diagnosis', 'kunjungan.kd_diagnosa2 = diagnosis.id')
                            ->where('kunjungan.kd_kunjungan', $view->kd_kunjungan)->get()->row();
                        ?>
                        <div class="col-md-4 mt-2">
                            <p>Diagnosis 2</p>
                            <p>Diagnosis ICD 10</p>
                            <p>Kode Diagnosis ICD 10</p>
                        </div>
                        <div class="col-md-8">
                            <p>: <?= $diagnosis2->nama_diagnosis ?></p>
                            <p>: <?= $diagnosis2->diagnosis_icd_10 ?></p>
                            <p>: <?= $diagnosis2->kode_diagnosis_icd_10 ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($data_rekmed as $data) { ?>
    <div class="modal fade" id="tindakan<?= $data->kd_kunjungan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Tindakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php

                        $tindakan = $this->db->select('dkt.kode_tindakan, tindakan.*')
                            ->from('det_kunjungan_tindakan dkt')
                            ->join('tindakan', 'dkt.kode_tindakan = tindakan.id')
                            ->where('dkt.kode_kunjungan', $data->kd_kunjungan)
                            ->get()->result();

                        ?>

                        <?php $no = 1; foreach ($tindakan as $view) { ?>
                            <div class="col-md-4">
                                <p>Tindakan <?= $no++ ?></p>
                                <p>Tindakan ICD 9 cm</p>
                                <p>Kode Tindakan ICD 9 cm</p>
                            </div>
                            <div class="col-md-8">
                                <p>: <?= $view->tindakan ?></p>
                                <p>: <?= $view->tindakan_icd_9cm ?></p>
                                <p>: <?= $view->kode_tindakan_icd_9cm ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php $this->load->view('partials/footer') ?>