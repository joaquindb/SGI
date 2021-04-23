<?php

	/*Redirigimos al login*/
	if($_SERVER['HTTP_HOST']=='127.0.0.1' or $_SERVER['HTTP_HOST']=='localhost')
	{
		define("_PATH_BASE","/SGI");
	}
	else
	{
		define("_PATH_BASE","");
	}

	//checklogin
	if(!isset($_SESSION['usuario']))
	{
		$_SESSION['usuario']=Array();
		header("Location: "._PATH_BASE."/login");
		die();
	}
	else if(!isset($_SESSION['usuario']['login']))
	{
		header("Location: "._PATH_BASE."/login");
		die();
	}
	else
	{
		header("Location: "._PATH_BASE."/incidencias");//carpeta principal
		die();
	}

?>
