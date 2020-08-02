<h3>Thank you for the registration.</h3>
<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="username">Name:</label>
			   <input name='name' class='form-control' value="<?php foreach($info as $i){}echo $i->name;?>" readonly>
			</div>
		</div>
	</div></br>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="rollno">Roll no.:</label>
			 <input name='student_id' class='form-control' value="<?php foreach($info as $i){}echo $i->student_id;?>" readonly>
			</div>
		</div>			
	</div></br>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="rollno">Email:</label>
			 <input name='email' class='form-control' value="<?php foreach($info as $i){}echo $i->email;?>" readonly>  
			</div>
		</div>
	</div></br>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="rollno">Date of registration:</label>
			<input name='date' class='form-control' value="<?php foreach($info as $i){}echo $i->date;?>" readonly>   
			</div>
		</div></div>