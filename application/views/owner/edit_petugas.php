<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Petugas</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Petugas</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Edit Petugas</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Owner/petugas') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form Edit Petugas</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('Owner/update_petugas') ?>">
                    <div class="form-group">
                        <label>Nama Lengkap <span style="color: red;">*</span></label>
                        <input type="hidden" name="id" value="<?= $edit->id ?>">
                        <input class="form-control" type="text" value="<?= $edit->nama_lengkap ?>" name="nama_lengkap" placeholder="Nama Lengkap">
                        <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="alamat" value="<?= $edit->alamat ?>" placeholder="Alamat">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>No Telepon <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="no_telp" value="<?= $edit->no_telp ?>" placeholder="No Telepon">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Role / Posisi <span style="color: red;">*</span></label>
                        <select name="role" id="role" class="form-control">
                            <option></option>
                            <option <?php if ($edit->role == 1) {
                                        echo "selected=\"selected\"";
                                    } ?> value="1">Admin</option>
                            <option <?php if ($edit->role == 2) {
                                        echo "selected=\"selected\"";
                                    } ?> value="2">Petugas Loket</option>
                            <option <?php if ($edit->role == 3) {
                                        echo "selected=\"selected\"";
                                    } ?> value="3">Dokter</option>
                            <option <?php if ($edit->role == 3) {
                                        echo "selected=\"selected\"";
                                    } ?> value="4">Petugas Obat</option>
                        </select>
                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
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