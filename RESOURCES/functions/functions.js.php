<script>

  function msgBox(texto, tipo, duracion)
  {
    if(duracion === undefined)
    {
      duracion=6000;
    }

    switch(tipo)
    {
        case 'success':
            tipo='success';
            break;
        case 'info':case 'texto':
            tipo='info';
            break;
        case 'warning':case 'alert':case 'alerta':
            tipo='warning';
            break;
        case 'danger':case 'error':case 'fail':
            tipo='danger';
            break;
        default:
            tipo='info ';
    }

      $.notify(
        {
          message: texto
        },{
            type: tipo,
            timer: duracion,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
  }


  function msgConfirm(titulo,texto,function_acept,function_decline,bt_confirm,bt_cancel)
	{
		if(function_acept===undefined)
		{
			function_acept=function() {};
		}
		if(function_decline===undefined)
		{
			function_decline=function() {};
		}

		$.confirm({
		    title: titulo,
		    content: texto,
        theme: 'supervan',
		    icon: 'fa fa-question-circle',
		    animation: 'scale',
		    closeAnimation: 'rotateXR',
		    opacity: 0.5,
		    buttons: {
		      Confirmar: function()
		      {
		        function_acept();
		      },
		      Cancelar: function()
		      {
		        function_decline();
		      }
		    }
		  });
	}

</script>
