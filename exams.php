<?php
include ('includes/header.php');


?>

<div class="album py-5 bg-light">
    <div class="container">

      <div class="row">


<?php
include('includes/config.php');
	  
	   $stmt = $conn->prepare("SELECT * FROM quiz");
	  
	    $stmt->execute();
	    $user=$stmt->fetchAll();
	    if(count($user)>0)
	    {
	    foreach ($user as $quiz) :
	    ?>

	    <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?php echo 'uploads/'.$quiz['quiz_photo']?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $quiz['quiz_name']?></h5>
              <p class="card-text"><?php echo $quiz['quiz_desc']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a  class="btn btn-md btn-outline-secondary" href="exam_questions.php?exam_id=<?php echo $quiz['quiz_id']?>">start exam</a>
                </div>
                <small class="text-muted"><?php echo "time: ".$quiz['full_time']?></small>
              </div>
            </div>
          </div>
        </div>
        


		<?php
	    endforeach;
	    }
	    else{
	    	echo "no data in DB";
	    }

?>


        


      </div>
    </div>
  </div>





<?php
include ('includes/footer.php');
?>