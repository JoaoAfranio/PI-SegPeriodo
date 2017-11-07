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
                    <li class="active">
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

                <h2>Pedidos</h2>
                



                <div class="line"></div>

                <h3>Trabalho</h3>
                
                <div class="row cadastroback">
             <div class="col-md-4">
                <form  style="margin-left: 20px;" action="fazerPedido.php"  method="get" name="Pedidos" id="login">
                    <input type="radio" required name="trabalho" value="e.p.f"> <span class="labelcad">Elemento Ponte Fixa</span><br>
                    <input type="radio" name="trabalho" value="coroav"> <span class="labelcad">Coroa Vaneer</span><br>
                    <input type="radio" name="trabalho" value="coroat"> <span class="labelcad">Coroa Total</span><br>
                    <input type="radio" name="trabalho" value="coroa.j.p"> <span class="labelcad">Coroa Jaqueta Pura</span><br>
                    <input type="radio" name="trabalho" value="r.m"> <span class="labelcad">R.M Fundida</span><br>
                    <input type="radio" name="trabalho" value="nucleo.d"> <span class="labelcad">Núcleo Direto</span><br>
                    <input type="radio" name="trabalho" value="nucleo.i"> <span class="labelcad">Núcleo Indireto</span><br>
                    <input type="radio" name="trabalho" value="copiny.r"> <span class="labelcad">Copiny para Resina</span><br>
            </div>        
            <div class="col-md-4">           
                    <input type="radio" name="trabalho" value="copiny.c"> <span class="labelcad">Copiny Cerâmico</span><br>
                    <input type="radio" name="trabalho" value="inlay"> <span class="labelcad">Inlay Onlay</span><br>
                    <input type="radio" name="trabalho" value="elemento.p"> <span class="labelcad">Elemento Provisório Acrílico</span><br>
                    <input type="radio" name="trabalho" value="ponto.d.s"> <span class="labelcad">Ponto de Solda</span><br>
                    <input type="radio" name="trabalho" value="protese.t"> <span class="labelcad">Prótese Total (Detadura)</span><br>          
                    <input type="radio" name="trabalho" value="ponto.m"> <span class="labelcad">Ponte Móvel (Roach Metal)</span><br>
                    <input type="radio" name="trabalho" value="ponte.m"> <span class="labelcad">Ponte Móvel (R. parte Acrílica)</span><br>
                    <input type="radio" name="trabalho" value="provisoria"> <span class="labelcad">Provisória (Perereca)</span><br>
            </div>        
            <div class="col-md-4">          
                    <input type="radio" name="trabalho" value="placa.c"> <span class="labelcad">Placa Clareamento</span><br>
                    <input type="radio" name="trabalho" value="placa.b.a> <span class="labelcad">Placa Bruxismo Acrílica</span><br>
                    <input type="radio" name="trabalho" value="placa.b.p"> <span class="labelcad">Placa Bruxismo Plastivac</span><br>
                    <input type="radio" name="trabalho" value="vaz"> <span class="labelcad">Vaz-Gesso</span><br>
                    <input type="radio" name="trabalho" value="consertos"> <span class="labelcad">Consertos</span><br>
                    <input type="radio" name="trabalho" value="moldeira"> <span class="labelcad">Moldeira Individual de acrilico</span><br>
                    <input type="radio" name="trabalho" value="montagem"> <span class="labelcad">Montagem no articulador</span>
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
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select><br>
                            
                            <label class="labelcad">Idade</label><br>
                            <input required type="text" name="idade_pedido">
                            
                        </div>

                        <div class="col-md-4">
                           
                            <label class="labelcad">Numeração do Dente</label>
                            <input required type="text" name="num_dente" id="numeracao">
                            
                            <label class="labelcad">Cor do dente</label>
                            <input required type="text" name="cor_dente">
                         
                         </div>
                 
                 </div>
                 
                 <div>
                    <br>
                     <label class="labelcad">Obs:</label>
                    <input type="text" name="obs" size="70">
                 </div><br>
                 <input onclick="pedido_Sucesso()" type="submit" class="button-cadastro"></input>
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