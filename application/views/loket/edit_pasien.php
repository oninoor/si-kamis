<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Pasien</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pasien</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Edit Pasien</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Loket/pasien') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form Edit Pasien</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('Loket/update_pasien') ?>">
                    <div class="form-group">
                        <label>NIK <span style="color: red;">*</span></label>
                        <input type="hidden" name="id" value="<?= $edit->id ?>">
                        <input class="form-control" type="text" name="nik" value="<?= $edit->nik ?>" placeholder="NIK">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pasien <span style="color: red;">*</span></label><br>
                        <input type="radio" class="jenis-pasien-umum" <?php echo ($edit->jenis_pasien == 'umum') ? 'checked' : '' ?> name="jenis_pasien" value="umum"> Umum
                        <input type="radio" class="jenis-pasien-bpjs" <?php echo ($edit->jenis_pasien == 'bpjs') ? 'checked' : '' ?> name="jenis_pasien" value="bpjs"> BPJS <br>
                        <?= form_error('jenis_pasien', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group nomor-bpjs">
                        <label>No BPJS</label>
                        <input class="form-control" type="text" name="no_bpjs" value="<?= $edit->no_bpjs ?>" placeholder="No BPJS">
                        <?= form_error('no_bpjs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="nama_lengkap" value="<?= $edit->nama_lengkap ?>" placeholder="Nama Lengkap">
                        <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="job-description">Jenis Kelamin <span class="text-danger">*</span></label><br>
                        <input type="radio" name="jenis_kelamin" <?php echo ($edit->jenis_kelamin == 'Laki-laki') ? 'checked' : '' ?> value="Laki-laki"> Laki laki
                        <input type="radio" name="jenis_kelamin" <?php echo ($edit->jenis_kelamin == 'Perempuan') ? 'checked' : '' ?> value="Perempuan"> Perempuan
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alergi Obat</label>
                        <textarea class="form-control" name="alergi_obat" rows="5" cols="50"><?= $edit->alergi_obat ?></textarea>
                        <?= form_error('alergi_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir <span style="color: red;">*</span></label>
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<select class="col-lg-3" id="tgl" name="tgl" title="Tanggal">
                                <?php for ($a = 1; $a <= 31; $a++) { ?>
                                    <option <?php if (date('d', strtotime($edit->tgl_lahir)) == $a) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $a ?>"><?= $a ?></option>
                                <?php  } ?>
                            </select> &nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="col-lg-5" id="bln" name="bln" title="Pilih Bulan">
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '01') {
                                            echo "selected=\"selected\"";
                                        } ?> value="01">Januari</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '02') {
                                            echo "selected=\"selected\"";
                                        } ?> value="02">Februari</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '03') {
                                            echo "selected=\"selected\"";
                                        } ?> value="03">Maret</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '04') {
                                            echo "selected=\"selected\"";
                                        } ?> value="04">April</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '05') {
                                            echo "selected=\"selected\"";
                                        } ?> value="05">Mei</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '06') {
                                            echo "selected=\"selected\"";
                                        } ?> value="06">Juni</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '07') {
                                            echo "selected=\"selected\"";
                                        } ?> value="07">Juli</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '08') {
                                            echo "selected=\"selected\"";
                                        } ?> value="08">Agustus</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '09') {
                                            echo "selected=\"selected\"";
                                        } ?> value="09">September</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '10') {
                                            echo "selected=\"selected\"";
                                        } ?> value="10">Oktober</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '11') {
                                            echo "selected=\"selected\"";
                                        } ?> value="11">November</option>
                                <option <?php if (date('m', strtotime($edit->tgl_lahir)) == '12') {
                                            echo "selected=\"selected\"";
                                        } ?> value="12">Desember</option>
                            </select> &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="number" value="<?= date('Y', strtotime($edit->tgl_lahir)) ?>" name="thn" class="form-control col-lg-3">
                            <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('bln', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('thn', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $edit->tempat_lahir ?>" placeholder="Tempat Lahir">
                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="alamat" value="<?= $edit->alamat ?>" placeholder="Alamat">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <!-- <label>Wilayah <span style="color: red;">*</span></label> -->
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control col-lg-4" name="kota" id="kota">
                                <option></option>
                                <?php foreach ($kota as $city) { ?>
                                    <option <?php if ($edit->kota == $city['id']) {
                                                echo "selected=\"selected\"";
                                            } ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php } ?>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="hidden" class="form-control" name="old_kecamatan" value="<?= $edit->kecamatan ?>">
                            <select class="form-control col-lg-4" name="kecamatan" id="kecamatan">
                                <option></option>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="hidden" class="form-control" name="old_desa" value="<?= $edit->desa ?>" placeholder="Alamat">
                            <select class="form-control col-lg-3" name="desa" id="desa">
                                <option></option>
                            </select>
                            <img src="<?= base_url() ?>assets/image/loading.gif" width="35" id="load1" style="display:none;">
                            <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('desa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No Telepon <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="no_telp" value="<?= $edit->no_telp ?>" placeholder="No Telepon">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" value="<?= $edit->pekerjaan ?>" placeholder="Pekerjaan">
                        <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir <span style="color: red;">*</span></label>
                        <select name="pendidikan_terakhir" id="role" class="form-control">
                            <option></option>
                            <option <?php if ($edit->pendidikan_terakhir == 'SD/MI') {
                                        echo "selected=\"selected\"";
                                    } ?> value="SD/MI">SD/MI</option>
                            <option <?php if ($edit->pendidikan_terakhir == 'SMP/MTS') {
                                        echo "selected=\"selected\"";
                                    } ?> value="SMP/MTS">SMP/MTS</option>
                            <option <?php if ($edit->pendidikan_terakhir == 'SMA/SMK/MA') {
                                        echo "selected=\"selected\"";
                                    } ?> value="SMA/SMK/MA">SMA/SMK/MA</option>
                            <option <?php if ($edit->pendidikan_terakhir == 'D3 (Diploma)') {
                                        echo "selected=\"selected\"";
                                    } ?> value="D3 (Diploma)">Diploma</option>
                            <option <?php if ($edit->pendidikan_terakhir == 'Sarjana (S1/D4)') {
                                        echo "selected=\"selected\"";
                                    } ?> value="Sarjana (S1/D4)">Sarjana (S1/D4)</option>
                            <option <?php if ($edit->pendidikan_terakhir == 'Magister (S2)') {
                                        echo "selected=\"selected\"";
                                    } ?> value="Magister (S2)">Magister (S2)</option>
                            <option <?php if ($edit->pendidikan_terakhir == 'Doktor (S3)') {
                                        echo "selected=\"selected\"";
                                    } ?> value="Doktor (S3)">Doktor (S3)</option>
                        </select>
                        <?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nama Wali <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="nama_wali" value="<?= $edit->nama_wali ?>" placeholder="Nama Wali">
                        <?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Hubungan Dengan Pasien <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="hubungan" value="<?= $edit->hubungan ?>" placeholder="Hubungan Dengan Pasien">
                        <?= form_error('hubungan', '<small class="text-danger pl-3">', '</small>'); ?>
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
    // $('.nomor-bpjs').hide();

    let radio_bpjs = $("input[type=radio].jenis-pasien-bpjs");


    $('.jenis-pasien-bpjs').click(function() {
        if ($(this).is(':checked')) {
            $('.nomor-bpjs').show();
        }
    })

    $('.jenis-pasien-umum').click(function() {
        if ($(this).is(':checked')) {
            $('.nomor-bpjs').hide();
        }
    })

    $(document).ready(function() {
        //untuk memanggil plugin select2
        $('#role').select2({
            placeholder: 'Pilih Pendidikan Terakhir',
        });

        $('#tgl').select2({
            placeholder: 'Pilih Tanggal',
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

        //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
        $("#kota").change(function() {
            $("img#load1").show();
            var id_city = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?= base_url('Loket/wilayah?jenis=kecamatan') ?>",
                data: "id_city=" + id_city,
                success: function(msg) {
                    $("select#kecamatan").html(msg);
                    $("img#load1").hide();
                    getAjaxKota();
                }
            });
        });

        $("#kecamatan").change(function() {
            $("img#load1").show();
            var id_districts = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?= base_url('Loket/wilayah?jenis=desa') ?>",
                data: "id_districts=" + id_districts,
                success: function(msg) {
                    $("select#desa").html(msg);
                    $("img#load1").hide();
                    getAjaxKota();
                }
            });
        });

    });

    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.password').attr('type', 'text');
            } else {
                $('.password').attr('type', 'password');
            }
        });
    });
</script>