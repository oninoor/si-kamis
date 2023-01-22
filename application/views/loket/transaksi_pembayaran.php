<?php $this->load->view('partials/header') ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Transaksi Pembayaran</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Pembayaran</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Transaksi Pembayaran</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Loket/pembayaran') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form Transaksi Pembayaran</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>

                <form action="<?= base_url('Loket/save_pembayaran') ?>" method="POST">
                <div class="row">
                        <div class="col-md-4">
                            <label for="">Kode Kunjungan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fas fa-credit-card"></span> </span>
                                </div>
                                <input type="text" name="kd_kunjungan" value="<?= $view->kd_kunjungan ?>" id="no_trans" readonly class="form-control no_trans">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Tanggal Kunjungan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fa fa-calendar"></span> </span>
                                </div>
                                <input type="date" value="<?= $view->tanggal ?>" readonly name="tgl_trans" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Petugas Loket</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fas fa-address-book"></span> </span>
                                </div>
                                <input type="hidden" name="petugas_obat" value="<?= $view->petugas_obat ?>" class="form-control">
                                <input type="text" name="kasir" readonly value="<?= $view->nama_petugas ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">No Rekam Medis</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fa fa-id-card"></span> </span>
                                </div>
                                <input type="hidden" name="id_trans" value="<?= $view->id ?>" readonly class="form-control no_rekmed">
                                <input type="text" name="no_rekmed" value="<?= $view->no_rekmed ?>" readonly class="form-control no_rekmed">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Nama Pasien</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fas fa-user"></span> </span>
                                </div>
                                <input type="hidden" name="kd_kunjungan" value="<?= $view->kd_kunjungan ?>" readonly class="form-control no_rekmed">
                                <input type="text" name="nama_pasien" value="<?= $view->nama_pasien ?>" readonly id="nama_pasien" class="form-control nama_pasien">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Jenis Pasien</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fa fa-user-md"></span> </span>
                                </div>
                                <input type="text" name="dokter" value="<?= $view->jenis_pasien ?>" readonly class="form-control dokter">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <?php if(empty($tindakan)) { ?>
                                <label for="">Tindakan</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control mb-3 resep" name="resep" readonly rows="3" value="-">
                                    </div>
                                <?php $no = 1; foreach($tindakan as $get) { ?>
                                    <label for="">Tindakan <?= $no++ ?></label>
                                    <div class="input-group mb-3">
                                        <input class="form-control mb-3 resep" name="resep" readonly rows="3" value="<?= $get->tindakan ?>">
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <label for="">Tindak Lanjut</label>
                            <div class="input-group mb-3">
                                <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fa fa-receipt"></span> </span>
                            </div> -->
                                <textarea class="form-control mb-3 resep" name="resep" readonly rows="3"><?= $view->tindak_lanjut ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="">Terapi Obat</label>
                            <div class="input-group mb-3">
                                <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fa fa-receipt"></span> </span>
                            </div> -->
                                <textarea class="form-control mb-3 resep" name="resep" readonly rows="3"><?= $view->terapi_obat ?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table text-center" id="tabel_pembayaran">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Hapus</th>
                                    </tr>
                                    <tr class="layanan-obat">
                                        <td>0</td>
                                        <td><input type="text" value="Layanan Obat" class="form-control input-layanan-obat" readonly></td>
                                        <td><input type="text" value="<?= $view->total_biaya ?>" class="form-control value-biaya-obat" readonly></td>
                                        <td><button class='btn btn-secondary' disabled id='hide-layanan-obat'><i class='fa fa-times' style='color:white;'></i></button></td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <button type="button" style="margin-top: 25px;" class="btn-sm btn-primary" id="BarisBaru">
                                <i class="fa fa-plus-circle"></i> Baris Baru
                            </button>
                            <!-- <a href="<?= base_url() . "transaksi/addDetailPenjualan" ?>" class="btn btn-default addDetail"><span class="fa fa-plus"></span> Tambah Item</a> -->
                        </div>
                        <div class="col-auto ml-auto">
                        </div>
                        <div class="col-auto ml-auto">
                            <h4 class="total" style="color: orange;">Total : <span id='total_transaksi2'>0</span></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Total Transaksi</label>
                            <div class="input-group mb-3">
                                <input type="text" name="total_trans" id="total_transaksi" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Dibayarkan</label>
                            <div class="input-group mb-3">
                                <input type="number" name="nominal_bayar" id="dibayarkan" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Kembalian</label>
                            <div class="input-group mb-3">
                                <input type="text" name="kembalian" id="kembalian" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                    <hr>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Pembayaran</button>
                    </div>
                    <!-- <span id="datanya"></span> -->
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.layanan-obat').hide();


    $('#BarisBaru').on('click', function() {
        $('.layanan-obat').show();
        baris_baru();
    });

    $(document).on('click', '#HapusBaris', function(e) {
        e.preventDefault();
        if ($(this).parent().parent().find("#pencarian_nama").val() == "") {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabel_pembayaran tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
            HitungTotalBayar();
        } else {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabel_pembayaran tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
            HitungTotalBayar();
        }
    });

    function baris_baru() {
        var nomor = $('#tabel_pembayaran tbody tr').length + 1;

        var element = "<tr>";

        //col 1 
        element += "<td>" + nomor + "</td>";

        //col 2
        element += "<td><input type='text' name='keterangan[]' class='form-control'></td>"

        //col 3
        element += "<td><input type='number' name='biaya[]' class='form-control biaya' id='biaya'><input type='hidden' class='subtotal' id='subtotal'></td>"

        //col 4
        element += "<td><button  class='btn btn-danger' id='HapusBaris'><i class='fa fa-times' style='color:white;'></i></button></td>";

        element += "</tr>";

        $('#tabel_pembayaran').append(element);
    }

    $(document).on('keyup', '.biaya', function() {
        let Indexnya = $(this).parent().parent().index();
        let biaya_lain = $('#tabel_pembayaran tbody tr:eq(' + Indexnya + ') td:nth-child(3) input.biaya').val();
        $('#tabel_pembayaran tbody tr:eq(' + Indexnya + ') td:nth-child(3) input#subtotal').val(biaya_lain);
        hitung_total_biaya();
    })

    function hitung_total_biaya() {
        let Total = 0;
        let value_biaya_obat = $('.value-biaya-obat').val();
        $('#tabel_pembayaran tbody tr').each(function() {
            if($(this).find('td:nth-child(3) input#subtotal').val() > 0) {
                let subtotal = $(this).find('td:nth-child(3) input#subtotal').val();
                Total = parseInt(Total) + parseInt(subtotal);
            }
        })
        let total_all = parseInt(value_biaya_obat) + parseInt(Total)
        $('#total_transaksi').val(total_all);
        $('#total_transaksi2').html(total_all);
    }

    $(document).on('keyup', '#dibayarkan', function() {
        let total_transaksi = $('#total_transaksi').val();
        let dibayarkan = $('#dibayarkan').val();
        let kembalian = parseInt(dibayarkan) - parseInt(total_transaksi);
        $('#kembalian').val(kembalian);
    })


    <?php if ($this->session->flashdata('keterangan_lain')) : ?>
        toastr.warning("Keterangan lainnya belum diisi", "Catatan!", {
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

        <?php elseif ($this->session->flashdata('keterangan_lain')) : ?>
        toastr.warning("Keterangan lainnya belum diisi", "Catatan!", {
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