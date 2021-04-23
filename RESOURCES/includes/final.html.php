          </div>
        </div>
      </body>
      <!-- Footer -->
      <!-- Javascripts -->
      <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>-->
      <!--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>-->
      <!--<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>-->

      <!--Javascripts-->
      <script src="<?php echo _PATH_BASE."RESOURCES/externo/jQuery/jquery.min.js"?>" type="text/javascript"></script>
      <script src="<?php echo _PATH_BASE."RESOURCES/externo/jQuery/jquery-ui.min.js"?>" type="text/javascript"></script>
      <script src="<?php echo _PATH_BASE."RESOURCES/externo/jQuery/modernizr.min.js"?>" type="text/javascript"></script>
      <script src="<?php echo _PATH_BASE."RESOURCES/externo/jQuery/jquery-confirm.min.js"?>" type="text/javascript"></script>
      <script src="<?php echo _PATH_BASE."RESOURCES/externo/jquery-confirm-master/js/jquery-confirm.js"?>" type="text/javascript"></script>
      <script src="<?php echo _PATH_BASE."RESOURCES/externo/bootstrap-notify-master/bootstrap-notify.min.js"?>" type="text/javascript"></script>
      <script src="<?php echo _PATH_BASE."RESOURCES/externo/BOOTSTRAP/assets/javascripts/application-985b892b.js"?>" type="text/javascript"></script>

      <!--CSS-->
      <link href="<?php echo _PATH_BASE."RESOURCES/externo/jquery-confirm-master/css/jquery-confirm.css"?>" rel="stylesheet" type="text/css" media="screen">
      <link href="<?php echo _PATH_BASE."RESOURCES/externo/BOOTSTRAP/assets/stylesheets/application-a07755f5.css"?>" rel="stylesheet" type="text/css" media="screen">


      <?php
        @require_once(_PATH_BASE.'RESOURCES/functions/functions.js.php');
        echo $jaxon->getJs();
        echo $jaxon->getScript();
      ?>
</html>
