<!DOCTYPE html>
<html lang="en">
    <head>
        <title>To Do List</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>To Do List</h1>
         <div class="container">
            <button class="btn btn-primary btn-sm" id="showForm" >Add Task</button>
             <button class="btn btn-primary btn-sm" id="showInfo">Show Info</button>
             <div class="container" id="myInfo">
                
             </div>
            <div class="row" id="myForm">
                <div class="col-sm-6">
                    <form class="">
                        <div class="form-group">
                            <label for="task">Task:</label>
                            <input type="text" class="form-control" id="task">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status">
                                <option value=""></option>
                                <option value="Pending">Pending</option>
                                <option value="Started">Started</option>
                                <option value="Completed">Completed</option>
                                <option value="Late">Late</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dueDate">Due Date:</label>
                            <div class="input-group date" id="dueDate">
                                <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" id="submit" type="button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <br><br/>
                <table class="table table-striped" id="showList">
                   <tbody>

                    </tbody>
                </table>
        </div>
    </body>
    
    <script>
    $(document).ready(function(){
        
          
    $('#dueDate').datepicker({
        "autoclose":true,
        "changeMonth":true,
        "changeYear":true,
        "format":'yyyy-mm-dd'
    });
    
    $("#showForm").click(function(){
        $("#myForm").toggle();
        
    }); 
    
    $("#showInfo").click(function(){
        $("#myInfo").toggle();
    });

        
    getTable();
    getInfo();
        
    });

         function getTable(){
        $.get("getTable.php", function(data){
            $("#showList").html(data);
        });
    }
        
        function getInfo(){
            $.get("getCount.php",function(data){
                getInfo();
                $("#myInfo").html(data);
            });
        }
        
        $("#submit").click(function(){
            alert($("#dueDate").val());
            $.ajax({
                url:"getInfo.php",
                method:"POST",
                data:{
                   TASK:$("#task").val(),
                   TASK_STATUS:$("#status").val(),
                    DUE_DATE:$("#dueDate").val()
                },
                success:function(data){
                getTable();
                $("#myForm").hide();
            }
                
            });
        
        });
        
        
        
        function deleteRow(id)
        {
            var confirmDelete=confirm("Delete this task?");
            if(confirmDelete==true)
                {
            $.ajax({
                url:"deleteRow.php",
                method:"POST",
                data:{ID:id},
            
                success:function(data)
                {
                    getTable();
                    
                }
            });
        }
        }
    
    </script>
    







</html>