<?php session_start();
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
include 'connection.php';
$errors = array();

if (isset($_POST['email']) && isset($_POST['password'])){
$email = mysqli_real_escape_string($con , $_POST['email']);
$password = mysqli_real_escape_string($con , $_POST['password']);
error_reporting(E_ERROR | E_PARSE);

$password=md5($_POST[password]);

$sql = "SELECT * FROM `student` WHERE `email` = '$email' AND `pssword` = '$password'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
$row = $result->fetch_assoc();
$_SESSION['id'] = $row['id'];
$_SESSION['type'] = "student";
$_SESSION['mode'] = "view";}
else{
$_SESSION["message"]= "user with this email does not exist" ;}

if (empty($password)){array_push($errors, "password is required"); }
if (empty($email)){array_push($errors, "email is required"); }
if(isset($_SESSION['id']) && $_SESSION['type'] == "student") {

echo "<script> location.href='StudentHomePage.php';</script>";}
else{
echo count($error);

foreach($errors as $error) {
echo $error. " " ; }}

echo "<script> location.href='StudentLog-in.php?state=wrongpassword';</script>";}
?>
