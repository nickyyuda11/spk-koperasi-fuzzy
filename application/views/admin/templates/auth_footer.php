<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>copyright &copy; <?= date('Y'); ?> - Buka Uang Finance.
			</span>
		</div>
	</div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/') ?>js/ruang-admin.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>ckeditor/ckeditor.js"></script>

<!-- Page level custom scripts -->
<script>
	$(document).ready(function() {
		$('#dataTable').DataTable(); // ID From dataTable 
		$('#dataTableHover').DataTable(); // ID From dataTable with Hover
	});
	CKEDITOR.replace('editor1');
</script>
</body>

</html>
