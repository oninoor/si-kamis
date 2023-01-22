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
                            <h4>Pemeriksaan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Kunjungan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Pemeriksaan</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Dokter/kunjungan') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form Pemeriksaan</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('Dokter/save_pemeriksaan') ?>">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Kode Kunjungan <span style="color: red;">*</span></label>
                                <input class="form-control" value="<?= $data->kd_kunjungan ?>" readonly type="text" name="kd_kunjungan" placeholder="">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Tanggal Kunjungan <span style="color: red;">*</span></label>
                            <input class="form-control" type="date" readonly value="<?= $data->tanggal ?>" name="tanggal" placeholder="">
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>No Rekam Medis <span style="color: red;">*</span></label>
                                <input class="form-control" value="<?= $data->no_rekmed ?>" readonly type="text" name="no_rekmed" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nama Pasien <span style="color: red;">*</span></label>
                                <input class="form-control" type="text" readonly name="nama_pasien" value="<?= $data->nama_lengkap ?>" placeholder="Tinggi Badan">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tanggal Lahir <span style="color: red;">*</span></label>
                                <input class="form-control" readonly type="date" name="tgl_lahir" value="<?= $data->tgl_lahir ?>" placeholder="Berat Badan">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Jenis Kelamin <span style="color: red;">*</span></label>
                                <input class="form-control" readonly type="text" name="jenis_kelamin" value="<?= $data->jenis_kelamin ?>" placeholder="Berat Badan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Jenis Pasien <span style="color: red;">*</span></label>
                                <input class="form-control" readonly type="text" name="jenis_pasien" value="<?= $data->jenis_pasien ?>" placeholder="Berat Badan">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tinggi Badan / CM <span style="color: red;">*</span></label>
                                <input class="form-control" type="text" readonly name="tinggi_badan" value="<?= $data->tinggi_badan ?>" placeholder="Tinggi Badan">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Berat Badan / KG <span style="color: red;">*</span></label>
                                <input class="form-control" readonly type="text" name="berat_badan" value="<?= $data->berat_badan ?>" placeholder="Berat Badan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Dokter <span style="color: red;">*</span></label>
                        <input class="form-control" readonly value="<?= $data->nama_dokter ?>" type="text" name="" placeholder="">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tekanan Darah Sistole / mmHg <span style="color: red;">*</span></label>
                                <input class="form-control" readonly type="text" name="tekanan_darah_sistole" value="<?= $data->tekanan_darah_sistole ?>" placeholder="Tekanan Darah Sistole">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tekanan Darah Diastole / mmHg <span style="color: red;">*</span></label>
                                <input class="form-control" readonly type="text" name="tekanan_darah_diastole" value="<?= $data->tekanan_darah_diastole ?>" placeholder="Tekanan Darah Diastole">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Suhu / Celcius <span style="color: red;">*</span></label>
                                <input class="form-control" readonly type="text" name="suhu" value="<?= $data->suhu ?>" placeholder="Suhu">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nadi / minute <span style="color: red;">*</span></label>
                                <input class="form-control" readonly type="text" name="nadi" value="<?= $data->nadi ?>" placeholder="Nadi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Keluhan <span style="color: red;">*</span></label>
                                <textarea class="form-control" readonly name="gejala" rows="5" cols="50"><?= $data->gejala ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Alergi </label>
                                <textarea class="form-control" readonly name="alergi" rows="5" cols="50"><?= $data->alergi ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Anamnesis <span style="color: red;">*</span></label>
                        <textarea class="form-control" name="anamnesis" rows="5" cols="30"><?= set_value('anamnesis') ?></textarea>
                        <?= form_error('anamnesis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Diagnosis 1 <span style="color: red;">*</span></label>
                        <select name="kd_diagnosa" id="diagnosis" class="form-control">
                            <option></option>
                            <?php foreach ($diagnosis as $view) { ?>
                                <option <?php if(set_value('kd_diagnosa') == $view->id) {
                                    echo "selected=\"selected\"";
                                }  ?> value="<?= $view->id ?>"><?= $view->nama_diagnosis ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('kd_diagnosa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Diagnosis 1 ICD 10 <span style="color: red;">*</span></label>
                        <input class="form-control" readonly type="text" name="diagnosis1_icd_10" value="<?= set_value('diagnosis1_icd_10') ?>" id="diagnosis1_icd_10" placeholder="">
                        <?= form_error('diagnosis1_icd_10', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Kode Diagnosis 1 ICD 10 <span style="color: red;">*</span></label>
                        <input class="form-control" readonly type="text" name="kode_diagnosis1_icd_10" value="<?= set_value('kode_diagnosis1_icd_10') ?>" id="kode_diagnosis1_icd_10" placeholder="">
                        <?= form_error('kode_diagnosis1_icd_10', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-diagnosis-2">
                        <div class="form-group">
                            <label>Diagnosis 2 </label>
                            <select name="kd_diagnosa2" id="diagnosis2" class="form-control">
                                <option></option>
                                <?php foreach ($diagnosis as $view) { ?>
                                    <option value="<?= $view->id ?>"><?= $view->nama_diagnosis ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('kd_diagnosa2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Diagnosis 2 ICD 10 </label>
                            <input class="form-control" readonly type="text" name="diagnosis2_icd_10" id="diagnosis2_icd_10" placeholder="">
                            <?= form_error('diagnosis2_icd_10', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Kode Diagnosis 2 ICD 10 </label>
                            <input class="form-control" readonly type="text" name="kode_diagnosis2_icd_10" id="kode_diagnosis2_icd_10" placeholder="">
                            <?= form_error('kode_diagnosis2_icd_10', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <table class="table text-center" id="tabeltindakan">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tindakan</th>
                                <th scope="col">Tindakan ICD 9cm</th>
                                <th scope="col">Kode Tindakan ICD 9cm</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm btn-primary tampilkan-diagnosa-2">Form diagnosis 2</button>
                        <button type="button" class="btn btn-sm btn-primary tambah-tindakan"><i class="fa fa-plus-circle"></i> Tindakan</button>
                    </div>
                    <div class="form-group">
                        <label>Tindak Lanjut Pasien <span style="color: red;">*</span></label>
                        <textarea class="form-control" name="tindak_lanjut" rows="5" cols="50"><?= set_value('tindak_lanjut') ?></textarea>
                        <?= form_error('tindak_lanjut', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Terapi Obat <span style="color: red;">*</span></label>
                        <textarea class="form-control" name="terapi_obat" rows="5" cols="50"><?= set_value('terapi_obat') ?></textarea>
                        <?= form_error('terapi_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                        <button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                    </div>
                </form>
                </code></pre>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="list_tindakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Tindakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabel_tindakan" class="tabel_tindakan">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tindakan</td>
                            <td>Tindakan ICD 9CM</td>
                            <td>Kode Tindakan ICD 9CM</td>
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
<?php $this->load->view('partials/footer') ?>
<script>
    $(document).ready(function() {

        $('#diagnosis2').select2({
            placeholder: 'Pilih Diagnosis 2',
        });

        //untuk memanggil plugin select2
        $('#diagnosis').select2({
            placeholder: 'Pilih Diagnosis 1',
        });

        $('#bln').select2({
            placeholder: 'Pilih Bulan',
        });

        $('#kota').select2({
            placeholder: 'Pilih Kota/Kabupaten',
            language: "id"
        });

        $('#kecamatan').select2({
            placeholder: 'Pilih Kecamatan',
            language: "id"
        });

        $('#desa').select2({
            placeholder: 'Pilih Desa / Kelurahan',
            language: "id"
        });


        //hide diagnosa 2
        $('.form-diagnosis-2').hide();

        $('.tampilkan-diagnosa-2').click(function() {
            $('.form-diagnosis-2').show();
            $('.tampilkan-diagnosa-2').hide();
        });

        $(document).on('click', '#HapusColom', function(e) {
            e.preventDefault();
            $(this).remove();
            var nomor = 1;
            $('#form-tindakan form').each(function() {
                $(this).find('label').html(nomor);
                nomor++;
            })
        });



    });

    
    $('.tambah-tindakan').on("click", function() {
            $('#tabeltindakan').show();
            form_tindakan();
        })

    $('#tabeltindakan').hide();

    function get_tindakan(id) {
        $('#list_tindakan').modal('show');
        table2 = $('#tabel_tindakan').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "bDestroy": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() ?>Dokter/list_data_tindakan/" + id,
                "type": "POST"
            },

            order: [1, 'asc']

        });
        table2.ajax.reload();
    }

    $(document).on('click', '#Hapuselement', function(e) {
        e.preventDefault();
        if ($(this).parent().parent().find("#cari_tindakan").val() == "") {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabeltindakan tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
        } else {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabeltindakan tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
        }
    });


    function form_tindakan() {
        let nomor = $('#tabeltindakan tbody tr').length + 1;
        console.log(nomor);
        let element = "<tr>";

        element += "<td>" + nomor +"</td>"

        //1
        element += "<td style='display: flex;height: 78px;'><input readonly type='hidden' class='form-control id_tindakan" + nomor + "' name='id_tindakan[]' id='cari_tindakan'>";
        element += "<input readonly type='text' class='form-control tindakan" + nomor + "' name='tindakan[]' id='cari_tindakan'><button type='button' class='btn btn-success' onclick='get_tindakan(" + nomor + ")' style='margin-left: 4px;'> <i class='ace-icon fa fa-search'></i></button>";
        element += "</td>";


        element += "<td><input type='text' readonly name='tindakan_icd_9cm[]' id='tindakan_icd_9cm' class='form-control tindakan_icd_9cm" + nomor + "'></td>";


        //6
        element += "<td><input type='text' readonly name='kode_tindakan_icd_9cm[]' id='kode_tindakan_icd_9cm' class='form-control kode_tindakan_icd_9cm" + nomor + "'></td>";

        //hapus
        element += "<td><button  class='btn btn-danger' id='Hapuselement'><i class='fa fa-times' style='color:white;'></i></button></td>";
        element += "</tr>";


        $('#tabeltindakan').append(element);
    }

    function pencarian_tindakan(id, tindakan, tindakan_icd_9cm, kode_tindakan_icd_9cm, nomor) {
        $('.id_tindakan' + nomor).val(id);
        $('.tindakan' + nomor).val(tindakan);
        $('.tindakan_icd_9cm' + nomor).val(tindakan_icd_9cm);
        $('.kode_tindakan_icd_9cm' + nomor).val(kode_tindakan_icd_9cm);
        $('#list_tindakan').modal('hide');
        // console.log('checkbox', chekbox1);
    }

    $("#diagnosis").change(function() {
        $("img#load1").show();
        var id_diagnosis = $(this).val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?= base_url('Dokter/ajax_diagnosis?jenis=diagnosis') ?>",
            data: "id_diagnosis=" + id_diagnosis,
            success: function(msg) {
                $("input#diagnosis1_icd_10").val(msg);
                $("img#load1").hide();
                // getAjaxKota();
            }
        });
    });

    $("#diagnosis").change(function() {
        $("img#load1").show();
        var id_diagnosis = $(this).val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?= base_url('Dokter/ajax_diagnosis?jenis=diagnosis2') ?>",
            data: "id_diagnosis=" + id_diagnosis,
            success: function(msg) {
                $("input#kode_diagnosis1_icd_10").val(msg);
                $("img#load1").hide();
                // getAjaxKota();
            }
        });
    });

    $("#diagnosis2").change(function() {
        $("img#load1").show();
        var id_diagnosis = $(this).val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?= base_url('Dokter/ajax_diagnosis?jenis=diagnosis') ?>",
            data: "id_diagnosis=" + id_diagnosis,
            success: function(msg) {
                $("input#diagnosis2_icd_10").val(msg);
                $("img#load1").hide();
                // getAjaxKota();
            }
        });
    });

    $("#diagnosis2").change(function() {
        $("img#load1").show();
        var id_diagnosis = $(this).val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?= base_url('Dokter/ajax_diagnosis?jenis=diagnosis2') ?>",
            data: "id_diagnosis=" + id_diagnosis,
            success: function(msg) {
                $("input#kode_diagnosis2_icd_10").val(msg);
                $("img#load1").hide();
                // getAjaxKota();
            }
        });
    });
</script>