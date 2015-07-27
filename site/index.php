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

        echo "Current status:<div id='on'>ONLINE</div>";
        $nullSrv = false;

        $Query->Close();
    }
    catch( PingException $e )
    {
      if ($_GET['srv'] == null || $_GET['port'] == null){
        echo "Please enter an IP (or URL) and Port<br>
        <a href='http://portforward.com/cports.htm' target='_blank'>Common Ports</a>";
        $nullSrv = true;
      }
      else{
        echo "Current status:<div id='off'>OFFLINE</div>";
      }
    }
    
?>

  </h2>
  <br>
  <form>
    IP: <input type="text" name="srv" value="google.com"> Port: <input type="number" name="port" min="1" max="65535" value="80">

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

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- My Computer.gabrielsimmer.com -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1095565361439571"
     data-ad-slot="1901201639"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</body>

</html>