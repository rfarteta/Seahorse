<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Forms posted
if(!empty($_POST))
{
	$supp_name = trim($_POST["supp_name"]);
	$supp_address = trim($_POST["supp_address"]);
	$supp_contact = trim($_POST["supp_contact"]);

	supplierCreate($supp_name,$supp_address,$supp_contact);
    echo "<script>alert('Supplier Detail has Been Created');</script>";
}
include("subpage/header.php");
echo resultBlock($errors,$successes);

echo "
<div id='regbox'>

<h3>Create your Customer Account</h3>

<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='supp_name' id='supp_name'>
    <label class='mdl-textfield__label' for='supp_name'>Supplier Name</label>
  </div><br>
  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='supp_address' id='supp_address'>
    <label class='mdl-textfield__label' for='supp_address'>Supplier Address</label>
  </div><br>
  <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
    <input class='mdl-textfield__input' type='text' name='supp_contact' pattern='-?[0-9]*(\.[0-9]+)?' id='supp_contact'>
    <label class='mdl-textfield__label' for='supp_contact'>Supplier Number</label>
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
