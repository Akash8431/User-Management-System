<?php include("inc/header.php");?>
<div class="container">

<h3>Super Admin Dashboard</h3>
<?php  $username=$this->session->userdata('username');?>
<h3>Welcome <?php echo $username;?></h3>
<?php echo anchor("superadmin/addOrganisation","ADD ORGANISATION",['class'=>'btn btn-primary']);?>
<?php echo anchor("superadmin/addAdmin","ADD Admin",['class'=>'btn btn-primary']);?>
<?php echo anchor("superadmin/addUser","ADD User",['class'=>'btn btn-primary']);?>
<hr>
<div class="row">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">organisation name</th>
				<th scope="col">Username</th>
				<th scope="col">Email</th>
				<th scope="col">Gender</th>
				<th scope="col">Subscription</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if($users):?>
				<?php foreach($users as $user):?>
				<tr class="table-active">

				<td><?php echo $user->organisation_id;?></td>
				<td><?php echo $user->organisationname;?></td>
				<td><?php echo $user->username;?></td>
				<td><?php echo $user->email;?></td>
				<td><?php echo $user->gender;?></td>
				<td><?php echo $user->subscription;?></td>
				<td><?php echo anchor("superadmin/viewOrganisation","VIEW",['class'=>'btn btn-primary']);?></td>
			</tr>
		<?php endforeach;?>
			<?php else:?>
				<tr>
					<td>No Record</td>
				</tr>

			<?php endif;?>
		</tbody>
	</table>
</div>
</div>


<?php include("inc/footer.php");?>

