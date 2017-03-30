<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: account.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$email = trim($_POST["email"]);
	$username = trim($_POST["email"]);

	$fName = trim($_POST["firstName"]);
	$lName = trim($_POST["lastName"]);

	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);

	$Maddress = trim($_POST["address"]);
	$MCity = trim($_POST["City"]);
	$Mregion = trim($_POST["region"]);
	$MpostalCode = trim($_POST["postalCode"]);

	if(!ctype_alnum($fName)){
		$errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
	}

	if(!ctype_alnum($lName)){
		$errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
	}

	if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
	{
		$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
	}
	else if($password != $confirm_pass)
	{
		$errors[] = lang("ACCOUNT_PASS_MISMATCH");
	}
	if(!isValidEmail($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	//End data validation
	if(count($errors) == 0)
	{
		
		$disId = addCustomer($fName,$lName,$Maddress);
		$addId = addAddress($disId,$Maddress,$MCity,$Mregion,$MpostalCode);

		//Construct a user object
		$user = new User($username,$disId,$password,$email);
		
		//Checking this flag tells us whether there were any errors such as possible data duplication occured
		if(!$user->status)
		{
			if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
			if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
			if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
		}
		else
		{
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			if(!$user->userCakeAddUser())
			{
				if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
				if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
			}
		}
	}
	if(count($errors) == 0) {
		$successes[] = $user->success;
	}
}
include("subpage/header.php");
echo resultBlock($errors,$successes);

echo "
<div id='regbox'>

<h3>Create your Customer Account</h3>

<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='email' name='email' id='email'>
    <label class='mdl-textfield__label' for='email'>Email</label>
  </div><br>

  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='password' name='password' id='password'>
    <label class='mdl-textfield__label' for='password'>Password</label>
  </div><br>
  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='password' name='passwordc' id='passwordc'>
    <label class='mdl-textfield__label' for='passwordc'>Confirm Password</label>
  </div><br>

  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='firstName' id='firstName'>
    <label class='mdl-textfield__label' for='lastName'>First Name</label>
  </div><br>
  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='lastName' id='lastName'>
    <label class='mdl-textfield__label' for='lastName'>Last Name</label>
  </div><br>
  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='address' id='address'>
    <label class='mdl-textfield__label' for='address'>Address</label>
  </div><br>
  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='City' id='City'>
    <label class='mdl-textfield__label' for='City'>City</label>
  </div><br>
   <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='region' id='region'>
    <label class='mdl-textfield__label' for='region'>Region</label>
  </div><br>
  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='postalCode' pattern='-?[0-9]*(\.[0-9]+)?' id='postalCode'>
    <label class='mdl-textfield__label' for='postalCode'>Postal Code</label>
    <span class='mdl-textfield__error'>Input is not a number!</span>
  </div><br>
  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='contactNumber' pattern='-?[0-9]*(\.[0-9]+)?' id='contactNumber'>
    <label class='mdl-textfield__label' for='contactNumber'>Contact Number</label>
    <span class='mdl-textfield__error'>Input is not a number!</span>
  </div>

<br><br>
	<input class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' type='submit' value='Register'/>

</form>
</div>

<div id='bottom'></div>";

// echo "<p> <label>Security Code:</label> <img src='models/captcha.php'> </p> <label>Enter Security Code:</label> <input name='captcha' type='text'> </p>";
include("subpage/footer.php");
?>
