<?php

		use Jaxon\Jaxon;
		use Jaxon\Response\Response;

		function mostrar_incidencias()
		{

			$DB = new dbpdo();

			$respuesta = new Response();

			formar_cabecera($respuesta);

			$sql = "SELECT * FROM incidencies
							JOIN ordinador ON incidencies.inc_idPC = ordinador.ord_id
							JOIN estat_inc ON incidencies.inc_idEstat = estat_inc.estat_id
							JOIN prioritat_inc ON incidencies.inc_idPrioritat = prioritat_inc.prioritat_id
							WHERE inc_delete = 0
							ORDER BY inc_timestamp DESC";

			$incidencias = $DB->query($sql);

			$cuerpo="";

			if(is_array($incidencias))
			{
				foreach($incidencias as $key => $incidencia)
				{
					$cuerpo .= formar_cuerpo_incidencias($incidencia);
				}
			}

			$respuesta->assign('tabla_incidencias_body','innerHTML',$cuerpo);

			$DB->close();

			return $respuesta;

		}


		function formar_cabecera($respuesta)
		{
			$fila.="<tr>";

				$fila.="<th id='tipus_usr'>"._LBL_NOM_PC."</th>";

				$fila.="<th id='nom_usr'>"._LBL_ESTADO_INCIDENCIA."</th>";

				$fila.="<th id='cognom1_usr'>"._LBL_PRIORIDAD_INCIDENCIA."</th>";

				$fila.="<th id='cognom2_usr'>"._LBL_RESUMEN_INCIDENCIA."</th>";

				$fila.="<th id='fecha'>"._LBL_FECHA."</th>";

				$fila.="<th id='accions'>"._LBL_ACCIONES."</th>";

			$fila.="</tr>";

			$respuesta->assign('tabla_incidencias_head', 'innerHTML',$fila);
		}


		function formar_cuerpo_incidencias($incidencia)
		{
			$fila.="<tr>";

				$fila.="<td id='tipus_usuari'>".$incidencia['ord_nomPC']."</td>";

				$fila.="<td id='nom_usuari'>".$incidencia['estat']."</td>";

				$fila.="<td id='cognom1_usuari'>".$incidencia['prioritat']."</td>";

				$fila.="<td id='cognom2_usuari'>".$incidencia['inc_resum']."</td>";

				$fila.="<td id='fecha'>".mostrar_fecha($incidencia['inc_timestamp'])."</td>";

				//si el usuario no es tecnico o admin, no podrá resolver las incidencias
				if($_SESSION['usuario']['usr_tipus'] == 2)
				{
					//si el usuario ha creado la incidencia, podrá borrarla y editarla
					if($_SESSION['usuario']['usr_id']==$incidencia['inc_idU'])
					{
						$fila.="<td class='actions action'><a class='btn btn-info' href='./editarIncidencia?id=".md5($incidencia['inc_id'])."'><i class='fas fa-edit'></i></a><a class='btn btn-danger' onclick='jaxon_confirmar_borrar(\"".md5($incidencia['inc_id'])."\",\"".$incidencia['inc_resum']."\")' style='margin-left:5px;'><i class='fa fa-trash'></i></a></td>";
					}
					//si el usuario no la ha creado no podrá hacer nada
					else {
						$fila.="<td class='actions action'></td>";
					}
				}
				else  //si es técnico o admin, podrá resolver, editar y eliminar todas las incidencias
 				{
						$fila.="<td class='actions action'><a class='btn btn-success' style='margin-right:5px;' onclick='jaxon_resolver_incidencia(".$incidencia['inc_id'].",".$incidencia['inc_idEstat'].")'><i class='fas fa-check'></i></a><a class='btn btn-info' href='./editarIncidencia?id=".md5($incidencia['inc_id'])."'><i class='fas fa-edit'></i></a><a class='btn btn-danger' onclick='jaxon_confirmar_borrar(\"".md5($incidencia['inc_id'])."\",\"".$incidencia['inc_resum']."\")' style='margin-left:5px;'><i class='fa fa-trash'></i></a></td>";
				}
			$fila.="</tr>";

			return $fila;
		}


		function confirmar_borrar($id,$nombre)
		{
			$respuesta = new Response();

			$respuesta->script("msgConfirm('".$nombre."','"._BOD_INCIDENCIA_BORRAR."',function(){jaxon_borrar_incidencia('".$id."')})");

			return $respuesta;
		}


		function borrar_incidencia($id)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$sql="UPDATE incidencies SET inc_delete=1 WHERE md5(inc_id)='$id'";

			$res=$DB->query($sql);

			if($res==1)
			{
				$respuesta->script("msgBox('"._LBL_ELIMINADO."', 'success');window.location.href = '../incidencias'");
			}
			else
			{
				$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
			}

			$DB->close();

			return $respuesta;
		}

		function resolver_incidencia($id_inc,$id_estat_inc)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			if($id_estat_inc == 1) //si la incidencia no esta resuelta
			{
				anadir_comentarios($respuesta);

				$sql="UPDATE incidencies
							SET inc_idEstat=0
							WHERE inc_id = $id_inc";

				$res = $DB->query($sql);

				if($res==1)
				{
					$respuesta->script("msgBox('"._LBL_GUARDADO."', 'success');window.location.href = '../incidencias'");
				}
				else
				{
					$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
				}
			}
			else { //si ya está resuelta la incidencia
				$respuesta->script("msgBox('"._LBL_INC_RESUELTA."', 'info');");
			}


			$DB->close();

			return $respuesta;
		}

		function anadir_comentarios($respuesta)
		{

		}


		//asociamos las funciones al objeto jaxon
	  $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'mostrar_incidencias');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'confirmar_borrar');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'borrar_incidencia');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'resolver_incidencia');


?>
