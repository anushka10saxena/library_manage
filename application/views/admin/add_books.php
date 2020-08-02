<html>
<head>
<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/style.css');?>">
<?php include('header.php');?>
</br></br></br>
<div class="container">
	<h1>Add Book</h1>
	<?php echo form_open('admin_dash/addbooks');?>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Book Title:</label>
				<input type="text" name= 'title' class='form-control' placeholder='Enter Title' style="text-transform: uppercase" value="<?php set_value('title');?>">
			</div>
		</div>
	</br></br>
		<div class="col-lg-6">
			<div class="form-group">
				<div class="text-danger">
					<?php echo form_error('title');?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Book Author:</label>
				<input type="text" name= 'author' class='form-control' placeholder='Enter Author' style="text-transform: uppercase" value="<?php set_value('author');?>">
			</div>
		</div>
		</br></br>
		<div class="col-lg-6">
			<div class="form-group">
				<div class="text-danger">
					<?php echo form_error('author');?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Book Cost:</label>
				<?php echo form_input(['name'=>'cost','class'=>'form-control','placeholder'=>'Enter Cost','value'=>set_value('cost')]);?>
			</div>
		</div>
		</br></br>
		<div class="col-lg-6">
			<div class="form-group">
				<div class="text-danger">
					<?php echo form_error('cost');?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Quantity:</label>
				<?php echo form_input(['name'=>'quantity','class'=>'form-control','placeholder'=>'Quantity available','value'=>set_value('quantity')]);?>
			</div>
		</div>
		</br></br>
		<div class="col-lg-6">
			<div class="form-group">
				<div class="text-danger">
					<?php echo form_error('quantity');?>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);?>
    <?php echo form_submit(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
</div>
</body>
</head>
</html>