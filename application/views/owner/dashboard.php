<?php $this->load->view('partials/header') ?>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/image/image-dashboard.png') ?>" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Selamat Datang <div class="weight-600 font-30 text-blue"><?= $this->session->userdata('username') ?></div>
                    </h4>
                    <p class="font-18 max-width-600">Semangat dan selalu menjadi profesional dan menjadi kebanggan untuk diri sendiri.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $jml_pasien ?></div>
                            <div class="weight-600 font-14">Jumlah Pasien</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $jml_user ?></div>
                            <div class="weight-600 font-14">Jumlah User Petugas</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $jml_kunjungan ?></div>
                            <div class="weight-600 font-14">Total Kunjungan</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $jml_transaksi_obat ?></div>
                            <div class="weight-600 font-14">Total Transaksi Obat</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-30">
                <div class="card-box height-100-p pd-20">
                    <h2 class="h4 mb-20">Grafik Kunjungan</h2>
                    <form method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ml-3">
                                    <label>Tahun</label>
                                    <?php if (empty($_GET['tahun'])) { ?>
                                        <select class="form-control" id="tahun" name="tahun">
                                            <option></option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    <?php } else { ?>
                                        <select class="form-control" id="tahun" name="tahun">
                                            <option></option>
                                            <option <?php if ($_GET['tahun'] == '2022') {
                                                        echo "selected=\"selected\"";
                                                    } ?>value="2022">2022</option>
                                            <option <?php if ($_GET['tahun'] == '2023') {
                                                        echo "selected=\"selected\"";
                                                    } ?> value="2023">2023</option>
                                            <option <?php if ($_GET['tahun'] == '2024') {
                                                        echo "selected=\"selected\"";
                                                    } ?> value="2024">2024</option>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 33px;">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                <a href="<?= base_url('Owner') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div id="chart5"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer') ?>

<script>
    $('#tahun').select2({
        placeholder: 'Pilih Tahun',
    });

    var options5 = {
        chart: {
            height: 350,
            type: 'bar',
            parentHeightOffset: 0,
            fontFamily: 'Poppins, sans-serif',
            toolbar: {
                show: false,
            },
        },
        colors: ['#1b00ff', '#f56767'],
        grid: {
            borderColor: '#c7d2dd',
            strokeDashArray: 5,
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '25%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Kunjungan',
            data: <?= json_encode($grafik_kunjungan) ?>
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            labels: {
                style: {
                    colors: ['#353535'],
                    fontSize: '16px',
                },
            },
            axisBorder: {
                color: '#8fa6bc',
            }
        },
        yaxis: {
            title: {
                text: ''
            },
            labels: {
                style: {
                    colors: '#353535',
                    fontSize: '16px',
                },
            },
            axisBorder: {
                color: '#f00',
            }
        },
        legend: {
            horizontalAlign: 'right',
            position: 'top',
            fontSize: '16px',
            offsetY: 0,
            labels: {
                colors: '#353535',
            },
            markers: {
                width: 10,
                height: 10,
                radius: 15,
            },
            itemMargin: {
                vertical: 0
            },
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            style: {
                fontSize: '15px',
                fontFamily: 'Poppins, sans-serif',
            },
            y: {
                formatter: function(val) {
                    return val
                }
            }
        }
    }
    var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
    chart5.render();
</script>