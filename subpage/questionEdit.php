<?php

if(!empty($_POST))
{
	$errors = array();
	$qid = trim($_POST["qid"]);
	$question = trim($_POST["question"]);
	$ra = trim($_POST["ra"]);	
	$c1 = trim($_POST["c1"]);
	$c2 = trim($_POST["c2"]);
	$c3 = trim($_POST["c3"]);
	$c3 = trim($_POST["c3"]);
	$remarks = trim($_POST["remarks"]);

	if(empty($question))
	{
		$errors[] = "Please insert Question";
	}
	if(empty($ra))
	{
		$errors[] = "Please insert Right Answer";
	}
	if(empty($c1))
	{
		$errors[] = "Please insert Choice 1";
	}
	if(empty($c2))
	{
		$errors[] = "Please insert Choice 2";
	}
	if(empty($c3))
	{
		$errors[] = "Please insert Choice 3";
	}
	if(empty($remarks))
	{
		$errors[] = "Please insert Remarks";	
	}

	if(count($errors) == 0)
	{	
		//Construct a question object
		editQuestion($_GET['id'],$qid,$question,$ra,$c1,$c2,$c3,$remarks);
		echo "<script>alert('Question Has Been Created');</script>";
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
echo "
<h5>Add Question</h5>
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."?id=". $_GET['id'] ."' method='post'>
ID: 
<div class='mdl-textfield mdl-js-textfield'>
  <input class='mdl-textfield__input' type='text' value='". $_GET['id'] ."' rows='1' id='qid' name='qid'>
  <label class='mdl-textfield__label' for='qid'>qid</label>
</div>
<br>
Strike: 
<div class='mdl-textfield mdl-js-textfield'>
  <input class='mdl-textfield__input' type='text' value='". $data[0]['qstrike'] ."' rows='1' id='qid' name='qstrike'>
  <label class='mdl-textfield__label' for='qstrike'>qstrike</label>
</div>

<br><br>
<div class='mdl-textfield mdl-js-textfield'>
  <textarea class='mdl-textfield__input' type='text' rows='1' id='question' name='question'>". $data[0]['qdescription'] ."</textarea>
  <label class='mdl-textfield__label' for='question'>Question</label>
</div>

<div class='mdl-grid'>
  <div class='mdl-cell mdl-cell--5-col'>
  	  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
	    <textarea class='mdl-textfield__input' type='text' id='sample1' name='ra'>". decrypt($data[0]['qanswer']) ."</textarea>
	    <label class='mdl-textfield__label' for='sample1'>Right Answer</label>
	  </div>
  </div>
  <div class='mdl-cell mdl-cell--5-col'>
  	  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
	    <textarea class='mdl-textfield__input' type='text' id='sample2' name='c1'>". decrypt($data[0]['qc1']) ."</textarea>
	    <label class='mdl-textfield__label' for='sample2'>Choice 1</label>
	  </div>
  </div>
  <div class='mdl-cell mdl-cell--5-col'>
  	  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
	    <textarea class='mdl-textfield__input' type='text' id='sample3' name='c2'>". decrypt($data[0]['qc2']) ."</textarea>
	    <label class='mdl-textfield__label' for='sample3'>Choice 2</label>
	  </div>
  </div>
  <div class='mdl-cell mdl-cell--5-col'>
  	  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
	    <textarea class='mdl-textfield__input' type='text' id='sample4' name='c3'>". decrypt($data[0]['qc3']) ."</textarea>
	    <label class='mdl-textfield__label' for='sample4'>Choice 3</label>
	  </div>
  </div>
</div>

<div class='mdl-textfield mdl-js-textfield'>
  <textarea class='mdl-textfield__input' type='text' rows='1' id='remarks' name='remarks'>". $data[0]['qremarks'] ."</textarea>
  <label class='mdl-textfield__label' for='remarks'>Explain why your answer is right</label>
</div>

<br><br>

<div class='mdl-grid'>
  <input class='mdl-button mdl-js-button mdl-button--raised' type='submit' value='Add Question'/>
</div>


</form>
</div>";

?>