<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UTESA :: Sistema de inscripcion</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../Login/img/Captura.png">
    <link rel="shortcut icon" href="../Login/img/Captura.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    
   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

        .right-panel header.header {
    background: #009688;
    border-bottom: 1px solid #009688;
    -webkit-box-shadow: none;
    box-shadow: none;
    clear: both;
    padding: 0 30px;
    height: 55px;
    position: fixed;
    left: 280px;
    left: 0;
    right: 0;
    top: 0;
    z-index: 999;
}
.right-panel .navbar-header {
    width: 100%;
    background-color: #009688;
    padding: 0 1.25em 0 0;
}
aside.left-panel {
    background: #222D32;
    height: 100vh;
    padding: 0;
    vertical-align: top;
    width: 280px;
    -webkit-box-shadow: 1px 0 20px rgba(0, 0, 0, 0.08);
    box-shadow: 1px 0 20px rgba(0, 0, 0, 0.08);
    position: fixed;
    left: 0;
    bottom: 0;
    top: 55px;
    z-index: 999;
}

.navbar {
    background: #222D32;
    border-radius: 0;
    border: none;
    display: inline-block;
    margin: 0;
    padding: 0;
    vertical-align: top;
}
.navbar .navbar-nav > li.active {
    background: #0D1214;
}

.navbar .navbar-nav li.menu-item-has-children .sub-menu {
    background: #222D32;
    border: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    overflow-y: hidden;
    padding: 0 0 0 35px;
}
p.jeje {
    margin-top: 10px;
    margin-bottom: 10px;
  }
  .treeview-item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 0px 0px 0px 0px;
  font-size: 1em;
  color: #fff;
}

.treeview-item.active, .treeview-item:hover, .treeview-item:focus {
  background: #0d1214;
  text-decoration: none;
  color: #fff;
}

.treeview-item .icon {
  margin-right: 5px;
}


    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php" style="color: #FFFFFF;"><i style="color: #FFFFFF;" class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-title" style="color: #FFFFFF;">Principal</li><!-- /.menu-title -->
                
                    <li class="menu-item-has-children dropdown">
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF;"> <i class="menu-icon fa fa-cogs" style="color: #FFFFFF;"></i>Procesos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="treeview-item"><i class="menu-icon ti-check" style="color: #FFFFFF;"></i><a href="admin.php"  style="color: #FFFFFF;">Validar Inscripcion</a></li>
                            <li class="treeview-item"><i class="menu-icon ti-user" style="color: #FFFFFF;"></i><a href="crud_usuario.php" style="color: #FFFFFF;">Mantenimiento Usuario</a></li>
                            <li class="treeview-item"><i class="menu-icon ti-user" style="color: #FFFFFF;"></i><a href="AdminCrudTest.php" style="color: #FFFFFF;">Mantenimiento de Test Vocacional</a></li>
                            <li class="treeview-item"><i class="menu-icon fa fa-table" style="color: #FFFFFF;"></i><a href="../estudiante.php" style="color: #FFFFFF;">Formulario Estudiantes</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF;"> <i class="menu-icon ti-agenda" style="color: #FFFFFF;"></i>Reportes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="treeview-item"><i class="menu-icon ti-clipboard" style="color: #FFFFFF;"></i><a href="reporteinscripcion.php"  style="color: #FFFFFF;">Reportes Inscripcion</a></li>
                            <li class="treeview-item"><i class="menu-icon ti-clipboard" style="color: #FFFFFF;"></i><a href="reporteusuario.php" style="color: #FFFFFF;">Reportes Usuario</a></li>
                        </ul>
                    </li>

                    <li class="treeview-item">
                        <a href="graficos.php"   style="color: #FFFFFF;"> <i class="menu-icon fa fa-bar-chart" style="color: #FFFFFF;"></i>Graficos</a>
                        
                    </li>
                    
                    <li class="menu-title" style="color: #FFFFFF;">Extras</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF;"> <i class="menu-icon fa fa-glass" style="color: #FFFFFF;"></i>Paginas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="treeview-item"><i class="menu-icon fa fa-sign-in" style="color: #FFFFFF;"></i><a href="../Login/login.php" style="color: #FFFFFF;">Login</a></li>
                            <li class="treeview-item"><i class="menu-icon ti-home" style="color: #FFFFFF;"></i><a href="../UTESA __ Sistema Corporativo Universidad Tecnológica de Santiago copy.html" style="color: #FFFFFF;">Pag Web Utesa</a></li>
                           
                        </ul>
                    </li>
            
                    <li class="treeview-item">
                        <a href="../Login/login.php"  style="color: #DC1E24;"><i  class="menu-icon fa fa-sign-in" style="color: #DC1E24;"></i>Cerrar sesión</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logoB.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars" style="color: #FFFFFF;"></i></a>
                </div>
               
            </div>
           
            <div class="top-right">
                <div class="header-menu">

                <img src="images/LogoUtesaSC.gif" style="height: 50px; width: 50px; ">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="app-header__recinto" style="padding-right: 500px;">
                <p class="jeje" style="color: #FFFFFF;"><b>Sistema de Inscripción Automatizado - UTESA</b></p>
                    </div>

                    <div class="header-left">
 
                        
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin2.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="../Login/login.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>