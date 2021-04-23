<?php

		use Jaxon\Jaxon;
		use Jaxon\Response\Response;

		function mostrar_usuarios()
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			formar_cabecera($respuesta);

			$sql = "SELECT * FROM usr
							INNER JOIN tipus_usr
							ON usr_tipus = tip_usr_id
							WHERE usr_delete=0";

			$usuarios = $DB->query($sql);

			$cuerpo="";

			if(is_array($usuarios))
			{
				foreach($usuarios as $key => $usuario)
				{
					$cuerpo .= formar_cuerpo_usuarios($usuario);
				}
			}

			$respuesta->assign('tabla_usuarios_body','innerHTML',$cuerpo);

			$DB->close();

			return $respuesta;

		}


		function formar_cabecera($respuesta)
		{
			$fila.="<tr>";

				$fila.="<th id='tipus_usr'>"._LBL_USR_TIPUS."</th>";

				$fila.="<th id='nom_usr'>"._LBL_USR_NOM."</th>";

				$fila.="<th id='cognom1_usr'>"._LBL_USR_COGNOM1."</th>";

				$fila.="<th id='cognom2_usr'>"._LBL_USR_COGNOM2."</th>";

				$fila.="<th id='email_usr'>"._LBL_USR_EMAIL."</th>";

				$fila.="<th id='accions'>"._LBL_ACCIONES."</th>";

			$fila.="</tr>";

			$respuesta->assign('tabla_usuarios_head', 'innerHTML',$fila);
		}


		function formar_cuerpo_usuarios($usuario)
		{
			$fila.="<tr>";

				$fila.="<td id='tipus_usuari'>".$usuario['tipus_usuari']."</td>";

				$fila.="<td id='nom_usuari'>".$usuario['usr_nom']."</td>";

				$fila.="<td id='cognom1_usuari'>".$usuario['usr_cognom1']."</td>";

				$fila.="<td id='cognom2_usuari'>".$usuario['usr_cognom2']."</td>";

				$fila.="<td id='email_usuari'>".$usuario['usr_mail']."</td>";

				$fila.="<td class='actions action'><a class='btn btn-info' href='./editar?id=".md5($usuario['usr_id'])."'><i class='fas fa-edit'></i></a><a class='btn btn-danger' onclick='jaxon_confirmar_borrar(\"".md5($usuario['usr_id'])."\",\"".$usuario['usr_nom']."\")' style='margin-left:5px;'><i class='fa fa-trash'></i></a></td>";

			$fila.="</tr>";

			return $fila;
		}


		function confirmar_borrar($id,$nombre)
		{
			$respuesta = new Response();

			$respuesta->script("msgConfirm('".$nombre."','"._BOD_USUARIO_BORRAR."',function(){jaxon_borrar_usuario('".$id."')})");

			return $respuesta;
		}


		function borrar_usuario($id)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			if($id != md5($_SESSION['usuario']['usr_id'])) //comprobamos que el usuario no borre su propio usuario
			{
				$sql="UPDATE usr SET usr_delete=1 WHERE md5(usr_id)='$id'";

				$res=$DB->query($sql);

				if($res==1)
				{
					$respuesta->script("msgBox('"._LBL_ELIMINADO."', 'success');window.location.href = '../usuarios'");
				}
				else
				{
					$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
				}
			}
			else {
				$respuesta->script("msgBox('"._LBL_USU_PROPIO."', 'error');");
			}

			$DB->close();

			return $respuesta;
		}


		//asociamos las funciones al objeto jaxon
	  $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'mostrar_usuarios');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'confirmar_borrar');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'borrar_usuario');


?>
