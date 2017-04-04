<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

$languages = getLanguageFiles(); //Retrieve list of language files
$templates = getTemplateFiles(); //Retrieve list of template files
$permissionData = fetchAllPermissions(); //Retrieve list of all permission levels

// require_once("models/header.php");

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	
	$body = str_replace("</form>",'<input type="submit" value="Submit" class="btn btn-primary">
			</form>', trim($_POST["compile"]));
	$id = "CRT1" . genkey();
	
	$creator = $loggedInUser->displayname;
	$name = getTextBetweenTags($body,"legend");
	
	$user = "";
	$role = "";
	
	foreach ($_POST as $key => $value)
	{
		//if ($role == "Empty") 
		//{
			if (strpos(htmlspecialchars($key),'role') !== false) 
				{
					$role = $role . ":" . $value;
				}
			if (strpos(htmlspecialchars($key),'Approver') !== false) 
				{
					$user = $user . ":" . $value;
				}
		//}
	}

	if(count($errors) == 0)
	{	
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			if (createForm($id, $creator, $name, $body, $user, $role)) {
			$successes[] = lang("PERMISSION_CREATION_SUCCESSFUL", array($body));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
	}
	echo "<script>alert('Save Complete');</script>";
	
}

$userData = fetchAllUsers(); //Fetch information for all users

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

   <!--  <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png"> -->
  </head>
  
  <body>
	<br>
    <div class="container">
      <div class="row clearfix">
        <!-- Building Form. -->
        <div class="span6">
          <div class="clearfix">
            <h2></h2>
            <hr>
            <div id="build">
			
              <form id="target" class="form-horizontal">
              </form>
			  
            </div>

          </div>
        </div>
        <!-- / Building Form. -->

        <!-- Components -->
		
        <div class="span6">
		
          <h2>Drag & Drop components</h2>
          <hr>
          <div class="tabbable">
            <ul class="nav nav-tabs" id="formtabs">
              <!-- Tab nav -->
            </ul>
              <fieldset>
                <div class="tab-content">
                  <!-- Tabs of snippets go here -->
                </div>
              </fieldset>
			<br><br>
			<center>
<form class="form-horizontal" method="POST"  name="createForm" accept-charset="UTF-8"  autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="document.getElementById('compile').value = document.getElementById('render').value;">			  

			  <h3>Approver Line</h3>
			  
			  <table style="width:100%">
			  <tr>
				<th>No.</th>
				<th>Role</th>
				<th>User</th> 
			  </tr>
			  <tr>
				<td>1</td>
				<td>
				    <select id="selectbasic-0" name="role1" class="control-label">
					  <option>Empty</option>
					  <option>Verifier</option>
					  <option>Approver</option>
					  <option>Quality Assurance</option>
					  <option>Implementer</option>
					  <option>Subject Matter Expert</option>
					</select>
				</td> 
				<td>
				    <select id="selectbasic-0" name="Approver1" class="input-xlarge">
<option>Empty</option>
<?php
foreach ($userData as $v1) {
	echo "<option>".$v1['display_name']."</option>";
}
?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>2</td>
				<td>
				    <select id="selectbasic-0" name="role2" class="control-label">
					  <option>Empty</option>
					  <option>Verifier</option>
					  <option>Approver</option>
					  <option>Quality Assurance</option>
					  <option>Implementer</option>
					  <option>Subject Matter Expert</option>
					</select>
				</td>  
				<td>
				    <select id="selectbasic-0" name="Approver2" class="input-xlarge">
<option>Empty</option>
<?php
foreach ($userData as $v1) {
	echo "<option>".$v1['display_name']."</option>";
}
?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>3</td>
				<td>
					<select id="selectbasic-0" name="role3" class="control-label">
					  <option>Empty</option>
					  <option>Verifier</option>
					  <option>Approver</option>
					  <option>Quality Assurance</option>
					  <option>Implementer</option>
					  <option>Subject Matter Expert</option>
					</select>
				</td> 
				<td>
				    <select id="selectbasic-0" name="Approver3" class="input-xlarge">
<option>Empty</option>
<?php
foreach ($userData as $v1) {
	echo "<option>".$v1['display_name']."</option>";
}
?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>4</td>
				<td>
				    <select id="selectbasic-0" name="role4" class="control-label">
					  <option>Empty</option>
					  <option>Verifier</option>
					  <option>Approver</option>
					  <option>Quality Assurance</option>
					  <option>Implementer</option>
					  <option>Subject Matter Expert</option>
					</select>
				</td> 
				<td>
				    <select id="selectbasic-0" name="Approver4" class="input-xlarge">
<option>Empty</option>
<?php
foreach ($userData as $v1) {
	echo "<option>".$v1['display_name']."</option>";
}
?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>5</td>
				<td>
				    <select id="selectbasic-0" name="role5" class="control-label">
					  <option>Empty</option>
					  <option>Verifier</option>
					  <option>Approver</option>
					  <option>Quality Assurance</option>
					  <option>Implementer</option>
					  <option>Subject Matter Expert</option>
					</select>
				</td> 
				<td>
				    <select id="selectbasic-0" name="Approver5" class="input-xlarge">
<option>Empty</option>
<?php
foreach ($userData as $v1) {
	echo "<option>".$v1['display_name']."</option>";
}
?>
					</select>
				</td>
			  </tr>
			</table>

			<textarea id="compile" class="span6" name="compile" style="display:none;"></textarea>
			<textarea id="line" class="span6" name="line" style="display:none;"></textarea>

			<input type="submit" value="Save" class="btn btn-primary">
			
</form>
</center>
          </div>
        </div>
        <!-- / Components -->

      </div>

      <div class="row clearfix">
        <div class="span12">
          <hr>
          By Adam Moore (<a href="http://twitter.com/minikomi" >@minikomi</a>).<br/>
          Source on (<a href="https://github.com/minikomi/Bootstrap-Form-Builder" >Github</a>).
        </div>
      </div>

    </div> <!-- /container -->

    <script data-main="assets/js/main-built.js" src="assets/js/lib/require.js" ></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-13083321-13', 'minikomi.github.io');
      ga('send', 'pageview');

    </script>
  </body>
</html>
