<?php session_start();
include 'connection.php';
if(!isset($_SESSION['id'])){
echo "<script> location.href='index.php';</script>";}

$cid = $_GET['cid'];

$sql = "select s.name as studentname, s.id as studentid from enrolment as e, student as s where e.course_id='$cid' and e.student_id=s.id";
$result = mysqli_query($con, $sql);
$Result = "<?xml version='1.0' encoding='utf-8'?>\n<students>\n";

while($row = mysqli_fetch_assoc($result)) {
$Result .= " <student>\n";
foreach($row as $key => $value) {
$Result .=  "  <$key>$value</$key>\n";}
$Result .= " </student>\n";}
$Result .= "</students>\n";
echo $Result;
?>
