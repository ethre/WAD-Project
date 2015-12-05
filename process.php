<?php
    include_once('db.php');

    $username = mysql_real_escape_string( $_POST["username"] );
	  $password = mysql_real_escape_string( md5($_POST["password"]) );
	  $fname = mysql_real_escape_string( $_POST["fname"] );
	  $lname = mysql_real_escape_string( $_POST["lname"] );
   
     
       if( empty($username) || empty($password) )
    {
            echo "Username and Password are mandatory";
            exit();
    }
    
    
    
    $res =  mysql_query("SELECT username FROM users WHERE username='$username'");
    $row = mysql_fetch_row($res);
    
    if( $row > 0)
    echo "Username $username has already been taken";
    else{
        
    
    
    
    $sql = "INSERT INTO users VALUES('', '$username', '$password', '$fname', '$lname')";
    if(mysql_query($sql))
    echo "Registartion complete!";
    else
    echo "Registartion failed, please try again.";
    }
    
    
  
	print "<br>Your name is <b>".$_POST['username']."</b> and your password is <b>".$_POST['password']."</b><br>";

?>