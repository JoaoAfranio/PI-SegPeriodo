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


        $consulta = "SELECT comentario, dentista, nomeDentista FROM comentario WHERE protetico = '$logado'";
        $con = $conexao ->query($consulta) or die ($con->error);

        ?>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Perfil</title>

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
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                       <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="mainProtetico.php">Página Inicial</a></li>
                        </ul>
                    </li>
                    <li class="active">
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
                        <a href="logout.php">
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

                <h3>Perfil</h3>


                <div class="line"></div>
                    <div class="container-fluid">
                        <div  class="row">
                                <div class="col-md-3">
                                    <img src="imgs/perfilProtetico.jpg" style="padding-left: 20px;width: 300px;height: 300px;border-radius: 50%;">
                                    <p style="text-align: center;padding-top: 10px;"><a style="color: #0067B8;" href="">Alterar Imagem</a></p>
                                </div>

                                <div class="col-md-4">
                                    <h4><?php echo $dado1["nome"]?></h4>
                                    <a style="color: #0067B8;" href="">Editar nome</a>
                                    <br><br><br>

                                    <h5><?php echo $dado1["email"]?></h5>

                                    <br><br><br>
                                    <a style="color: #0067B8;cursor: pointer;" data-toggle="modal" data-target="#modalInfoPessoal">Editar informações pessoais</a><br>
                                    <a style="color: #0067B8;" href="">Adicionar tipos de trabalho</a><br>
                                    <a style="color: #0067B8;" href="">Anexar fotos de trabalhos</a><br>
                                    <a style="color: #0067B8;cursor: pointer;" data-toggle="modal" data-target="#modalAlterarSenha">Alterar Senha</a><br>



                                    <!-- Modal Alterar Info Pessoal -->
                                    <div class="modal fade" id="modalInfoPessoal" role="dialog">
                                      <div class="modal-dialog ">
                                      
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Editar Informações Pessoais</h4>
                                          </div>
                                          <div class="modal-body">
                                            <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <form action="alterarPerfil.php" method="get">
                                                    <input  type="hidden" name="login" value="<?php echo $dado1["login"]?>">
                                                    <input  type="hidden" name="trabalho" value="<?php echo $dado1["trabalho"]?>">
                                                    <h4>Dados Pessoais</h4>
                                                    <p>Nome</p><input name="nome" value="<?php echo $dado1["nome"]?>">
                                                    <p>Email</p><input name="email" value="<?php echo $dado1["email"]?>">
                                                    <p>Telefone</p><input name="telefone" value="<?php echo $dado1["telefone"]?>">
                                                </div>
                                            </div>
                                            <div class="line"></div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                    <h4>Endereço</h4>
                                                    <p>Cidade</p><input name="cidade" value="<?php echo $dado1["cidade"]?>">
                                                    <p>Estado</p><input name="estado" value="<?php echo $dado1["estado"]?>">
                                                    <p>Bairro</p><input name="bairro" value="<?php echo $dado1["bairro"]?>">
                                                    <p>Logradouro</p><input name="logradouro" value="<?php echo $dado1["logradouro"]?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                    <br><br>
                                                    <p>Número</p><input name="numero" value="<?php echo $dado1["numero"]?>">
                                                    <p>Complemento</p><input name="complemento" value="<?php echo $dado1["complemento"]?>">
                                                    <p>CEP</p><input name="CEP" value="<?php echo $dado1["CEP"]?>">
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" onclick="alterado_Sucesso()">Salvar Alterações</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
                                            </form>
                                          </div>
                                            </div>
                                          </div>
                                        </div>


                                        <!-- Modal Alterar Alterar SEnha -->
                                        <div class="modal fade" id="modalAlterarSenha" role="dialog">
                                          <div class="modal-dialog ">
                                          
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Alterar Senha</h4>
                                              </div>
                                              <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                        <form action="alterarSenha.php" method="get">
                                                        <input  type="hidden" name="trabalho" value="<?php echo $dado1["trabalho"]?>">
                                                        <input  type="hidden" name="login" value="<?php echo $dado1["login"]?>">
                                                        <p>Digite a nova senha</p><input type="password" name="senha">
                                                        </div>
                                                    </div>
                                                </div>
                                              <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" onclick="alterado_Sucesso()">Salvar Senha</button>
                                                        </form>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
                                                </form>
                                              </div>
                                                </div>
                                              </div>
                                            </div>
                                </div>

                                <div class="col-md-5">
                                <div style="background: #08a191;border-top-left-radius: 2em;border-top-right-radius: 2em;padding-bottom: 2px;padding-top: 1px;">

                                <h3 style="margin-top: 10px;margin-left: 10px;">Comentários</h3>
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
             
             function alterado_Sucesso(){
                
               alert("Informações Alteradas com Sucesso!");

             }

         </script>
    </body>
</html>
