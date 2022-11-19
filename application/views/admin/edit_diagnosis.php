<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Diagnosis</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Diagnosis</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Edit Diagnosis</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Admin/diagnosis') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form Edit Diagnosis</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('Admin/update_diagnosis') ?>">
                    <div class="form-group">
                        <label>Diagnosis <span style="color: red;">*</span></label>
                        <input type="hidden" value="<?= $edit->id ?>" name="id">
                        <input class="form-control" value="<?= $edit->nama_diagnosis ?>" type="text" name="nama_diagnosis" placeholder="Diagnosis">
                        <?= form_error('nama_diagnosis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Diagnosis ICD 10 <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" value="<?= $edit->diagnosis_icd_10 ?>" name="diagnosis_icd_10" placeholder="Diagnosis ICD 10">
                        <?= form_error('diagnosis_icd_10', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Kode Diagnosis ICD 10</label>
                        <input class="form-control" type="text" value="<?= $edit->kode_diagnosis_icd_10 ?>" name="kode_diagnosis_icd_10" placeholder="Kode Diagnosis ICD 10">
                        <?= form_error('kode_diagnosis_icd_10', '<small class="text-danger pl-3">', '</small>'); ?>
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