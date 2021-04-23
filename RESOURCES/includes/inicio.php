<?php
  /*Iniciamos session, cargamos el idioma, los includes y las funciones propias.*/
  session_start();

  @require_once(_PATH_BASE.'RESOURCES/lang/es.php');
  @require_once(_PATH_BASE.'RESOURCES/includes/jaxon_start.php');
  @require_once(_PATH_BASE.'RESOURCES/conf/db.conf.php');
  @require_once(_PATH_BASE.'RESOURCES/functions/db.php');
  @require_once(_PATH_BASE.'RESOURCES/functions/main_functions.php');

  //guardamos la zona horaria del usuario
  date_default_timezone_set($_SESSION['usuario']['zho_nombre']);

?>
