<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="main-div">
	<!-- Page Heading Start-->
	<div class="page_head_text mb-5">
		<h3>Add District from address</h3>
	</div>
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12">
			<form method="post" action="<?= base_url() . "/admin/save-district-from-address" ?>" class="form-group">
				<button type="submit" class="btn btn-success">Add District</button>
			</form>
		</div>
	</div>
	<!-- Page Heading End-->
</div>


<?php echo view('admin/template/footer'); ?>
</body>

</html>