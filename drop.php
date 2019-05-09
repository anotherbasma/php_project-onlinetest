<?php

include 'includes/header.php';
include 'includes/config.php';
$stmt = $conn->prepare("SELECT * FROM `users` ");
	  
	  
	 
	    
	    $stmt->execute();
	    $users=$stmt->fetchAll();
	    if(count($users)>0)
	    {
	    echo "<select>";
	    foreach($users as $user ):


?>


	<option name="username" value="<?php echo $user['user_name'] ?>"><?php echo $user['user_name'] ?>
	



<?php
endforeach;
echo "</select>";
}
?>

