<?php
	include("conecta.php");

	$recebeEMAIL = $_GET["email"];
	$recebeLOGIN = $_GET["login"];

	$recebeNOME = $_GET["nome"];
	$recebeTEL = $_GET["telefone"];
	
	$recebeCEP = $_GET["CEP"];
	$recebeLOGRADOURO = $_GET["logradouro"];
	$recebeNUMERO = $_GET["numero"];
	$recebeCOMPLEMENTO = $_GET["complemento"];
	$recebeBAIRRO = $_GET["bairro"];
	$recebeESTADO = $_GET["estado"];
	$recebeCIDADE = $_GET["cidade"];

	$recebeTRABALHO = $_GET["trabalho"];

	mysqli_query($conexao, "UPDATE login SET nome='$recebeNOME',email='$recebeEMAIL',telefone='$recebeTEL',CEP='$recebeCEP',logradouro='$recebeLOGRADOURO',numero='$recebeNUMERO',complemento='$recebeBAIRRO',estado='$recebeESTADO',cidade='$recebeCIDADE' WHERE login='$recebeLOGIN' ") or die(mysqli_error($conexao));

	$verifica_trabalho =  mysqli_query($conexao, "SELECT * FROM login WHERE login = '$recebeLOGIN' AND '$recebeTRABALHO' = 'dentista'");


if (mysqli_num_rows($verifica_trabalho)<=0){
          header('location:perfilProtetico.php');
            
          }else{
            header('location:perfilDentista.php');
          }

?>
