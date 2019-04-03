<?php

    $link = mysqli_connect("localhost", "root", "root", "users");

    session_start();

    if (mysqli_connect_error()) {
        
        die ("There was an error connecting to the database");
        
    }

    if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {
        
        if ($_POST['email'] == '') {
            echo "<p>Email address is required.</p>";
            
        } else if ($_POST['password'] == '') {
            echo "<p>Password is required.</p>";
        } else {
            
           $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            
           $result = mysqli_query($link, $query);
            
           if (mysqli_num_rows($result) > 0) {
               echo "<p>That email address has already been taken.</p>";
           } else {
               
               $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";
               
        
               if (mysqli_query($link, $query)) {
                   
                   $_SESSION['email'] = $_POST['email'];
                   
                   header("Location: index.php");
                   
               } else {
                   echo "<p>There was a problem signing you up - please try again later.</p>";
               }
           }
        }
    }


//password security one way encryption

    //$salt = "isefjfehi2736582KUFED";

    //echo md5($salt."password");

    $row['id'] = 73;
    
    echo md5(md5($row['id'])."password");

//cookies

setcookie("customerId", "1234", time() + 60 * 60 * 24);

echo $_COOKIE["customerId"];

//update cookie

$_COOKIE["customerId"] = "test";




   // $query = "INSERT INTO `users` (`email`, `password`) VALUES('tommy@gmail.com', 'ilovemydad')";


    //$query = "UPDATE `users` SET email = 'aman@hotmail.com' WHERE id = 1 LIMIT 1";

   // mysqli_query($link, $query);

    //$query = "SELECT * FROM users";

  // if ($result = mysqli_query($link, $query)) {
    
    //  while ($row = mysqli_fetch_array($result)) {
          
      
      
    //  }
       
      
 //  }

?>

<form method="post">

    <input name="email" type="text" placeholder="Email address">
    
    <input name="password" type="password" placeholder="Password">
    
    <input type="submit" value="Sign up">



</form>