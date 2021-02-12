<?php session_start();
include 'connection.php';
if(!isset($_SESSION['id'])){
echo "<script> location.href='index.php';</script>";} ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Course information</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="javascript.js"></script>
<link rel="stylesheet" href="style.php">

<style type="text/css">
.error{
color: red;}
.alert-success{
height: 40%;
width: 100%;
background: #7DC882;
color: #4C773F;}
.alert-danger{
height: 40%;
width: 100%;
background: #F4B2B2;
color: red;}
</style>

</head>

<body>
<header>

<img src="images/logo.png" alt="logo" alt="logo" width="23%" height="20%">
<div id="navbar">
<nav>
<ul class="nav1">

<?php
if(isset($_SESSION['id']) && $_SESSION['type'] == "student"){
?>
<li><a href ="StudentHomePage.php" >Home Page</a></li>
<?php
}?>

<?php
if(isset($_SESSION['id']) && $_SESSION['type'] == "instructor"){
?>
<li><a href ="InstructorHomePage.php" >Home Page</a></li>
<?php
}
?>
<li>|</li>
<li><a id="out" href="logout.php"> Log Out</a></li>
</nav>
</div>

</header>

<main>
<?php
if(isset($_GET['cid'])){
$id = $_GET['cid'];

$sql = "select c.book_cover as b, c.name as n, c.field_ as f, c.description as d, c.id as id, i.name as teacher from course as c, instructor as i where c.id='$id' and c.instructor_id=i.id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);?>

<p> Welcome To  <?php echo $row["n"]; ?> Course</p>
<?php
if($_SESSION['type'] == "instructor"){?>


<form action="courseInfo.php" method="post" align="center">
<input type="hidden" name="cid" value=<?php echo $row["id"];?>>
<input type="hidden" name="mode" value="edit">

<button type="submit">Edit</button>
</form>
<br>
<?php
}
$image = $row['b'];
$image_src = "covers/".$image;
?>

<table id="table1" align="center">
 <tr>
   <th>Course Name</th>
  <td><?php echo $row["n"]; ?></td>
 </tr>
 <tr>
 <th>Field</th>
   <td><?php echo $row["f"]; ?></td>
 </tr>
 <tr>
  <th>Description</th>
   <td><?php echo $row["d"]; ?></td>
 </tr>
 <tr>
 <th>instructor name</th>
 <td><?php echo $row["teacher"]; ?></td>
 </tr>

 <tr>
 <th>Book Cover</th>
 <td><img width="200" height="200" src='<?php echo $image_src;  ?>' > </td>
 </tr>
</table>
</br>

<?php
if($_SESSION['type'] == "instructor" && isset($_SESSION['id'])){ ?>

<div id="list" align="center" >
   <br><p>Student List:</p>
    <table class="table table-dark table-striped table-sm">

     <tr>
      <th>Sr #</th>
    <th> Student name </th>
    <th> ID </th>
   </tr>

<?php
$x = 1;
$sql = "select s.name as n, s.id as id from enrolment as e, student as s where e.course_id='$id' and e.student_id=s.id";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $x; ?></td>
    <td> <?php echo $row["n"]; ?> </td>
    <td> <?php echo $row["id"]; ?> </td>
</tr>

   <?php $x++; }   ?>
    </table>
   </div>

<?php } ?>

<?php  } else if (isset($_POST['cid']) && $_POST['mode']=="edit"){
$cid = $_POST['cid'];
$sql = "select * from course where id='$cid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="success_msg alert alert-success" style="display: none;">Updated Successfully</div>
<div class="error_msg alert alert-success" style="display: none;">Error</div>


<form id="updateform" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Edit Course</legend>
Title: <input type="text" id="title" name="title" value="<?php echo $row["name"]; ?>"> <br>
Field: <input type="text" id="field" name="field" value="<?php echo $row["field_"]; ?>"> <br>
Description: <input type="text" id="description" name="description" rows="5" cols="50" value="<?php echo $row["description"]; ?>"> </br>
Book Cover: <input type="file" id="bookcover" name="bookcover" value="<?php echo $row["book_cover"]; ?>"> <br><br>
<img width="200" height="200" src='<?php echo 'covers/'.$row["book_cover"];  ?>' >
<input type="hidden" name="oldimage" value="<?php echo $row["book_cover"]; ?>">
<input type="hidden" name="cid" value="<?php echo $_POST['cid'];?>">
<input type="submit" value="Save Changes" onclick=" return updatecourse()">

</fieldset>
</form>

<?php }
?>

</main>
</body>
<html>
