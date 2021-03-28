<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=users' , 'root' , '');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$signed = '';
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $entred_user = $_POST['username'];
    $entred_password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users_table WHERE username=?");
    $stmt_2 = $pdo->prepare("SELECT password FROM users_table WHERE password=?"); 
    $stmt->execute([$entred_user]); 
    $stmt_2->execute([$entred_password]); 
    $user = $stmt->fetch();
    $pass = $stmt_2->fetch();
    
    if($user && $pass)
    {
        $signed = 'Signed In successfully';
    }
    else{
        $signed = 'Invalid username or password';
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
        <form id="my-form" method="POST" action="#">
            <div id="header-box">
                <header id="main-header"><h2>Login Form</h2></header>
            </div>
           
           <br>
           <br>
        <div id="user">
            <lable for='username' style="display: block;" id="succmess"><?=$signed?></lable>
            <input type="text" name="username" placeholder="username..." required id="username">
        </div>
        <br>
        <br>
        <div id="pass">
            
            <input type="password" name="password" placeholder="password..." required id="password">
        </div>
        <br>
        <br>
        
        
        <input type="submit" value="Sign In" name="buttonUp" id="submit-button">
        </form>
        <div id="signIn">
           
            <a id="link" href="register.php">Return to home page</a>
        </div>
    </div>
</body>
</html>