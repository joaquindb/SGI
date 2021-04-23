
<?php
    $checklogin=true;
    define("_PATH_BASE","../");
    @require_once(_PATH_BASE.'RESOURCES/includes/inicio.html.php');
?>

  <div class='col-lg-12'>
       <fieldset class='text-center'>
           <legend><?php echo _LBL_LOG_CAPT?></legend>
           <div class='form-group'>
               <input class="form-control" placeholder="<?php echo _LBL_LOG_USU?>" value="" id="email" name="email" type="text" autofocus/>
           </div>
           <div class='form-group'>
               <input class="form-control" placeholder="<?php echo _LBL_LOG_PASS?>" value="" id="password" name="password" type="password" onkeydown="if(event.keyCode == 13) $('#btn-login').click();"/>
           </div>
           <div class='text-center'>
               <button  class="btn btn-default btn-login" id="btn-login" onclick="jaxon_check_login($('#email').val(),$('#password').val());">
                   <i class="fa fa-unlock-alt" style="margin-right:4px;"></i><?php echo _LBL_LOG_VALIDAR?>
               </button>
           </div>
       </fieldset>
   </div>

   <div id="respuesta"></div>

<?php
    @require_once(_PATH_BASE.'RESOURCES/includes/final.html.php');
?>
