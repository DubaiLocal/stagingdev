<?php echo view('admin/template/header'); ?>
<?php $session = session(); ?>
<div class="main-div">
	<!-- Page Heading Start-->
	<div class="page_head_text mb-5">
		<h3>Save Business name in Keywords table</h3>
	</div>
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12">
			<?php
			if ($session->getFlashdata('success_save')) { ?>
				<div class="alert alert-success" role="alert">
					<?php echo $session->getFlashdata('success_save'); ?>
				</div>
			<?php
			}
			if ($session->getFlashdata('error_save')) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $session->getFlashdata('error_save'); ?>
				</div>
			<?php
			}
			?>
			<form method="post" action="<?= base_url() . "/admin/save-business-name-in-keywords" ?>" class="form-group">
				<button type="submit" class="btn btn-success">Add Business Keword</button>
			</form>
		</div>
	</div>
	<!-- Page Heading End-->
</div>


<?php echo view('admin/template/footer'); ?>
</body>

</html>