<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Riwayat Layanan Obat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Riwayat Layanan Obat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel List Riwayat Layanan Obat</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <!-- <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Loket/tambah_pendaftaran') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Pendaftaran</a>
                    </div> -->
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">List Data Riwayat Layanan Obat</h4>
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
                                <th>Petugas Obat</th>
                                <th>Total Biaya</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($riwayat as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= $view->kd_kunjungan ?></td>
                                    <td><?= $view->no_rekmed ?></td>
                                    <td><?= $view->nama_pasien ?></td>
                                    <td><?= date('d F Y', strtotime($view->tgl_trans)) ?></td>
                                    <td><?= $view->nama_petugas ?></td>
                                    <td><?= 'Rp. ' . number_format($view->total_biaya) ?></td>
                                    <td>
                                        <a href="<?= base_url('Obat/detail_riwayat_transaksi/' . $view->id) ?>" title="Detail Transaksi" class="badge bg-success" style="color: white;"><i class="fa fa-eye"></i></a>
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
    <?php if ($this->session->flashdata('transaksi_berhasil')) : ?>
        toastr.success("transaksi obat berhasil disimpan", "Berhasil!", {
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

        <?php elseif ($this->session->flashdata('berhasil_kepembayaran')) : ?>
        toastr.success("berhasil lanjut ke pembayaran", "Berhasil!", {
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
    <?php endif ?>
</script>

<?php $this->load->view('partials/footer') ?>