
<?php
    $menu=3;
    define("_PATH_BASE","../");
    @require_once(_PATH_BASE.'RESOURCES/includes/inicio.html.php');
?>

  <div class='panel panel-default grid'>

      <div class='panel-heading'>
          <i class="fas fa-chalkboard"></i>
          <?php echo _LBL_MENU_3?>
          <div class='panel-tools'>
              <div class='btn-group'>
                <a class="btn btn-success btn-sm" data-toggle="tooltip" href="<?php echo _PATH_BASE.'aulas/nuevaAula'?>" title="" data-original-title="<?php echo _LBL_NEW_CLASS?>">
                    <i class="fas fa-plus"></i>
                    <?php echo _LBL_NEW_CLASS?>
                </a>
              </div>
          </div>
      </div>

      <table class='table' id="tabla_aulas">
          <thead id="tabla_aulas_head">
          </thead>
          <tbody id="tabla_aulas_body">
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
    jaxon_mostrar_aulas();
</script>
