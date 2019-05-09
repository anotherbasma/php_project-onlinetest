<?php
$pageTitle = 'exam qustions';

include 'includes/header.php';
include 'includes/config.php';
if (isset($_SESSION['user'])) {
if(isset($_GET['exam_id']))
{
	$examid= $_GET['exam_id'];
	

	   $stmt = $conn->prepare("SELECT * FROM questions where quiz_id=?");
	  
	    $stmt->execute([$examid]);
	    $allquestions=$stmt->fetchAll();
	    if(count($allquestions)>0)
	    {
	    	
	   ?>
	   
	   <form action="" method="post">
			<input type="hidden" name="questions_num" value="<?php echo count($allquestions)?>"
		 
		 
	    <?php
		
		
	    foreach ($allquestions as $question) :

	    	
	    ?>
	    
	    <label><?php echo $question['q_question']?></label><br>
	    <input type="hidden" name="<?php echo "answer".$question['question_id']?>"
	     value="<?php echo $question['q_answer']?>"
	     >

	    
	    <input type="radio" 
	    name="question<?php echo $question['question_id']?>"
	    value="<?php echo $question['q_op1']?>"

	    >

	    <?php echo $question['q_op1']?><br>

	     <input type="radio" 
	     name="question<?php echo $question['question_id']?>"

	     value="<?php echo $question['q_op2']?>"
	     ><?php echo $question['q_op2']?>
	     <br>

	      <input type="radio" 
	      name="question<?php echo $question['question_id']?>"
		value="<?php echo $question['q_op3']?>"

	      >

	      <?php echo $question['q_op3']?>

	      <br>
		 <br>
	     
		<?php
	    endforeach;

	    ?>


	    <button type="submit" name="submit" href="exam_questions.php">submit</button>

		</form>
	    <?php



		}
		else{
			echo "no questions in DB";
		}

	    






}

if(isset($_POST['submit']))
{
	$trues=0;
	$falses=0;
	$grade=0;
	$questions_num=$_POST['questions_num'];
	$examid=$_GET['exam_id'];
	
	for($x=1;$x<=$questions_num;$x++)
	{
		if($_POST['question'.$x]==$_POST['answer'.$x])
	{

		$trues+=1;

	}
	else{

		$falses+=1;
	}
	

	}
	
	$grade=($trues/$questions_num)*100;
	$state="";
	if($grade>=50)
	{
		$state="pass";
	}
	else{
		$state="fail";
	}
	/*echo $trues."<br>";
	echo $falses."<br>";
	echo $grade." % <br>";
	echo $examid;
	echo $_SESSION['user'];
*/

	$stmt2 = $conn->prepare("SELECT * FROM users where user_name=?");
	  
	    $stmt2->execute([$_SESSION['user']]);
	    $user=$stmt2->fetch();
		$userid=$user['user_id'];
		
		

	
	$stmt3 = $conn->prepare("INSERT INTO `user_quiz`(`user_id`, `quiz_id`,  `user_quiz_grade`, `true_questions`, `false_questions`,`exam_state`) VALUES(?,?,?,?,?,?)");
	 $stmt3->execute([$userid,$examid,$grade,$trues,$falses,$state]);
	 
	
	 echo "exam submitted";

}

}
else{
	
	echo "please sign in first to show exam  <a href='signin.php'> sign in </a>";
}
include 'includes/footer.php';

?>