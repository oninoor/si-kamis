<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/image/stethoscope.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/image/stethoscope.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/select2-4.0.6-rc.1/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/toastr/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/sweetalert2-all.js"></script>
    <script src="<?= base_url() ?>assets/sprintf.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
</head>
<style>
    .select2-selection__rendered {
        line-height: 40px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 40px !important;
    }
</style>

<body>
    <!-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="<?= base_url() ?>assets/image/logo.png" alt="" height="100" width="250"></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div> -->

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        </div>
        <div class="header-right">
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/img.jpg" alt="">
                                        <h3>John Doe</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo1.jpg" alt="">
                                        <h3>Lea R. Frith</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo2.jpg" alt="">
                                        <h3>Erik L. Richards</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo3.jpg" alt="">
                                        <h3>John Doe</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo4.jpg" alt="">
                                        <h3>Renee I. Hansen</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/img.jpg" alt="">
                                        <h3>Vicki M. Coleman</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?= base_url('assets/image/user.png') ?>" alt="">
                        </span>
                        <span class="user-name"><?= $this->session->userdata('nama_lengkap') ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="<?= base_url('Auth/logout') ?>"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="index.html">
                <img src="<?= base_url() ?>assets/image/rme.png" alt="" class="dark-logo">
                <img src="<?= base_url() ?>assets/image/rme.png" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">blank
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <?php if ($this->session->userdata('role') == '0') { ?>
                        <li class="dropdown">
                            <a href="<?= base_url('Owner') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-dashboard"></span><span class="mtext">Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Owner/petugas') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-users"></span><span class="mtext">Petugas</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Owner/pasien') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-user"></span><span class="mtext">Data Pasien</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('role') == '1') { ?>
                        <li class="dropdown">
                            <a href="<?= base_url('Admin') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-dashboard"></span><span class="mtext">Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Admin/data_pasien') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-user"></span><span class="mtext">Data Pasien</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Admin/data_kunjungan') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-stethoscope"></span><span class="mtext">Data Kunjungan</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Admin/diagnosis') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-list"></span><span class="mtext">Data Diagnosis</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Admin/tindakan') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-list"></span><span class="mtext">Data Tindakan</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('role') == '2') { ?>
                        <li class="dropdown">
                            <a href="<?= base_url('Loket') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-dashboard"></span><span class="mtext">Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Loket/pasien') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-user"></span><span class="mtext">Data Pasien</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('Loket/pendaftaran') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-edit"></span><span class="mtext">Pendaftaran</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Loket/kunjungan') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-stethoscope"></span><span class="mtext">Kunjungan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('Loket/pembayaran') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-dollar"></span><span class="mtext">Pembayaran</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('Loket/riwayat_pembayaran') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-history"></span><span class="mtext">Riwayat Pembayaran</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('role') == '3') { ?>
                        <li class="dropdown">
                            <a href="<?= base_url('Dokter') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-dashboard"></span><span class="mtext">Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Dokter/diagnosis') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-list"></span><span class="mtext">Data Diagnosis</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Dokter/tindakan') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-list"></span><span class="mtext">Data Tindakan</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Dokter/kunjungan') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-stethoscope"></span><span class="mtext">Kunjungan Pengobatan</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Dokter/kunjungan') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-history"></span><span class="mtext">Riwayat Rekam Medis</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('role') == '4') { ?>
                        <li class="dropdown">
                            <a href="<?= base_url('Obat') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-dashboard"></span><span class="mtext">Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Obat/obat') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fas fa-pills"></span><span class="mtext">Data Obat</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Obat/layanan_obat') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-medkit"></span><span class="mtext">Layanan Obat</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?= base_url('Obat/riwayat_layanan_obat') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-history"></span><span class="mtext">Riwayat Layanan Obat</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-folder"></span><span class="mtext">Laporan</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="form-basic.html">Laporan Kunjungan</a></li>
                            <li><a href="advanced-components.html">Laporan Pembayaran</a></li>
                            <li><a href="form-wizard.html">Laporan Transaksi Obat</a></li>
                            <li><a href="html5-editor.html">Laporan Obat</a></li>
                            <li><a href="form-pickers.html">Laporan Diagnosa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>