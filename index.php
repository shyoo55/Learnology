<?php session_start();

include 'connection.php';
if(isset($_SESSION['id'])){
if($_SESSION['type'] == "instructor"){
echo "<script> location.href=' InstructorHomePage.php';</script>";}
else
if($_SESSION['type'] == "student"){
echo "<script> location.href=' StudentHomePage.php';</script>";}}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> Home Page </title>
<link rel="stylesheet" href="style.php">
</head>

<body>
<header>
<img src="images/logo.png" alt="logo" alt="logo" width="23%" height="20%">
<div id="navbar">
<nav>
<ul class="nav1">
<li><a href ="InstructorLog-in.php" >Instructor Log-in</a></li>
<li><a href ="StudentLog-in.php" >Student Log-in</a></li>
<li><a href="signUp.php">Sign-up</a></li>
</ul>
</nav>
</div>
</header>

<main id="dd">
<br>
  <div id="container" class="container">
  <span class="first">Welcome to</span>
  <br>
  <span class="second">Learnology<span>
  </div>
<br><br>
<input id="button" type="button" class="button" name="Log-in" value="Instructor Log-in" onclick="window.location.href='InstructorLog-in.php'">
<input id="button" type="button" class="button" name="Log-in" value="Student Log-in" onclick="window.location.href='StudentLog-in.php'">
<p id="P"> New Account? <a href="signUp.php">Sign up</a></p>
</main>
</body>
</html>
