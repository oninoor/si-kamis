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
                            <h4>Transaksi Obat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Layanan Obat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Transaksi Obat</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Obat/layanan_obat') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form Transaksi Obat</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>

                <form action="<?= base_url('Obat/save_transaksi') ?>" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Nama Pasien</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fas fa-user"></span> </span>
                                </div>
                                <input type="hidden" name="kd_kunjungan" value="<?= $view->kd_kunjungan ?>">
                                <input type="text" name="nama_pasien" value="<?= $view->nama_lengkap ?>" readonly id="nama_pasien" class="form-control nama_pasien">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">No Rekam Medis</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fa fa-id-card"></span> </span>
                                </div>
                                <input type="text" name="no_rekmed" value="<?= $view->no_rekmed ?>" readonly class="form-control no_rekmed">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Dokter</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fa fa-user-md"></span> </span>
                                </div>
                                <input type="text" name="dokter" value="<?= $view->nama_dokter ?>" readonly class="form-control dokter">
                            </div>
                        </div>
                    </div>
                    <hr>
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
                            <label for="">Tanggal</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fa fa-calendar"></span> </span>
                                </div>
                                <?php
                                date_default_timezone_set("Asia/Jakarta");
                                $tgl_trans = date('Y-m-d');
                                ?>
                                <input type="date" value="<?= $tgl_trans ?>" readonly name="tgl_trans" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Petugas Obat</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><span class="fas fa-address-book"></span> </span>
                                </div>
                                <input type="hidden" name="petugas_obat" value="<?= $this->session->userdata('id') ?>" class="form-control">
                                <input type="text" name="kasir" readonly value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- <div class="col-md-8">
                            <label for="">Alergi Obat</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fa fa-receipt"></span> </span>
                            </div>
                                <input type="text" class="form-control mb-3 resep" value="<?= $view->alergi ?>" name="resep" readonly rows="2">
                            </div>
                        </div> -->
                        <div class="col-md-8">
                            <label for="">Terapi Obat</label>
                            <div class="input-group mb-3">
                                <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fa fa-receipt"></span> </span>
                            </div> -->
                                <input type="text" class="form-control mb-3 resep" name="resep" value="<?= $view->terapi_obat ?>" readonly rows="3">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Jenis Pasien</label>
                            <div class="input-group mb-3">
                                <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fa fa-receipt"></span> </span>
                            </div> -->
                                <input type="text" class="form-control mb-3 resep" name="resep" value="<?= $view->jenis_pasien ?>" readonly rows="3">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table text-center" id="tabeltransaksi">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Obat</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Hapus</th>
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
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <label for="">Total Transaksi</label>
                            <div class="input-group mb-3">
                                <input type="text" name="total_trans" id="total_transaksi" readonly class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Transaksi</button>
                        <!-- <a href="" class="btn btn-success"><i class="fa fa-print"></i> Cetak Resep</a> -->
                        <a href="<?= base_url("Obat/non_transaksi?kd_kunjungan=" . $view->kd_kunjungan . "&tgl_trans=" . $tgl_trans . "&petugas_obat=" . $this->session->userdata('id')) ?>" class="btn btn-success"><i class="fa fa-arrow-circle-o-right"></i> Lanjutkan Ke Pembayaran</a>
                    </div>
                    <!-- <span id="datanya"></span> -->
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="list_obat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabel_obat" class="tabel_obat">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Obat</td>
                            <td>Harga</td>
                            <td>Jenis Obat</td>
                            <td>opsi</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if ($this->session->flashdata('stok_habis')) : ?>
        toastr.warning("Data stok kosong", "Catatan!", {
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

    <?php elseif ($this->session->flashdata('obat_null')) : ?>
        toastr.warning("Belum memilih obat", "Catatan!", {
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
<script>
    let dataObat;
    let dataPasien;

    function getDataPasien(no_rm) {
        $.ajax({
            url: "<?php echo base_url() ?>Obat/get_data_pasien/" + no_rm,
            method: 'POST',
            dataType: 'JSON',
            success: function(json) {
                dataPasien = json.data_pasien;
                // console.log(dataPasien);
            }
        })
    }

    function detail_obat(id) {
        // getdataObat()
        $('#list_obat').modal('show');
        table2 = $('#tabel_obat').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "bDestroy": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() ?>Obat/list_data_obat/" + id,
                "type": "POST"
            },

            order: [1, 'asc']

        });
        table2.ajax.reload();
    }

    $('#BarisBaru').on('click', function() {
        BarisBaru();
    });

    function runningFormatter(value, row, index) {
        return index + 1;
    }

    $(document).on('click', '#HapusBaris', function(e) {
        e.preventDefault();
        if ($(this).parent().parent().find("#pencarian_nama").val() == "") {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabeltransaksi tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
            HitungTotalBayar();
        } else {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabeltransaksi tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
            HitungTotalBayar();
        }
    });

    function BarisBaru() {
        let no_rm = '<?= $view->no_rekmed ?>';
        getDataPasien(no_rm)
        var nomor = $('#tabeltransaksi tbody tr').length + 1;
        //0
        var baris = "<tr>";
        baris += "<td>" + nomor + "</td>";

        //1
        baris += "<td style='display: flex;height: 78px;'><input type='hidden' class='form-control id_obat" + nomor + "' name='id_obat[]'>";
        baris += "<input readonly type='text' class='form-control nama_obat" + nomor + "' name='nama_obat[]' id='pencarian_nama'><button type='button' class='btn btn-success' onclick='detail_obat(" + nomor + ")' style='margin-left: 4px;'> <i class='ace-icon fa fa-search'></i></button>";
        baris += "<div id='hasil_pencarian' class='hasil_pencarian'></div>";
        baris += "</td>";

        baris += "<td><input type='number' name='harga[]' id='harga' value='0' class='form-control harga" + nomor + "' readonly></td>";

        baris += "<td><input type='number' required name='qty[]' id='qty' value'0' class='form-control qty" + nomor + "'></td>";


        //6
        baris += "<td><input type='text' name='subtotal[]' id='subtotal' class='form-control subtotal" + nomor + "' readonly></td>";

        //hapus
        baris += "<td><button  class='btn btn-danger' id='HapusBaris'><i class='fa fa-times' style='color:white;'></i></button></td>";
        baris += "</tr>";

        $('#tabeltransaksi').append(baris);
        // Fokus Input
        $('#tabeltransaksi tbody tr').each(function() {
            $(this).find('td:nth-child(2) input').focus();
        });
    }


    function pencarian_nama(id, nama_obat, harga, nomor) {
        let no_rm = '<?= $view->no_rekmed ?>';
        getDataPasien(no_rm)
        $('.id_obat' + nomor).val(id);
        $('.nama_obat' + nomor).val(nama_obat);
        if (dataPasien == 'umum') {
            $('.harga' + nomor).val(harga);
        }
        $('#list_obat').modal('hide');
        // console.log('checkbox', chekbox1);
    }

    function getDataObat() {
        $.ajax({
            url: "<?php echo base_url() ?>Obat/get_obat",
            method: 'POST',
            dataType: 'JSON',
            success: function(json) {
                dataObat = json.datanya;
            }
        })
    }

    let intervalPress;

    function cariObat(keyword, Indexnya, foundItem) {
        let htmlFoundItem = "<ul id='daftar-autocomplete' class='daftar-autocomplete'>";
        foundItem.forEach((b, i) => {
            //	var b.stok_gudang = 0;
            if (i == 0) {
                htmlFoundItem += '<li class="--focus">';
            } else {
                htmlFoundItem += '<li>';
            }

            htmlFoundItem += `
                <b>Kode</b> : 
                `
                // <span id='kodenya'>` + b.kode_barang + `</span> <br />
                +
                `
                <span id='nama_obat'>` + b.nama_obat + `</span><br />
                <span id='jenis_obat' style='display:none;'>` + b.jenis_obat + `</span>
            </li>
        `;
        })
        htmlFoundItem += "</ul>";

        if (foundItem.length > 0 && keyword != "") {
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').html(htmlFoundItem);
        } else {
            let tidakAda = '<ul class="daftar-autocomplete"><li> <span>Obat Tidak Ditemukan</span></li><ul>'
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').html(tidakAda);
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
        }
        // console.log(foundItem);
        return foundItem.length;
    }

    let tempKeyword = false;
    $(document).on('keyup', '#pencarian_nama', function(e) {
        var keyword = $(this).val();
        // console.log(keyword);
        var Indexnya = $(this).parent().parent().index();
        var key = e.which || e.keyCode;
        if (e.which == 40) {
            $(this).select();
            $(this).parent().find("#hasil_pencarian > #daftar-autocomplete li").each(function(i, e) {
                if ($(this).hasClass("--focus") && i < $(this).parent().find('li').length - 1) {
                    $(this).removeClass("--focus");
                    $(this).parent().find('li').each(function(ii, e) {
                        if (ii == (i + 1)) {
                            $(this).addClass("--focus");
                            if ($(this).position().top > 350) {
                                $(this).parent().parent().scrollTop($(this).parent().parent().scrollTop() + 71);
                            }
                        }
                    })
                    return false;
                }
            })
            e.preventDefault();
            return false;
        } else if (e.which == 38) {
            $(this).select();
            $(this).parent().find("#hasil_pencarian > #daftar-autocomplete li").each(function(i, e) {
                if ($(this).hasClass("--focus") && i != 0) {
                    $(this).removeClass("--focus");
                    $(this).parent().find('li').each(function(ii, e) {
                        if (ii == (i - 1)) {
                            $(this).addClass("--focus");
                            if ($(this).position().top < 0) {
                                $(this).parent().parent().scrollTop($(this).parent().parent().scrollTop() - 71);
                            }
                        }
                    })
                    return false;
                }
            })
            e.preventDefault();
            return false;
        } else if (e.which == 13) {
            $(this).select();
            let foundItem = [];
            for (let i = 0; i < dataObat.length; i++) {
                let reg = new RegExp('^' + keyword + '.*$', 'i');
                if (
                    // dataObat[i].kode_barcode_varian == keyword ||
                    // dataObat[i].kode_barang.match(reg) || 
                    // dataObat[i].nama_barang.includes(keyword) || 
                    ((dataObat[i].id ? dataObat[i].id : '').toLowerCase()).includes(keyword.toLowerCase()) ||
                    ((dataObat[i].nama_obat ? dataObat[i].nama_obat : '').toLowerCase()).includes(keyword.toLowerCase())
                ) {
                    foundItem.push(dataObat[i])
                }
            }

            // foundItem = [foundItem[0]];

            if (foundItem.length > 1) {
                if ($(this).parent().find('#hasil_pencarian > #daftar-autocomplete').is(':visible') && tempKeyword) {
                    $(this).parent().find("#hasil_pencarian > #daftar-autocomplete li").each(function(i, e) {
                        if ($(this).hasClass('--focus')) {
                            $(this).parent().parent().parent().find('input').val($(this).find('span#kode').html());

                            var Indexnya = $(this).parent().parent().parent().parent().index();
                            var NamaObat = $(this).find('span#nama_obat').html();
                            var JenisObat = $(this).find('span#jenis_obat').html();
                            // var IdBarang = $(this).find('span#id_brg').html();
                            var Harga = $(this).find('span#harga').html();


                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2) input#nama_obat').val(NamaObat);
                            // $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val(0);
                            $('.checkbox-umum').on("click", function() {
                                if ($('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#checkbox-umum:checked'))
                                    $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#harga').val(Harga);
                            })

                            var IndexIni = Indexnya + 1;
                            var TotalIndex = $('#tabeltransaksi tbody tr').length;
                            if (IndexIni == TotalIndex) {
                                //BarisBaru();
                                $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input').focus();
                                // $('html, body').animate({ scrollTop: $(document).height() }, 0);
                            } else {
                                $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input').focus();
                            }
                            //HitungTotalBayar();
                        }
                    })
                } else {
                    cariObat(keyword, Indexnya, foundItem);
                    tempKeyword = true;
                }
            } else {
                cariObat(keyword, Indexnya, foundItem);
                $(this).parent().find("#hasil_pencarian > #daftar-autocomplete li").each(function(i, e) {
                    if ($(this).hasClass('--focus')) {
                        $(this).parent().parent().parent().find('input').val($(this).find('span#kode').html());

                        var Indexnya = $(this).parent().parent().parent().parent().index();
                        var KodeObat = $(this).find('span#kode_obat').html();
                        var NamaObat = $(this).find('span#nama_obat').html();
                        var IdBarang = $(this).find('span#id_brg').html();
                        var Harga = $(this).find('span#harga').html();


                        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
                        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2) input#nama_obat').val(NamaObat);
                        // $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val(0);
                        $('.checkbox-umum').on("click", function() {
                            if ($('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#checkbox-umum:checked'))
                                $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#harga').val(Harga);
                        })

                        var IndexIni = Indexnya + 1;
                        var TotalIndex = $('#tabeltransaksi tbody tr').length;
                        if (IndexIni == TotalIndex) {
                            //BarisBaru();
                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input').focus();
                            // $('html, body').animate({ scrollTop: $(document).height() }, 0);
                        } else {
                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input').focus();
                        }
                        //HitungTotalBayar();

                    }
                })
            }
        } else {
            tempKeyword = false;
        }
    })

    $(document).on('click', '#daftar-autocomplete li', function() {
        $(this).parent().find(".--focus").each(function() {
            $(this).removeClass("--focus");
        })
        $(this).addClass("--focus");
        $(this).parent().parent().parent().find('input').val($(this).find('span#kode').html());

        var Indexnya = $(this).parent().parent().parent().parent().index();
        var KodeObat = $(this).find('span#kode_obat').html();
        var NamaObat = $(this).find('span#nama_obat').html();
        var IdBarang = $(this).find('span#id_brg').html();
        var Harga = $(this).find('span#harga').html();


        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input#nama_obat').val(NamaObat);
        // $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val(0);
        $('.checkbox-umum').on("click", function() {
            if ($('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#checkbox-umum:checked'))
                $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#harga').val(Harga);
        })

        var IndexIni = Indexnya + 1;
        var TotalIndex = $('#tabeltransaksi tbody tr').length;
        if (IndexIni == TotalIndex) {
            //BarisBaru();
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').focus();
            // $('html, body').animate({ scrollTop: $(document).height() }, 0);
        } else {
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').focus();
        }
        //HitungTotalBayar();	

    });


    $(window).click(function() {
        var Indexnya = $(this).parent().parent().index();
        $('.hasil_pencarian').hide();
    });
    $(document).on('click', '#pencarian_nama', function() {
        $('.hasil_pencarian').hide();
        var Indexnya = $(this).parent().parent().index();
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').show();
    });
    $(document).on('keypress', '#tabeltransaksi', function(e) {
        var key = e.which || e.keyCode;
        if (key == 13) {
            return false;
        }
    });

    $(document).on('keypress', '#tabeltransaksi', function(e) {
        var key = e.which || e.keyCode;
        if (key == 13) {
            return false;
        }
    });

    $(document).on('keydown', 'body', function(e) {
        var charCode = (e.which) ? e.which : event.keyCode;

        if (charCode == 118) //F7
        {
            BarisBaru();
            return false;
        }

        if (charCode == 119) //F8
        {
            $('#UangCash').focus();
            return false;
        }
        if (charCode == 121) //F10
        {
            $('#Simpan').click();
            return false;
        }
    });

    $(document).on('keyup', '#qty', function() {
        var Indexnya = $(this).parent().parent().index();
        var Qty = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val();
        var Harga = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input#harga').val();


        var SubTotal = parseInt(Harga) * parseInt(Qty);
        if (SubTotal > 0) {
            var SubTotalVal = SubTotal;
            SubTotal = to_rupiah(SubTotal);
        } else {
            SubTotal = '';
            var SubTotalVal = 0;
        }

        var SubTotal2 = parseInt(Harga) * parseInt(Qty);
        if (SubTotal2 > 0) {
            var SubTotalVal2 = SubTotal2;
            SubTotal2 = to_rupiah(SubTotal2);
        } else {
            SubTotal2 = '';
            var SubTotalVal2 = 0;
        }
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#subtotal').val(SubTotalVal);
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) span').html(SubTotal2);
        // console.log(SubTotal);
        // console.log(SubTotal2);
        HitungTotalBayar();
    })

    $(document).on('each', '#harga', function() {
        var Indexnya = $(this).parent().parent().index();
        var Qty = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val();
        var Harga = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input#harga').val();

        var SubTotal = parseInt(Harga) * parseInt(Qty);
        if (SubTotal > 0) {
            var SubTotalVal = SubTotal;
            SubTotal = to_rupiah(SubTotal);
        } else {
            SubTotal = '';
            var SubTotalVal = 0;
        }

        var SubTotal2 = parseInt(Harga) * parseInt(Qty);
        if (SubTotal2 > 0) {
            var SubTotalVal2 = SubTotal2;
            SubTotal2 = to_rupiah(SubTotal2);
        } else {
            SubTotal2 = '';
            var SubTotalVal2 = 0;
        }
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#subtotal').val(SubTotalVal);
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) span').html(SubTotal2);
        // console.log(SubTotal);
        // console.log(SubTotal2);
        HitungTotalBayar();
    })


    function HitungTotalBayar() {
        var Total = 0;
        var TotalBayar = 0;
        var TotalPotongan = 0;
        //var TotalDiskon = 0;
        $('#tabeltransaksi tbody tr').each(function() {
            if ($(this).find('td:nth-child(5) input#subtotal').val() > 0) {
                var SubTotal = $(this).find('td:nth-child(5) input#subtotal').val();
                Total = parseInt(Total) + parseInt(SubTotal);
            }
        });

        $('#total_transaksi').val(Total);
        $('#total_transaksi2').html(to_rupiah(Total));

        // $('#TotalOngkir').val(TotalOngkos);
        //$('#TotalDiskon').val(TotalDiskon);

        $('#terbilang').val(sayit(Total));


    }

    function to_rupiah(angka) {
        var rev = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2 = '';
        for (var i = 0; i < rev.length; i++) {
            rev2 += rev[i];
            if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
                rev2 += '.';
            }
        }
        return rev2.split('').reverse().join('');
    }

    var thoudelim = ".";
    var decdelim = ",";
    var curr = "Rp ";
    var d = document;

    function format(s, r) {
        s = Math.round(s * Math.pow(10, r)) / Math.pow(10, r);
        s = String(s);
        s = s.split(".");
        var l = s[0].length;
        var t = "";
        var c = 0;
        while (l > 0) {
            t = s[0][l - 1] + (c % 3 == 0 && c != 0 ? thoudelim : "") + t;
            l--;
            c++;
        }
        s[1] = s[1] == undefined ? "0" : s[1];
        for (i = s[1].length; i < r; i++) {
            s[1] += "0";
        }
        return curr + t + decdelim + s[1];
    }

    function threedigit(word) {
        eja = Array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan");
        while (word.length < 3) word = "0" + word;
        word = word.split("");
        a = word[0];
        b = word[1];
        c = word[2];
        word = "";
        word += (a != "0" ? (a != "1" ? eja[parseInt(a)] : "Se") : "") + (a != "0" ? (a != "1" ? " Ratus" : "ratus") : "");
        word += " " + (b != "0" ? (b != "1" ? eja[parseInt(b)] : "Se") : "") + (b != "0" ? (b != "1" ? " Puluh" : "puluh") : "");
        word += " " + (c != "0" ? eja[parseInt(c)] : "");
        word = word.replace(/Sepuluh ([^ ]+)/gi, "$1 Belas");
        word = word.replace(/Satu Belas/gi, "Sebelas");
        word = word.replace(/^[ ]+$/gi, "");

        return word;
    }

    function sayit(s) {
        var thousand = Array("", "Ribu", "Juta", "Milyar", "Trilyun");
        s = Math.round(s * Math.pow(10, 2)) / Math.pow(10, 2);
        s = String(s);
        s = s.split(".");
        var word = s[0];
        var cent = s[1] ? s[1] : "0";
        if (cent.length < 2) cent += "0";

        var subword = "";
        i = 0;
        while (word.length > 3) {
            subdigit = threedigit(word.substr(word.length - 3, 3));
            subword = subdigit + (subdigit != "" ? " " + thousand[i] + " " : "") + subword;
            word = word.substring(0, word.length - 3);
            i++;
        }
        subword = threedigit(word) + " " + thousand[i] + " " + subword;
        subword = subword.replace(/^ +$/gi, "");

        word = (subword == "" ? "NOL" : subword.toUpperCase()) + " RUPIAH";
        subword = threedigit(cent);
        cent = (subword == "" ? "" : " ") + subword.toUpperCase() + (subword == "" ? "" : " SEN");
        return word + cent;
    }

    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            // var left_side = input_val.substring(0, decimal_pos);
            // var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            // if (blur === "blur") {
            //     right_side += "00";
            // }

            // Limit decimal to only 2 digits
            // right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            // input_val = "$" + input_val;

            // final formatting
            // if (blur === "blur") {
            //     input_val += ".00";
            // }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
<?php $this->load->view('partials/footer') ?>