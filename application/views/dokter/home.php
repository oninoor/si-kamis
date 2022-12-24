<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/image/image-dashboard.png') ?>" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Selamat Datang <div class="weight-600 font-30 text-blue"><?= $this->session->userdata('username') ?></div>
                    </h4>
                    <p class="font-18 max-width-600">Semangat dan selalu menjadi profesional dan menjadi kebanggan untuk diri sendiri.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <!-- <div class="progress-data">
                            <div id="chart"></div>
                        </div> -->
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $total_kunjungan ?></div>
                            <div class="weight-600 font-14">Jumlah Kunjungan</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <!-- <div class="progress-data">
                            <div id="chart2"></div>
                        </div> -->
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $total_perhari ?></div>
                            <div class="weight-600 font-14">Jumlah Kunjungan Hari Ini</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer') ?>