<?php session_start();
include 'connection.php';

if (isset($_POST['title']) && isset($_POST['field']) && isset($_POST['description']) && isset($_FILES['bookcover']['name'])){

$name = $_POST['title'];
$field = $_POST['field'];
$description = $_POST['description'];
$bookcover = $_FILES['bookcover']['name'];

if(isset($_SESSION['id']) && $_SESSION['type'] == "instructor"){

$instructorID = $_SESSION['id'];

$sql = "insert into course (instructor_id, name, field_, description, book_cover) values ('$instructorID', '$name', '$field', '$description', '$bookcover')";

mysqli_query($con, $sql);

$sql = "select * from course where instructor_id='$instructorID' and name='$name' and field_= '$field' and description='$description' and book_cover='$bookcover'";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$cid = $row['id'];

header ("Location: courseInfo.php?cid=$cid&mode=view");}
else{
echo "it looks like you are not an instructor, log in as an instructor please";

echo "<script> location.href='InstructorLog-in.php';</script>";}}
else {
echo "fill all fields please";
header ("Location: InstructorHomePage.php");}
?>
