<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>servmineUP</title>
  <link rel="stylesheet" href="/style/styles.css">	
<link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>

<body>

  <h1><?php
          error_reporting(0);
          echo $_GET['srv']; 
        ?>
  </h1>
  <h2> 
    <!-- Some PHP wizardy happens here. You will
         never be able to see -->
    <?php
    require __DIR__ . '/src/Ping.php';
    require __DIR__ . '/src/PingException.php';
    
    use srvmnUP\Ping;
    use srvmnUP\PingException; //xPaw is awesome :D

    try
    {
      //If it's online
        $Query = new Ping( $_GET['srv'], $_GET['port']);

        echo "Current status: <font color=green>ONLINE</font>";
        $nullSrv = false;

        if($_GET['port'] == 443){
          echo " <font color=purple>(using ssl)</font>";
        }
        if($_GET['port'] == 80){
          echo " <font color=purple>(using http)</font>";
        }

        $Query->Close();
    }
    catch( PingException $e )
    {
      if ($_GET['srv'] == null || $_GET['port'] == null){
        echo "<font color=blue>Please enter an IP (or URL) & Port<br>
        <a href='http://portforward.com/cports.htm' target='_blank'>port cheat sheet</a> </font>";
        $nullSrv = true;
      }
      else{
        echo "Current status: <font color=red>OFFLINE</font>";
      }
    }
    
?>

  </h2>
  <br>
  <form>
    IP: <input type="text" name="srv"> Port: <input type="number" name="port" min="1" max="65535">

    <button type="submit" value="Check">Check</button>
  </form>
<br>
  <!--<p><a href="how.php">How it works</a></p>-->
  <br>
  <p><?php
  if ($nullSrv == false){
    echo '<a href="embed.php?srv='.$_GET['srv'] . '&port=' . $_GET['port'] . '">';
    }
    else{}

  ?>Embed this image</a></p>
  <p>Want this page for your  own site? Contact @gmemstr on Twitter.</p>
  <p>~gabriel simmer</p> 


</body>

</html>
