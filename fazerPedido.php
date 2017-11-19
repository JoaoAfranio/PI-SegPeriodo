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

	$recebeData = $_GET["data_entrega"];
	$recebeValor = $_GET["valor"];

	$consulta = "SELECT estado, nome FROM login WHERE login = '$logado'";
	$con = $conexao ->query($consulta) or die ($con->error);
	$dado = $con->fetch_array();
	$estado  = $dado["estado"];
	$nome = $dado["nome"];

	mysqli_query($conexao, "insert into pedidos (trabalho, sexo, idade_paciente, num_dente, cor_dente, obs, dentista,disponibilidade, data_entrega, valor_medio, estado) values ('$recebeTRABALHO', '$recebeSEXO','$recebeIDADE', '$recebeNUM_DENTE', '$recebeCOR_DENTE', '$recebeOBS', '$nome', 'Aberto', '$recebeData', '$recebeValor', '$estado')");

	header("location:pedidosDentista.php");
?>
