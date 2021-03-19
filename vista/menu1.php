<?php
require_once "../controlador/sessionValidate.php";
require_once "../controlador/sessionUserTypeAdmin.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Principal</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap-yeti.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Bienvenido</a>
            </div>
            <div class="row-fluid">
                <div class="row" style="float: left; margin: 0 0 0 25px;" >
                    <p style="color: white;"><?php $hoy = date("Y-m-d "); echo $hoy; echo $_SESSION['nombre']; ?></p>
                </div>
                <div class="row" style="float: right; margin: 12px 25px 0 0;">
                    <a href="#" class="btn btn-danger" style="width: 100px;" onclick="logOut()">Salir</a>
                </div>
            </div>
        </nav>
        <!-- /. NAV TOP  -->

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/th.jpg" class="user-image img-responsive"/>
                    </li>
                    <li>
                        <a  href="#" onclick="loadUsers()"><i class="fa fa-dashboard fa-2x" ></i> Usuarios</a>
                    </li>
                    <li>
                        <a  href="#" onclick="loadProducts()"><i class="fa fa-dashboard fa-2x" ></i> Productos</a>
                    </li>
                      <li>
                        <a  href="#"><i class="fa fa-desktop fa-2x"></i> Elementos </a>
                    </li>
                    <li>
                        <a  href="#"><i class="fa fa-qrcode fa-2x"></i> Tabs y paneles </a>
                    </li>
                    <li  >
                        <a  href="#"><i class="fa fa-bar-chart-o fa-2x"></i> Por definir </a>
                    </li>
                      <li  >
                        <a  href="#"><i class="fa fa-table fa-2x"></i> Tablas </a>
                    </li>
                    <li  >
                        <a  href="#"><i class="fa fa-edit fa-2x"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-2x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                      </li>
                  <li  >
                        <a class="active-menu"  href="blank.html"><i class="fa fa-square-o fa-2x"></i> Pagina blanca</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <div id="wrapper">
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row-fluid" id="contenido">
                        <div class="col-md-12">
                         <h2>Convoy Of Hope</h2>
                         <h5>Bienvenido, es un gusto tenerte de vuelta. </h5>
                         <!-- <object data="SG53-chatbots.pdf" type="application/pdf" width="100%" height="1050px">
                         </object> -->
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                </div>
                 <!-- /. PAGE INNER  -->
                </div>
             <!-- /. PAGE WRAPPER  -->
            </div>
         <!-- /. WRAPPER  -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/appjs.js"></script>
    <script src="assets/js/mainjs.js"></script>
</body>
</html>
