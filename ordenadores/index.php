
<?php
    $menu=4;
    define("_PATH_BASE","../");
    @require_once(_PATH_BASE.'RESOURCES/includes/inicio.html.php');
?>

  <div class='panel panel-default grid'>
      <div class='panel-heading'>
          <i class="fas fa-desktop"></i>
          <?php echo _LBL_MENU_4?>
          <div class='panel-tools'>
              <div class='btn-group'>
                <a class="btn btn-success btn-sm" data-toggle="tooltip" href="<?php echo _PATH_BASE.'ordenadores/nuevoOrdenador'?>" title="" data-original-title="<?php echo _LBL_NEW_INCIDENCE?>">
                    <i class="fas fa-plus"></i>
                    <?php echo _LBL_CAB_NEW_PC?>
                </a>
              </div>
          </div>
      </div>

      <div class="col-lg-12" id="filtros">
        <div class="col-lg-10"></div>
        <div class="form-group col-lg-2">
          <select class="form-control" id="select_aula">
          </select>
        </div>
      </div>

      <table class='table' id="tabla_ordenadores">
          <thead id="tabla_ordenadores_head">
          </thead>
          <tbody id="tabla_ordenadores_body">
          </tbody>
      </table>

      <div class='panel-footer'>

      </div>

  </div>

  <div id="respuesta"></div>

<?php
    @require_once(_PATH_BASE.'RESOURCES/includes/final.html.php');
?>

<script>
    jaxon_rellenar_select();
    jaxon_mostrar_ordenadores($('#select_aula').val());

    //al cambiar el valor del select, actualizamos la tabla ordenadores
    $( "#select_aula" ).change(function() {
        jaxon_mostrar_ordenadores($('#select_aula').val());
    });
</script>
