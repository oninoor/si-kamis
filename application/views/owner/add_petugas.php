<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Tambah Petugas</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Petugas</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Tambah Petugas</li>
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
                        <h4 class="text-blue h4">Form Tambah Petugas</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('Owner/save_petugas') ?>">
                    <div class="form-group">
                        <label>Nama Lengkap <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="nama_lengkap" placeholder="Nama Lengkap">
                        <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>No Telepon <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="no_telp" placeholder="No Telepon">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Username <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Password <span style="color: red;">*</span></label>
                        <input type="password" class="form-control password" name="password" placeholder="*****">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Role / Posisi <span style="color: red;">*</span></label>
                        <select name="role" id="role" class="form-control">
                            <option></option>
                            <option value="1">Admin</option>
                            <option value="2">Petugas Loket</option>
                            <option value="3">Dokter</option>
                            <option value="4">Petugas Obat</option>
                        </select>
                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="form-check ml-3">
                            <input type="checkbox" class="form-check-input form-checkbox" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lihat Password</label>
                        </div>
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
<script>
    $(document).ready(function() {
        //untuk memanggil plugin select2
        $('#role').select2({
            placeholder: 'Pilih Role / Posisi',
        });

    });

    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.password').attr('type', 'text');
            } else {
                $('.password').attr('type', 'password');
            }
        });
    });
</script>