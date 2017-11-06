 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
?>
<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
 include("bd.php");
if($valida[$user]==$pass){
setcookie("logado", "1");
 echo "<script>location.href='main.php'</script>";
 }
 else{
 echo "<font face=verdana size=2>";
 echo "Usuário ou senha incorretos!";
 echo "<br>";
 echo "<a href=index.html>";
 echo "Clique aqui</a> para tentar novamente.";
 echo "</a></font>";
 }
?>
