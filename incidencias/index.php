
<?php
    $menu=2;
    define("_PATH_BASE","../");
    @require_once(_PATH_BASE.'RESOURCES/includes/inicio.html.php');
?>

  <div class='panel panel-default grid'>

      <div class='panel-heading'>
          <i class="fas fa-exclamation-triangle"></i>
          <?php echo _LBL_MENU_2?>
          <div class='panel-tools'>
              <div class='btn-group'>
                <a class="btn btn-success btn-sm" data-toggle="tooltip" href="<?php echo _PATH_BASE.'incidencias/nuevaIncidencia'?>" title="" data-original-title="<?php echo _LBL_NEW_INCIDENCE?>">
                    <i class="fas fa-plus"></i>
                    <?php echo _LBL_NEW_INCIDENCE?>
                </a>
              </div>
          </div>
      </div>

      <table class='table' id="tabla_usuarios">
          <thead id="tabla_incidencias_head">
          </thead>
          <tbody id="tabla_incidencias_body">
          </tbody>
      </table>

      <div class='panel-footer'>
          <!--<div class="col-lg-9"></div>-->
          <!--<div class="col-lg-3"></div>-->

      </div>

  </div>

  <div id="respuesta"></div>

<?php
    @require_once(_PATH_BASE.'RESOURCES/includes/final.html.php');
?>

<script>
    jaxon_mostrar_incidencias();
</script>
