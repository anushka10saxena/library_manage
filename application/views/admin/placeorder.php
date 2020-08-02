<html>
<head>
	<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/table.css');?>">
<?php include('header.php');?>
</br>
<div class="container">
	<h1>Place Order</h1>
	<?php echo form_open('admin_dash/placeorder');?>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Book Title:</label>
				<?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Enter Title','value'=>set_value('title'),'style'=>'text-transform: uppercase']);?>
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
				<label for="author">Book Author:</label>
				<?php echo form_input(['name'=>'author','class'=>'form-control','placeholder'=>'Enter name of the author','value'=>set_value('author'),'style'=>'text-transform: uppercase']);?>
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
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="date">Date of order:</label>
				<input name='orderdate' class='form-control' placeholder='Quantity available' value="<?php echo date('y-m-d');?>" readonly="readonly">
			</div>
		</div>
	</div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);?>
    <?php echo form_submit(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
    </br></br>
</div>
</body>
</head>
</html>