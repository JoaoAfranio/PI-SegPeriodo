<?php 

	include("conecta.php");


	$comentario = $_GET["comentario"];
	$dentista = $_GET["dentista"];
	$protetico = $_GET["protetico"];


	mysqli_query($conexao, "INSERT into comentario (comentario, dentista, protetico) values ('$comentario','$dentista','$protetico')") or die(mysqli_error($conexao));

	header("location:perfProteticoVISUALIZAR.php?login=$protetico");


?>