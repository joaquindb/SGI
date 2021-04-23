<?php

  /*Si no esta defindo la ruta base montamos una por defecto*/
  if(!defined('_PATH_BASE'))
  {
      define("_PATH_BASE","../../");
  }

   /*Si no esta defindo la ruta base del archivo de funciones propio montamos una por defecto la misma ruta del documento ejecutado*/
  if(!defined('_PATH_FUNCIONES'))
  {
      define("_PATH_FUNCIONES","");
  }

  /*Cargamos el inicio y las funciones propias*/
  @require_once(_PATH_BASE.'RESOURCES/includes/inicio.php');

  @require_once(_PATH_FUNCIONES.'functions.php');

  if ($jaxon->canProcessRequest())
  {
    $jaxon->processRequest();
  }
?>

<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <!--Cargamos el meta-->
    <?php @require_once(_PATH_BASE.'RESOURCES/includes/meta.php');?>

    <!--Cargamos el titulo-->
    <title><?php echo _LBL_TITLE?></title>
    <link rel="shortcut icon" href="<?php echo _PATH_BASE."RESOURCES/images/computer_wrench.ico"?>" type="image/x-icon">

    <!--Cargamos los links del head-->
    <?php @require_once(_PATH_BASE.'RESOURCES/includes/head.inc.php');?>

  </head>

  <?php
  if($checklogin)
  { ?>
      <body class='login'>
          <div class='wrapper'>
              <div class='row'>
                  <div class='col-lg-12'>
                      <div class='brand text-center'>
                          <h1>
                              <div class='logo-icon'>
                                  <i class="fa fa-desktop" style="color: #1abc9c;"></i>
                              </div>
                              <?php echo _LBL_TITLE?>
                          </h1>
                      </div>
                  </div>
              </div>
              <div class='row'>
  <?php }
  else { ?>

    <body class='main page'>
      <!-- Navbar -->
      <div class='navbar navbar-default' id='navbar'>
        <a class='navbar-brand' href='#'>
          <i class="fa fa-desktop"></i>
          <?php echo _LBL_TITLE?>
        </a>
        <ul class='nav navbar-nav pull-right'>
          <li class='dropdown user'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <i class='icon-user'></i>
              <strong><?php echo $_SESSION['usuario']['usr_nom']?></strong>
              <b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
              <li>
                <?php $id_md5 = md5($_SESSION['usuario']['usr_id']) ?>
                <a href='<?php echo _PATH_BASE."usuarios/editar/?id=".$id_md5?>'><?php echo _LBL_EDITAR_PERFIL?></a>
              </li>
              <li class='divider'></li>
              <li>
                <a onclick="jaxon_logout();"><?php echo _LBL_LOGOUT?></a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <div id='wrapper'>

        <!-- Sidebar -->
        <section id='sidebar'>
            <i class='icon-align-justify icon-large' id='toggle'></i>
            <ul id='dock'>
                <?php @include_once(_PATH_BASE.'RESOURCES/includes/menu.php');?>
            </ul>
        </section>

        <!-- Tools -->
        <section id='tools'>
          <ul class='breadcrumb' id='breadcrumb'>
            <li class='title'>Dashboard</li>
            <li><a href="#">Lorem</a></li>
            <li class='active'><a href="#">ipsum</a></li>
          </ul>
        </section>
        <!-- Content -->
        <div id='content'>

  <?php } ?>
