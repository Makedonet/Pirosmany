<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['login'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>

  <!--footer--------------->
<footer>

</footer>
</body>
<?php
}else{
     header("Location: ../auth.php");
     exit();
}
 ?>
