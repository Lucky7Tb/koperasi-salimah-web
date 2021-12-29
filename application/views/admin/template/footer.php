</main>
<footer class="py-4 bg-light mt-auto">
	<div class="container-fluid px-4">
		<div class="d-flex align-items-center justify-content-between small">
			<div class="text-muted">Copyright &copy; Koperasi salimah <?= date("Y") ?></div>
		</div>
	</div>
</footer>
</div>
</div>


<script src="<?= base_url('dist/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="<?= base_url('dist/vendors/slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?= base_url('dist/vendors/tata/tata.js') ?>"></script>
<script src="<?= base_url('dist/admin/assets/js/scripts.js') ?>"></script>

<script src="<?= base_url('dist/js/global.js') ?>"></script>
<?= isset($js) ? $js : ''; ?>
</body>

</html>
