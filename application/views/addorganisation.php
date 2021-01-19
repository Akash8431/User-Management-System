<?php include("inc/header.php");?>
<div class="container">
	<?php echo form_open("superadmin/CreateOrganisation",['class'=>'form-horizontal']);?>
	 <?php if($msg=$this->session->flashdata('message')):?>

		<div class="row">
	<div class="col-md-6">
		<div class=" alert-dismissible alert">
			
			
		</div>
		
	</div>
	</div>
	<?php endif ;?>
	<h3>ADD Organisation</h3>
	<hr>

		<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Organisation Name</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'organisationname','class'=>'form-control','placeholder'=>'Organisation Name','value'=>set_value('organisationname')]);?>
			</div>
		</div>
	</div>
</div>
		<div class="col-md-6">
			<?php echo form_error('organisationname','<div class="text-danger">','</div>');?>
		</div>
		<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label"> Buy Subscription</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'subscription','class'=>'form-control','placeholder'=>'Subscription']);?>
			</div>
		</div>
	</div>
</div>
		<div class="col-md-6">
			<?php echo form_error('subscription','<div class="text-danger">','</div>');?>

		</div>

		<button type="submit" class=" btn btn-primary">ADD</button>

		<?php echo anchor("Welcome","Back",['class'=>'btn btn-primary']);?>

	<?php echo form_close();?>
</div>
<?php include("inc/footer.php");?>