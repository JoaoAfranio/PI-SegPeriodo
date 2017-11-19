<?php
	include("conecta.php");
	
	$recebeID = $_GET["id"];
	
	mysqli_query($conexao, "UPDATE pedidos SET disponibilidade ='Pronto' WHERE id = '$recebeID'") or die(mysqli_error($conexao));

	header("location:visualizarTrabalho.php");