<?php echo view('seo/template/header'); ?>
<?php $session = session(); ?>
<div class="main-div">
	<!-- Page Heading Start-->
	<div class="page_head_text mb-5">
		<h3>Dashboard </h3>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="data_box">
				<div class="row align-items-center">
					<div class="col-8">
						<div class="data_text">
							<h4>Total Pages</h4>
							<p><?php echo  "-"; ?></p>
							<!-- <p class="probablity"><span class="bg-info">50%</span> Increased</p> -->
						</div>
					</div>
					<div class="col-4">
						<div class="data_icon claimed_green">
							<a href="#"><i class="fa fa-file-text" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Heading End-->
</div>
<?php echo view('seo/template/footer'); ?>
</body>

</html>