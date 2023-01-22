<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Pendaftaran Kunjungan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pendaftaran Kunjungan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel List Pendaftaran Kunjungan</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Loket/tambah_pendaftaran') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Pendaftaran Kunjungan</a>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">List Data Pendaftaran Kunjungan</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Kode</th>
                                <th>No Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal</th>
                                <th>Dokter</th>
                                <th>No Antrian</th>
                                <!-- <th>Jenis Kelamin</th> -->
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pendaftaran as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= $view->kd_kunjungan ?></td>
                                    <td><?= $view->no_rm ?></td>
                                    <td><?= $view->nama_lengkap ?></td>
                                    <td><?= date('d F Y', strtotime($view->tanggal)) ?></td>
                                    <td><?= $view->nama_dokter ?></td>
                                    <td><?= $view->no_antrian ?></td>
                                    <td>
                                        <a href="#gejala<?= $view->kd_kunjungan ?>" data-toggle="modal" title="lihat detail" class="badge bg-success" style="color: white;"><i class="fa fa-eye"></i></a>
                                        <a href="<?= base_url('Loket/masuk_pemeriksaan/' . $view->kd_kunjungan) ?>" title="Masuk Pemeriksaan" class="badge bg-primary masuk-pemeriksaan" style="color: white;"><i class="fa fa-stethoscope"></i></a>
                                        <a href="<?= base_url('Loket/edit_pendaftaran/' . $view->kd_kunjungan) ?>" title="Edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                        <a href="<?= base_url('Loket/hapus_pendaftaran/' . $view->kd_kunjungan) ?>" title="Hapus" class="badge bg-danger hapus-data" style="color: white;"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($pendaftaran as $gejala) { ?>
    <div class="modal fade" id="gejala<?= $gejala->kd_kunjungan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gejala Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tinggi Badan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $gejala->tinggi_badan ?> cm</p>
                    <p>Berat Badan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $gejala->berat_badan ?> kg</p>
                    <p>Suhu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $gejala->suhu ?>&deg; celcius
                    </p>
                    <p>Tekanan Darah Sistole &nbsp;&nbsp;&nbsp;: <?= $gejala->tekanan_darah_sistole ?></p>
                    <p>Tekanan Darah Diastole &nbsp;: <?= $gejala->tekanan_darah_diastole ?></p>
                    <p>Nadi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $gejala->nadi ?> / menit
                    </p>
                    <p>Gejala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp; : <?= $gejala->gejala ?>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    <?php if ($this->session->flashdata('success_insert')) : ?>
        toastr.success("Data berhasil ditambahkan", "Berhasil!", {
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

    <?php elseif ($this->session->flashdata('success_active')) : ?>
        toastr.success("Akun berhasil diaktifkan", "Berhasil!", {
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

    <?php elseif ($this->session->flashdata('success_nonaktiv')) : ?>
        toastr.success("Akun berhasil di non aktifkan", "Berhasil!", {
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

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        toastr.success("Data berhasil dihapus", "Berhasil!", {
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

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        toastr.success("Data berhasil diperbarui", "Berhasil!", {
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

    <?php elseif ($this->session->flashdata('success_pemeriksaan')) : ?>
        toastr.success("Data telah masuk ke pemeriksaan", "Berhasil!", {
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



    $('.hapus-data').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data pendaftaran akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#898989',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })

    $('.masuk-pemeriksaan').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data akan masuk pemeriksaan!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#00a6fb',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Konfirmasi!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })
</script>

<?php $this->load->view('partials/footer') ?>