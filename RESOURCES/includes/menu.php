
<!--Definimos el menú-->

      <!--INCIDENCIAS-->
      <li class='launcher <?php if($menu==2){ ?> active <?php } ?> '>
          <i class="fas fa-exclamation-triangle"></i>
          <a href="<?php echo _PATH_BASE."incidencias" ?> "><?php echo _LBL_MENU_2 ?> </a>
      </li>

      <!--AULAS-->
      <?php if($_SESSION['usuario']['usr_tipus']==0){ ?>
        <li class='launcher <?php if($menu==3){ ?> active <?php } ?> '>
            <i class="fas fa-chalkboard"></i>
            <a href="<?php echo _PATH_BASE."aulas" ?> "><?php echo _LBL_MENU_3 ?> </a>
        </li>
      <?php } ?>

      <!--ORDENADORES-->
      <?php if($_SESSION['usuario']['usr_tipus']!=2){ ?>
        <li class='launcher <?php if($menu==4){ ?> active <?php } ?> '>
            <i class="fas fa-desktop"></i>
            <a href="<?php echo _PATH_BASE."ordenadores" ?> "><?php echo _LBL_MENU_4 ?> </a>
        </li>
      <?php } ?>

      <!--USUARIOS-->
      <?php if($_SESSION['usuario']['usr_tipus']==0){ ?>
        <li class='launcher <?php if($menu==1){ ?> active <?php } ?> '>
            <i class="fas fa-users"></i>
            <a href="<?php echo _PATH_BASE."usuarios" ?> "><?php echo _LBL_MENU_1 ?> </a>
        </li>
      <?php } ?>
