<?php

		use Jaxon\Jaxon;
		use Jaxon\Response\Response;

		function rellenar_select()
		{
				$DB = new dbpdo();

				$respuesta = new Response();

				$sql = "SELECT * FROM tipus_usr";

				$tipo_user = $DB->query($sql);

				$options="";

				//guardamos en $options todas las opciones del select
				foreach ($tipo_user as $key => $tipo)
				{
					$options.="<option value='".$tipo['tip_usr_id']."'>".$tipo['tipus_usuari']."</option>";
				}

				//asignamos las opciones al select
        $respuesta->assign('select_tipo_usuarios', 'innerHTML', $options);

				//cerramos la conexion con la bbdd
				$DB->close();

        return $respuesta;
		}

		function guardar_usuario($nombre,$apellido1,$apellido2,$select,$email,$password,$rep_password)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$psw_valido=false;
			$mail_valido=false;
			$error = 0;

			//comprobamos si hay algún campo vacío
			if($nombre=="")
			{
				$error=1;
			}

			if($apellido1=="")
			{
				$error=2;
			}

			if($apellido2=="")
			{
				$error=3;
			}

			if($email=="")
			{
				$error=4;
			}

			if($password=="" or $rep_password=="")
			{
				$error=5;
			}

			//si no hay ningun campo vacío
			if($error==0)
			{
				if($password==$rep_password)//si las contraseñas son iguales
				{
					$psw_valido=true;
				}

				$mail_valido = validarMail($email);

				//si el email y la contraseña son válidos
				if($psw_valido and $mail_valido)
				{
					$md5_password = md5($password);

					//guardamos el nuevo usuario en la bbdd
					$sql = "INSERT INTO usr SET
									usr_tipus=$select,
									usr_nom='".$nombre."',
									usr_cognom1='".$apellido1."',
									usr_cognom2='".$apellido2."',
									usr_mail='".$email."',
									usr_password='".$md5_password."'";

					$res = $DB->query($sql);

					if($res==1)
					{
						$respuesta->script("msgBox('"._LBL_GUARDADO."', 'success');window.location.href = '../'");
					}
					else {
						$respuesta->script("msgBox('"._LBL_ERROR_0."', 'error');");
					}
				}
				else
				{
					//mostramos error si la contraseña o el email no son validos
					if(!$psw_valido){
						$respuesta->script("msgBox('"._ADV_CONTRASENA_INCORRECTA."', 'error');");
					}
					if(!$mail_valido){
						$respuesta->script("msgBox('"._ADV_EMAIL_NO_VALIDO."', 'error');");
					}
				}
			}
			else
			{
					//mostramos error si hay algún campo vacío
					switch ($error) {
						case 1:
							$respuesta->script("msgBox('"._LBL_ERROR_1."', 'error');");
							break;
						case 2:
							$respuesta->script("msgBox('"._LBL_ERROR_2."', 'error');");
							break;
						case 3:
							$respuesta->script("msgBox('"._LBL_ERROR_3."', 'error');");
							break;
						case 4:
							$respuesta->script("msgBox('"._LBL_ERROR_4."', 'error');");
							break;
						case 5:
							$respuesta->script("msgBox('"._LBL_ERROR_5."', 'error');");
							break;
					}
			}

			//cerramos la conexion con la bbdd
			$DB->close();

			return $respuesta;
		}

		function validarMail($email)
		{
			$DB = new dbpdo();

			$sql = "SELECT usr_mail FROM usr WHERE usr_delete=0";

			$mail = $DB->query($sql);

			$valid=false;

			if(filter_var($email, FILTER_VALIDATE_EMAIL)) //comprobamos que sea un email valido
			{
				foreach($mail as $key => $usr_email){

					//pasamos a minúsculas los emails para comprobar si son iguales
					$email1 = strtolower($usr_email['usr_mail']);
					$email2 = strtolower($email);

					if($email1==$email2){	//comprobamos que no exista el email en la base de datos
						$valid = false;
						break;
					} else{
						$valid = true;
					}
				}
			}

			if($valid){	//si el email es valido devolvemos true, sino false
				return true;
			} else{
				return false;
			}
		}

		//asociamos las funciones al objeto jaxon
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'guardar_usuario');
		$jaxon->register(Jaxon::CALLABLE_FUNCTION, 'rellenar_select');
?>
