<?php
	include("conecta.php");

	$recebeSENHA = $_GET["senha"];
	$recebeLOGIN = $_GET["login"];


	mysqli_query($conexao, "UPDATE login SET senha='$recebeSENHA' WHERE login='$recebeLOGIN' ") or die(mysqli_error($conexao));

	
	$verifica_trabalho =  mysqli_query($conexao, "SELECT * FROM login WHERE login = '$recebeLOGIN' AND '$recebeTRABALHO' = 'dentista'");


	if (mysqli_num_rows($verifica_trabalho)<=0){
	          header('location:perfilProtetico.php');
	            
	          }else{
	            header('location:perfilDentista.php');
	          }



?>