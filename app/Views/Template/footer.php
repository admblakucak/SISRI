</div>
<!-- /main-content -->

<!-- Footer opened -->
<div class="main-footer ht-40">
	<div class="container-fluid pd-t-0-f ht-100p">
		<span>Copyright © 2022 <a href="http://teknik.trunojoyo.ac.id/">FT-UTM</a>.
			All rights reserved.</span>
	</div>
</div>
<!-- Footer closed -->

</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Bundle js -->
<script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ionicons js -->
<script src="<?= base_url(); ?>/assets/plugins/ionicons/ionicons.js"></script>
<!-- Moment js -->
<script src="<?= base_url(); ?>/assets/plugins/moment/moment.js"></script>
<!-- P-scroll js -->
<script src="<?= base_url(); ?>/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/perfect-scrollbar/p-scroll.js"></script>
<!-- Sticky js -->
<script src="<?= base_url(); ?>/assets/js/sticky.js"></script>
<!-- Rating js-->
<script src="<?= base_url(); ?>/assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/rating/jquery.barrating.js"></script>
<!-- Sidebar js -->
<script src="<?= base_url(); ?>/assets/plugins/side-menu/sidemenu.js"></script>
<!-- Right-sidebar js -->
<script src="<?= base_url(); ?>/assets/plugins/sidebar/sidebar.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/sidebar/sidebar-custom.js"></script>
<!-- eva-icons js -->
<script src="<?= base_url(); ?>/assets/js/eva-icons.min.js"></script>
<!-- custom js -->
<script src="<?= base_url(); ?>/assets/js/custom.js"></script>
<!-- Internal Data tables -->
<script src="<?= base_url(); ?>/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/datatables.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<!--Internal  Datatable js -->
<script src="<?= base_url(); ?>/assets/js/table-data.js"></script>
<!-- Internal Modal js-->
<script src="<?= base_url(); ?>/assets/js/modal.js"></script>
<!--Internal  Datepicker js -->
<script src="<?= base_url(); ?>/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
<!-- Internal Select2 js-->
<script src="<?= base_url(); ?>/assets/plugins/select2/js/select2.min.js"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="<?= base_url(); ?>/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!--Internal  jquery-simple-date time picker js -->
<script src="<?= base_url(); ?>/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
<!--Internal  pickerjs js -->
<script src="<?= base_url(); ?>/assets/plugins/pickerjs/picker.min.js"></script>
<!--Internal  jquery.maskedinput js -->
<script src="<?= base_url(); ?>/assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="<?= base_url(); ?>/assets/plugins/spectrum-colorpicker/spectrum.js"></script>
<!-- Internal Form-editor js -->
<script src="<?= base_url(); ?>/assets/js/form-editor.js"></script>
<!--Internal quill js -->
<script src="<?= base_url(); ?>/assets/plugins/quill/quill.min.js"></script>
<!--Internal  Perfect-scrollbar js -->
<script src="<?= base_url(); ?>/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/ckeditor/ckeditor.js') ?>"></script>
<!-- Internal form-elements js -->
<script src="<?= base_url(); ?>/assets/js/form-elements.js"></script>

<script>
	var quill = new Quill('#editor', {
		theme: 'snow'
	});
	quill.on('text-change', function(delta, oldDelta, source) {
		document.querySelector("input[name='nama_proyek']").value = quill.root.innerHTML;
	});
</script>
<script async src="//www.instagram.com/embed.js"></script>

<script type="text/javascript">
	$('#validasitable1').DataTable();
	$('#validasitable2').DataTable();
	$('#validasitable3').DataTable();
</script>

</body>

</html>