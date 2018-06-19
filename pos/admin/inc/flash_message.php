<?php
      if(isset($_SESSION['message'])){
          echo '<div class="alert alert-info alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    '.$_SESSION['message'].' </div>';
unset($_SESSION['message']);
      }