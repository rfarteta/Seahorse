<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

if(!empty($_POST))
{
	//Delete permission levels
	if(!empty($_POST['delete'])){
		$deletions = $_POST['delete'];
		if ($deletion_count = deleteQuestions($deletions)){
		$successes[] = lang("PERMISSION_DELETIONS_SUCCESSFUL", array($deletion_count));
		}
	}
	
	//Create new permission level
	if(!empty($_POST['newPermission'])) {
		$permission = trim($_POST['newPermission']);
		
		//Validate request
		if (permissionNameExists($permission)){
			$errors[] = lang("PERMISSION_NAME_IN_USE", array($permission));
		}
		elseif (minMaxRange(1, 50, $permission)){
			$errors[] = lang("PERMISSION_CHAR_LIMIT", array(1, 50));	
		}
		else{
			if (createPermission($permission)) {
			$successes[] = lang("PERMISSION_CREATION_SUCCESSFUL", array($permission));
		}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
	}
}

$questionData = fetchAllQuestions(); //Retrieve list of all permission levels

include("subpage/header.php");

echo resultBlock($errors,$successes);

echo "
<form name='adminPermissions' action='".$_SERVER['PHP_SELF']."' method='post'>
<table class='admin'>
<tr>
<th>Delete</th><th>QID</th><th>UID</th><th>Question Description</th>
</tr>";

//List each permission level
foreach ($questionData as $v1) {
	echo "
	<tr>
	<td><input type='checkbox' name='delete[".$v1['qid']."]' id='delete[".$v1['qid']."]' value='".$v1['qid']."'></td><td>". $v1['qid'] ."</td>
	<td>". $v1['qcreator'] ."</td><td><a href='admin_question.php?id=".$v1['qid']."'>".$v1['qdescription']."</a></td>
	</tr>";
}

echo "
</table>
<p>
<label>Permission Name:</label>
<input type='text' name='newPermission' />
</p>                                
<input type='submit' name='Submit' value='Submit' />
</form>
</div>
<div id='bottom'></div>";
include("subpage/footer.php");

?>
