<html>
<head>
	<?php include('header.php');?>
	<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/table.css');?>">
</br>
<div class="container">
	<h1>User Information</h1>
	<!--<?php foreach($student as $s):?><?php endforeach;?>
	<h3>Name:<?php echo $s->name;?></h3>-->
<?php if($msg=$this->session->flashdata('msg')):
		$msg_class=$this->session->flashdata('msg_class');?>
		<div class="row">
			<div class="col-lg-6">
				<div class="alert <?php echo $msg_class;?>">
					<?php echo $msg;?>
				</div>
			</div>
		</div>
	<?php endif;?>
<table class="table table-bordered"></br>
	<thead>
		<tr>
			<th>S.no.</th>
			<th>TITLE</th>
			<th>AUTHOR</th>
			<th>ISSUE DATE</th>
			<th>RETURN DATE</th>
			<th>STATUS</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($studentinfo)):
			$count=$this->uri->segment(3);?>
			<?php foreach ($studentinfo as $info):?>
		<tr>
			<td><?php echo ++$count;?></td>
			<td><?php echo $info->title;?></td>
			<td><?php echo $info->author;?></td>
			<td><?php echo $info->issue_date;?></td>
			<td><?php echo $info->return_date;?></td>
			<td><?php if($info->return_date<date('y-m-d')&&$info->status!=true):
		  echo anchor("#","<i class='fa fa-warning'></i>",['class'=>'alert-danger']);
		  //$.get("student_dash/timeup",{name:'$info->user_id'},function(data)
		  //{
		  	//alert(data);
		  //});
		  elseif($info->status==true&&$info->fine==0)://|$info->fine!=0):
		  echo anchor("#","<i class='fa fa-check-circle'></i>",['class'=>'alert-success'],'</i>'); 
		  elseif($info->status==true&&$info->fine!=0):
		  	echo anchor("#","<i class='fa fa-check-circle'></i>",['class'=>'alert-success'],'</i>');
		  	echo anchor("#"," Fine: $info->fine",['class'=>'alert-warning'],'</i>');
		endif;?>
		</td>
		</tr>
	<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="5">no data available</td>
		</tr>
	<?php endif;?>
	</tbody>
</table>
</div>
</body>
</head>
</html>
