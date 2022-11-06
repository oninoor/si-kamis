<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Pasien</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pasien</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel List Pasien</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">List Data Pasien</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>NIK</th>
                                <th>No Rekam Medis</th>
                                <th>Nama</th>
                                <th>No BPJS</th>
                                <th>Tanggal Lahir</th>
                                <!-- <th>Jenis Kelamin</th> -->
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pasien as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= $view->nik ?></td>
                                    <td><?= $view->no_rm ?></td>
                                    <td><?= $view->nama_lengkap ?></td>
                                    <td> <?php
                                            if (!empty($view->no_bpjs)) {
                                                echo $view->no_bpjs;
                                            } else {
                                                echo "Tidak memiliki BPJS";
                                            }
                                            ?></td>
                                    <td><?= date('d F Y', strtotime($view->tgl_lahir)) ?></td>
                                    <!-- <td><?= $view->jenis_kelamin ?></td> -->
                                    <td>             
                                        <a href="<?= base_url('Admin/detail_pasien/' . $view->id) ?>" title="Detail Pasien" class="badge bg-success" style="color: white;"><i class="fa fa-eye"></i></a>
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

<?php $this->load->view('partials/footer') ?>