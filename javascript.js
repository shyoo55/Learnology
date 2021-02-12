
function checksignup(){
  var a = document.getElementById("signform").FirstName.value;
    if (!isNaN(a)) {
      alert("Please Enter String First Name");
    return false;}
    var b = document.getElementById("signform").LastName.value;
      if (!isNaN(b)) {
        alert("Please Enter String Last Name");
      return false;}
      var c = document.getElementById("signform").email.value;

      if (! /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(c)){
	  alert("You have entered an invalid email address!")
    return (false)}
	alert("Added successfully");
	window.location.href="StudentHomePage.html";}
////////////////////////////////////////////////////////////////////////////
function checkcourse(){
  var a = document.getElementById("addcourseform").title.value;
    if (!isNaN(a)) {
      alert("Please Enter String Title");
    return false;}
    var b = document.getElementById("addcourseform").field.value;
      if (!isNaN(b)) {
        alert("Please Enter String Field");
      return false;}
      var c = document.getElementById("addcourseform").description.value;

        if (!isNaN(c) || c=="Description of the course") {
          alert("Please fill the description");
        return false;}
        alert("Added successfully");
    window.location.href="InstructorHomePage.html";}
////////////////////////////////////////////////////////////////////////////
function updatecourse(){
  var a = document.getElementById("updateform").title.value;
  var b = document.getElementById("updateform").field.value;
  var c = document.getElementById("updateform").description.value;

if (!isNaN(a)) {
alert("Please Enter String Title");
return false;}
else if (!isNaN(b)) {
alert("Please Enter String Field");
return false;}
else if (!isNaN(c) || c=="Description of the course") {
alert("Please fill the description");
return false;}
else{
// Create an FormData object
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
$("#update-btn").html('Save Changes');
$('#updateform input').attr('disabled', 'disabled');}
else{
$(".success_msg").fadeOut();
$(".error_msg").fadeIn();
$("#update-btn").html('Save Changes');}}});
return false;
}}

////////////////////////////////////////////////////////////////////////////
function dis(){
	  var x = document.getElementById("list");
	  if(x.style.display === "none")
		  x.style.display = "block";
	 else
		  x.style.display = "none";}
