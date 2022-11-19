<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Tambah Tindakan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Tindakan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Tambah Tindakan</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Admin/tindakan') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form Tambah Tindakan</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('Admin/save_tindakan') ?>">
                    <div class="form-group">
                        <label>Tindakan <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="tindakan" placeholder="Tindakan">
                        <?= form_error('tindakan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tindakan ICD 9CM <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="tindakan_icd_9cm" placeholder="Tindakan ICD 9CM">
                        <?= form_error('tindakan_icd_9cm', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Kode Tindakan ICD 9CM</label>
                        <input class="form-control" type="text" name="kode_tindakan_icd_9cm" placeholder="Kode Tindakan ICD 9CM">
                        <?= form_error('kode_tindakan_icd_9cm', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                        <button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                    </div>
                </form>
                </code></pre>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer') ?>