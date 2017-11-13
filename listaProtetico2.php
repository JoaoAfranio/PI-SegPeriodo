<?php
	include("conecta.php");

	$filtroESTADO = $_GET["estado"];

	mysqli_query($conexao, "SELECT nome, email FROM login WHERE estado = '$filtroESTADO'");

	header("location:index.html");


?>
