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

        $loginProtetico = $_GET["login"];

        $consulta1 = "SELECT * FROM login WHERE login = '$loginProtetico'";
        $con1 = $conexao ->query($consulta1) or die ($con1->error);
        $dado1 = $con1->fetch_array();


        $consulta = "SELECT comentario, dentista, nomeDentista FROM comentario WHERE protetico = '$loginProtetico'";
        $con = $conexao ->query($consulta) or die ($con->error);


        $consultaEspecialidades = "SELECT * FROM protetico_especialidades WHERE protetico = '$loginProtetico'";
        $conEsp = $conexao ->query($consultaEspecialidades) or die ($conEsp->error);
        $dadosEsp = $conEsp->fetch_array();



        ?>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Perfil - <?php echo $dado1["nome"]?></title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/sidebar.css">

        <style type="text/css">
            .semBullet{
                list-style-type: none;
            }
            .ulSemEspaco{

            }
        </style>
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
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="mainDentista.php">Página Inicial</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
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
                            <ul class="nav navbar-nav navbar-right">
                               
                            </ul>
                        </div>
                    </div>
                </nav>

                <h3>Perfil</h3>


                <div class="line"></div>
                    <div class="container-fluid">
                        <div  class="row">
                                <div class="col-md-3">
                                    <img src="imgs/perfilProtetico.jpg" style="padding-left: 20px;width: 300px;height: 300px;border-radius: 50%;">
                                    <br><br><br><br><br>
                                    <button class="btn btn-info">Foto de Trabalhos</button>
                                    <a href="enviarPedidoProtetico.php?login=<?php echo $loginProtetico?>"><button class="btn btn-info">Pedir prótese</button></a><br><br>
                                </div>

                                <div class="col-md-4">
                                    <h3><?php echo $dado1["nome"]?></h3>

                                    <h5><?php echo $dado1["email"]?></h5>
                                    <br>
                                    <h5><?php echo $dado1["cidade"]?>/<?php echo $dado1["estado"]?></h5>

                                    <br>
                                    <h3>Especialidades:</h3>
                                    <ul style="padding-left: 20px;">
                                    <?php while($dadoEsp = $conEsp->fetch_array()){?>
                                    <li class="semBullet"><i class="glyphicon glyphicon-chevron-right"></i><?php echo $dadoEsp["especialidade"]?></li>
                                    <?php } ?>
                                    </ul>
                                </div>

                                <div class="col-md-5">
                                <div style="background: #08a191;border-top-left-radius: 2em;border-top-right-radius: 2em;padding-bottom: 2px;padding-top: 1px;">

                                <h3 style="margin-top: 10px;margin-left: 10px;">Comentários  <button data-toggle="modal" data-target="#modalComentario" style="float: right;margin-right: 20px;" class="btn btn-info"><i class="glyphicon glyphicon-envelope"></i></button></h3>
                                </div>

                                <!-- Modal -->
                                <div id="modalComentario" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Comentário</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form action="enviaComentario.php" action="get">
                                        <input name="dentista" value="<?php echo $logado?>" type="hidden">
                                        <input name="protetico" value="<?php echo $loginProtetico?>" type="hidden">
                                        <textarea style="width: 100%;height: 150px;" name="comentario" placeholder="Digite seu comentário aqui..."></textarea>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" onclick="comentario_Sucesso()">Enviar Comentário</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </form>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                                <div style="overflow: auto;width: 100%;height: 400px;">
                                <?php while($dado = $con->fetch_array()){?>
                                

                                <div class="container-fluid">
                                <img style="width: 50px;height: auto;" src="imgs/d.png">
                                <?php 
                                $dentista = $dado["dentista"];
                            

                                $consulta3 = "SELECT nome FROM login WHERE login = '$dentista'";
                                $con3 = $conexao ->query($consulta3) or die ($con3->error);
                                $dado3 = $con3->fetch_array();

                                ?>

                                "<?php echo $dado["comentario"];?>"<br>      <p style="text-align: right">- <?php echo $dado3["nome"]; ?></p>
                                </div>
                                <div style="margin: 10px 0;" class="line"></div>
                                <?php } ?>
                                </div>
                                <div style="background: #08a191;border-bottom-left-radius: 2em;border-bottom-right-radius: 2em;padding-bottom: 35px;padding-top: 1px;">
                                    
                                </div>

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

         <script type="text/javascript">
             
             function comentario_Sucesso(){
                
               alert("Comentário enviado com Sucesso!");

             }

         </script>
    </body>
</html>