<?php

		use Jaxon\Jaxon;
		use Jaxon\Response\Response;

		function rellenar_select()
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			//seleccionamos todas las aulas existentes
			$sql = "SELECT * FROM classe
								WHERE class_delete=0
								ORDER BY class_nom ASC";

      $clases = $DB->query($sql);

			//inicializamos el options con el valor por defecto
      $options="<option value='' selected>"._SLCT_AULA."</option>";

			foreach ($clases as $key => $clase)
      {
        $options.="<option value='".$clase['class_id']."'>".$clase['class_nom']."</option>";
      }

			//asignamos las opciones al select
      $respuesta->assign('select_aula', 'innerHTML', $options);

			$DB->close();

			return $respuesta;
		}

		function guardar_ordenador($aula,$nombre_pc,$fila,$posicion)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$error = 0;

			$var = is_null($aula);

			print_r($var);

			//comprobamos si hay algún campo vacío
			if($aula==undefined)
			{
				$error=15;
			}

			if($fila=="")
			{
				$error=16;
			}

			if($posicion=="")
			{
				$error=17;
			}

			//comprobamos que no esté llena la clase
			$sql = "SELECT count(*) as valor FROM ordinador
								WHERE ord_idC = $aula
								AND ord_delete = 0";

			//guardamos el número de ordenadores que hay en la clase
			$n_ordenadores = $DB->query($sql);

			$sql = "SELECT class_n_files,class_n_ordinadors FROM classe
								WHERE class_id = $aula
								AND class_delete = 0";

			//guardamos la cantidad de ordenadores que puede tener la clase y el numero de filas que tiene
			$datos_aula = $DB->query($sql);

			//si el numero de ordenadores creados es igual al numero de ordenadores que puede tener el aula
			if($n_ordenadores[0]['valor'] == $datos_aula[0]['class_n_ordinadors'])
			{
				$error = 18;	//esta clase ya está completa
			}

			//si la fila es menor que 1 o mayor que el numero de filas que tiene la clase
			if($fila < 1 or $fila > $datos_aula[0]['class_n_files'])
			{
				$error = 19;	//la fila introducida no es valida
			}

			//comprobamos que el ordenador no exista ya
			$sql = "SELECT ord_nomPC
								FROM ordinador
								WHERE ord_delete = 0";

			$nom_pc = $DB->query($sql);

			foreach($nom_pc as $key => $nom)
			{
				if($nombre_pc == $nom['ord_nomPC'])
				{
					$error = 20;	//este ordenador ya existe
				}
			}


			//si no hay ningun error
			if($error==0)
			{
				//guardamos la nueva incidencia en la bbdd
				$sql = "INSERT INTO ordinador SET
								ord_idC=$aula,
								ord_posicio=$posicion,
								ord_fila=$fila,
								ord_nomPC='".$nombre_pc."'";

				$res = $DB->query($sql);

				if($res==1)
				{
					$respuesta->script("msgBox('"._LBL_GUARDADO."', 'success');window.location.href = '"._PATH_BASE."ordenadores'");
				}
				else {
					$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
				}
			}
			else
			{
					//mostramos error si lo hay
					switch ($error) {
						case 15:
							$respuesta->script("msgBox('"._LBL_ERROR_15."', 'error');");
							break;
						case 16:
							$respuesta->script("msgBox('"._LBL_ERROR_16."', 'error');");
							break;
						case 17:
							$respuesta->script("msgBox('"._LBL_ERROR_17."', 'error');");
							break;
						case 18:
							$respuesta->script("msgBox('"._ADV_AULA_COMPLETA."', 'error');");
							break;
						case 19:
							$respuesta->script("msgBox('"._ADV_FILA_INVALIDA."', 'error');");
							break;
						case 20:
							$respuesta->script("msgBox('"._ADV_PC_EXISTENTE."', 'error');");
							break;
					}
			}

			//cerramos la conexion con la bbdd
			$DB->close();

			return $respuesta;
		}


		//asociamos las funciones al objeto jaxon
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'guardar_ordenador');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'rellenar_select');
?>
