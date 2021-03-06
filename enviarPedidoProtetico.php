<?php  
        include("conecta.php");
        
        session_start();
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.html');
            }

        $loginProtetico = $_GET["login"];

        $consulta = "SELECT * FROM login WHERE login = '$loginProtetico'";
        $con = $conexao ->query($consulta) or die ($con->error);
        $dado = $con->fetch_array();

        ?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Fazer Pedidos</title>

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
                            <li><a href="mainDentista.php">Página Inicial</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="perfilDentista.php">
                            <i class="glyphicon glyphicon-user"></i>
                            Perfil
                        </a>
                    </li>
                    <li  class="active"> 
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
            <div id="content">

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

                <h2>Fazer pedido</h2>
                <h4 style="display: inline;">Enviar Pedido para: <p style="display: inline;"><?php echo $dado["nome"] ?></p></h4>
                



                <div class="line"></div>

                <h3>Trabalho</h3>
                
                <div class="row cadastroback">
             <div class="col-md-4">
                <form  style="margin-left: 20px;" action="PedidoParaProtetico.php"  method="get" name="Pedidos" id="login">
                    <input type="radio" name="trabalho" value="Elemento Ponte Fixa"> <span class="labelcad">Elemento Ponte Fixa</span><br>
                    <input type="radio" name="trabalho" value="Coroa Vaneer"> <span class="labelcad">Coroa Vaneer</span><br>
                    <input type="radio" name="trabalho" value="Coroa Total"> <span class="labelcad">Coroa Total</span><br>
                    <input type="radio" name="trabalho" value="Coroa Jaqueta Pura"> <span class="labelcad">Coroa Jaqueta Pura</span><br>
                    <input type="radio" name="trabalho" value="R.M Fundida"> <span class="labelcad">R.M Fundida</span><br>
                    <input type="radio" name="trabalho" value="Nucleo Direto"> <span class="labelcad">Núcleo Direto</span><br>
                    <input type="radio" name="trabalho" value="Nucleo Indireto"> <span class="labelcad">Núcleo Indireto</span><br>
                    <input type="radio" name="trabalho" value="Coping para Resina"> <span class="labelcad">Coping para Resina</span><br><br>
                    <input type="radio" name="trabalho"><span class="labelcad">Prótese não listada</span>
                    <input type="text" name="trabalho_naoListado">
            </div>        
            <div class="col-md-4">           
                    <input type="radio" name="trabalho" value="Coping Cerâmico"> <span class="labelcad">Coping Cerâmico</span><br>
                    <input type="radio" name="trabalho" value="Inlay"> <span class="labelcad">Inlay</span><br>
                    <input type="radio" name="trabalho" value="Onlay"> <span class="labelcad">Onlay</span><br>
                    <input type="radio" name="trabalho" value="Elemento Provisorio Acrílico"> <span class="labelcad">Elemento Provisório Acrílico</span><br>
                    <input type="radio" name="trabalho" value="Ponto de Solda"> <span class="labelcad">Ponto de Solda</span><br>
                    <input type="radio" name="trabalho" value="Protese Total"> <span class="labelcad">Prótese Total</span><br>          
                    <input type="radio" name="trabalho" value="Ponte Movel (Roach Metal)"> <span class="labelcad">Ponte Móvel (Roach Metal)</span><br>
                    <input type="radio" name="trabalho" value="Ponte Movel (R. parte Acrílica)"> <span class="labelcad">Ponte Móvel (R. parte Acrílica)</span><br>
            </div>        
            <div class="col-md-4">          
                    <input type="radio" name="trabalho" value="Protese Provisoria"> <span class="labelcad">Prótese Provisória </span><br>
                    <input type="radio" name="trabalho" value="Placa Clareamento"> <span class="labelcad">Placa Clareamento</span><br>
                    <input type="radio" name="trabalho" value="Placa Bruxismo Acrílica"> <span class="labelcad">Placa Bruxismo Acrílica</span><br>
                    <input type="radio" name="trabalho" value="Placa Bruxismo Plastivac"> <span class="labelcad">Placa Bruxismo Plastivac</span><br>
                    <input type="radio" name="trabalho" value="Vaz-Gesso"> <span class="labelcad">Vazar Gesso</span><br>
                    <input type="radio" name="trabalho" value="Consertos"> <span class="labelcad">Consertos</span><br>
                    <input type="radio" name="trabalho" value="Moldeira Individual de Acrílico"> <span class="labelcad">Moldeira Individual de acrilico</span><br>
                    <input type="radio" name="trabalho" value="Montagem no Articulador"> <span class="labelcad">Montagem no Articulador</span><br>
                    <input type="radio" name="trabalho" value="Protese Parcial Provisoria"> <span class="labelcad">Prótese Provisória </span><br>
                 </div>
                 </div>
                 
                 <h3>Informações do paciente</h3>
                 <div align="center">
                     


                     <img id="Image-Maps-Com-image-maps-2017-10-30-153201" src="http://www.image-maps.com/m/private/91715/101487-08cmm8q0rm5ejqk68ofha1qo41_quadrante.jpeg" border="0" width="500" height="231" orgWidth="500" orgHeight="231" usemap="#image-maps-2017-10-30-153201" alt="" />
                     <map name="image-maps-2017-10-30-153201" id="ImageMapsCom-image-maps-2017-10-30-153201">
                     <area  alt="" title="" shape="rect" coords="3,28,30,114" style="outline:none;" onclick="inserirNum(18)"    />
                     <area  alt="" title="" shape="rect" coords="33,28,60,114" style="outline:none;" onclick="inserirNum(17)"    />
                     <area  alt="" title="" shape="rect" coords="66,24,94,110" style="outline:none;" onclick="inserirNum(16)"    />
                     <area  alt="" title="" shape="rect" coords="96,22,124,108" style="outline:none;" onclick="inserirNum(15)"    />
                     <area  alt="" title="" shape="rect" coords="128,23,156,109" style="outline:none;" onclick="inserirNum(14)"    />
                     <area  alt="" title="" shape="rect" coords="161,14,189,110" style="outline:none;" onclick="inserirNum(13)"    />
                     <area  alt="" title="" shape="rect" coords="191,19,219,115" style="outline:none;" onclick="inserirNum(12)"    />
                     <area  alt="" title="" shape="rect" coords="221,19,249,115" style="outline:none;" onclick="inserirNum(11)"    />
                     <area  alt="" title="" shape="rect" coords="252,19,280,107" style="outline:none;" onclick="inserirNum(21)"    />
                     <area  alt="" title="" shape="rect" coords="284,23,312,111" style="outline:none;" onclick="inserirNum(22)"    />
                     <area  alt="" title="" shape="rect" coords="314,12,342,107" style="outline:none;" onclick="inserirNum(23)"    />
                     <area  alt="" title="" shape="rect" coords="347,21,373,108" style="outline:none;" onclick="inserirNum(24)"    />
                     <area  alt="" title="" shape="rect" coords="378,21,404,108" style="outline:none;" onclick="inserirNum(25)"    />
                     <area  alt="" title="" shape="rect" coords="408,22,437,109" style="outline:none;" onclick="inserirNum(26)"    />
                     <area  alt="" title="" shape="rect" coords="440,24,468,111" style="outline:none;" onclick="inserirNum(27)"    />
                     <area  alt="" title="" shape="rect" coords="469,24,497,111" style="outline:none;" onclick="inserirNum(28)"    />
                     <area  alt="" title="" shape="rect" coords="3,135,31,222" style="outline:none;" onclick="inserirNum(48)"    />
                     <area  alt="" title="" shape="rect" coords="31,138,59,225" style="outline:none;" onclick="inserirNum(47)"    />
                     <area  alt="" title="" shape="rect" coords="64,139,95,226" style="outline:none;" onclick="inserirNum(46)"    />
                     <area  alt="" title="" shape="rect" coords="96,140,124,230" style="outline:none;" onclick="inserirNum(45)"    />
                     <area  alt="" title="" shape="rect" coords="128,138,156,228" style="outline:none;" onclick="inserirNum(44)"    />
                     <area  alt="" title="" shape="rect" coords="159,139,187,229" style="outline:none;" onclick="inserirNum(43)"    />
                     <area  alt="" title="" shape="rect" coords="190,138,218,228" style="outline:none;" onclick="inserirNum(42)"    />
                     <area  alt="" title="" shape="rect" coords="219,135,248,225" style="outline:none;" onclick="inserirNum(41)"    />
                     <area  alt="" title="" shape="rect" coords="253,137,282,227" style="outline:none;" onclick="inserirNum(31)"    />
                     <area  alt="" title="" shape="rect" coords="284,136,313,226" style="outline:none;" onclick="inserirNum(32)"    />
                     <area  alt="" title="" shape="rect" coords="315,139,344,229" style="outline:none;" onclick="inserirNum(33)"    />
                     <area  alt="" title="" shape="rect" coords="345,136,374,226" style="outline:none;" onclick="inserirNum(34)"    />
                     <area  alt="" title="" shape="rect" coords="378,135,407,225" style="outline:none;" onclick="inserirNum(35)"    />
                     <area  alt="" title="" shape="rect" coords="408,135,437,225" style="outline:none;" onclick="inserirNum(36)"    />
                     <area  alt="" title="" shape="rect" coords="437,136,466,226" style="outline:none;" onclick="inserirNum(37)"    />
                     <area  alt="" title="" shape="rect" coords="468,132,497,222" style="outline:none;" onclick="inserirNum(38)"    />
                     <area shape="rect" coords="498,229,500,231" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_91715" />
                     </map>

                </div>
                
                <div class="row">     
                        
                        <div class="col-md-4">
                           
                            
                            <label class="labelcad">Sexo</label><br>
                                <select required name="sexo">
                                    <option value=""></option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select><br>
                            
                            <label class="labelcad">Idade</label><br>
                            <input required type="text" name="idade_pedido">
                            
                        </div>

                        <div class="col-md-4">
                           
                            <label class="labelcad">Numeração do Dente</label>
                            <input required type="text" name="num_dente" id="numeracao">
                            
                            <label class="labelcad">Seleção de cor</label>
                            <input required type="text" name="cor_dente">
                         
                         </div>

                          <div class="">
                           
                            <label class="labelcad">Data de Entrega</label><br>
                            <input required type="date" name="data_entrega">
                            
                         
                         </div>
                 
                 </div>
                 <div>
                    <br>
                     <label class="labelcad">Obs:</label>
                    <input type="text" name="obs" size="70">
                 </div><br>
                 <input onclick="pedido_Sucesso()" type="submit" class="button-cadastro"></input>
                 <input name="protetico" value="<?php echo $loginProtetico?>" type="hidden">
        </form>
                    <a href="mainDentista.php"><button class="button-cadastro">Voltar</button></a>
        </div>

             
         </div>        
        </div>


        <script src="js/script.js"></script>
        <!-- Imagem Mapeada -->
        <script src="js/mapearImagem.js"></script>
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
             function pedido_Sucesso(){
                
               alert("Pedido realizado com sucesso!");

             }
         </script>


    </body>
</html>
