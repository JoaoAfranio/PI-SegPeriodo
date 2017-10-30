<?php
	include("conecta.php");

	$recebeTRABALHO = $_GET["trabalho"];

	$recebeSEXO = $_GET["sexo"];
	$recebeIDADE = $_GET["idade_pedido"];
	
	$recebeNUM_DENTE = $_GET["num_dente"];
	$recebeCOR_DENTE = $_GET["cor_dente"];
	
	$recebeOBS = $_GET["obs"];


	mysqli_query($conexao, "insert into pedidos (trabalho, sexo, idade_paciente, num_dente, cor_dente, obs) values ('$recebeTRABALHO', '$recebeSEXO','$recebeIDADE', '$recebeNUM_DENTE', '$recebeCOR_DENTE', '$recebeOBS')");

	header("location:pedidosDentista.html");
?>
