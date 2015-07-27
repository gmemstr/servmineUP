<?php

require __DIR__ . '/src/Ping.php';
require __DIR__ . '/src/PingException.php';

use srvmnUP\Ping;
    use srvmnUP\PingException; //xPaw is awesome :D

    try
    {
      //If it's online
        $Query = new Ping( $_GET['srv'], $_GET['port']);

        $isup = true;   

        $Query->Close();
    }
    catch( PingException $e )
    {
    	$isup = false;
    }
    

    header("Content-type: image/png");
    $ip = $_GET['srv'];
    $port = $_GET['port'];
    if ($port == 443 || $port == 80){
        $text = $ip;
    }
    else{
    $text = $ip . ':' . $port;
    }

    $im = imagecreatefrompng("images/label.png");
    $black = imagecolorallocate($im, 0, 0, 0);

    if ($isup == true){
        $textIU = "ONLINE";
        $colour = imagecolorallocate($im, 100, 200, 100);
    }
    if ($isup == false){
        $textIU = "OFFLINE";
        $colour = imagecolorallocate($im, 255, 0, 0);
    }

    $font = 'clacon.ttf';

    $px = (imagesx($im) - 8.8 * strlen($text)) / 2;
    $px2 = (imagesx($im) + 8.7 * strlen($text)) / 2;

    imagettftext($im, 30, 0, 10, 40, $black, $font, $text);
    imagettftext($im, 50, 0, 200, 100, $colour, $font, $textIU);

    imagepng($im);
    imagedestroy($im);

    ?>	