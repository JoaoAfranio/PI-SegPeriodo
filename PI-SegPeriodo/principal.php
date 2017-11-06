<!DOCTYPE html>
<?php
include("gravar.php");
?>
<html>
<head>
	<title>Principal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body class="body" onload="login()">
<div class="container" ">
	<div class="row">
	<h2 class="cadastroTitle">PROT+</h2>

	<div>
	<?php 
  		echo "$_SESSION["nome"] seja bem vindo(a)!";
	?>
</div>
</div>
</div>



</body>
</html>