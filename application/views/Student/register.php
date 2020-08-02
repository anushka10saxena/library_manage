
<link rel="stylesheet" href="<?php echo base_url('Assets/css/style.css');?>">
<?php include('header.php');?>
<div class="container">
	<h1>STUDENT REGISTRATION</h1>
	<?php echo form_open_multipart('student/register');?>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="username">Name:</label>
			   <?php echo form_input(['name'=>'name', 'class'=>'form-control','placeholder'=>'Enter name','value'=>set_value('name')]);?>
			</div>
		</div>
	</br></br>
		<div class="col-lg-6">
			<div class='text-danger'>
				<?php echo form_error('name');?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="rollno">Roll no.:</label>
			   <input name='student_id' class='form-control' value="LIB<?php echo date('y');echo'A';foreach($student as $s){$array[]=$s->id;}if(max($array)){printf('%04d',$s->id+1);}?>" readonly>
			</div>
		</div>			
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="rollno">Email:</label>
			   <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter email','value'=>set_value('email')]);?>
			</div>
		</div>
	</br></br>
			<div class="col-lg-6">
			<div class='text-danger'>
				<?php echo form_error('email');?>
			</div>
		</div>
	</div>
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
			   <?php echo form_input(['name'=>'password', 'type'=>'password','class'=>'form-control','placeholder'=>'Enter Password','value'=>set_value('password')]);?>
			</div>
		</div>
	</br></br>
			<div class="col-lg-6">
			<div class='text-danger'>
				<?php echo form_error('password');?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="rollno">Date of registration:</label>
			   <input name='date' class='form-control' value="<?php echo date('y-m-d');?>" readonly="readonly">
			</div>
		</div></div>
		<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="body">Select Image:</label>
				<?php echo form_upload(['name'=>'userfile']);?>
			</div></div>
			<div class="col-lg-6">
				<?php if(isset($upload_error))
				{
					echo $upload_error;
				}
				?>
			</div></div>
	<?php echo form_submit(['class'=>'btn btn-primary','value'=>'submit','type'=>'submit']);?>
	<?php echo form_reset(['class'=>'btn btn-secondary','value'=>'reset']);?>
	</br></br>
</div>
</body>
</head>
</html>