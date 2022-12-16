<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Riwayat Rekam Medis</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Riwaya Rekam Medis</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Riwayat Rekam Medis</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <!-- <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Loket/tambah_pendaftaran') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Pendaftaran</a>
                    </div> -->
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Isikan No Rekam Medis</h4>
                </div>
                <div class="pd-20">
                    <form action="<?= base_url('Dokter/action_rekam_medis') ?>" method="post">
                        <div class="row">
                            <div class="form-group col-4">
                                <label>No Rekam Medis</label>
                                <input type="text" name="no_rm" class="form-control" placeholder="Ketikkan No Rekam Medis">
                                <?= form_error('no_rm', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-2" style="margin-top: 33px;">
                                <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer2') ?>