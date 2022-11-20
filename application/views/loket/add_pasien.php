<?php $this->load->view('partials/header') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Tambah Pasien</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pasien</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Tambah Pasien</li>
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
                        <h4 class="text-blue h4">Form Tambah Pasien</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('Loket/save_pasien') ?>">
                    <div class="form-group">
                        <label>No Rekam Medis <span style="color: red;">*</span></label>
                        <input class="form-control" value="<?= $no_rm ?>" readonly type="text" name="no_rm" placeholder="No Rekam Medis">
                        <?= form_error('no_rm', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>NIK <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="nik" placeholder="NIK">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pasien <span style="color: red;">*</span></label><br>
                        <input type="radio" class="jenis-pasien-umum" name="jenis_pasien" value="umum"> Umum
                        <input type="radio" class="jenis-pasien-bpjs" name="jenis_pasien" value="bpjs"> BPJS <br>
                        <?= form_error('jenis_pasien', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group nomor-bpjs">
                        <label>No BPJS <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="no_bpjs" placeholder="No BPJS">
                        <?= form_error('no_bpjs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="nama_lengkap" placeholder="Nama Lengkap">
                        <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="job-description">Jenis Kelamin <span class="text-danger">*</span></label><br>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan <br>
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alergi Obat</label>
                        <textarea class="form-control" name="alergi_obat" rows="5" cols="50"></textarea>
                        <?= form_error('alergi_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir <span style="color: red;">*</span></label>
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<select class="col-lg-3" id="tgl" name="tgl" title="Tanggal">
                                <?php for ($a = 1; $a <= 31; $a++) { ?>
                                    <option value="<?= $a ?>"><?= $a ?></option>
                                <?php  } ?>
                            </select> &nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="col-lg-5" id="bln" name="bln" title="Pilih Bulan">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select> &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="number" name="thn" class="form-control col-lg-3">
                            <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('bln', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('thn', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <!-- <label>Wilayah <span style="color: red;">*</span></label> -->
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control col-lg-4" name="kota" id="kota">
                                <!-- <option></option> -->
                                <?php foreach ($kota as $city) { ?>
                                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php } ?>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="form-control col-lg-4" name="kecamatan" id="kecamatan">
                                <option></option>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <input type="text" class="form-control" name="no_telp" placeholder="No Telepon">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
                        <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir <span style="color: red;">*</span></label>
                        <select name="pendidikan_terakhir" id="role" class="form-control">
                            <option></option>
                            <option value="SD/MI">SD/MI</option>
                            <option value="SMP/MTS">SMP/MTS</option>
                            <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                            <option value="D3 (Diploma)">Diploma</option>
                            <option value="Sarjana (S1/D4)">Sarjana (S1/D4)</option>
                            <option value="Magister (S2)">Magister (S2)</option>
                            <option value="Doktor (S3)">Doktor (S3)</option>
                        </select>
                        <?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nama Wali <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali">
                        <?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Hubungan Dengan Pasien <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="hubungan" placeholder="Hubungan Dengan Pasien">
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
    $(document).ready(function() {

        $('.nomor-bpjs').hide();

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

        //untuk memanggil plugin select2
        $('#role').select2({
            placeholder: 'Pilih Pendidikan Terakhir',
        });

        $('#jenis_pasien').select2({
            placeholder: 'Pilih Jenis Pasien',
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