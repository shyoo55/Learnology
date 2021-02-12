<?php session_start();
include 'connection.php';

if(!isset($_SESSION['id'])){

echo "<script> location.href='index.php';</script>";}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Add New Course</title>
<link rel="stylesheet" href="style.php">
<script src="javascript.js"></script>
</head>

<body>
<header>
<img src="images/logo.png" alt="logo" alt="logo" width="23%" height="20%">
<div id="navbar">
<nav>
<ul class="nav1">
<li><a href ="index.php" >Home Page</a></li>
<li>|</li>
<li><a id="out" href="logout.php"> Log Out</a></li>
</ul>
</nav>
</div>
</header>

<main>
<form id="addcourseform" action="addcourse.php" method="post" enctype="multipart/form-data">
<fieldset>

<legend>Add New Course</legend>
<br>
Title: <input type="text" name="title"> <br><br>
Field: <input type="text" name="field"> <br><br>
Description: <br><br> <textarea name="description" rows="5" cols="50"></textarea> <br><br>
Book Cover: <input type="file" name="bookcover"> <br>
<br>
<input type="submit" value="Add" name="upload" onclick=" return checkcourse()">

</fieldset>
</form>
</main>
</body>
</html>
