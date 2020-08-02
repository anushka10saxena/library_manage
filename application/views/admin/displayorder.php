<?php include('header.php');?>
<div class="container"><h3>Orders Placed</h3>
<table class="table table-bordered">
	<thead>
		<tr>
		<th>Tilte of book</th>
		<th>Author</th>
		<th>Quantity</th>
		<th>Order date</th>
	</tr>
	</thead>
	<tbody id="myTable">
		<?php foreach ($order as $o):?>
		<tr>
		<td><?php echo $o->title;?></td>
		<td><?php echo $o->author;?></td>
		<td><?php echo $o->quantity;?></td>
		<td><?php echo $o->orderdate;?></td>
	</tr>
	<?php endforeach;?>
</tbody>
</table>
</div>