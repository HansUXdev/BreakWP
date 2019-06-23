<?php 

$TITLE_break = "WordPress 101: Use Tests/Git to check WP core files";


// If a post req is made to break
if ($_POST['break']){
/****  RIP wp-config.php *****/
  function break_wp($data) {
    if (stristr($data, 'DB_NAME')) {
      $replace = 'define(\'DB_NAME\', \'notarealdatabase\'); ';
      return $replace;
    }
    elseif (stristr($data, 'DB_USER')) {
      $replace = 'define(\'DB_USER\', \'notyouruser\'); ';
      return $replace;
    }
    elseif (stristr($data, 'DB_PASSWORD')) {
      $replace = 'define(\'DB_PASSWORD\', \'notyourpassword\'); ';
      return $replace;
    }
    elseif (stristr($data, 'DB_HOST')) {
      $replace = 'define(\'DB_HOST\', \'notyourhost\'); ';
      return $replace;
    }
    else{ return $data;}
  }

  $data = file('wp-config.php');
  $data = array_map('break_wp',$data);
  file_put_contents('wp-config.php', implode('', $data));

/****  END RIP wp-config.php  *****/

  echo '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html>
      <head><title>'.$TITLE_break.'</title></head>
    <body>
      <style>
        .title{background-color: black;  color:red; width:100%; height: 50px;}
        .title > h1 {position: relative; top: 5px; text-align: center;}
        .hide{display: none;}
        form{text-align: center;}
        .description{font-size: 24px; margin-left: 100px; margin-right:100px}
        .btn{
          background-color: green; 
          color: white; 
          border-color: #008A32; 
          border-style: none; 
          height:5em; 
          width: 15em;
        }
        .center{text-align: center;}
        .prompt{text-align: center;font-size: 20px;}
      </style>
      
      <div class="center">
        <div class="title"><h1>'.$TITLE_break.'</h1></div>

        <h1> Your WordPress site has been broken!</h1>
        <p> Was it hacked? </p>
        <p> WTF did that recent update do !?! </p>
        <p> Click continue to begin </p>
        <form id="get-started" method="post" action='.$file.'>
          <input name="start" value="start" style="display: none;"></input>
          <input type="submit" value="Go Back" class="btn"></input>
        </form>
    </body>
    </html>
  ';

  $file=basename($_SERVER['PHP_SELF']);
}


elseif ($_POST['start']){
  $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
  $file=basename($_SERVER['PHP_SELF']);
  $newurl= str_replace($file,'',$url);
  header('Location:'.$newurl);
  unlink($file);
}
else{
  $file=basename($_SERVER['PHP_SELF']);

  echo '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html>
      <head><title> '.$TITLE_break.' </title></head>
    </body>
    <style>
      .title{background-color: black;  color:red; width:100%; height: 50px;}
      .title > h1 {position: relative; top: 5px; text-align: center;}
      .hide{display: none;}
      form{text-align: center;}
      .description{font-size: 24px; margin-left: 100px; margin-right:100px}
      .btn{
        background-color: red; 
        color: white; 
        border-color: #008A32; 
        border-style: none; 
        height:5em; 
        width: 15em;
      }
      .center{text-align: center;}
      .prompt{text-align: center;font-size: 20px;}

    </style>

      <div class="center">
        <div class="title"><h1>'.$TITLE_break.'</h1></div>
        <p class="description"> 
        This activity is designed to test your critical thinking & troubleshooting skills. It is will also teach you the value of source control via git as well as the advantages of using docker. This course will not teach you to be a WordPress expert. But how to troubleshooting and fix a large majority of WordPress issues.
        </p>
        <br>
        <p>To complete this activity, you must fix the website.</p>
        <p style="font-size: 20px;"> Click continue to break your site </p>

        <form id="get-started" method="post" action='.$file.'>
          <input name="break" value="break" class="hide"></input>
          <input type="submit" value="BREAK IT !" class="btn"></input>
        </form>
    </body>
    </html>
  ';
}
?>