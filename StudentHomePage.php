<?php  session_start(); ?>
<?php include 'connection.php';
if(!isset($_SESSION['id'])){
echo "<script> location.href='StudentLog-in.php';</script>";}
else {
if($_SESSION['type'] != "student"){
echo "<script> location.href='InstructorHomePage.php';</script>";}}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<title> Student home page </title>
<link rel="stylesheet" href="style.php">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

function enrollcourse(str){
$.ajax({
url: 'enrollcourse.php',
type: 'POST',
data: {cid: str},
beforeSend: function(){
$("#enrollbtn"+str).html("enrolling...");},
success:function(res){
if(res == "ok"){
$("#available").load(location.href + " #available");
$("#enrollstatus"+str).html("Enrolled");
$("#dropval"+str).append('<button type="button" id="dropbtn'+str+'" onclick="dropcourse('+str+')">Drop</button>')}
else{
alert(res);}}
})}


function dropcourse(str){
$.ajax({
url: 'dropcourse.php',
type: 'POST',
data: {cid: str},
beforeSend: function(){
$("#dropbtn"+str).html("droping...");},
success:function(res){
if(res == "ok"){
$("#available").load(location.href + " #available");
$("#dropval"+str).html("");
$("#enrollstatus"+str).html('<button type="button" id="enrollbtn'+str+'" onclick="enrollcourse('+str+')">Enroll</button>')}
else{
alert(res);}
}})
}

  </script>
</head>

<body>
<header>
			<img src="images/logo.png" alt="logo" alt="logo" width="23%" height="20%">
      <div id="navbar">
      <nav>
      <ul class="nav1">
      <li><a href ="index.php" >Home</a></li>
      <li><a href ="#available" >Courses</a></li>
      <li><a id="out" href="logout.php"> Log Out</a></li>
      </ul>
      </nav>
      </div>
		</header>

<main>
<?php
if(isset($_SESSION['id'])){
$uid = $_SESSION['id'];
$sql = "select * from student where id='$uid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);}?>

<form method="get">
<p class="info">Name: <?php echo $row["name"]; ?></p>
<p class="info">Email: <?php echo $row["email"]; ?></p>
</form>

<br>
<table id="available" class="table" width="100%">
<tr>
  <th>Course</th>
  <th>Status</th>
</tr>
<?php
if(isset($_SESSION['id'])){
$uid = $_SESSION['id'];
$sql = "select * from course, enrolment where course.id = enrolment.course_id and enrolment.student_id ='$uid'";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result)) {
$cid = $row["course_id"];?>

<tr>
  <td> <a href ="courseInfo.php?cid=<?php echo $row["course_id"]; ?>&mode=view" ><?php echo $row["name"]; ?></a> </td>

<?php
$sql2 = "select * from enrolment where student_id='$uid' and course_id='$cid' ";
$result2 = mysqli_query($con, $sql2);
if ($row2 = mysqli_fetch_assoc($result2)) {?>

  <td>Enrolled</td>

<?php

}else {?>

<form>
<input type="hidden" name="cid" value=<?php echo $row["course_id"];?>>

<td><button type="button" id="enrollbtn<?php echo $row["course_id"];?>" onclick="enrollcourse('<?php echo $row["course_id"];?>')">Enroll</button></td>
</form>
<?php
}?>

<?php
$sql2 = "select * from enrolment where student_id='$uid' and course_id='$cid' ";
$result2 = mysqli_query($con, $sql2);
if ($row2 = mysqli_fetch_assoc($result2)) {?>

<form >
<input type="hidden" name="cid" value=<?php echo $row["course_id"];?>>

<td><button type="button" id="dropbtn<?php echo $row["course_id"];?>" onclick="dropcourse('<?php echo $row["course_id"];?>')">Drop</button></td>
</form>

  <?php
}else {
	?>

<td></td>
<?php
}?>

</tr>

<?php    } }  ?>

<?php
if(isset($_SESSION['id'])){
$uid = $_SESSION['id'];
$sql = "select * from course where course.id not in (select course.id from course, enrolment where course.id = enrolment.course_id and enrolment.student_id ='$uid')";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
$cid = $row["id"];?>

<tr>
<td> <a href ="courseInfo.php?cid=<?php echo $row["id"]; ?>&mode=view" ><?php echo $row["name"]; ?></a> </td>

<?php
$sql2 = "select * from enrolment where student_id='$uid' and course_id='$cid' ";
$result2 = mysqli_query($con, $sql2);
if ($row2 = mysqli_fetch_assoc($result2)) {
	?>

<td>Enrolled</td>
<?php
}else {
	?>
<form>
<input type="hidden" name="cid" value=<?php echo $row["id"];?>>

<td id="enrollstatus<?php echo $row["id"];?>"><button type="button" id="enrollbtn<?php echo $row["id"];?>" onclick="enrollcourse('<?php echo $row["id"];?>')">Enroll</button></td>
</form>
<?php
}?>

<?php
$sql2 = "select * from enrolment where student_id='$uid' and course_id='$cid' ";
$result2 = mysqli_query($con, $sql2);
if ($row2 = mysqli_fetch_assoc($result2)) {
	?>

<form >
<input type="hidden" name="cid" value=<?php echo $row["id"];?>>
<td id="dropval<?php echo $row["id"];?>"><button type="button" id="dropbtn<?php echo $row["id"];?>" onclick="dropcourse('<?php echo $row["id"];?>')">Drop</button></td>
</form>

<?php
}else {
	?>

<td id="dropval<?php echo $row["id"];?>"></td>

<?php
}
	?>
</tr>

<?php    } }  ?>
	  </table>
	 </main>
	</body>
  </html>
