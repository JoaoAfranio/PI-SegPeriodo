<?php
	include("conecta.php");

	session_start();

	$logado = $_SESSION['login'];

	$recebeTRABALHO = $_GET["trabalho"];

	$recebeSEXO = $_GET["sexo"];
	$recebeIDADE = $_GET["idade_pedido"];
	
	$recebeNUM_DENTE = $_GET["num_dente"];
	$recebeCOR_DENTE = $_GET["cor_dente"];
	
	$recebeOBS = $_GET["obs"];


	mysqli_query($conexao, "insert into pedidos (trabalho, sexo, idade_paciente, num_dente, cor_dente, obs, dentista,disponibilidade) values ('$recebeTRABALHO', '$recebeSEXO','$recebeIDADE', '$recebeNUM_DENTE', '$recebeCOR_DENTE', '$recebeOBS', '$logado', 'Aberto')");

	header("location:pedidosDentista.php");
?>
