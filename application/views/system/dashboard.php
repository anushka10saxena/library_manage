<html>
  <head><?php include('header.php');?></head>
    <body>
 <link rel="stylesheet" href="<?php echo base_url('Assets/css/bg.css');?>">
 <div class="container">
	<nav class="navbar navbar-inverse">
  <div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">LIBRARY MANAGEMENT</a>
</div>
<div class="collapse navbar-collapse" id="main-menu">
<ul class="nav navbar-nav">
  <li class="active"><?php echo anchor("admin/index","<i class='fa fa-user fa-lg'></i></br>Admin",['class'=>'alert-success']);?><span class="sr-only">(current)</span>
  </li>
 <li><?php echo anchor("student","<i class='fa fa-users fa-lg'></i></br>Student",['class'=>'alert-warning']);?></li>
</ul>
</div>
</div>
</nav></br></br></br></br></br></br>
<h1>Welcome</h1>
</div>
</body>
</html>