<html>
<head>
	<?php include('header.php');?>
	<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/table.css');?>">
</br>
<div class="container">
<h1>Registered Users</h1>
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
  <font color="white"><i class="fa fa-search"></i></font>
      <input class="form-control" type="search" placeholder="Search by book name,author" aria-label="Search" id="myInput">
      <button class="btn btn-outline-success" type="submit">Search</button>
</form>
</div>
</div>
</br>
<table class="table table-bordered">
	<thead>
		<tr>
		<th>S.no.</th>
	    <th></th>
		<th>Name</th>
		<th>Roll no.</th>
		<th>Email</th>
		<th>Date of Registration</th>
	</tr>
	</thead>
	<tbody id="myTable">
		<?php if(count($student)):
			$count=$this->uri->segment(3);?>
		<?php foreach ($student as $s):?>
		<tr>
			<td><?php echo ++$count;?></td>
			<?php if(!is_null($s->image_path)):?>
		<td><img src="<?php echo $s->image_path;?>" alt="" width="90" height="90"></td>
	<?php endif;?>
		<td><?php echo $s->name;?></td>
		<td><?php echo $s->student_id;?></td>
		<td><?php echo $s->email;?></td>
		<td><?php echo $s->date;?></td>
	</tr>
	<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="4">no data available</td>
		</tr>
<?php endif;?>
</tbody>
</table>
<?php echo $this->pagination->create_links();?>
</div>
</body>
</html>