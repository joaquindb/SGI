<?php
    define("_PATH_BASE","../../");
    $menu=3;
    @require_once(_PATH_BASE.'RESOURCES/includes/inicio.html.php');
?>
    <div class='panel panel-default grid'>

      <div class='panel-heading'>
          <i class="fas fa-edit"></i>
          <?php echo _LBL_CAB_EDIT_CLASS?>
          <div class='panel-tools'>
              <div class='btn-group'>

              </div>
          </div>
      </div>

      <div class='panel-form' >
        <div class="formu col-lg-12">
          <div class='form-group col-lg-4'>
              <label class='control-label'><?php echo _LBL_NOM_AULA?></label>
              <input class='form-control' type='text' id="nombre_aula" required>
          </div>
          <div class='form-group col-lg-4'>
              <label class='control-label'><?php echo _LBL_N_FILES?></label>
              <input class='form-control' type='text' id="n_filas_aula" required>
          </div>
          <div class='form-group col-lg-4'>
              <label class='control-label'><?php echo _LBL_N_ORDENADORS?></label>
              <input class='form-control' type='text' id="n_ordenadores_aula" required>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="col-lg-10"></div>
          <div class='form-actions actions col-lg-2'>
              <a class='btn btn-danger' href='../' id="cancelar_nuevo_usuario"><?php echo _LBL_CANCELAR?></a>
              <button class='btn btn-primary' onclick="jaxon_guardar_aula($('#nombre_aula').val(),$('#n_filas_aula').val(),$('#n_ordenadores_aula').val())"><?php echo _LBL_GUARDAR?></button>
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
    jaxon_cargar_formulario();
</script>
