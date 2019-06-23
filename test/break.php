<?php 

$TITLE_break = "Fixing WordPress 101";


// If a post req is made to break
if ($_POST['break']){

  //// These lines get the database connection strings to be used in the following queries
  $tableprefix  ='$table_prefix';
  $database     = shell_exec("grep DB_NAME wp-config.php | cut -d \' -f4");
  $user         = shell_exec("grep DB_USER wp-config.php | cut -d \' -f4");
  $password     = shell_exec("grep DB_PASSWORD wp-config.php | cut -d\' -f4;");
  $host         = shell_exec("grep DB_HOST wp-config.php | cut -d\' -f4;"); 
  $prefix       = shell_exec("grep '$tableprefix' wp-config.php | cut -d\' -f2;");

  // echo " 
  //   db >>> $database <<<
  //   usr >>> $user <<<
  //   pw >>> $password <<<
  //   host >>> $host <<<
  //   prefix >>> $prefix <<<
  // ";

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

/* Connect tot the sqldb and fuck it up 
* These queries set the home and site url to http://google.com and the template and stylesheet to twentyfifteen and changes the users password
*/
  $con= mysqli_connect('db:3306' ,'wordpress' ,'wordpress' , 'wordpress');

  if (!$con) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  }
    // $options = $prefix.'options';
    // $users = $prefix.'users';
    $options = 'wp_options';
    $users = 'wp_users';


    $query1 = "UPDATE `$options` SET `option_value` = 'http://google.com' WHERE `option_name` ='siteurl';";
    $query2 = "UPDATE `$options` SET `option_value` = 'http://google.com' WHERE `option_name` ='home';";
    $query3 = "UPDATE `$options` SET `option_value` = 'twentyfifteeen' WHERE `option_name` ='template';";
    $query4 = "UPDATE `$options` SET `option_value` = 'twentyfifteeen' WHERE `option_name` ='stylesheet';";
  
    // echo " 
    // db >>> $query1 <<< 
    // usr >>> $query2 <<<
    // pw >>> $query3 <<<
    // host >>> $query4 <<<
    // ";

    $result1 = mysqli_query($con, $query1);
    $result2 = mysqli_query($con, $query2);
    $result2 = mysqli_query($con, $query3);
    $result2 = mysqli_query($con, $query4);

  mysqli_close($con);
  echo '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html>
      <head><title>'.$TITLE_break.'</title></head>
      <div style="text-align: center">
        <div>
          <h1>'.$TITLE_break.'</h1>
        </div>
        <p> Your WordPress site has been broken!</p>
        <p> Was it hacked? </p>
        <p> WTF did that recent update do !?! </p>
        <p> Click continue to begin </p>
        <form id="get-started" method="post" action='.$file.'>
          <input name="start" value="start" style="display: none;"></input>
          <input type="submit" value="Continue" class="btn" style=\'
            background-color: #008A32; 
            color: white; 
            border-color: #008A32; 
            border-style: none; 
            height:5em; 
            width: 5em;\'></input>
        </form>
  ';
  
/****** END DB ********/ 


  $file=basename($_SERVER['PHP_SELF']);

}
elseif ($_POST['start']){
  $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
  $file=basename($_SERVER['PHP_SELF']);
  $newurl= str_replace($file,'',$url);
  header('Location:'.$newurl);
  // unlink($file);
}
else{
  $file=basename($_SERVER['PHP_SELF']);

  echo '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html>
      <head><title> '.$TITLE_break.' </title></head>
      <div style="text-align: center">
        <div style=\'background-color: black;  color:red; width:100%; height: 50px;\'>
          <h1 style="position: relative; top: 5px;">'.$TITLE_break.'</h1>
        </div>

        <p style="font-size: 24px; margin-left: 100px; margin-right:100px"> 
        This activity is designed to test your critical thinking & troubleshooting skills. It is will also teach you the value of source control via git as well as the advantages of using docker. This course will not teach you to be a WordPress expert. But how to troubleshooting and fix a large majority of WordPress issues.
        </p>
        <br>
        <p>
        To complete this activity, you must fix the website.
        </p>

        <p style="font-size: 20px;"> Click continue to break your site </p>

        <form id="get-started" method="post" action='.$file.'>
          <input name="break" value="break" style="display: none;"></input>
          <input type="submit" value="BREAK IT !" style=\'background-color: red; color: white; border-color: #008A32;  border-style: none; height:5em; width: 25em;\'></input>
        </form>
  ';


}

?>