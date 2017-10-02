<?php 
  include("conecta.php");

  $user = $_POST['user'];
  $entrar = $_POST['entrar'];
  $pass = $_POST['pass'];

    if (isset($entrar)) {
            
      $verifica = mysqli_query($conexao, "SELECT * FROM login WHERE login = '$user' AND senha = '$pass'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
          die();
        }else{  
          setcookie("login",$login);
          header("Location:principal.html");
          
        }
    }  
?>

