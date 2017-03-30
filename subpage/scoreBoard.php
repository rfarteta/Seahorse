<?php
/*
Learn
itsposeidon.com
*/

$quizData = fetchAllQuestions(); //Retrieve list of all permission levels
echo resultBlock($errors,$successes);
echo "<h5>Unanswered Questions: </h5>";
$questionTotal = 0;
$questionAnswered = 0;
$questionScore = 0;

foreach ($quizData as $v1){
	if($loggedInUser->user_id != $v1['qcreator']){
	    $check = explode("  ", $v1['qtag']);
	    $score = explode("  ", $v1['qanalytics']);
	   	if (in_array($loggedInUser->user_id, $score)) {
	    	$questionScore = $questionScore + 1;
	    }
	    if (in_array($loggedInUser->user_id, $check)) {
	    	$questionAnswered = $questionAnswered + 1;
	    }else{
	    if($v1['qstrike'] != 0)
		    {
		      echo "<a href='question.php?id=". $v1['qid'] ."'><button class='mdl-button mdl-js-button mdl-button--raised'>?</button></a>";
		    }
	    }
	  } else {
	$questionTotal = $questionTotal + 1;
	}
}
$wrongAnswer = intval($questionAnswered) - intval($questionScore);
echo "<br><br><center>
<div class='mdl-grid'>
<div class='mdl-cell mdl-cell--6-col'>
	<div class='mdl-card mdl-shadow--4dp'>
	  <div class='mdl-card__media mdl-color-text--white'>
	  	<h1>". $questionTotal ."</h1>
	  </div>
	  <div class='mdl-card__supporting-text'>
	      	Questions You Created
	  </div>
	</div>
</div>
<div class='mdl-cell mdl-cell--6-col'>
	<div class='mdl-card mdl-shadow--4dp'>
	  <div class='mdl-card__media mdl-color-text--white'>
	  	<h1>". $questionAnswered ."</h1>
	  </div>
	  <div class='mdl-card__supporting-text'>
	      	Questions Answered
	  </div>
	</div>
</div>
</div>
<div class='mdl-grid'>
<div class='mdl-cell mdl-cell--6-col'>
	<div class='mdl-card mdl-shadow--4dp'>
	  <div class='mdl-card__media mdl-color-text--white'>
	  	<h1>". $questionScore ."</h1>
	  </div>
	  <div class='mdl-card__supporting-text'>
	      	Right Answer
	  </div>
	</div>
</div>
<div class='mdl-cell mdl-cell--6-col'>
	<div class='mdl-card mdl-shadow--4dp'>
	  <div class='mdl-card__media mdl-color-text--white'>
	  	<h1>". $wrongAnswer ."</h1>
	  </div>
	  <div class='mdl-card__supporting-text'>
	      	Wrong Answer
	  </div>
	</div>
</div>
</div>
</center>"
?>
