<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/style.css');?>"></body>
<?php include('header.php');?>
</br></br></br>
<div class="container">
	<h1>ADMIN LOGIN</h1>
	<?php if($error=$this->session->flashdata('error')):?>
	<div class="row">
		<div class="col-lg-6">
			<div class="alert alert-danger">
				<?php echo $error;?>
			</div>
		</div>
	</div>
    <?php endif;?>
	<?php echo form_open('admin/index');?>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="username">Username:</label>
			   <?php echo form_input(['name'=>'username', 'class'=>'form-control','placeholder'=>'Enter Username','value'=>set_value('username')]);?>
			</div>
		</div>
	</br></br>
		<div class="col-lg-6">
			<div class='text-danger'>
				<?php echo form_error('username');?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="password">Password:</label>
			   <?php echo form_input(['name'=>'password', 'type'=>'password','class'=>'form-control','placeholder'=>'Enter Username','value'=>set_value('password')]);?>
			</div>
		</div>
	</br></br>
			<div class="col-lg-6">
			<div class='text-danger'>
				<?php echo form_error('password');?>
			</div>
		</div>
	</div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);?>
    <?php echo form_submit(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
</div>