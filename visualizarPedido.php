<?php
	include("conecta.php");
	session_start();
        
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.html');
        }

    $login = $_SESSION['login'];
	
	$consulta = "SELECT nome FROM login WHERE login = '$login'";
	$con = $conexao ->query($consulta) or die ($con->error);
	$dado = $con->fetch_array();
	$protetico = $dado["nome"];
	$recebeID = $_GET["id"];
	
	mysqli_query($conexao, "UPDATE pedidos SET disponibilidade ='Em Andamento', protetico_resp = '$protetico', disponibilidade2 = 'Aceito' WHERE id = '$recebeID'") or die(mysqli_error($conexao));

	header("location:trabalhosProtetico.php?estado=");

?>