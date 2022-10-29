<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Petugas</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Petugas</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel List Petugas</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Owner/tambah_petugas') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Petugas</a>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">List Data Petugas</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Posisi</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($petugas as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= $view->nama_lengkap ?></td>
                                    <td><?= $view->username ?></td>
                                    <td>
                                        <?php
                                        if ($view->role == 1) {
                                            echo "Admin";
                                        } else if ($view->role == 2) {
                                            echo "Petugas Loket";
                                        } else if ($view->role == 3) {
                                            echo "Dokter";
                                        } else if ($view->role == 4) {
                                            echo "Petugas Obat";
                                        } else if ($view->role == 0) {
                                            echo "Owner";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $view->alamat ?></td>
                                    <td>
                                        <?php
                                        if ($view->status == 0) {
                                            echo "<span class='badge badge-danger' style='color: white;'>Non Aktif</span>";
                                        } else if ($view->status == 1) {
                                            echo "<span class='badge badge-success' style='color: white;'>Aktif</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($view->role >= 1) { ?>
                                            <?php if ($view->status == 0) { ?>
                                                <a href="<?= base_url('Owner/aktifkan_petugas/' . $view->id) ?>" title="Aktifkan" class="badge bg-success aktifkan-akun" style="color: white;"><i class="fa fa-power-off"></i></a>
                                            <?php } else if ($view->status == 1) { ?>
                                                <a href="<?= base_url('Owner/nonaktifkan_petugas/' . $view->id) ?>" title="Non Aktifkan" class="badge bg-danger nonaktifkan-akun" style="color: white;"><i class="fa fa-power-off"></i></a>
                                            <?php } ?>
                                            <a href="<?= base_url('Owner/edit_petugas/' . $view->id) ?>" title="Edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('Owner/hapus_petugas/' . $view->id) ?>" title="Hapus" class="badge bg-danger hapus-data" style="color: white;"><i class="fa fa-trash"></i></a>
                                        <?php } ?>
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
    <?php endif ?>

    $('.aktifkan-akun').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Akun petugas akan diaktifkan!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aktifkan Akun!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })

    $('.nonaktifkan-akun').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Akun petugas akan di non aktifkan!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#FFA500',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Non Aktifkan Akun!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })

    $('.hapus-data').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Akun petugas akan dihapus!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#898989',
            confirmButtonText: 'Hapus Akun!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })
</script>
<?php $this->load->view('partials/footer') ?>