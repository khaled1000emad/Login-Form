<?php
       //connect to db
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=users' , 'root' , '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pass_err ='';
        $succ='';
       if($_SERVER['REQUEST_METHOD'] === 'POST')
       {
           $username = $_POST['username'];
           $password = $_POST['password'];
           $password_2 = $_POST['pass_2'];
           if($password != $password_2)
           {
               $pass_err='Two passwords does not match!';
           }
           else{
               $pdo->exec("INSERT INTO users_table(username, password, confirm)
                    VALUES('$username', '$password', '$password_2')
               ");
               $succ='Signed Up succesfully';
           }
       }
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    
</head>
<body >
    <div id="container">
        <form id="my-form" method="POST" action="#"  >
            <div id="header-box">
                <header id="main-header"><h2>Register Form</h2></header>
            </div>
           
           <br>
           <br>
        <div id="user">
            <lable for='username' style="display: block;"><?=$succ?></lable>
            <input type="text" name="username" placeholder="username..." required id="username">
        </div>
        <br>
        <br>
        <div id="pass">
            <label for='password' style="display: block;" id='errmess'><?=$pass_err?></label>
            <input type="password" name="password" placeholder="password..." required id="password">
        </div>
        <br>
        <br>
        <div id="confirmation">
            
            <input type="password" name="pass_2" id="confirm" placeholder="confirm your password..." required >
        </div>
        <br>
        <input type="submit" value="Sign Up" name="buttonUp" id="submit-button">
        </form>
        <div id="signIn">
            <label for="link">Already a user ?</label>
            <a id="link" href="signin.php">Sign In</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>