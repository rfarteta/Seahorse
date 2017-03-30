<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
include("subpage/header.php");
include("subpage/questionEdit.php");
include("subpage/footer.php");

?>
