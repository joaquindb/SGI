<?php
    define("_PATH_BASE","../../");
    $menu=1;
    @require_once(_PATH_BASE.'RESOURCES/includes/inicio.html.php');
?>
    <div class='panel panel-default grid'>

      <div class='panel-heading'>
          <i class="fas fa-user-edit"></i>
          <?php echo _LBL_CAB_EDIT_USER?>
          <div class='panel-tools'>
              <div class='btn-group'>

              </div>
          </div>
      </div>

      <div class='panel-form' >
            <div class="formu col-lg-12">
                <div class='form-group col-lg-4'>
                    <label class='control-label'><?php echo _LBL_NOMBRE?></label>
                    <input class='form-control' type='text' id="nombre" required>
                </div>
                <div class='form-group col-lg-4'>
                    <label class='control-label'><?php echo _LBL_APELLIDO_1?></label>
                    <input class='form-control' type='text' id="apellido1" required>
                </div>
                <div class='form-group col-lg-4'>
                    <label class='control-label'><?php echo _LBL_APELLIDO_2?></label>
                    <input class='form-control' type='text' id="apellido2" required>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group col-lg-6">
                  <label class="control-label"><?php echo _LBL_TIPO_USER?></label>
                  <select class="form-control" id="select_tipo_usuarios">
                  </select>
                </div>
                <div class='form-group col-lg-6'>
                    <label class='control-label'><?php echo _LBL_EMAIL?></label>
                    <input class='form-control' type='text' id="email" required>
                </div>
            </div>

            <div class="col-lg-12">
                <div class='form-group col-lg-6'>
                    <label class='control-label'><?php echo _LBL_PASSWORD?></label>
                    <input class='form-control' type='password' id="pswd" required>
                </div>
                <div class='form-group col-lg-6'>
                    <label class='control-label'><?php echo _LBL_REPITE_PASSWORD?></label>
                    <input class='form-control' type='password' id="rep_pswd" required>
                </div>
            </div>

            <div class="col-lg-12">
              <div class="col-lg-10"></div>
              <div class='form-actions actions col-lg-2'>
                  <a class='btn btn-danger' href='../' id="cancelar_nuevo_usuario"><?php echo _LBL_CANCELAR?></a>
                  <button class='btn btn-primary' onclick="jaxon_guardar_usuario($('#nombre').val(),$('#apellido1').val(),$('#apellido2').val(),$('#select_tipo_usuarios').val(),$('#email').val(),$('#pswd').val(),$('#rep_pswd').val())"><?php echo _LBL_GUARDAR?></button>
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
