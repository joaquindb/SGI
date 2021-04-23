<?php

    use Jaxon\Jaxon;
    use Jaxon\Response\Response;

    function cargar_formulario()
    {
      $DB = new dbpdo();

      $respuesta = new Response();

      $sql = "SELECT * FROM usr
              WHERE usr_delete = 0 and md5(usr_id)='".$_REQUEST['id']."'";

      $usr = $DB->query($sql);

      $tip = $usr[0]['usr_tipus'];

      //asignamos a los campos del formulario los valores del usuario seleccionado
      $respuesta->assign('nombre','value',$usr[0]['usr_nom']);
      $respuesta->assign('apellido1','value',$usr[0]['usr_cognom1']);
      $respuesta->assign('apellido2','value',$usr[0]['usr_cognom2']);
      $respuesta->assign('email','value',$usr[0]['usr_mail']);

      //seleccionamos los tipos de usuarios
      $sql = "SELECT * FROM tipus_usr";

      $tipo_user = $DB->query($sql);

      $options="";

      //guardamos en $options todas las opciones del select
      foreach ($tipo_user as $key => $tipo)
      {
        $selected="";

        //comprobamos que tipo de usuario es y lo marcamos como selected
        if($tip==$tipo['tip_usr_id'])
        {
          $selected="selected";
        }

        $options.="<option value='".$tipo['tip_usr_id']."' ".$selected.">".$tipo['tipus_usuari']."</option>";
      }

      //asignamos las opciones al select
      $respuesta->assign('select_tipo_usuarios', 'innerHTML', $options);

      $DB->close();

      return $respuesta;
    }


    function guardar_usuario($nombre,$apellido1,$apellido2,$select,$email,$password,$rep_password)
		{
			$DB = new dbpdo();

			$respuesta = new Response();

			$usr_md5 = $_REQUEST['id'];
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

      if(!validarMail($email))
      {
        $error=7;
      }

      if(($password != '' or  $rep_password != '') and ($password!=$rep_password)) //si no son iguales
			{
				$error=6;
			}

			//si no hay ningun campo vacío
			if($error==0)
			{
				//si la contraseña no es null, la actualizamos también
				if($password != '' or  $rep_password != '')
				{
          //update total
					$md5_password = md5($password);

          $sql="UPDATE usr SET
                  usr_tipus=$select,
                  usr_nom='".$nombre."',
                  usr_cognom1='".$apellido1."',
                  usr_cognom2='".$apellido2."',
                  usr_mail='".$email."',
                  usr_password='".$md5_password."'
              WHERE md5(usr_id)='{$usr_md5}'";
          }
          else //si la contraseña es null no la actualizamos
          {
            //update parcial
            $sql="UPDATE usr SET
                    usr_tipus=$select,
                    usr_nom='".$nombre."',
                    usr_cognom1='".$apellido1."',
                    usr_cognom2='".$apellido2."',
                    usr_mail='".$email."'
  							WHERE md5(usr_id)='{$usr_md5}'";
          }

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
						case 6:
							$respuesta->script("msgBox('"._ADV_CONTRASENA_INVALIDA."', 'error');");
							break;
            case 7:
							$respuesta->script("msgBox('"._ADV_EMAIL_NO_VALIDO."', 'error');");
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

      $id = $_REQUEST['id'];

			$sql = "SELECT usr_mail FROM usr WHERE usr_delete=0 and md5(usr_id) != '$id' ";

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

    //asociamos la funcion check_login al objeto jaxon
    $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'cargar_formulario');
    $jaxon->register(Jaxon::CALLABLE_FUNCTION, 'guardar_usuario');

?>
