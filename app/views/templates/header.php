<!DOCTYPE html>
<html>
<head>
 <title><?= $data['title']; ?></title>
 <script src="<?= BASEURL ; ?>/vendor/jquery/jquery-3.4.1.min.js"></script>
 <link href="<?= BASEURL ; ?>/vendor/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet" />	
 <script src="<?= BASEURL ; ?>/vendor/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
 
 <style>
    .jumbotron {  
	  background: url("<?= BASEURL ;?>/gambar/mobil.jpg") no-repeat center center;
	  background-size: cover;	  
	  }
  </style> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="container">
   <a class="navbar-brand" href="<?= BASEURL; ?>">Home</a>
   
   <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
       
        <a class="nav-item nav-link" href="<?= BASEURL; ?>/mobil">Mobil</a>
		<a class="nav-item nav-link" href="<?= BASEURL; ?>/user">User</a>
        <a class="nav-item nav-link" href="<?= BASEURL; ?>/sewa">Sewa Mobil</a>
		<a class="nav-item nav-link" href="<?= BASEURL; ?>/bayar">Pembayaran</a>
		<a class="nav-item nav-link" href="<?= BASEURL; ?>/about">About Me</a>
        
      </div>
    </div>
   </div>

</nav> 

