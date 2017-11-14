<?php 

include("conecta.php");

session_start();
        
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.html');
        }


$dentista = $_SESSION['login'];


$consulta = "SELECT * FROM pedidos WHERE dentista = '$dentista'";
$con = $conexao ->query($consulta) or die ($con->error);


?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Listar Proteticos</title>
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- CSS da SIDEBAR-->
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
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="mainDentista.php">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
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
                    <li class="active">
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
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Abrir Menu</span>
                            </button>
                        </div>
                    </div>
                </nav>

                <h2>Listar meus pedidos</h2>
                <div class="line"></div>
                
                <table id="tabelaCustom">
                	<tr>
                        
                		<th>Nº</th>
                        <th>Tipo</th>
                        <th>Sexo do paciente</th>
                        <th>Idade do paciente</th>
                        <th>Número do dente</th>
                        <th>Cor do Dente</th>
                        <th>Protético Responsável</th>
                        <th>Status do Pedido</th>
                	</tr>

                	<?php while($dado = $con->fetch_array()){?>
                	<tr>
                        
                		<td style="padding-bottom: 10px;"><?php echo $dado["id"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["trabalho"];?></td>
                		<td style="padding-bottom: 10px;"><?php echo $dado["sexo"];?></td>
                		<td style="padding-bottom: 10px;"><?php echo $dado["idade_paciente"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["num_dente"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["cor_dente"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["protetico_resp"];?></td>
                        <td style="padding-bottom: 10px;"><?php echo $dado["disponibilidade"];?></td>

                        <td><button <?php if ($dado["disponibilidade"] == "Andamento") echo "disabled" ?> type="button" class="btn btn-info" data-toggle="modal" data-target="#alterarMODAL<?php echo $dado["id"]?>">Editar</button></td>
                        <form action="deletarPedido.php" method="get">
                        <input type="hidden" name="id" value="<?=$dado['id']?>">
                        <td><button <?php if ($dado["disponibilidade"] == "Andamento") echo "disabled" ?> type="submit" onclick="deletado_Sucesso()" class="btn btn-danger">Apagar</button></td>
                        </form>
                         <!-- Modal -->
                         <div class="modal fade" id="alterarMODAL<?php echo $dado["id"]?>" role="dialog">
                           <div class="modal-dialog">
                           
                             <!-- Conteudo do Modal -->
                             <div class="modal-content">
                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Editar Informações</h4>
                               </div>
                               <div class="modal-body">
                                <form action="alterarPedido.php" method="get">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Nº do pedido</p><input name="id" value="<?php echo $dado["id"]?>">
                                            <p>Trabalho</p><input name="trabalho" value="<?php echo $dado["trabalho"]?>">
                                        </div>
                                        <div class="col-md-4">
                                            <p>Observação</p><textarea name="obs" value="<?php echo $dado["obs"]?>" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-4">
                                 <p>Sexo</p>
                                         <select name="sexo">
                                         <option><?php echo $dado["sexo"]?></option>
                                         <?php if($dado["sexo"] == "Feminino"){echo "<option value='Masculino'>Masculino</option>";}
                                                else{echo "<option value='Feminino'>Feminino</option>";} 
                                         ?>
                                         </select>


                                 <p>Idade</p><input name="idade_pedido" value="<?php echo $dado["idade_paciente"]?>">
                                    </div>
                                    <div class="col-md-4">
                                    <p>Data de Entrega</p><input>
                                    <p>Preço</p><input>
                                    </div>
                                </div>
                                 <p>Número do dente</p><input name="num_dente" value="<?php echo $dado["num_dente"]?>">
                                 <p>Cor do dente</p><input name="cor_dente" value="<?php echo $dado["cor_dente"]?>">
                               <div class="modal-footer">
                                <button type="submit" class="btn btn-success" onclick="alterado_Sucesso()">Salvar Alterações</button>
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

               <p>
                P.S: Só é possível alterar o pedido no qual o status encontra-se em ABERTO.
                <br>
                Caso queira alterar um pedido que esteja em andamento,entre em contato com o protético responsável.
                </p>


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
                
               alert("Pedido Alterado com Sucesso!");

             }
         </script>

         <script type="text/javascript">
             function deletado_Sucesso(){
                
               alert("Pedido Deletado com Sucesso!");

             }
         </script>
    </body>
</html>
