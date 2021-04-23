<?php

		use Jaxon\Jaxon;
		use Jaxon\Response\Response;

		function rellenar_selects()
		{
				$DB = new dbpdo();

				$respuesta = new Response();

				//SELECT ORDENADORES
				//generamos la consulta
				$sql = "SELECT * FROM ordinador";

				//realizamos la consulta
				$ordenadores = $DB->query($sql);

				//inicializamos options
				$options="<option value='' selected>"._SLCT_ORDENADOR."</option>";

				//guardamos en $options todas las opciones del select
				foreach ($ordenadores as $key => $ordenador)
				{
					$options.="<option value='".$ordenador['ord_id']."'>".$ordenador['ord_nomPC']."</option>";
				}

				//asignamos las opciones al select
        $respuesta->assign('select_ordenador_incidencia', 'innerHTML', $options);

				//SELECT ESTADO INCIDENCIAS
				//generamos la consulta
				$sql = "SELECT * FROM estat_inc";

				//realizamos la consulta
				$incidencias = $DB->query($sql);

				//inicializamos options
				$options="<option value='' selected>"._SLCT_ESTADO_INC."</option>";

				//guardamos en $options todas las opciones del select
				foreach ($incidencias as $key => $incidencia)
				{
					$options.="<option value='".$incidencia['estat_id']."'>".$incidencia['estat']."</option>";
				}

				//asignamos las opciones al select
        $respuesta->assign('select_estado_incidencia', 'innerHTML', $options);

				//SELECT PRIORIDAD
				//generamos la consulta
				$sql = "SELECT * FROM prioritat_inc";

				//realizamos la consulta
				$prioridades = $DB->query($sql);

				//inicializamos options
				$options="<option value='' selected>"._SLCT_PRIORIDAD_INC."</option>";

				//guardamos en $options todas las opciones del select
				foreach ($prioridades as $key => $prioridad)
				{
					$options.="<option value='".$prioridad['prioritat_id']."'>".$prioridad['prioritat']."</option>";
				}

				//asignamos las opciones al select
        $respuesta->assign('select_prioridad_incidencia', 'innerHTML', $options);

				//cerramos la conexion con la bbdd
				$DB->close();

        return $respuesta;
		}

		function guardar_incidencia($ordenador,$prioridad,$resumen,$descripcion)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$error = 0;

			//comprobamos si hay algún campo vacío
			if($ordenador=="")
			{
				$error=6;
			}

			if($prioridad=="")
			{
				$error=8;
			}

			if($resumen=="")
			{
				$error=4;
			}

			if($descripcion=="")
			{
				$error=5;
			}

			//si no hay ningun campo vacío
			if($error==0)
			{
				//obtenemos el id del usuario que ha iniciado sesion
				$usr = $_SESSION['usuario']['usr_id'];

				//obtenemos la fecha actual
				//$fecha = getDate();

				//formatamos la fecha para guardarla en la bbdd
				//$fecha = $fecha['mday']."/".$fecha['mon']."/".$fecha['year']." ".$fecha['hours'].":".$fecha['minutes'].":".$fecha['seconds'];

				$timestamp_actual=time();

				//$fecha=date("d/m/Y H:i:s", time());

				//guardamos la nueva incidencia en la bbdd
				$sql = "INSERT INTO incidencies SET
								inc_idU=$usr,
								inc_idPC=$ordenador,
								inc_idEstat=1,
								inc_idPrioritat=$prioridad,
								inc_resum='".$resumen."',
								inc_descripcio='".$descripcion."',
								inc_timestamp=$timestamp_actual";

				$res = $DB->query($sql);

				if($res==1)
				{
					$respuesta->script("msgBox('"._LBL_GUARDADO."', 'success');window.location.href = '"._PATH_BASE."incidencias'");
				}
				else {
					$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
				}
			}
			else
			{
					//mostramos error si hay algún campo vacío
					switch ($error) {
						case 6:
							$respuesta->script("msgBox('"._LBL_ERROR_6."', 'error');");
							break;
						case 7:
							$respuesta->script("msgBox('"._LBL_ERROR_7."', 'error');");
							break;
						case 8:
							$respuesta->script("msgBox('"._LBL_ERROR_8."', 'error');");
							break;
						case 4:
							$respuesta->script("msgBox('"._LBL_ERROR_9."', 'error');");
							break;
						case 5:
							$respuesta->script("msgBox('"._LBL_ERROR_10."', 'error');");
							break;
					}
			}

			//cerramos la conexion con la bbdd
			$DB->close();

			return $respuesta;
		}


		//asociamos las funciones al objeto jaxon
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'guardar_incidencia');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'rellenar_selects');
?>
