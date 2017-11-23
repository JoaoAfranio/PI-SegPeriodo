<!DOCTYPE html>
<html>
    <head>
        
        
        <?php  
        include("conecta.php");
        session_start();
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.html');
            }

        $logado = $_SESSION['login'];

        $consulta1 = "SELECT * FROM login WHERE login = '$logado'";
        $con1 = $conexao ->query($consulta1) or die ($con1->error);
        $dado1 = $con1->fetch_array();
        ?>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>PROT+</title>

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
                            <li><a href="mainDentista.php">Seja Bem-vindo</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="perfilDentista.php">
                            <i class="glyphicon glyphicon-user"></i>
                            Perfil
                        </a>
                    </li>
                    <li>
                        <a href="pedidosDentista.php">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Fazer Pedidos
                        </a>
                    </li>
                    <li>
                        <a href="listaPedidos.php">
                            <i class="glyphicon glyphicon-list"></i>
                            Listar Pedidos
                        </a>
                    </li>
                    <li>
                        <a href="listaProtetico.php?estado=">
                            <i class="glyphicon glyphicon-send"></i>
                            Listar Protéticos
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
                            
                        </div>
                    </div>
                </nav>

                    <h3>Seja bem-vindo</h3>
                    <h4>Você esta logado como <p style="display: inline;"><?php echo $dado1["nome"] ?></p></h4>


                    <div class="line"></div>

                    <h3>Por que utilizar PROT+?</h3>
                    <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                        <img src="imgs/cloud.png" class="img-responsive" style="margin-left: 80px;margin-top: 50px;width: 200px;height: auto;">
                        <p style="text-align: center;margin-top: 10px;">Seus pedidos salvos em nuvem,desse modo você pode levar para onde quiser.</p>
                        </div>
                        <div class="col-md-4">
                        <img src="imgs/closed-lock.png" class="img-responsive" style="margin-left: 80px;margin-top: 50px;width: 200px;height: auto;">
                        <p style="text-align: center;margin-top: 10px;">Oferecemos segurança de dados e Confiabilidade.</p>
                        </div>
                        <div class="col-md-4">
                        <img src="imgs/stick-man.png" class="img-responsive" style="margin-left: 80px;margin-top: 50px;width: 200px;height: auto;">
                        <p style="text-align: center;margin-top: 10px;">PROT+ te oferece próteticos de todos estados do país.</p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    <p style="text-align: center;margin-top: 50px;"><a href="pedidosDentista.php"><button type="button" class="btn btn-info">Fazer pedido</button></p></a>
                    </div>
                    </div>
                </div>

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
