<?php

/*Cargamos e iniciamos el XAJAX*/
	require(_PATH_BASE."RESOURCES/externo/jaxon-core/vendor/autoload.php");

	$jaxon = jaxon();

	// $jaxon->setOption ('core.debug.on', 'true');
	$jaxon->setOption('upload.default.dir',$_SERVER['DOCUMENT_ROOT'].'/upload');
  ?>
