<?php
session_start(); 
require_once('database.php');
$username=$_POST['username'] ?? "";
$password=$_POST['password'] ?? "";

$msg="";
if($_SERVER['REQUEST_METHOD']==='POST')
{
  if(!empty($username) && !empty($password))
  {
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) 
    {
      header("Location: home.php");
        exit();
    } 
    else{
      $msg="username or password incorrect";
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <?php  if($msg!="")
    {
      ?><style>.error{display:block}</style><?php
    } ?>

    <title>Bibliotheque</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    
</head>
<body id="loginbody">
<div class="containerlogin">
      <div class="wrapper">
        
        <div class="title"><span>Library management</span></div>
        <form action="" method="POST">
          <p class="error"><?php echo $msg;?></p>
          <div class="row">
          <i class='bx bxs-user'></i>
            <input type="text" placeholder="Email" name="username" required>
          </div>
          <div class="row">
          <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <div class="row button">
            <input type="submit" value="Login">
            
          </div>
        
        </form>
      </div>
</div>
</body>
</html>