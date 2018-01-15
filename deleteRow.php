<?php
$servername="Localhost";
$username="root";
$password="winter2018";
$db="csc4996";


$conn=new mysqli($servername,$username,$password,$db);
if ($conn->connect_error)
{
    die("Connection Failed:". $conn->connect_error);
}

$id=$_POST['ID'];


$sql="DELETE FROM CSC4996.TO_DO_LIST WHERE ID='{$id}'";
$conn->query($sql);

mysqli_close($conn);



?>