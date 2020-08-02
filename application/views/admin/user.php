<?php include('header.php');?>
<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/table.css');?>">
<div class="container">
<h1>User Management</h1>
<script>
	$(document).ready(function(){
		$("#myInput").on("keyup",function(){
			var value=$(this).val().toLowerCase();
			$("#myTable tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	});
</script>
<div class="row">
<div class="col-lg-4">
<form class="form-inline">
      <input class="form-control" type="search" placeholder="Search by name or roll no." aria-label="Search" id="myInput">
      <button class="btn btn-outline-success" type="submit">Search</button>
</form>
</div>
</div>
</br>
<a href="issue" class="btn btn-info">ISSUE</a>
</br></br>
<table class="table table-bordered">
	<thead>
		<tr>
		<th>Username</th>
		<th>Roll no.</th>
		<th>Name of Book</th>
		<th>Author</th>
		<th>Issue date</th>
		<th>Return date</th>
		<th>Status</th>
	</tr>
	</thead>
	<tbody id="myTable">
		<?php foreach ($userinfo as $user):?>
		<tr>
		<td><?php echo $user->name;?></td>
		<td><?php echo $user->student_id;?></td>
		<td><?php echo $user->title;?></td>
		<td><?php echo $user->author;?></td> 
		<td><?php echo $user->issue_date;?></td>
		<td><?php echo $user->return_date?></td>
		<td><?php if($user->status!=true):
		  echo anchor("admin_dash/return/{$user->issue_id}",'Return',['class'=>'btn btn-danger']);
		  elseif($user->status==true&&$user->fine==0):
		  echo anchor("#","<i class='fa fa-check-circle'></i>",['class'=>'alert-success'],'</i>'); 
		   elseif($user->status==true&&$user->fine!=0):
		  	echo anchor("#","<i class='fa fa-check-circle'></i>",['class'=>'alert-success'],'</i>');
		  	echo anchor("#"," Fine: Rs.$user->fine",['class'=>'alert-warning'],'</i>');
		endif;?>
		</td>
	</tr>
	<?php endforeach;?>
</tbody>
</table>
</div>
</body>
