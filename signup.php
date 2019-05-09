<?php
$pageTitle = 'sign up';
	if($_SERVER['REQUEST_METHOD']=='POST')
	{

		
        include('includes/config.php');
	    $username=$_POST['username'];
	    $email=$_POST['email'];
	    $password=md5($_POST['password']);
	    $mobile=$_POST['mobile'];
	    

	    $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password,user_mobile) 
	    VALUES (:user_name, :user_email, :user_password, :user_mobile)");
	    $stmt->bindParam(':user_name', $username);
	    $stmt->bindParam(':user_email', $email);
	    $stmt->bindParam(':user_password', $password);
	    $stmt->bindParam(':user_mobile', $mobile);
	    
	    $stmt->execute();

	    
	    
	    //echo "New record created successfully";
	   


}

include('includes/header.php');

?>


	 <div class="container">
	 
	 
	 
		<form id="regiseration" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<h1>sign up</h1>
		 <div class="form-group">
			<label for="username">User name</label>
			<input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" name="username">
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertusername">
			  <strong>error</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		  
		  
		  </div>
		  <div class="form-group">
			<label for="useremail">Email address</label>
			<input type="email" class="form-control" id="useremail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
		  
		  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertemail">
			  <strong>error</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		  
		  </div>
		  
		  
		  
		  <div class="form-group">
			<label for="userpassword">Password</label>
			<input type="password" class="form-control" id="userpassword" placeholder="Enter Password" name="password">
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertpassword" >
			  <strong>error</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		  
		  </div> 
		  
		  
		  
		  <div class="form-group">
			<label for="retypepass">Retype Password</label>
			<input type="password" class="form-control" id="retypepass" placeholder="Retype Password">
		  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertretypepassword">
			  <strong>error</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		  
		  </div>
		  
		  
		  
		  <div class="form-group">
			<label for="usermobile">mobile</label>
			<input type="text" class="form-control" id="usermobile" placeholder="Enter Mobile" name="mobile">
		 
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertmobile">
			  <strong>error</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>

		 </div>
		  
		   
		  
		  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	 </div>
	 
	 
<?php 
include('includes/footer.php');


?> 
	
