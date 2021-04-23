<?php

		use Jaxon\Jaxon;
		use Jaxon\Response\Response;

		function mostrar_aulas()
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			formar_cabecera($respuesta);

			$sql = "SELECT * FROM classe
							WHERE class_delete=0
							ORDER BY class_nom ASC";

			$aulas = $DB->query($sql);

			$cuerpo="";

			if(is_array($aulas))
			{
				foreach($aulas as $key => $aula)
				{
					$cuerpo .= formar_cuerpo_aulas($aula);
				}
			}

			$respuesta->assign('tabla_aulas_body','innerHTML',$cuerpo);

			$DB->close();

			return $respuesta;

		}


		function formar_cabecera($respuesta)
		{
			$fila.="<tr>";

				$fila.="<th id='tipus_usr'>"._LBL_NOM_AULA."</th>";

				$fila.="<th id='nom_usr'>"._LBL_N_FILES."</th>";

				$fila.="<th id='cognom1_usr'>"._LBL_N_ORDENADORS."</th>";

				$fila.="<th id='accions'>"._LBL_ACCIONES."</th>";

			$fila.="</tr>";

			$respuesta->assign('tabla_aulas_head', 'innerHTML',$fila);
		}


		function formar_cuerpo_aulas($aula)
		{
			$fila.="<tr>";

				$fila.="<td id='nom_classe'>".$aula['class_nom']."</td>";

				$fila.="<td id='n_files_classe'>".$aula['class_n_files']."</td>";

				$fila.="<td id='n_pcs_classe'>".$aula['class_n_ordinadors']."</td>";

				$fila.="<td class='actions action'><a class='btn btn-info' href='./editarAula?id=".md5($aula['class_id'])."'><i class='fas fa-edit'></i></a><a class='btn btn-danger' onclick='jaxon_confirmar_borrar(\"".md5($aula['class_id'])."\",\"".$aula['class_nom']."\")' style='margin-left:5px;'><i class='fa fa-trash'></i></a></td>";

			$fila.="</tr>";

			return $fila;
		}


		function confirmar_borrar($id,$nombre)
		{
			$respuesta = new Response();

			$respuesta->script("msgConfirm('".$nombre."','"._BOD_USUARIO_BORRAR."',function(){jaxon_borrar_aula('".$id."')})");

			return $respuesta;
		}


		function borrar_aula($id)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$sql="UPDATE classe SET class_delete=1 WHERE md5(class_id)='$id'";

			$res=$DB->query($sql);

			if($res==1)
			{
				$respuesta->script("msgBox('"._LBL_ELIMINADO."', 'success');window.location.href = '../aulas'");
			}
			else
			{
				$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
			}

			$DB->close();

			return $respuesta;
		}


		//asociamos las funciones al objeto jaxon
	  $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'mostrar_aulas');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'confirmar_borrar');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'borrar_aula');


?>
