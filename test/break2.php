<?php 

$TITLE_break = "WordPress: WP Admin Login Issues";

$DESCRIPTION = "This activity is designed to test your critical thinking & troubleshooting skills. It is will also teach you the value of source control via git as well as the advantages of using docker. This course will not teach you to be a WordPress expert. But how to troubleshooting and fix a large majority of WordPress issues.";

// If a post req is made to break
if ($_POST['break']){

  function delete_dir($src) { 
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                delete_dir($src . '/' . $file); 
            } 
            else { unlink($src . '/' . $file); } 
        } 
    } 
    closedir($dir); 
    rmdir($src);
  }
  
/****** RIP DB ********/ 
  $con= mysqli_connect('db:3306' ,'wordpress' ,'wordpress' , 'wordpress');
    if (!$con) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    $users = 'wp_users';
    $query1 = "UPDATE `$users` SET `user_pass` = 'hackersNewPassword' WHERE `user_login` ='wordpress';";
    $result1 = mysqli_query($con, $query1);
  mysqli_close($con);
/****** END DB ********/ 
    //// Delete the WP admin folder and all file
    // delete_dir("wp-admin");
/****** END Delete wp-admin ********/ 

  echo '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
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
        <p> Your WordPress site has been broken!</p>
        <p> Was it hacked? </p>
        <p> WTF did that recent update do !?! </p>
        <p> Click continue to begin </p>
        <form id="get-started" method="post" action='.$file.'>
          <input name="start" value="start" class="hide"></input>
          <input type="submit" value="Go Back" class="btn"></input>
        </form>
      </div>
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
        <p class="description"> '.$DESCRIPTION.' </p>
        <br>
        <p> To complete this activity, you must fix the website. </p>
        <form id="get-started" method="post" action='.$file.'>
          <input name="break" value="break" class="hide"></input>
          <input type="submit" value="BREAK IT !" class="btn"></input>
        </form>
      </div>
  ';


}

?>