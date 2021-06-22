</main>
<!-- END: Content-->

<footer class="ungu putih left">
	<p class="lead text-center">Made with <span style="color: red">&hearts;</span> Koperasi salimah team</p>
</footer>

<!-- START: Back to top-->
<a href="#" class="scrollup text-center">
	<i class="icon-arrow-up"></i>
</a>
<!-- END: Back to top-->

<!-- START: Template JS-->
<script src="<?= base_url('dist/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('dist/vendors/slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- END: Template JS-->

<script src="<?= base_url('dist/vendors/toastr/toastr.min.js') ?>"></script>

<!-- START: APP JS-->
<script src="<?= base_url('dist/js/global.js') ?>"></script>
<script src="<?= base_url('dist/js/app.js') ?>"></script>
<!-- END: APP JS-->

<!-- Other js -->
<?= isset($js) ? $js : ''; ?>
</body>

</html>
