<?php
  #GENERAL
    define("_LBL_TITLE",htmlentities("SGI"));
    define("_LBL_LOGOUT",htmlentities("Salir"));
    define("_LBL_EDITAR_PERFIL",htmlentities("Editar perfil"));

  #LOGIN
  	define("_LBL_LOG_CAPT",htmlentities("INICIAR SESIÓN"));
  	define("_LBL_LOG_USU",htmlentities("Usuario"));
  	define("_LBL_LOG_PASS",htmlentities("Contraseña"));
  	define("_LBL_LOG_VALIDAR",htmlentities("Validar"));

  #ERRORES
    define("_LOG_ERROR_DEFAULT",htmlentities("Fallo de autenticación."));
    define("_LBL_ERROR_0",htmlentities("Ha habido un error en la aplicación, inténtelo más tarde."));
    define("_LBL_ERROR_1",htmlentities("El campo nombre está vacío."));
    define("_LBL_ERROR_2",htmlentities("El campo primer apellido está vacío."));
    define("_LBL_ERROR_3",htmlentities("El campo segundo apellido está vacío."));
    define("_LBL_ERROR_4",htmlentities("El campo email está vacío."));
    define("_LBL_ERROR_5",htmlentities("Debe rellenar los campos contraseña y repetir contraseña."));
    define("_LBL_ERROR_6",htmlentities("Seleccione un ordenador."));
    define("_LBL_ERROR_7",htmlentities("Seleccione un estado para la incidencia."));
    define("_LBL_ERROR_8",htmlentities("Seleccione una prioridad para la incidencia."));
    define("_LBL_ERROR_9",htmlentities("Introduzca un resumen de la incidencia."));
    define("_LBL_ERROR_10",htmlentities("Introduzca una descripción de la incidencia."));
    define("_LBL_ERROR_11",htmlentities("El campo Nombre Aula está vacío."));
    define("_LBL_ERROR_12",htmlentities("El campo Número de Filas está vacío."));
    define("_LBL_ERROR_13",htmlentities("El campo Número de Ordenadores está vacío."));
    define("_LBL_ERROR_14",htmlentities("Este aula ya existe."));
    define("_LBL_ERROR_15",htmlentities("Seleccione un aula."));
    define("_LBL_ERROR_16",htmlentities("El campo fila está vacío."));
    define("_LBL_ERROR_17",htmlentities("El campo posición está vacío."));
    define("_ADV_CONTRASENA_INVALIDA",htmlentities("La contraseña introducida no es válida."));
    define("_ADV_CONTRASENA_INCORRECTA",htmlentities("Las contraseñas introducidas no son iguales."));
    define("_ADV_EMAIL_NO_VALIDO",htmlentities("El email introducido no es válido."));
    define("_ADV_FILA_INVALIDA",htmlentities("La fila introducida no es válida."));
    define("_ADV_AULA_COMPLETA",htmlentities("La clase seleccionada ya está completa."));
    define("_ADV_PC_EXISTENTE",htmlentities("El ordenador introducido ya existe."));

  #MENSAJES
    define("_LBL_GUARDADO",htmlentities("Registro guardado con éxito."));
    define("_LBL_ELIMINADO",htmlentities("Registro eliminado con éxito."));
    define("_BOD_USUARIO_BORRAR",htmlentities("¿Seguro que desea eliminar este usuario?"));
    define("_BOD_ORDENADOR_BORRAR",htmlentities("¿Seguro que desea eliminar este ordenador?"));
    define("_BOD_INCIDENCIA_BORRAR",htmlentities("¿Seguro que desea eliminar esta incidencia?"));
    define("_LBL_USU_PROPIO",htmlentities("No es posible eliminar este usuario."));
    define("_LBL_INC_RESUELTA",htmlentities("Esta incidencia ya está resuelta."));

  #MENÚ
    define("_LBL_MENU_1",htmlentities("Usuarios"));
    define("_LBL_MENU_2",htmlentities("Incidencias"));
    define("_LBL_MENU_3",htmlentities("Aulas"));
    define("_LBL_MENU_4",htmlentities("Ordenadores"));

  #USUARIOS
    define("_LBL_USR_TIPUS",htmlentities("Tipo de usuario"));
    define("_LBL_USR_NOM",htmlentities("Nombre"));
    define("_LBL_USR_COGNOM1",htmlentities("Primer Apellido"));
    define("_LBL_USR_COGNOM2",htmlentities("Segundo Apellido"));
    define("_LBL_USR_EMAIL",htmlentities("Email"));
    define("_LBL_ACCIONES",htmlentities("Acciones"));

  #INCIDENCIAS
    define("_LBL_NOM_PC",htmlentities("Ordenador"));
    define("_LBL_ESTADO_INCIDENCIA",htmlentities("Estado Incidencia"));
    define("_LBL_PRIORIDAD_INCIDENCIA",htmlentities("Prioridad Incidencia"));
    define("_LBL_RESUMEN_INCIDENCIA",htmlentities("Resumen Incidencia"));
    define("_LBL_FECHA",htmlentities("Fecha Creación"));

  #CLASES
    define("_LBL_NOM_AULA",htmlentities("Nombre Aula"));
    define("_LBL_N_FILES",htmlentities("Número de Filas"));
    define("_LBL_N_ORDENADORS",htmlentities("Número de Ordenadores"));

  #ORDENADORES
    define("_LBL_NOMBRE_ORDENADOR",htmlentities("Nombre Ordenador"));
    define("_LBL_FILA",htmlentities("Fila"));
    define("_LBL_POSICION",htmlentities("Posición"));

  #CABECERAS
    define("_LBL_CAB_NEW_USER",htmlentities("Nuevo Usuario"));
    define("_LBL_CAB_EDIT_USER",htmlentities("Editar Usuario"));
    define("_LBL_CAB_EDIT_INCIDENCE",htmlentities("Editar Incidencia"));
    define("_LBL_CAB_NEW_CLASS",htmlentities("Nueva Aula"));
    define("_LBL_CAB_EDIT_CLASS",htmlentities("Editar Aula"));
    define("_LBL_CAB_NEW_PC",htmlentities("Nuevo Ordenador"));
    define("_LBL_CAB_EDIT_PC",htmlentities("Editar Ordenador"));

  #FORMULARIOS
    define("_LBL_NOMBRE",htmlentities("Nombre"));
    define("_LBL_APELLIDO_1",htmlentities("Primer Apellido"));
    define("_LBL_APELLIDO_2",htmlentities("Segundo Apellido"));
    define("_LBL_EMAIL",htmlentities("Email"));
    define("_LBL_TIPO_USER",htmlentities("Tipo de usuario"));
    define("_LBL_PASSWORD",htmlentities("Contraseña"));
    define("_LBL_REPITE_PASSWORD",htmlentities("Repetir Contraseña"));
    define("_LBL_ORDENADOR_INC",htmlentities("Ordenador"));
    define("_LBL_ESTADO_INC",htmlentities("Estado Incidencia"));
    define("_LBL_PRIORIDAD_INC",htmlentities("Prioridad Incidencia"));
    define("_LBL_RESUMEN_INC",htmlentities("Resumen Incidencia"));
    define("_LBL_DESCRIPCION_INC",htmlentities("Descripción Incidencia"));

  #SELECTS
    define("_SLCT_ORDENADOR",htmlentities("- Seleccione un ordenador -"));
    define("_SLCT_ESTADO_INC",htmlentities("- Seleccione un estado -"));
    define("_SLCT_PRIORIDAD_INC",htmlentities("- Seleccione una prioridad -"));
    define("_SLCT_AULA",htmlentities("- Seleccione un aula -"));

  #BOTONES
    define("_LBL_NEW_USER",htmlentities("Nuevo Usuario"));
    define("_LBL_NEW_CLASS",htmlentities("Nueva Aula"));
    define("_LBL_CLASS",htmlentities("Aula"));
    define("_LBL_NEW_INCIDENCE",htmlentities("Nueva Incidencia"));
    define("_LBL_GUARDAR",htmlentities("Guardar"));
    define("_LBL_CANCELAR",htmlentities("Cancelar"));

?>
