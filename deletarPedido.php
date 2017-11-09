<?php
	include("conecta.php");

	mysqli_query($conexao, "DELETE FROM pedidos WHERE id='$dados["id"]'");
?>