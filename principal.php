<!DOCTYPE html>
<?php
include("conecta.php");
 
        session_start();
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.html');
            }

    $login = $_SESSION['login'];
	
	$consulta = "SELECT nome FROM login WHERE login = '$login'";
	$con = $conexao ->query($consulta) or die ($con->error);
	$dado = $con->fetch_array();
	$pessoa = $dado["nome"];   
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
  		echo "$pessoa seja bem vindo(a)!";
	?>
</div>
</div>
</div>



</body>
</html>