<?php
$servername="localhost";
$username="root";
$password="winter2018";
$db="csc4996";



$conn=new mysqli($servername,$username,$password,$db);
if ($conn->connect_error)
{
    die("Connection Failed:". $conn->connect_error);
}
$task=$_POST['TASK'];
$task_status=$_POST['TASK_STATUS'];
$due_date=$_POST['DUE_DATE'];

$sql="INSERT INTO CSC4996.TO_DO_LIST (TASK,TASK_STATUS,DUE_DATE)VALUES('".$task."','".$task_status."',STR_TO_DATE('".$due_date."', '%Y-%m-%d'))";
$conn->query($sql);

mysqli_close($conn);
//print_r($_POST);
?>