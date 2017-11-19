<?php 

include("conecta.php");
        

        if(session_start() == true) 
        {
        	unset($_SESSION['login']);
        	unset($_SESSION['senha']);
            header('location:index.html');
        }

   ?>     