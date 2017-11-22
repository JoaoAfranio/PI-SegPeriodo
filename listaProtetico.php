<?php 

include("conecta.php");

session_start();
        
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.html');
        }
        
$filtroESTADO = $_GET["estado"];

$consulta = "SELECT nome, email, cidade, login FROM login WHERE estado = '$filtroESTADO'";
$con = $conexao ->query($consulta) or die ($con->error);



?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Listar Proteticos</title>

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
    <style type="text/css"></style>


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
                    <li  class="active">
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
                    </div>
                </nav>

                <h2>Listar Protéticos</h2>
                <p>Procurar por protéticos
                 <form  action="listaProtetico.php?estado="  method="get">   
                    <select name="estado">
                            <option value=""></option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Rorâima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                    </select>
                    <input onclick="pesquisa_Sucesso()" type="submit"/>
                </form>
                </p>
                <div class="line"></div>
                
                <table id="tabelaCustom">
                	<tr>
                        <th></th>
                		<th style="padding-left: 20px;">Nome</th>
                		<th style="padding-left: 20px;">E-mail</th>
                		<th style="padding-left: 20px;">Cidade</th>
                	</tr>
                	<?php while($dado = $con->fetch_array()){?>
                    <form action="perfProteticoVISUALIZAR.php" action="get"></form>
                	<tr>
                		<td style="width: 40px;"><input name="nome" value="<?php echo $dado["login"]?>" type="hidden"><a class="btn btn-info" href="perfProteticoVISUALIZAR.php?login=<?php echo $dado["login"]?>" role="button"><span class="glyphicon glyphicon-user"></span></a></td>
                        <td style="padding-left: 20px;"><?php echo $dado["nome"];?></td>
                		<td style="padding-left: 20px;"><?php echo $dado["email"];?></td>
                		<td style="padding-left: 20px;"><?php echo $dado["cidade"];?></td>
                	</tr>
                    </form>
                	<?php } ?>
                </table>

                <div class="line"></div>    

            </div>
        </div>

        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             function pesquisa_Sucesso(){
                
               alert("Pesquisa realizada com sucesso!");

             }
         </script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
