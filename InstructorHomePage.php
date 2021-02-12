<?php session_start();
include 'connection.php';
if(!isset($_SESSION['id'])){
echo "<script> location.href=' InstructorLog-in.php';</script>";}
else{
if($_SESSION['type'] != "instructor"){
echo "<script> location.href='StudentHomePage.php';</script>";}}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<title> Instructor home page </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="javascript.js"></script>
<link rel="stylesheet" href="style.php">
<style type="text/css">
.error{
color: red;}
</style>
<script type="text/javascript">
$(function(){
$(document).on('click', '.showdata', function(e) {
var id = $(this).attr('data-id');
$("#tbody"+id).html('');
$.ajax({
url: 'getcourse_students.php?cid='+id+'&mode=view',
type: 'GET',
dataType: 'xml',
success:function(res){

var z = res.getElementsByTagName("student");
var row_res = "";
for (var k = 0; k < z.length; k++) {
var x = z[k].childNodes;
row_res += "<tr>";
for (var i = 0; i < x.length; i++) {
var y = x[i];
if (y.nodeType == 1) {
row_res += "<td>"+y.firstChild.nodeValue+"</td>"}}
row_res += "</tr>";}
if(row_res == ""){
row_res += "<tr><td colspan='2'>No Student Enrolled</td></tr>";}
$("#tbody"+id).append(row_res);
$("#demo"+id).slideToggle('slow');}})
})


$( "#updateform" ).validate( {
rules: {
title: "required",
field: "required",
description: "required",
bookcover: "required",},
messages: {
title: "Please enter title",
field: "enter field",
description: "Enter Description",
bookcover: "Select File",},
submitHandler: updatepro,
errorElement: "em",
errorPlacement: function ( error, element ) {
error.addClass( "help-block" );

element.parents( ".form-group" ).addClass( "has-feedback" );

if ( element.prop( "type" ) === "checkbox" ) {
error.insertAfter(element.parent( "label" ) );}
else {
error.insertAfter( element );}

if ( !element.next( "span" )[ 0 ] ) {
$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );}},
success: function ( label, element ) {
// Add the span element, if doesn't exists, and apply the icon classes to it.
if ( !$( element ).next( "span" )[ 0 ] ) {
$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );}},
highlight: function ( element, errorClass, validClass ) {
$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );},
unhighlight: function ( element, errorClass, validClass ) {
$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );}});

function updatepro(){
var formData = $("#updateform").submit(function (e) {
return;});
var formData = new FormData(formData[0]);

$.ajax({
type : 'POST',
url  : 'editcourse.php',
data : formData,
processData: false,
contentType: false,
beforeSend: function(){
$("#error_register").fadeOut();
$("#update-btn").html('&nbsp; Updating ...');},
success :  function(response){
if(response == "ok"){
$(".success_msg").fadeIn();
$(".error_msg").fadeOut();
$("#update-btn").html('Save Changes');}
else{
$(".success_msg").fadeOut();
$(".error_msg").fadeIn();
$("#update-btn").html('Save Changes');}}});
return false;}})

function editpro(cid,edit) {
$('#print').load('editcourseform.php?cid='+cid+"&mode="+edit,function(){
$(".success_msg").fadeOut();
$(".error_msg").fadeOut();
$('#myModal').modal({show:true});});
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
      <li><a href ="addNewCourse.php" >Add Course</a></li>
      <li><a id="out" href="logout.php"> Log Out</a></li>
      </ul>
      </nav>
      </div>
</header>

<?php
	 if(isset($_SESSION['id'])){
$uid = $_SESSION['id'];
$sql = "select * from instructor where id='$uid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);}
	?>

<main>
	 <form>
	   <p class="info">Name: <?php echo $row["name"]; ?></p>
	   <p class="info">Email: <?php echo $row["email"]; ?></p>
	   <p class="info">Speciality: <?php echo $row["speciality"]; ?></p>
	  </form>
	  <br><a href="addNewCourse.php">+ Add Course</a>
<br><br>
<table style="width: 100%;">
<tr>
<th> Course </th>
</tr>

<?php
if(isset($_SESSION['id'])){
$id = $_SESSION['id'];
$sql = "select * from course where instructor_id='$id'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
?>

<tr>
	   <td><a href="courseInfo.php?cid=<?php echo $row["id"]; ?>&mode=view"> <?php echo $row["name"]; ?></a></td>
	   <td><a  href="javascript:void(0)" data-id="<?php echo $row["id"]; ?>" class="showdata" data-toggle="collapse"> Display Students list </a></td>

		<form action="courseInfo.php" method="post">
		<input type="hidden" name="cid" value=<?php echo $row["id"];?>>
		<input type="hidden" name="mode" value="edit">
<td><button type="submit">Edit</button></td>
</form>
</tr>

<tr id="demo<?php echo $row["id"]; ?>" style="display: none;">

<td colspan="3">
<table style="width: 100%">
<thead>
<tr>
<th>Student Name</th>
<th>Student ID</th>
</tr>
</thead>
<tbody id="tbody<?php echo $row["id"]; ?>">
</tbody>
</table>
</td>
</tr>

	   <?php }   }?>
	  </table>

	 </main>
	</body>
  </html>
