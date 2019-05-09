<?php

	$pageTitle = 'Login';
	
	
if ( isset( $_POST['submit'] ) )
 {

	include('includes/config.php');
	   
	  $email=$_POST['email'];

	   $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_email=:user_email");
	  
	    $stmt->bindParam(':user_email', $email);
	 
	    
	    $stmt->execute();
	    $user=$stmt->fetch();
	    if($user)
	    {
	    	//print_r($user);
	    	//echo $user['user_password'];

	    	if(md5($_POST['password'])==$user['user_password'])
	    	{
	    		echo "welcome ".$user['user_name'];
	    		header("location: index.php");
	    		session_start();
	    		$_SESSION['user']=$user['user_name'];
	    	}
	    	else{
	    		echo "email exists , wrong password";
	    	}


	    	 
	    }
	    else{
	    	echo "user not exist";
	    }
	   
	   
	   
	


 }
include('includes/header.php');
?>


<div class="container">
  <h2>sign in</h2>
  <form action="signin.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    
    <div class="form-group">
      <a href="changepassword.php">forgot password?</a>
      <a href="signup.php">New user?</a>
    </div>
    <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
  </form>
</div>


<?php

include('includes/footer.php');

?>