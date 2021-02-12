<?php session_start();
session_destroy();
include 'connection.php';
echo "<script> location.href='index.php';</script>";
?>
