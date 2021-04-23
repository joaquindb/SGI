<?php

  use Jaxon\Jaxon;
  use Jaxon\Response\Response;
  //$jaxon->setOption('upload.default.dir',$_SERVER['DOCUMENT_ROOT'].'/upload');

  function check_login($mail,$pass) {

    $respuesta = new Response();

    if(login($mail, $pass))
  	{
      //redirigimos a la página de inicio
      $respuesta->redirect('../incidencias');
  	}
  	else
  	{
      //muestra mensaje de error si el usuario o la contraseña son incorrectos
  		$respuesta->script("msgBox('"._LOG_ERROR_DEFAULT."', 'error');");
  	}

    return $respuesta;
  }

  //asociamos la funcion check_login al objeto jaxon
  $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'check_login');

?>
