<!DOCTYPE html>
<html>
    <head>
        
        <?php  
        session_start();
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.html');
            }

        $logado = $_SESSION['login'];
        ?>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/sidebar.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>PROT+</h3>
                    <strong>P+</strong>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                       <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="mainProtetico.php">Página Inicial</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="perfilProtetico.php">
                            <i class="glyphicon glyphicon-user"></i>
                            Perfil
                        </a>
                    </li>
                    
                    <li>
                        <a href="trabalhosProtetico.php?estado=">
                            <i class="glyphicon glyphicon-list"></i>
                            Procurar Trabalhos
                        </a>
                    </li>
                    <li>
                        <a href="visualizarTrabalho.php">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Meus Trabalhos
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="glyphicon glyphicon-envelope"></i>
                            Requisições de trabalho
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="glyphicon glyphicon-log-out"></i>
                            Logout
                        </a>
                    </li>
                    
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="width: 100%;">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Abrir Menu</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                               
                            </ul>
                        </div>
                    </div>
                </nav>

                <h2>Pagina Principal</h2>


                <div class="line"></div>

                <h2>Lorem Ipsum Dolor</h2>
            </div>
        </div>





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
