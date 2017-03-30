<?php
/*
learn
itsposeidon.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
if(!isUserLoggedIn()) { header("Location: login.php"); die(); }
include("subpage/header.php");
include("subpage/questionSubmit.php");
include("subpage/footer.php");


?>
