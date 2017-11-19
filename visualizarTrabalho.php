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
$nome = $dado1["nome"];


$consulta = "SELECT * FROM pedidos WHERE protetico_resp = '$nome' AND disponibilidade2 = 'Aceito'";
$con = $conexao ->query($consulta) or die ($con->error);



?>
<html>
    <head>
        

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Visualisar Trabalhos</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/sidebar.css">
         <style type="text/css">
            #tabelaCustom {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #tabelaCustom td, #tabelaCustom th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #tabelaCustom tr:nth-child(even){background-color: #f2f2f2;}

            #tabelaCustom tr:hover {background-color: #ddd;}

            #tabelaCustom th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #12675e;
                color: white;
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
                        <a href="#">
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
                            <i class="glyphicon glyphicon-log-out"></i>
                            logout
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="width: 100%;">

                <nav class="navbar navbar-default">
                    <div class="container-fluid" >

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

                <h2>Meus Trabalhos</h2>
                <div class="line"></div>
                
                <table id="tabelaCustom">
                    <tr>
                        
                        <th>Nº</th>
                        <th>Tipo</th>
                        <th>Sexo do paciente</th>
                        <th>Idade do paciente</th>
                        <th>Número do dente</th>
                        <th>Cor do Dente</th>
                        <th>Dentista</th>
                        <th>Valor</th>
                    </tr>

                    <?php while($dado = $con->fetch_array()){?>
                   
                    <tr>
                        
                        <td style="padding-bottom: 10px;"><?php echo $dado["id"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["trabalho"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["sexo"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["idade_paciente"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["num_dente"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["cor_dente"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["dentista"];?></td>
                        <td style="padding-bottom: 10px;">R$<?php echo $dado["valor_medio"];?></td>
                        <td><button  type="button" class="btn btn-info" data-toggle="modal" data-target="#alterarMODAL<?php echo $dado["id"]?>">Vizualizar</button></td>
                      
                       <form action="deletarPedido2.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $dado['id'] ?>">
                        <td><button hidden=""<?php if ($dado["disponibilidade"] != "Pronto") echo "type='submit' onclick='deletado_Sucesso()' class='btn btn-danger'"?> >Apagar</button></td>
                        </form>
                         <!-- Modal -->
                        <div class="modal fade" id="alterarMODAL<?php echo $dado["id"]?>" role="dialog">
                           <div class="modal-dialog">
                           
                             <!-- Conteudo do Modal -->
                             <div class="modal-content">
                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Pedido</h4>
                               </div>
                               <div class="modal-body">
                                <form action="trabalhoPronto.php" method="get">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Nº do pedido</b></p><p><input name="id" value="<?php echo $dado["id"]?>" type="hidden"><?php echo $dado["id"]?></p>
                                            <p><b>Trabalho</p></b><p><?php echo $dado["trabalho"]?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><b>Observação</b></p><p><?php echo $dado["obs"]?></p>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-4">
                                 <p><b>Sexo<b></p>
                                    <p><?php echo $dado["sexo"]?><p>   
                                 <p><b>Idade</b></p><p><?php echo $dado["idade_paciente"]?></p>
                                    </div>
                                    <div class="col-md-4">
                                    <p><b>Data de Entrega</b></p>
                                    <p><?php echo $dado["data_entrega"]?></p>
                                    <p><b>Preço</b></p>
                                    <p><?php echo $dado["valor_medio"]?></p>
                                    </div>
                              
                                 <p><b>Número do dente</b></p><p><?php echo $dado["num_dente"]?></p>
                                 <p><b>Cor do dente</b></p><p><?php echo $dado["cor_dente"]?></p>
                             </div>

                            <div class="line"></div>
                        <h3 align="center">Endereço</h3>
                          <div class="line"></div>

                         <div class="row">

                                    <div class="col-md-4">
                                <p><b>Estado</b></p><p><?php echo $dado1["estado"]?></p>
                                <p><b>Cidade</b></p><p><?php echo $dado1["cidade"]?></p>
                                <p><b>Cep</b></p><p><?php echo $dado1["CEP"]?></p>
                                    </div>

                                    <div class="col-md-4">
                                <p><b>Rua</b></p><p><?php echo $dado1["logradouro"]?></p>
                                <p><b>Complemento</b></p><p><?php echo $dado1["complemento"]?></p>
                                <p><b>Número</b></p><p><?php echo $dado1["numero"]?></p>
                                    
                                    </div>
                              
                                <p><b>Bairro</b></p><p><?php echo $dado1["bairro"]?></p>
                                <p><b>Telefone</b></p><p><?php echo $dado1["telefone"]?></p>
                             </div>
                             <p><b>Email</b></p><p><?php echo $dado1["email"]?></p>

                               <div class="modal-footer">
                                <button hidden="" <?php if ($dado["disponibilidade"] != "Pronto") echo "type='submit' class='btn btn-success' onclick='alterado_Sucesso()'"?>>Enviar </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                </form>
                               </div>
                             </div>
                             
                           </div>
                         </div>


                    </tr>

                    <?php } ?>
             
                </table>

                <div class="line"></div>

              


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
                
               alert("Trabalho Concluido!");

             }
         </script>

         <script type="text/javascript">
             function deletado_Sucesso(){
                
               alert("Pedido Deletado com Sucesso!");

             }
         </script>
    </body>
</html>
