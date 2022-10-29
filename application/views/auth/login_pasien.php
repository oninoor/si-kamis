<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/image/stethoscope.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/image/stethoscope.png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/login_pasien/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/login_pasien/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login_pasien/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login_pasien/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/toastr/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>

    <title>Login Pasien</title>
</head>

<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>

<body>



    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                <div class="mb-4">
                                    <img class="center" src="<?= base_url('assets/image/rme.png') ?>" height="150" width="200">
                                    <h3>Login pasien ke <strong>RME</strong></h3>
                                </div>
                                <form action="<?= base_url('Auth/action_login_pasien') ?>" method="post">
                                    <div class="form-group first">
                                        <label for="username">No Rekam Medis</label>
                                        <input type="text" class="form-control" name="no_rm" id="no_rm">

                                    </div>
                                    <div class="form-group last mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control password" name="password" id="password">

                                    </div>

                                    <div class="d-flex mb-5 align-items-center">
                                        <label class="control control--checkbox mb-0"><span class="caption">Lihat Password</span>
                                            <input type="checkbox" class="form-checkbox" />
                                            <div class="control__indicator"></div>
                                        </label>
                                    </div>

                                    <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/login_pasien/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/login_pasien/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/login_pasien/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/login_pasien/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.password').attr('type', 'text');
                } else {
                    $('.password').attr('type', 'password');
                }
            });
        });



        <?php if ($this->session->flashdata('no_rm_kosong')) : ?>
            toastr.warning("No rekam medis harus diisi", "Catatan!", {
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

        <?php elseif ($this->session->flashdata('no_rm_salah')) : ?>
            toastr.warning("Silahkan masukkan no rekam medis yang benar", "No rekam medis anda salah!", {
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