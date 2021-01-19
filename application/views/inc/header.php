<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Management Module</title>
	<link rel="stylesheet" href="<?php echo base_url('Assets/css/bootstrap.min.css'); ?>"/>
	<script src="<?php echo base_url('Assets/js/jquery-3.1.0.js'); ?>"></script>
	<script src="<?php echo base_url('Assets/js/bootstrap.min.js'); ?>"></script>


	
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <div class="navbar-header col-lg-10">
  <a href="" class="navbar-brand" style="color: #fff;">User Management Module</a>
</div>
  <div class="col-lg-2" style="margin-top: 15px;"id="bs-example-navbar-collapse-2">
    <div class="btn-group">
      <a href="#" class="btn btn-default">Settings</a>
      <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
      aria-expanded="true">
      <span class="caret"></span></a>
      <ul class="dropdown">
        <li><?php echo anchor("superadmin/dashboard",'Dashboard');?></li>
        <li><?php echo anchor("welcome/logout",'Logout');?></li>
      </ul>
    </div>
  </div>
</div>
</nav>
	