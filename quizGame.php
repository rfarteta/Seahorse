<?php
/*
Learn
itsposeidon.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
if(!isUserLoggedIn()) { header("Location: login.php"); die(); }
include("subpage/header.php");
require_once("models/config.php");
include("subpage/scoreBoard.php");
include("subpage/footer.php");

?>
