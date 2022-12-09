<?php $this->load->view('partials/header_pasien') ?>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/image/pasien.png') ?>" width="200" height="200" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Selamat Datang <div class="weight-600 font-30 text-blue"><?= $this->session->userdata('nama_lengkap') ?></div>
                    </h4>
                    <p class="font-18 max-width-600">Tetap jaga kesehatan dengan makan dan berolahraga secara teratur.</p>
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
                            <div class="h4 mb-0"><?= $jumlah_pemeriksaan ?></div>
                            <div class="weight-600 font-14">Jumlah Kunjungan Anda</div>
                        </div>
                    </div>
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
                                <a class="nav-link active text-blue" data-toggle="tab" href="#home" role="tab" aria-selected="true">Data Diri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-blue" data-toggle="tab" href="#ubah_password" role="tab" aria-selected="true">Ubah Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="pd-20">
                                    <div class="row">
                                        <div class="col-md-3"><span>No Rekam Medis</span></div>
                                        <div class="col-md-9"><span>: <?= $view->no_rm ?></span></div>
                                        <div class="col-md-3 mt-3"><span>Nama Lengkap</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->nama_lengkap ?></span></div>
                                        <div class="col-md-3 mt-3"><span>Alamat</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->alamat ?></span></div>
                                        <div class="col-md-3 mt-3"><span>Tempat / Tanggal Lahir</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->tempat_lahir ?>, <?= date('d-m-Y', strtotime($view->tgl_lahir)) ?></span></div>
                                        <div class="col-md-3 mt-3"><span>Jenis Kelamin</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->jenis_kelamin ?></span></div>
                                        <div class="col-md-3 mt-3"><span>Jenis Pasien</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->jenis_pasien ?></span></div>
                                        <div class="col-md-3 mt-3"><span>No BPJS</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->no_bpjs ?></span></div>
                                        <div class="col-md-3 mt-3"><span>No Telepon</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->no_telp ?></span></div>
                                        <div class="col-md-3 mt-3"><span>Pekerjaan</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->pekerjaan ?></span></div>
                                        <div class="col-md-3 mt-3"><span>Pendidikan Terakhir</span></div>
                                        <div class="col-md-9 mt-3"><span>: <?= $view->pendidikan_terakhir ?></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="ubah_password" role="tabpanel">
                                <div class="pd-20">
                                    <form action="<?= base_url('Pasien/save_password_baru') ?>" method="post">
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label>No RM</label>
                                                <input type="text" name="no_rm" value="<?= $view->no_rm ?>" readonly class="form-control">
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label>Password Baru</label>
                                                <input type="password" name="password" class="form-control">
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label>Konfirmasi Password Baru</label>
                                                <input type="password" name="konfirm_password" class="form-control">
                                                <?= form_error('konfirm_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Password Baru</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if ($this->session->flashdata('akun_tidak_ada')) : ?>
        toastr.warning("akun dengan no rekam medis tersebut tidak ditemukan", "Catatan!", {
            positionClass: "toast-top-right",
            timeOut: 4000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })

        <?php elseif ($this->session->flashdata('success_ubah_password')) : ?>
        toastr.success("password berhasil diperbarui", "Berhasil!", {
            positionClass: "toast-top-right",
            timeOut: 5000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })
    <?php endif ?>
</script>
<?php $this->load->view('partials/footer2') ?>
