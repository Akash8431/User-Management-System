<?php include("inc/header.php");?>
<div class="container">
	<div class="jumbotron">
		<h2 class="display-3" style="text-align: center;">SUPER ADMIN and ADMIN LOGIN</h2>
		<hr>
		<div class="my-4">
			<div class="row">
				<?php if($chkSuperadminExist):?>
					<?php else:?>
					<div class="col-lg-4">
						<?php echo anchor("Welcome/superadminRegister","SUPER ADMIN REGISTER",['class'=>'btn btn-primary']);?>
					</div>
			

				<?php endif;?>
				<div class="col-lg-4">

				<?php echo anchor("Welcome/login","SUPER ADMIN LOGIN",['class'=>'btn btn-primary']);?>
				</div>
			</div>
		</div>
		</div>
	</div>

<?php include("inc/footer.php");?> 