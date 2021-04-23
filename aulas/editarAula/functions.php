<?php

    use Jaxon\Jaxon;
    use Jaxon\Response\Response;

    function cargar_formulario()
    {
      $DB = new dbpdo();

      $respuesta = new Response();

      $sql = "SELECT * FROM classe
              WHERE class_delete = 0 and md5(class_id)='".$_REQUEST['id']."'";

      $aula = $DB->query($sql);

      //asignamos a los campos del formulario los valores del usuario seleccionado
      $respuesta->assign('nombre_aula','value',$aula[0]['class_nom']);
      $respuesta->assign('n_filas_aula','value',$aula[0]['class_n_files']);
      $respuesta->assign('n_ordenadores_aula','value',$aula[0]['class_n_ordinadors']);

      $DB->close();

      return $respuesta;
    }


    function guardar_aula($nombre,$n_filas,$n_ordenadores)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$nombre = strtoupper($nombre);
			$error = 0;

			//comprobamos si hay algún campo vacío
			if($nombre=="")
			{
				$error=11;
			}

			if($n_filas=="")
			{
				$error=12;
			}

			if($n_ordenadores=="")
			{
				$error=13;
			}

			//obtenemos todos los nombres de las aulas
			$sql = "SELECT class_nom
								FROM classe
								WHERE class_delete = 0
                AND md5(class_id) != '".$_REQUEST['id']."'";

			$clases = $DB->query($sql);

			//comprobamos que no exista ya el aula
			foreach($clases as $key => $clase)
			{
				if($clase['class_nom'] == $nombre )
				{
					$error = 14;
				}
			}

			//si no hay ningun campo vacío
			if($error==0)
			{
				//guardamos la nueva incidencia en la bbdd
				$sql = "UPDATE classe SET
                      class_nom = '".$nombre."',
                      class_n_files = $n_filas,
                      class_n_ordinadors = $n_ordenadores
                  WHERE md5(class_id) = '".$_REQUEST['id']."'";

				$res = $DB->query($sql);

				if($res==1)
				{
					$respuesta->script("msgBox('"._LBL_GUARDADO."', 'success');window.location.href = '"._PATH_BASE."aulas'");
				}
				else {
					$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
				}
			}
			else
			{
					//mostramos error si hay algún campo vacío
					switch ($error) {
						case 11:
							$respuesta->script("msgBox('"._LBL_ERROR_11."', 'error');");
							break;
						case 12:
							$respuesta->script("msgBox('"._LBL_ERROR_12."', 'error');");
							break;
						case 13:
							$respuesta->script("msgBox('"._LBL_ERROR_13."', 'error');");
							break;
						case 14:
							$respuesta->script("msgBox('"._LBL_ERROR_14."', 'error');");
							break;
					}
			}

			//cerramos la conexion con la bbdd
			$DB->close();

			return $respuesta;
		}


    //asociamos la funcion check_login al objeto jaxon
    $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'cargar_formulario');
    $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'guardar_aula');

?>
