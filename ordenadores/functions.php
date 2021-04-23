<?php

		use Jaxon\Jaxon;
		use Jaxon\Response\Response;

		function mostrar_ordenadores($aula)
		{

			$DB = new dbpdo();

			$respuesta = new Response();

			formar_cabecera($respuesta);

			if($aula == '')
			{
				//si no hay aula seleccionada mostramos todos los pc
				$sql = "SELECT * FROM ordinador
									JOIN classe ON ordinador.ord_idC = classe.class_id
									WHERE ord_delete = 0
									ORDER BY class_nom ASC";
			}
			else
			{
				//si hay aula seleccionada, mostramos los pc de ese aula
				$sql = "SELECT * FROM ordinador
									JOIN classe ON ordinador.ord_idC = classe.class_id
									WHERE ord_delete = 0
									AND ord_idC = $aula
									ORDER BY class_nom ASC";
			}

			$ordenadores = $DB->query($sql);

			$cuerpo="";

			if(is_array($ordenadores))
			{
				foreach($ordenadores as $key => $ordenador)
				{
					$cuerpo .= formar_cuerpo_ordenadores($ordenador);
				}
			}

			$respuesta->assign('tabla_ordenadores_body','innerHTML',$cuerpo);

			$DB->close();

			return $respuesta;

		}

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


		function formar_cabecera($respuesta)
		{
			$fila.="<tr>";

				$fila.="<th id='nom_usr'>"._LBL_CLASS."</th>";

				$fila.="<th id='tipus_usr'>"._LBL_NOM_PC."</th>";

				$fila.="<th id='cognom1_usr'>"._LBL_FILA."</th>";

				$fila.="<th id='cognom2_usr'>"._LBL_POSICION."</th>";

				$fila.="<th id='accions'>"._LBL_ACCIONES."</th>";

			$fila.="</tr>";

			$respuesta->assign('tabla_ordenadores_head', 'innerHTML',$fila);
		}


		function formar_cuerpo_ordenadores($ordenador)
		{
			$fila.="<tr>";

				$fila.="<td id='tipus_usuari'>".$ordenador['class_nom']."</td>";

				$fila.="<td id='nom_usuari'>".$ordenador['ord_nomPC']."</td>";

				$fila.="<td id='cognom1_usuari'>".$ordenador['ord_fila']."</td>";

				$fila.="<td id='cognom2_usuari'>".$ordenador['ord_posicio']."</td>";

				$fila.="<td class='actions action'><a class='btn btn-info' href='./detallesOrdenador?id=".md5($ordenador['inc_id'])."'><i class='fas fa-search-plus'></i></a><a class='btn btn-info' href='./editarOrdenador?id=".md5($ordenador['inc_id'])."' style='margin-left:5px;'><i class='fas fa-edit'></i></a><a class='btn btn-danger' onclick='jaxon_confirmar_borrar(\"".md5($ordenador['ord_id'])."\",\"".$ordenador['ord_nomPC']."\")' style='margin-left:5px;'><i class='fa fa-trash'></i></a></td>";

			$fila.="</tr>";

			return $fila;
		}

		function confirmar_borrar($id,$nombre)
		{
			$respuesta = new Response();

			$respuesta->script("msgConfirm('".$nombre."','"._BOD_ORDENADOR_BORRAR."',function(){jaxon_borrar_ordenador('".$id."')})");

			return $respuesta;
		}


		function borrar_ordenador($id)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$sql="UPDATE ordinador SET ord_delete=1 WHERE md5(ord_id)='$id'";

			$res=$DB->query($sql);

			if($res==1)
			{
				$respuesta->script("msgBox('"._LBL_ELIMINADO."', 'success');window.location.href = '../ordenadores'");
			}
			else
			{
				$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
			}

			$DB->close();

			return $respuesta;
		}

		//asociamos las funciones al objeto jaxon
	  $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'mostrar_ordenadores');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'rellenar_select');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'confirmar_borrar');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'borrar_ordenador');

?>
