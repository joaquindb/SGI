<?php
    define("_PATH_BASE","../../");
    $menu=2;
    @require_once(_PATH_BASE.'RESOURCES/includes/inicio.html.php');
?>
    <div class='panel panel-default grid'>

      <div class='panel-heading'>
          <i class="fas fa-plus"></i>
          <?php echo _LBL_NEW_INCIDENCE?>
          <div class='panel-tools'>
              <div class='btn-group'>

              </div>
          </div>
      </div>

      <div class='panel-form' >
            <div class="formu col-lg-12">
              <div class="col-lg-3"></div>
              <div class="form-group col-lg-3">
                <label class="control-label"><?php echo _LBL_ORDENADOR_INC?></label>
                <select class="form-control" id="select_ordenador_incidencia">
                </select>
              </div>
              <div class="form-group col-lg-3">
                <label class="control-label"><?php echo _LBL_PRIORIDAD_INC?></label>
                <select class="form-control" id="select_prioridad_incidencia">
                </select>
              </div>
              <div class="col-lg-3"></div>
            <div class="col-lg-12">
              <div class="col-lg-3"></div>
                <div class='form-group col-lg-6'>
                    <label class='control-label'><?php echo _LBL_RESUMEN_INC?></label>
                    <input class='form-control' type='text' id="resumen_incidencia" required>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <div class="col-lg-12">
              <div class="col-lg-3"></div>
                <div class='form-group col-lg-6'>
                    <label class='control-label'><?php echo _LBL_DESCRIPCION_INC?></label>
                    <textarea class='form-control' id="descripcion_incidencia" required></textarea>
                </div>
              <div class="col-lg-3"></div>
            </div>

            <div class="col-lg-12">

            </div>

            <div class="col-lg-12">
              <div class="col-lg-10"></div>
              <div class='form-actions actions col-lg-2'>
                  <a class='btn btn-danger' href='../' id="cancelar_nuevo_usuario"><?php echo _LBL_CANCELAR?></a>
                  <button class='btn btn-primary' onclick="jaxon_guardar_incidencia($('#select_ordenador_incidencia').val(),$('#select_prioridad_incidencia').val(),$('#resumen_incidencia').val(),$('#descripcion_incidencia').val())"><?php echo _LBL_GUARDAR?></button>
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
    jaxon_rellenar_selects();
</script>
