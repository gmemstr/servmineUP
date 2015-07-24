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

    if ($isup == true){
    	$textIU = "ONLINE";
    }
    if ($isup == false){
    	$textIU = "OFFLINE";
    }

    $text = $ip . ':' . $port . " Status: " . $textIU;

    $im = imagecreatefrompng("images/label.png");
    $black = imagecolorallocate($im, 0, 0, 0);
    $px = (imagesx($im) - 8.8 * strlen($text)) / 2;
    imagestring($im, 10, $px, 55, $text, $black);
    imagepng($im);
    imagedestroy($im);

?>	
