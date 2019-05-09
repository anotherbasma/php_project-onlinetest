<?php
$pageTitle = 'change password';
if ( isset( $_POST['submit'] ) )
 {
 	
	  include('includes/config.php');
	  $email=$_POST['email'];

	   $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_email=?");
	  
	   
	 
	    
	    $stmt->execute([$email]);
	    $user=$stmt->fetch();
	    if($user)
	    {
	    	
	    	 if($_POST['password']==$_POST['cpassword'])
	    	 {

	    	 	  $stmt2 = $conn->prepare("UPDATE `users` SET `user_password`= :pass WHERE user_email=:mail");

	    	 	  $newpass=md5($_POST['password']);
	    	 	  $stmt2->bindParam(':pass',$newpass);
	    	 	   $stmt2->bindParam(':mail',$email);
	    	 	   $stmt2->execute();
	    	 	   echo"password changed";
	    	 	   header("location:signin.php");
	
	    	 }
	    	 else{
	    	 	echo "password doesn't match";
	    	 }
	    }
	    else{
	    	echo "email not found in DB , sign up";
	    }
	   
	   
	   

 }
 
 
  include('includes/header.php');
?>


<div class="container">
  <h2>change password</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">New Password:</label>
      <input type="password" class="form-control" id="pwdn" placeholder="new password" name="password">
    </div>
	<div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="pwdc" placeholder="Confirm password" name="cpassword">
    </div>
   
    <button type="submit" class="btn btn-primary" name="submit">change password</button>
  </form>
</div>

<?php
 include('includes/footer.php');
?>