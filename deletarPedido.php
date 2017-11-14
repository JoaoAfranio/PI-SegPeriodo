<?php
	include("conecta.php");

	$recebeID = $_GET["id"];

	mysqli_query($conexao, "DELETE FROM pedidos WHERE id='$recebeID'") or die(mysqli_error($conexao));

	header("location:listaPedidos.php");
?>