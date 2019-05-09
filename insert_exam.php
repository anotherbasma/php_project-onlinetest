<?php
$pageTitle = 'new exam';
include('includes/header.php');
?>
<body bgcolor="gray">
	
	<form action="insert_exam.php" method="post" enctype="multipart/form-data"> 
		
		<table bgcolor="orange" width="500" border="2" cellspacing="2" align="center">
			
			<tr>
				<td colspan="5" align="center"><h2>Inserting new exam:</h2></td>
			</tr>
			<tr>
				<td align="right"><b>exam name:</b></td>
				<td><input type="text" name="quiz_name" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>full mark:</b></td>
				<td><input type="text" name="full_mark" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>full time:</b></td>
				<td><input type="text" name="full_time" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>exam Description:</b></td>
				<td><textarea cols="18" rows="8" name="quiz_desc"></textarea></td>
			</tr>
			
			<tr>
				<td align="right"><b>exam photo:</b></td>
				<td><input type="file" name="quiz_photo" /></td>
			</tr>
			
			<tr>
				<td align="center" colspan="5"><input type="submit" name="submit" value="Add exam Now"/></td>
			</tr>

		
		
		</table>
	
	
	</form>




<?php 

	if(isset($_POST['submit']))
	
	{
		
		
			 include('includes/config.php');
					
			try{
				 $quiz_name = $_POST['quiz_name'];
				 $full_mark = $_POST['full_mark'];
				 $full_time = $_POST['full_time'];
				 $quiz_desc = $_POST['quiz_desc'];
				 $quiz_photo = $_FILES['quiz_photo']['name'];
				 $quiz_photo_tmp = $_FILES['quiz_photo']['tmp_name'];
	
		
				if($quiz_name=='' OR $full_mark=='' OR $full_time=='' OR $quiz_desc==''){
				
				echo "<script>alert('please fill all the fields!')</script>";
				
				exit();
				}
				else {
					$insert_query = "insert into quiz (quiz_name,quiz_desc,full_mark,full_time,quiz_photo) values (:quiz_name,:quiz_desc,:full_mark,:full_time,:quiz_photo)";
					
					$sql = $conn->prepare($insert_query);

					  $sql->bindParam(':quiz_name', $_POST['quiz_name']);
					  $sql->bindParam(':full_mark', $_POST['full_mark']);
					  $sql->bindParam(':full_time',$_POST['full_time']);
					  $sql->bindParam(':quiz_desc', $_POST['quiz_desc']);
					  $sql->bindParam(':quiz_photo', $_FILES['quiz_photo']['name']);
					  // use exec() because no results are returned
					  $sql->execute();
						
					 move_uploaded_file($quiz_photo_tmp,"uploads/{$_FILES['quiz_photo']['name']}");
					
					  // use exec() because no results are returned
				      echo "<script>alert('Data inserted into table')</script>";
					
					
					
					
					}
			  }
			  catch(PDOException $e)
				  {
				  echo  $e->getMessage();
				  }

			  $conn = null;
	
	}

	

	
	
include('includes/footer.php');
?>




