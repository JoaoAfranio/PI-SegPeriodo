<?php
	include("conecta.php");

	$recebeID = $_GET["id"];

	mysqli_query($conexao, "UPDATE requisicaopedidos SET disponibilidade = 'Pedido Recusado' WHERE id = '$recebeID'") or die(mysqli_error($conexao));

	header("location:requisicaoTrabalho.php");
?>