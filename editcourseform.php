<?php
 session_start();
include 'connection.php';
if(!isset($_SESSION['id'])){
echo "<script> location.href='index.php';</script>";}
if (isset($_GET['cid']) && $_GET['mode']=="edit"){
$cid = $_GET['cid'];
$sql = "select * from course where id='$cid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<fieldset>
<legend>Edit Course</legend>
Title: <input type="text" name="title" id="title" value="<?php echo $row["name"]; ?>" required> <br>
Field: <input type="text" name="field" id="field" value="<?php echo $row["field_"]; ?>" required> <br>
Description: <input type="text" name="description" id="description" rows="5" cols="50" value="<?php echo $row["description"]; ?>"  required> </br>
Book Cover: <input type="file" id="bookcover" name="bookcover" value="<?php echo $row["book_cover"]; ?>"> <br><br>
<input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>">
<button type="submit" class="btn btn-primary" id="update-btn">Save Changes</button>
</fieldset>

<?php } ?>
