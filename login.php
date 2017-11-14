<?php 
  include("conecta.php");

  session_start();

  $login = $_POST['login'];
  $senha = $_POST['senha'];

        
  $verifica_login = mysqli_query($conexao, "SELECT * FROM login WHERE login = '$login' AND senha = '$senha'");
  
  $verifica_trabalho =  mysqli_query($conexao, "SELECT * FROM login WHERE login = '$login' AND trabalho = 'dentista'");

    if (mysqli_num_rows($verifica_login)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
        }else{  
          
          $_SESSION['login'] = $login;
          $_SESSION['senha'] = $senha;

          if (mysqli_num_rows($verifica_trabalho)<=0){
          header('location:mainProtetico.php');
            
          }else{
            header('location:mainDentista.php');
          }
          

          
        }
?>