<?php session_start(); ?> <?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

if(isset($_SESSION['id']) && $_SESSION['type'] == "student")
{
echo "<script> location.href='StudentHomePage.php';</script>";}
if(isset($_SESSION['id']) && $_SESSION['type'] != "student"){
echo "<script> location.href='InstructorHomePage.php';</script>";}

?>
 <!DOCTYPE HTML>
  <html>
	<head>
	  <meta charset='UTF-8'>
	  <title> Student log-in </title>
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
      <li><a href ="index.php" >Home Page</a></li>
      <li><a href ="InstructorLog-in.php" >Instructor Log-in</a></li>
      <li><a href="signUp.php">Sign-up</a></li>
      </ul>
      </nav>
      </div>
</header>


<main>
	  <h2> Student log-in</h2>
	  <form id="studentlogform" action="loninstu.php" method="post" >
	     <fieldset>
		   <legend> Student Information </legend>
		     Email: <input type="email" name="email" required ><br><br>
		 	 Password: <input type="password" name="password" required ><br><br>

			 <input type="submit" value="Log-in" >
		 </fieldset>
	  </form>
</main>
	</body>
  </html>
