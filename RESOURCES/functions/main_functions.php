<?php

  use Jaxon\Jaxon;
  use Jaxon\Response\Response;

  //COMPROBAMOS LOS PERMISOS
  //si no esta en la pagina de login
  if(!isset($checklogin))
  {
    $checklogin=false;
  }

  //si no esta definida la sesion
  if(!isset($_SESSION['usuario']))
  {
    $_SESSION['usuario']=Array();
  }

  //si esta en login y esta logueado, redirigimos a la pagina principal
  if ($checklogin and (isset($_SESSION['usuario']['login'])))
  {
    header("Location: "._PATH_BASE."incidencias");
    die();
  }
  //si no esta en login y no esta logueado, redirigimos al login
	else if( !$checklogin and (!isset($_SESSION['usuario']['login'])))
	{
    header("Location: "._PATH_BASE."login");
		die();
	}


//FUNCIONES
  function login($mail, $pass)
  {
      //creamos objeto DB
      $DB = new dbpdo();

      //codificamos la contraseña con md5
      $pass = md5($pass);

      //guardamos la consulta
      $sql="SELECT * FROM usr
              INNER JOIN zona_horaria on zho_id=usr_zho
  			      WHERE LOWER(usr_mail)=LOWER('{$mail}') and usr_password='{$pass}' and usr_delete=0";

      //ejecutamos la consulta
      $usr=$DB->query($sql);

      if($usr[0]['usr_id']!="")
    	{
    		$_SESSION['usuario']=$usr[0];
    		$_SESSION['usuario']['login']=true;

    		$return=true;
    	}
    	else
    	{
    		$return=false;
    	}

      $DB->close();

      return $return;
  }

  function logout()
  {
  	$respuesta = new Response();

  	unset($_SESSION['usuario']);

  	$respuesta->redirect('../login');

  	session_destroy();

  	return $respuesta;
  }

  function mostrar_fecha($timestamp)
  {
    return date("d/m/Y H:i:s", $timestamp);
  }


  //asociamos la funcion check_login al objeto jaxon
  $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'logout');

?>
