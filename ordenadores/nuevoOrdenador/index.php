<?php
    define("_PATH_BASE","../../");
    $menu=4;
    @require_once(_PATH_BASE.'RESOURCES/includes/inicio.html.php');
?>
    <div class='panel panel-default grid'>

      <div class='panel-heading'>
          <i class="fas fa-plus"></i>
          <?php echo _LBL_CAB_NEW_PC?>
          <div class='panel-tools'>
              <div class='btn-group'>

              </div>
          </div>
      </div>

      <div class='panel-form' >
            <div class="formu col-lg-12">
              <div class="col-lg-3"></div>
              <div class="form-group col-lg-3">
                <label class="control-label"><?php echo _LBL_CLASS?></label>
                  <select class="form-control" id="select_aula">
                  </select>
              </div>
              <div class="form-group col-lg-3">
                <label class="control-label"><?php echo _LBL_NOMBRE_ORDENADOR?></label>
                <input class='form-control' type='text' id="nombre_pc" disabled>
                </select>
              </div>
              <div class="col-lg-3"></div>
            </div>
            <div class="col-lg-12">
              <div class="col-lg-3"></div>
                <div class='form-group col-lg-3'>
                    <label class='control-label'><?php echo _LBL_FILA?></label>
                    <input class='form-control' type='text' id="n_fila_pc" required>
                </div>
                <div class='form-group col-lg-3'>
                    <label class='control-label'><?php echo _LBL_POSICION?></label>
                    <input class='form-control' id="posicion_pc" required>
                </div>
                <div class="col-lg-3"></div>
            </div>

            <div class="col-lg-12">
              <div class="col-lg-10"></div>
              <div class='form-actions actions col-lg-2'>
                  <a class='btn btn-danger' href='../' id="cancelar_nuevo_usuario"><?php echo _LBL_CANCELAR?></a>
                  <button class='btn btn-primary' onclick="jaxon_guardar_ordenador($('#select_aula').val(),$('#nombre_pc').val(),$('#n_fila_pc').val(),$('#posicion_pc').val())"><?php echo _LBL_GUARDAR?></button>
              </div>
            </div>

      </div>
      <div class='panel-body filters'>
          <div class='row'>
              <div class='col-md-9'>

              </div>
              <div class='col-md-3'>

              </div>
          </div>
      </div>
    </div>

    <div id="respuesta"></div>


<?php
    require_once(_PATH_BASE.'RESOURCES/includes/final.html.php');
?>

<script>
    jaxon_rellenar_select();

    //al cambiar el valor del select, actualizamos el nombre del PC
    $( "#select_aula" ).change(function() {
        $('#nombre_pc').val($('#select_aula option:selected').text()+"_"+$('#n_fila_pc').val()+'_'+$('#posicion_pc').val());
    });
    //al cambiar el valor del input, actualizamos el nombre del PC
    $( "#n_fila_pc" ).keyup(function() {
        $('#nombre_pc').val($('#select_aula option:selected').text()+"_"+$('#n_fila_pc').val()+'_'+$('#posicion_pc').val());
    });
    //al cambiar el valor del input, actualizamos el nombre del PC
    $( "#posicion_pc" ).keyup(function() {
        $('#nombre_pc').val($('#select_aula option:selected').text()+"_"+$('#n_fila_pc').val()+'_'+$('#posicion_pc').val());
    });
</script>
