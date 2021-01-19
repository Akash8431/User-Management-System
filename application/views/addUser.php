<?php include("inc/header.php");?>
<div class="container">
	<?php echo form_open("superadmin/CreateUser",['class'=>'form-horizontal']);?>
	<?php if($msg=$this->session->flashdata('message')):?>

	<div class="col-md-6">
		
	</div>
	</div>
	<?php endif ;?>
	<h3>Add User</h3>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Username</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]);?>
			</div>
		</div>
	</div>
</div>
		<div class="col-md-6">
			<?php echo form_error('username','<div class="text-danger">','</div>');?>

		</div>



<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Organisation Name</label>
				
					<select class="col-lg-9" name="organisation_id">
						<option value="">Select</option>
							<?php if(count($organisation)):?>
							<?php foreach($organisation as $organisation):?>

						<option value=<?php echo $organisation->organisation_id?>><?php echo $organisation->organisationname?></option>
					<?php endforeach ;?>
					<?php endif; ?>
					</select>
				</div>
			
		</div>
	</div>
		<div class="col-md-6">
			<?php echo form_error('organisation_id','<div class="text-danger">','</div>');?>
		</div>

		


		<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Email</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email')]);?>
			</div>
		</div>
	</div>
</div>
		<div class="col-md-6">
			<?php echo form_error('email','<div class="text-danger">','</div>');?>
		</div>


		<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Gender</label>
				
					<select class="col-lg-9" name="gender">
								<option value="">Select</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
					</select>
				</div>
		
		</div>
	</div>
		<div class="col-md-6">
			<?php echo form_error('gender','<div class="text-danger">','</div>');?>
		</div>


<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">buysub</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'buysub','class'=>'form-control','placeholder'=>'buysub','value'=>set_value('buysub')]);?>
			</div>
		</div>
	</div>
</div>
		<div class="col-md-6">
			<?php echo form_error('buysub','<div class="text-danger">','</div>');?>

		</div>





		<button type="submit" class=" btn btn-primary">ADD</button>

		<?php echo anchor("Welcome","Back",['class'=>'btn btn-primary']);?>

	<?php echo form_close();?>
</div>
<?php include("inc/footer.php");?>