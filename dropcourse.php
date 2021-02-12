<?php session_start();
include 'connection.php';
if(isset($_POST['cid']) && isset($_SESSION['id'])){
$cid = $_POST['cid'];
$sid = $_SESSION['id'];
$sql = "
delete from enrolment
where student_id='$sid' and course_id='$cid'";

$result = mysqli_query($con, $sql);

echo "ok";}
?>
