<!-- <div class="footer-wrap pd-20 mb-20 card-box">
    Copyright by <a href="https://github.com/dropways" target="_blank">RME (Rekam Medis Elektronik)</a>
</div> -->
</div>
</div>
<!-- js -->
<script src="<?= base_url() ?>assets/vendors/scripts/core.js"></script>
<script src="<?= base_url() ?>assets/vendors/scripts/script.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/scripts/process.js"></script>
<script src="<?= base_url() ?>assets/vendors/scripts/layout-settings.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="<?= base_url() ?>assets/vendors/scripts/datatable-setting.js"></script>
<script src="<?= base_url() ?>assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>
<script>
    <?php if ($this->session->flashdata('berhasil_login')) : ?>
        toastr.success("Selamat Datang", "Berhasil Login!", {
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
    <?php endif; ?>
</script>
</body>
</body>

</html>