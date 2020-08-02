<html>
<head>
<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/style.css');?>">
	<?php include('header.php');?>
<div class="container">
	<h1>Return Book</h1>
</br>
	<?php foreach ($returnbook as $book):?> 
		<?php echo form_open("admin_dash/update/{$book->issue_id}");?>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Name:</label>
				<input name="name" class="form-control" value="<?php echo $book->name;?>" readonly="readonly">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Roll no.:</label>
				<input name="student_id" class="form-control" value="<?php echo $book->student_id;?>" readonly="readonly">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Book Title:</label>
				<input name="title" class="form-control" value="<?php echo $book->title;?>" readonly="readonly">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="date">Issue Date:</label>
				<input name="issue_date" class="form-control" value="<?php echo $book->issue_date;?>" readonly="readonly">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="date">Return Date:</label>
				<input name="return_date" class="form-control" value="<?php echo date('y-m-d');?>" readonly="readonly">
			</div>
		</div>
	</div>
<?php endforeach;?>
	<?php if(date('y-m-d')>=$book->return_date):?>
		<?php $date1="$book->return_date";
		 //$date2="date('y-m-d')";
		$date2=date('y-m-d');
		$diff=abs(strtotime($date2)-strtotime($date1));
		//$years=floor($diff/(365*60*60*24));
		//$months=floor(($diff-$years*365*60*60*24)/(30*60*60*24));	
		//$days=floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24));
		$days=floor($diff/(60*60*24)*10);
		echo anchor("#","Fine: <input name='fine' value='$days
		'' readonly='readonly'>",['class'=>'alert alert-danger','name'=>'Fine']);?><?php endif;?></br></br>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-warning','value'=>'Return']);?>
</br>
</div>
</body>
</head>
</html>