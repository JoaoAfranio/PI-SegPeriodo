<?php
	include("conecta.php");

	$recebeID = $_GET["id"];


	$recebeNOME = $_GET["nome_paciente"];

	$recebeTRABALHO = $_GET["trabalho"];

	$recebeSEXO = $_GET["sexo"];
	$recebeIDADE = $_GET["idade_pedido"];
	
	$recebeNUM_DENTE = $_GET["num_dente"];
	$recebeCOR_DENTE = $_GET["cor_dente"];
	
	$recebeOBS = $_GET["obs"];

	$recebeData = $_GET["data_entrega"];

	mysqli_query($conexao, "UPDATE pedidos SET sexo='$recebeSEXO',nome_paciente = '$recebeNOME',trabalho='$recebeTRABALHO',idade_paciente='$recebeIDADE',obs='$recebeOBS',num_dente='$recebeNUM_DENTE',
					cor_dente='$recebeCOR_DENTE', data_entrega='$recebeData'  WHERE id='$recebeID' ") or die(mysqli_error($conexao));

	

	header("location:listaPedidos.php");

?>
