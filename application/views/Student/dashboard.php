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
    <span class="icon-bar"></span><span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">LIBRARY MANAGEMENT</a>
</div>
<div class="collapse navbar-collapse" id="main-menu">
<ul class="nav navbar-nav">
  <li class="active"><a class="nav-link" href="studentinfo">Books Issued<span class="sr-only">(current)</span></a>
  </li>
 <li><a class="nav-link" href="logout"><i class="fa fa-sign-out">Logout</i></a></li>
 <!--<li class="active"><a class="nav-link" href="logout"><i class="fa fa-sign-out">Logout<span class="sr-only">(current)</span></i></a>
  </li>-->
  <!--<li><a class="nav-link" href="student_dash/logout">Logout</a></li>-->
  <!---<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">--->
  </ul>
</div></div></nav></div>
<div class="container">
    <link rel="stylesheet" href="http://localhost/libmanage/Assets/css/bg.css">
    <h3> Book Inquiry</h3>
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
<!--<link rel="stylesheet" href="http://localhost/libmanage/Assets/css/bg.css">-->
<table class="table table-bordered">
  <thead>
    <tr>
      <th><font color="white">BOOK NAME</font></th>
      <th><font color="white">AUTHOR</font></th>
      <th><font color="white">STATUS</font></th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php foreach ($bookinquire as $inquire):?>
    <tr>
      <td><font color="white"><?php echo $inquire->title;?></font></td>
      <td><font color="white"><?php echo $inquire->author;?></font></td>
      <td><?php if($inquire->quantity!=0):
      echo anchor("#",'Available',['class'=>'alert-success']);
      else:
      echo anchor("#",'Not Available',['class'=>'alert alert-danger']);
      endif;?></td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php echo $this->pagination->create_links();?>
</div>
</head>
</body>
</html>