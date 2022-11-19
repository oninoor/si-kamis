<?php $this->load->view('partials/header') ?>

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
                                <label>Dokter <span style="color: red;">*</span></label>
                                <input class="form-control" readonly value="<?= $data->nama_dokter ?>" type="text" name="" placeholder="">
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
                        <textarea class="form-control" name="anamnesis" rows="5" cols="30"></textarea>
                        <?= form_error('anamnesis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Diagnosis 1 <span style="color: red;">*</span></label>
                        <select name="kd_diagnosa" id="diagnosis" class="form-control">
                            <option></option>
                            <?php foreach ($diagnosis as $view) { ?>
                                <option value="<?= $view->id ?>"><?= $view->nama_diagnosis ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('kd_diagnosa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Diagnosis 1 ICD 10 <span style="color: red;">*</span></label>
                        <input class="form-control" readonly type="text" name="diagnosis1_icd_10" id="diagnosis1_icd_10" placeholder="">
                        <?= form_error('diagnosis1_icd_10', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Kode Diagnosis 1 ICD 10 <span style="color: red;">*</span></label>
                        <input class="form-control" readonly type="text" name="kode_diagnosis1_icd_10" id="kode_diagnosis1_icd_10" placeholder="">
                        <?= form_error('kode_diagnosis1_icd_10', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
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
                    <div class="form-group">
                        <label>Tindak Lanjut Pasien <span style="color: red;">*</span></label>
                        <textarea class="form-control" name="tindak_lanjut" rows="5" cols="50"></textarea>
                        <?= form_error('tindak_lanjut', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Terapi Obat <span style="color: red;">*</span></label>
                        <textarea class="form-control" name="terapi_obat" rows="5" cols="50"></textarea>
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
<?php $this->load->view('partials/footer') ?>
<script>
    $(document).ready(function() {
        //untuk memanggil plugin select2
        $('#diagnosis').select2({
            placeholder: 'Pilih Diagnosis 1',
        });

        $('#diagnosis2').select2({
            placeholder: 'Pilih Diagnosis 2',
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
    });

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