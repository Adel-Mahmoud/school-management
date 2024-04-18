<?php
session_start();
  session_unset();
   header('location:index.php?log=logout');
   ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<h1>Users Page</h1>
</body>
</html>