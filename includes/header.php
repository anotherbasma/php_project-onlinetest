<?php

session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>online test - <?php echo $pageTitle ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <style type="text/css">
  img[src*="footer-powered-by-000webhost-white2.png"] { display: none;}

    h2{
      text-align: center;
      margin-top: 1em;
    }
    form{
      max-width: 500px;
      margin: auto;


    }
    form a{

      display: block;
    }

    .form-check{
      display: inline-block;
    }
    
    .alert{
		
		display:none;
	}

 

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">about us</a>
		  </li>
		  <li class="nav-item dropdown">
		  
		  <?php
			if(isset($_SESSION['user'])):
			?>
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  welcome <?php echo $_SESSION['user']?>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			
			  <a class="dropdown-item" href="#">profile</a>
			  <a class="dropdown-item" href="#">setting</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="signout.php">sign out</a>
			  
			 <?php
			 
			 else:
			 ?> 
			 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  user
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			
			  <a class="dropdown-item" href="signin.php">sign in</a>
			  <a class="dropdown-item" href="changepassword.php">change password</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="signup.php">sign up</a>
			  
			  
			</div>
			
			
			<?php
			endif;
			?>
		  </li>
		  
		</ul>
		<ul class="navbar-nav my-5 my-lg-0">
		 
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  language
			</a>
			<div class="dropdown-menu " aria-labelledby="navbarDropdown2">
			
			  <a class="dropdown-item" href="#">AR</a>
			 
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">EN</a>
			  
			  
			</div>
		  </li>
		  
		  
		</ul>
		
		
	  </div>
	</nav>
	
	