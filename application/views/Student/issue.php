<html>
<head>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet"href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
  ul{
    background-color: #eee;
    cursor:pointer;
  }
  li
  {
    padding: 10px;
  }
</style>
  </head>
<body><link rel="stylesheet" href="<?php echo base_url('Assets/css/style.css');?>">
<div class="container">
	<h1>Issue Book</h1>
	<?php echo form_open('admin_dash/issue');?>
  <!---<form action="" method="post">-->
  <div class="row">
  <div class="col-lg-6">
    <div class="form-group">
  <label>Roll no.</label>
  <input type='text' name="student_id" id='student_id' class='form-control' placeholder='Enter roll no.' onkeyup="GetDetail(this.value)" value="LIB<?php set_value('student_id');?>"  style="text-transform: uppercase" required></div></div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label>Name:</label>
  <input type="text" name="name" id="name" class="form-control" placeholder='Name' value="<?php set_value('name');?>" style="text-transform: uppercase" required></div></div>
  <script type="text/javascript"></script>
  <script>
    function GetDetail(str){
      if(str.length==0){
        document.getElementById("name").value="";
        return;
      }
      else
      {
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange =function(){
          if(this.readyState==4 && this.status==200){
            var myObj= JSON.parse(this.responseText);
            document.getElementById("name").value=myObj[0];
          }
        };
        xmlhttp.open("GET","<?php echo base_url('admin_dash/search_name');?>?student_id=" +str,true);
        xmlhttp.send();
      }
    }
</script>
    <div class="row">
      <div class="col-lg-6">
        <label>Title:</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="title" autocomplete="off" onkeyup="GetBookDetail(this.value)" value="<?php set_value('title');?>"  style="text-transform: uppercase" required>
        <div id="booklist"></div>
      </div></div>
      <script>  
    $(document).ready(function(){
     $( "#title" ).keyup(function(){
        var query= $(this).val();
        if(query!=''){
          $.ajax({
            url: "<?php echo base_url('admin_dash/get_name');?>",
            method:"POST",
            data: {query:query},
            success: function( data )
             {
              $('#booklist').fadeIn();
              $('#booklist').html(data);
            }
          });
        }
        else{
              $('#booklist').fadeOut();
              $('#booklist').html("");
        }
       });
     $(document).on('click','li',function(){
      $('#title').val($(this).text());
      $('#booklist').fadeOut();
     });
   });
 </script>
      <div class="row">
  <div class="col-lg-6">
  <label>Author:</label>
  <input type="text" name="author" id="author" class="form-control" placeholder='Author' value="<?php set_value('author');?>"  style="text-transform: uppercase" required></div></div>
  <script type="text/javascript">
      function GetBookDetail(str)
      {
      if(str.length==0){
        document.getElementById("author").value="";
        return;
      }
      else
      {
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange =function(){
          if(this.readyState==4 && this.status==200){
            var myObj= JSON.parse(this.responseText);
            document.getElementById("author").value=myObj[0];
          }
        };
        xmlhttp.open("GET","<?php echo base_url('admin_dash/search_author');?>?title=" +str,true);
        xmlhttp.send();
      }
    }  
</script>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="date">Issue Date:</label>
				<input name="issuedate" class="form-control" value="<?php echo mdate('%y-%m-%d');?>" readonly="readonly">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="title">Return Date:</label>
				<input name="returndate" class="form-control" value="<?php echo mdate('%y-%m-%d',strtotime('+1 month'));?>" readonly="readonly">
			</div>
		</div>
	</div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);?>
    <?php echo form_submit(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
</div>
</body>
</html>