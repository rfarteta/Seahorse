<?php

if(!empty($_POST))
{

    echo "<script>alert('". formBuilder($_POST["figures"], $_POST["pid"], $loggedInUser->user_id) . "');</script>";
  
}
?>
<!-- Calling the form. -->
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min">
  <link rel="stylesheet" type="text/css" media="screen" href="bootstrap-responsive.min">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
</head>

<body>
  <script src="app/js/app"></script>
  <script src="app/js/main"></script>
  <script src="app/js/main-built"></script><br>
</body>

</html>