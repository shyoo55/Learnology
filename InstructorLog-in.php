<?php session_start();
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
if(isset($_SESSION['id']) && $_SESSION['type'] == "instructor"){

echo "<script> location.href='InstructorHomePage.php';</script>";}

if(isset($_SESSION['id']) && $_SESSION['type'] != "instructor"){
echo "<script> location.href='StudentHomePage.php';</script>";}
?>
  <!DOCTYPE HTML>
  <html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta charset='UTF-8'>
	  <title> Instructor log-in </title>
	  <link rel="stylesheet" type="text/css" href="style.php">
	  <script src="javascript.js"></script>
	</head>

<body>
<?php
if(isset($_GET['state'])){
if($_GET['state']=="wrongpassword"){
?>
<script>
alert("Wrong Password or Email");
</script>
<?php
}}
?>

<header>
      <img src="images/logo.png" alt="logo" alt="logo" width="23%" height="20%">
      <div id="navbar">
      <nav>
      <ul class="nav1">
      <li><a href ="index.php" >Home</a></li>
      <li><a href ="StudentLog-in.php" >Student Log-in</a></li>
      <li><a href="signUp.php">Sign-up</a></li>
      </ul>
      </nav>
      </div>
</header>


<main>
	  <h2> Instructor log-in </h2>
	  <form id="instructorform" method="post" action="loginIns.php" enctype="multipart/form-data" >
	     <fieldset>
		   <legend> Instructor Information </legend>
		     Email: <input type="email" name="email" required ><br><br>
		 	 Password: <input type="password" name="password" required ><br><br>
			 <input type="submit" value="Log-in" >

		 </fieldset>
	  </form>
</main>
	</body>
  </html>
