<?php session_start();
include 'connection.php';
if (isset($_POST['cid']) && isset($_POST['title']) && isset($_POST['field']) && isset($_POST['description']) && isset($_FILES['bookcover']['name'])){

$cid = $_POST['cid'];
$name = $_POST['title'];
$field = $_POST['field'];
$description = $_POST['description'];
$folder = "covers/";
$filename = $bookcover = $_FILES['bookcover']['name'];
$target = $folder.$filename;
move_uploaded_file($_FILES['bookcover']['tmp_name'], $target);

if($bookcover == ""){
$bookcover = $_POST['oldimage'];}

if(isset($_SESSION['id']) && $_SESSION['type'] == "instructor"){
$instructorID = $_SESSION['id'];
$sql = "update course set instructor_id='$instructorID', name='$name', field_='$field', description='$description', book_cover= '$bookcover' where id='$cid'";
$update = mysqli_query($con, $sql);

if($update){
echo "ok";}
else{
echo "error";}}}
?>
