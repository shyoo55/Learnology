<?php session_start();
include 'connection.php';
if(isset($_POST['cid']) && isset($_SESSION['id'])){
$cid = $_POST['cid'];
$sid = $_SESSION['id'];
$sql = "
insert into enrolment (student_id , course_id) values ('$sid','$cid')";
$result = mysqli_query($con, $sql);
echo "ok";}
?>
