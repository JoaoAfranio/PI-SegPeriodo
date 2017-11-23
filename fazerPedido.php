<?php
	include("conecta.php");

	session_start();

	$logado = $_SESSION['login'];

	$recebeTRABALHO = $_GET["trabalho"];

	$recebeTRABALHO_naoLISTADO = $_GET["trabalho_naoListado"];

	$recebeNOME_PACIENTE = $_GET["nome_paciente"];
	$recebeSEXO = $_GET["sexo"];
	$recebeIDADE = $_GET["idade_pedido"];
	
	$recebeNUM_DENTE = $_GET["num_dente"];
	$recebeCOR_DENTE = $_GET["cor_dente"];
	
	$recebeOBS = $_GET["obs"];

	$recebeData = $_GET["data_entrega"];

	$consulta = "SELECT estado, nome FROM login WHERE login = '$logado'";
	$con = $conexao ->query($consulta) or die ($con->error);
	$dado = $con->fetch_array();
	$estado  = $dado["estado"];
	$nome = $dado["nome"];



	if($recebeTRABALHO_naoLISTADO == ""){
	mysqli_query($conexao, "insert into pedidos (nome_paciente, trabalho, sexo, idade_paciente, num_dente, cor_dente, obs, dentista,disponibilidade, data_entrega, estado) values ('$recebeNOME_PACIENTE','$recebeTRABALHO', '$recebeSEXO','$recebeIDADE', '$recebeNUM_DENTE', '$recebeCOR_DENTE', '$recebeOBS', '$logado', 'Aberto', '$recebeData', '$estado')") or die(mysqli_error($conexao));
	}else{
	mysqli_query($conexao, "insert into pedidos (nome_paciente, trabalho, sexo, idade_paciente, num_dente, cor_dente, obs, dentista,disponibilidade, data_entrega, estado) values ('$recebeNOME_PACIENTE','$recebeTRABALHO_naoLISTADO', '$recebeSEXO','$recebeIDADE', '$recebeNUM_DENTE', '$recebeCOR_DENTE', '$recebeOBS', '$logado', 'Aberto', '$recebeData', '$estado')") or die(mysqli_error($conexao));
	}
	header("location:pedidosDentista.php");
?>
