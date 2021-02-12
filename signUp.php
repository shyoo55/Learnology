<?php session_start();
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

include 'connection.php';
if(isset($_SESSION['id']))
{
echo "<script> location.href='index.php';</script>";}
?>
<!DOCTYPE HTML>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset='UTF-8'>
<title>Sign Up Page</title>
<link rel="stylesheet" href="style.php">
<script src="javascript.js"></script>
</head>

<body>
<?php
if(isset($_GET['state'])){
if($_GET['state']=="exist"){?>
<script>
alert("There's some error either username exist or email");
</script>
<?php
}}
?>

<header>
<img src="images/logo.png" alt="logo" alt="logo" width="23%" height="20%">
<div id="navbar">
<nav>
<ul class="nav1">
<li><a href ="index.php" >Home Page</a></li>
<li><a href ="InstructorLog-in.php" >Instructor Log-in</a></li>
<li><a href ="StudentLog-in.php" >Student Log-in</a></li>
</ul>
</nav>
</div>

</header>
<main>
<form id="signform" action="signups.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Creat a new account</legend>
Full name: <input type="text" name="fullname" required> <br><br>
Username: <input type="text" name="username" required> <br><br>
Password: <input type="password" name="password" maxlength="15"  required> </br><br>
Email address: <input type="email" name="email"  required > <br><br>

<input onclick="document.getElementById('spe').disabled = false; document.getElementById('spe').required = true;" type="radio" id="instructor" name="Speciality" <?php if (isset($Speciality) && $Speciality==="instructor") echo "checked";?> value="instructor" required>
<label for="instructor">instructor</label>
<input onclick="document.getElementById('spe').disabled = true;" type="radio" id="student" name="Speciality" <?php if (isset($Speciality) && $Speciality==="student") echo "checked";?> value="student" required>
<label for="student">student</label><br>
<br>
Speciality:  <input id="spe" type="text" name="spe" disabled ></br>
<br>
<input type="submit" value="sign up" onclick=" return checksignup()">

</fieldset>
</form>
</main>
</body>
</html>
