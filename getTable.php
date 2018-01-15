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


$sql="SELECT ID,TASK,TASK_STATUS,DATE_FORMAT(DUE_DATE,'%Y-%m-%d')AS DUE_DATE FROM CSC4996.TO_DO_LIST";
$result=$conn->query($sql);

echo "<table>
<tr>
<th>Task</th>
<th>Task Status</th>
<th>Due Date</th>
<th>Delete</th>


</tr>";

while($row=$result->fetch_assoc())
{
    echo"
    <tr id=".$row['ID'].">
    <td>" .$row['TASK']."</td>
    <td>" .$row['TASK_STATUS']."</td>
    <td>" .$row['DUE_DATE']."</td>
    
    <td>
    <button type='button' value='delete' class='btn btn-primary btn-xs' onclick=deleteRow('".$row['ID']."')><span class='glyphicon glyphicon-trash'></span>
    </button>
    
    </td>
    
    </tr>
    ";
}
echo "</table>";
mysqli_close($conn);
?>