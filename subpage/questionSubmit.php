<?php

if(!empty($_POST))
{
	$errors = array();
	$qanswer = trim($_POST["answer"]);


	if(empty($qanswer))
	{
		$errors[] = "Please insert Answer";
	}

	if(count($errors) == 0)
	{	
	//Construct a question object
	 questionSubmit($_GET['id'],  $qanswer, $loggedInUser->user_id);
		echo '<script>window.location = "index.php";</script>';
	}
	else
	{
		echo "<script>";
		foreach ($errors as &$err) {
		    echo "alert('". $err ."');";
		}
		echo "</script>";
	}
	
}


$data = fetchQuestion($_GET['id']);
echo "<h5>QUESTION</h5><h3>". $data[0]['qdescription'] ."</h3>";


echo "<form name='newUser' action='".$_SERVER['PHP_SELF']."?id=". $_GET['id'] ."' method='post'>";

$choice = array(decrypt($data[0]['qc1']), decrypt($data[0]['qc2']), decrypt($data[0]['qc3']), decrypt($data[0]['qanswer']));

shuffle($choice);

for ($x = 0; $x <= 3; $x++) {

	echo '<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option'. $x .'">
            <input type="radio" id="option'. $x .'" name="answer" class="mdl-radio__button" value="'. $choice[$x] .'" >
            <span class="mdl-radio__label">'. $choice[$x] .'</span>
         </label><br>';

} 

echo "<br><div class='mdl-grid'>
  		<input class='mdl-button mdl-js-button mdl-button--raised' type='submit' value='Submit'/>
	</div>
	</form>";

?>