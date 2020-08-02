<html>
<head>
<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/table.css');?>">
	<?php include('header.php');?>
	<div class="container">
</br></br>
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
      <input class="form-control" type="search" placeholder="Search by book name,author" aria-label="Search" id="myInput">
      <button class="btn btn-outline-success" type="submit">Search</button>
</form>
</div>
</div>
</br>
	<body>
	<i class="fa fa-plus"></i>
</body>
<a href="<?php echo base_url('admin_dash/addbooks');?>" class="btn btn-primary">Add Books</a>
</br></br>
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
			<th>BOOK NAME</th>
			<th>AUTHOR</th>
			<th>COST</th>
			<th>QUANTITY</th>
		</tr>
	</thead>
	<tbody id="myTable">
		<?php foreach ($bookinfo as $book):?>
		<tr>
			<td><?php echo $book->title;?></td>
			<td><?php echo $book->author;?></td>
			<td><?php echo $book->cost;?></td>
			<td><?php echo $book->quantity;?> <?php echo anchor("admin_dash/increase/{$book->book_id}","<i class='fa fa-plus-square'>",'</i>');?></td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
</div>
</body>
</head>
</html>





