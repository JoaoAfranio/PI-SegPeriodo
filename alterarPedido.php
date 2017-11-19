<?php
	include("conecta.php");

	$recebeID = $_GET["id"];

	$recebeTRABALHO = $_GET["trabalho"];

	$recebeSEXO = $_GET["sexo"];
	$recebeIDADE = $_GET["idade_pedido"];
	
	$recebeNUM_DENTE = $_GET["num_dente"];
	$recebeCOR_DENTE = $_GET["cor_dente"];
	
	$recebeOBS = $_GET["obs"];

	$recebeData = $_GET["data_entrega"];
	$recebeValor = $_GET["valor_medio"];


	mysqli_query($conexao, "UPDATE pedidos SET sexo='$recebeSEXO',trabalho='$recebeTRABALHO',idade_paciente='$recebeIDADE',obs='$recebeOBS',num_dente='$recebeNUM_DENTE',
					cor_dente='$recebeCOR_DENTE', data_entrega='$recebeData', valor_medio='$recebeValor'   WHERE id='$recebeID' ") or die(mysqli_error($conexao));

	

	header("location:listaPedidos.php");

?>
