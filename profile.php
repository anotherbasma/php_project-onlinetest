<?php
	

	$pageTitle = 'Profile';
	include 'includes/header.php';
	include 'includes/config.php';
	if (isset($_SESSION['user'])) {
		$getUser = $conn->prepare("SELECT * FROM users WHERE user_name = ?");
		$getUser->execute([$_SESSION['user']]);
		$info = $getUser->fetch();
		$userid = $info['user_id'];
?>
<h1 class="text-center">My Profile</h1>
<div class="information block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">My Information</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					<li>
						<i class="fa fa-unlock-alt fa-fw"></i>
						<span>Login Name</span> : <?php echo $info['user_name'] ?>
					</li>
					<li>
						<i class="fa fa-envelope-o fa-fw"></i>
						<span>Email</span> : <?php echo $info['user_email'] ?>
					</li>
					
					<li>
						<i class="fa fa-calendar fa-fw"></i>
						<span>Registered Date</span> : <?php echo $info['date_created'] ?>
					</li>
					
				</ul>
				<a href="#" class="btn btn-default">Edit Information</a>
			</div>
		</div>
	</div>
</div>
<div id="my-ads" class="my-ads block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">My exams</div>
			<div class="panel-body">
			<?php
				$stm4 = $conn->prepare("SELECT quiz.quiz_name,user_quiz.user_quiz_grade,user_quiz.exam_state FROM quiz JOIN user_quiz ON quiz.quiz_id=user_quiz.quiz_id WHERE user_quiz.user_id=?");
				$stm4->execute([$userid]);
				$info = $stm4->fetchAll();
				
				if(count($info)>0)
				{
					echo "<table border='2px'><tr>";
				
				foreach ($info as $exam):
				
				
			?>
				<td style='padding:5px;'><?php echo $exam['quiz_name'] ?></td>
				<td style='padding:5px;'><?php echo $exam['user_quiz_grade'] ?></td>
				<td style='padding:5px;'><?php echo $exam['exam_state'] ?></td>
				
				</tr>
				
			
			<?php
			endforeach;
			echo"</table>";
			}
			else{
				echo "no exams submitted for you";
			}
			
			?>
			</div>
		</div>
	</div>
</div>

<?php
	} else {
		header('Location: login.php');
		exit();
	}
	include 'includes/footer.php';
	
?>