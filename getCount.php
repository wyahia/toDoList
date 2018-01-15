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



$sql="SELECT COUNT(*) AS TOTAL_TASKS FROM CSC4996.TO_DO_LIST";
$result=$conn->query($sql);

while($row=$result->fetch_assoc())
{
    echo "Total number of tasks: ".$row['TOTAL_TASKS']." <br>";
}

echo"<br>";

$sqlTwo="SELECT count(*) as NUM_OF_TASKS,TASK_STATUS FROM CSC4996.TO_DO_LIST
group by task_status";
$resultTwo=$conn->query($sqlTwo);


while($row=$resultTwo->fetch_assoc())
{
    echo " ".$row['NUM_OF_TASKS']." ".$row['TASK_STATUS']." <br>";
}

mysqli_close($conn);
?>