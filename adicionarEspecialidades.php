<?php

include("conecta.php");

$recebeEspecialidade = $_GET["especialidade"];

$login = $_GET["login"];

mysqli_query($conexao, "INSERT into protetico_especialidades (protetico, especialidade) values ('$login','$recebeEspecialidade')") or die(mysqli_error($conexao));

header("location:perfilProtetico.php");

?>