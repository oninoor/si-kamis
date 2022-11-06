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
				<a href="login.html">
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
					<div class="login-title">
						<h2 class="text-center text-primary">Selamat Datang </h2>
						<h2 class="text-center text-primary">Rekam Medis Elektronik</h2>
						<h2 class="text-center text-primary">dr. Alfi Yudisianto</h2>
						<p class="text-center text-primary">Silahkan pilih akun anda</p>
					</div>
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="row">
							<div class="col-lg-3">
								<a href="<?= base_url('Auth') ?>"><img src="<?= base_url('assets/image/petugas.png') ?>"></a>
							</div>
							<div class="col-lg-7">
								<a href="<?= base_url('Auth') ?>" class="text-primary" style="font-size: 25px; font-weight: bold;">Petugas</a>
								<p class="text-primary">Login sebagai petugas</p>
							</div>
							<div class="col-lg-2">
								<a href="<?= base_url('Auth') ?>"><i class="fa fa-chevron-right" style="font-size: 50px; color: blue;"></i></a>
							</div>
						</div>
					</div>
					<div class="login-box bg-white box-shadow border-radius-10 mt-4">
						<div class="row">
							<div class="col-lg-3">
								<a href="<?= base_url('Auth/login_pasien') ?>"><img src="<?= base_url('assets/image/pasien.png') ?>"></a>
							</div>
							<div class="col-lg-7">
								<a href="<?= base_url('Auth/login_pasien') ?>" class="text-primary" style="font-size: 25px; font-weight: bold;">Pasien</a>
								<p class="text-primary">Login sebagai pasien</p>
							</div>
							<div class="col-lg-2">
								<a href="<?= base_url('Auth/login_pasien') ?>"><i class="fa fa-chevron-right" style="font-size: 50px; color: blue;"></i></a>
							</div>
						</div>
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
</body>

</html>