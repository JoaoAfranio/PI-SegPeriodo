<?php
	include("conecta.php");

	$recebeEMAIL = $_GET["email"];
	$recebeLOGIN = $_GET["login"];
	$recebeSENHA = $_GET["senha"];
	$recebeTRABALHO = $_GET["trabalho"];

	$recebeNOME = $_GET["nome"];
	$recebeDATA = $_GET["data"];
	$recebeSEXO = $_GET["sexo"];
	$recebeTEL = $_GET["telefone"];
	
	$recebeCEP = $_GET["CEP"];
	$recebeLOGRADOURO = $_GET["logradouro"];
	$recebeNUMERO = $_GET["numero"];
	$recebeCOMPLEMENTO = $_GET["complemento"];
	$recebeBAIRRO = $_GET["bairro"];
	$recebeESTADO = $_GET["estado"];

	mysqli_query($conexao, "insert into login (login, email, senha, trabalho, nome, aniversario, sexo, telefone, CEP, logradouro, numero, complemento, bairro, estado) values ('$recebeLOGIN', '$recebeEMAIL','$recebeSENHA', '$recebeTRABALHO', '$recebeNOME', '$recebeDATA', '$recebeSEXO', '$recebeTEL', '$recebeCEP', '$recebeLOGRADOURO', '$recebeNUMERO', '$recebeCOMPLEMENTO', '$recebeBAIRRO', '$recebeESTADO')");

	header("location:index.html");
?>