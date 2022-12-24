<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Login Untuk Akses</title>

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
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/toastr/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="<?= base_url('/') ?>">
                    <img src="<?= base_url() ?>assets/image/rme.png" alt="">
                </a>
            </div>
            <!-- <div class="login-menu">
                <ul>
                    <li><a href="register.html">Login</a></li>
                </ul>
            </div> -->
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?= base_url() ?>assets/image/bg-login.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Masuk untuk akses RME</h2>

                        </div>
                        <form action="<?= base_url('Auth/login') ?>" method="POST">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username...">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" autocomplete="current-password" id="id_password" placeholder="Password...">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-eye" title="lihat password" id="togglePassword"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-signin"><i class="fa fa-sign-in"></i> Sign In</button>
                                        <!-- <input type="button" onclick="bunyi();" value="Tekan Bel" /> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/scripts/core.js"></script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/scripts/process.js"></script>
    <script src="<?= base_url() ?>assets/vendors/scripts/layout-settings.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });



        function bunyi() {
            var bel = new Audio('https://www.meramukoding.com/wp-content/uploads/2020/05/doorbell.mp3');
            bel.currentTime = 0;
            bel.play();
        }

        <?php if ($this->session->flashdata('username_kosong')) : ?>
            toastr.warning("Username harus diisi", "Catatan!", {
                positionClass: "toast-top-right",
                timeOut: 3000,
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

        <?php elseif ($this->session->flashdata('username_salah')) : ?>
            toastr.warning("Silahkan masukkan username yang benar", "Username anda salah!", {
                positionClass: "toast-top-right",
                timeOut: 3000,
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

        <?php elseif ($this->session->flashdata('password_kosong')) : ?>
            toastr.warning("Password harus diisi", "Catatan!", {
                positionClass: "toast-top-right",
                timeOut: 3000,
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

        <?php elseif ($this->session->flashdata('password_salah')) : ?>
            toastr.warning("Silahkan masukkan password yang benar", "Password anda salah!", {
                positionClass: "toast-top-right",
                timeOut: 3000,
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

        <?php elseif ($this->session->flashdata('akun_nonaktif')) : ?>
            toastr.warning("Akun anda belum aktif", "Catatan!", {
                positionClass: "toast-top-right",
                timeOut: 3000,
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

        <?php elseif ($this->session->flashdata('berhasil_login')) : ?>
            toastr.success("Berhasil login", "Selamat!", {
                positionClass: "toast-top-right",
                timeOut: 3000,
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

        <?php elseif ($this->session->flashdata('logout')) : ?>
            toastr.success("Berhasil logout", "Selamat!", {
                positionClass: "toast-top-right",
                timeOut: 3000,
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

        <?php elseif ($this->session->flashdata('login_dulu')) : ?>
            toastr.warning("Silahkan login terlebih dahulu", "Catatan!", {
                positionClass: "toast-top-right",
                timeOut: 3000,
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
</body>

</html>