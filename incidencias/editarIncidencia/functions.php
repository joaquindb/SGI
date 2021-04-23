<?php

    use Jaxon\Jaxon;
    use Jaxon\Response\Response;

    function cargar_formulario()
    {
      $DB = new dbpdo();

      $respuesta = new Response();

      $sql = "SELECT * FROM incidencies
              WHERE inc_delete = 0 and md5(inc_id)='".$_REQUEST['id']."'";

      $inc = $DB->query($sql);

      //asignamos a los campos del formulario los valores del usuario seleccionado
      $respuesta->assign('resumen_incidencia','value',$inc[0]['inc_resum']);
      $respuesta->assign('descripcion_incidencia','value',$inc[0]['inc_descripcio']);
      //$respuesta->assign('comentarios_incidencia','value',$inc[0]['inc_comentaris']);

      rellenar_selects($respuesta,$inc);

      $DB->close();

      return $respuesta;
    }

    function rellenar_selects($respuesta,$inc)
    {
      $DB = new dbpdo();

      //guardamos los datos de la incidencia seleccionada en las variables
      $id_prior = $inc[0]['inc_idPrioritat'];
      $id_ord = $inc[0]['inc_idPC'];
      $id_estat = $inc[0]['inc_idEstat'];

      //RELLENEM SELECT PRIORITAT
      $sql = "SELECT * FROM prioritat_inc";

      $prioritats = $DB->query($sql);

      $options="";

      //guardamos en $options todas las opciones del select
      foreach ($prioritats as $key => $prioritat)
      {
        $selected="";
        //comprobamos que prioridad tiene y la marcamos como selected
        if($id_prior==$prioritat['prioritat_id'])
        {
          $selected="selected";
        }

        $options.="<option value='".$prioritat['prioritat_id']."' ".$selected.">".$prioritat['prioritat']."</option>";
      }

      //asignamos las opciones al select
      $respuesta->assign('select_prioridad_incidencia', 'innerHTML', $options);

      //RELLENEM SELECT ORDENADORS
      $sql = "SELECT * FROM ordinador";

      $ordinadors = $DB->query($sql);

      $options="";

      //guardamos en $options todas las opciones del select
      foreach ($ordinadors as $key => $ordinador)
      {
        $selected="";
        //comprobamos en que ordenador se ha producido y lo marcamos como selected
        if($id_ord==$ordinador['ord_id'])
        {
          $selected="selected";
        }

        $options.="<option value='".$ordinador['ord_id']."' ".$selected.">".$ordinador['ord_nomPC']."</option>";
      }

      //asignamos las opciones al select
      $respuesta->assign('select_ordenador_incidencia', 'innerHTML', $options);

      //RELLENEM SELECT ESTAT INCIDENCIA
      $sql = "SELECT * FROM estat_inc";

      $estados = $DB->query($sql);

      $options="";

      //guardamos en $options todas las opciones del select
      foreach ($estados as $key => $estado)
      {
        $selected="";
        //comprobamos su estado y lo marcamos como selected
        if($id_estat==$estado['estat_id'])
        {
          $selected="selected";
        }

        $options.="<option value='".$estado['estat_id']."' ".$selected.">".$estado['estat']."</option>";
      }

      //asignamos las opciones al select
      $respuesta->assign('select_estado_incidencia', 'innerHTML', $options);

      //cerramos la conexion con la bbdd
      $DB->close();

      return $respuesta;
    }


    function guardar_incidencia($ordenador,$prioridad,$resumen,$estado,$descripcion)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$inc_md5 = $_REQUEST['id'];
			$error = 0;

			//comprobamos si hay algún campo vacío
			if($resumen=="")
			{
				$error=9;
			}

			if($descripcion=="")
			{
				$error=10;
			}

			//si no hay ningun campo vacío
			if($error==0)
			{
        $sql="UPDATE incidencies SET
                inc_idPC=$ordenador,
                inc_idPrioritat=$prioridad,
                inc_resum='".$resumen."',
                inc_idEstat=$estado,
                inc_descripcio='".$descripcion."'
                WHERE md5(inc_id)='{$inc_md5}'";

				$res = $DB->query($sql);

				if($res==1)
				{
          //si se ha ejecutado la consulta correctamente
					$respuesta->script("msgBox('"._LBL_GUARDADO."', 'success');window.location.href = '../'");
				}
				else {
          //si NO se ha ejecutado la consulta correctamente
					$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
				}
			}
			else
			{
					//mostramos error si hay alguno
					switch ($error) {
						case 9:
							$respuesta->script("msgBox('"._LBL_ERROR_9."', 'error');");
							break;
						case 10:
							$respuesta->script("msgBox('"._LBL_ERROR_10."', 'error');");
							break;
					}
			}

			//cerramos la conexion con la bbdd
			$DB->close();

			return $respuesta;
		}



    //asociamos la funcion check_login al objeto jaxon
    $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'cargar_formulario');
    $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'guardar_incidencia');

?>
