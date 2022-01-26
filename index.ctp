<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<?php
echo $this->Html->script('custom');
?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive12">
            <table id="tasks" class="display" width="100%" cellspacing="0">
                <thead>

                        <tr>
                            <th>id</th>
                            <th>task</th>
                            <th>added date</th>
                            <th>completed</th>
                            <th>project name</th>
                            <th>added by</th>
                            <th>sign completed</th>
                        </tr>
                </thead>

                    <?php foreach($tasks as $task):
                        if($task['Task']['completed'] == 1){
                            $completed = 'yes';
                            $show = false;

                        }else{
                            $completed = 'No';    
                            $show = true;
                        }   
                        ?>

                    <tr>
                        <td> <?php echo $task['Task']['id']; ?> </td>            
                        <td> <?php echo $task['Task']['task']; ?> </td>            
                        <td> <?php echo $task['Task']['added_date']; ?> </td>            
                        <td> <?php echo $completed; ?> </td>            
                        <td> <?php echo $task['Task']['project_name']; ?> </td>            
                        <td> <?php echo $task['Task']['full_name']; ?> </td>     
                        <td> <?php if($show): ?>

                            <form action="checkbox . php" method="post">    
                            <input type="checkbox" id="checkItem" name="check[]">
                            
                            </form>  
                        <?php endif; ?>
                        </td>       
                    
                    </tr>

                    <?php endforeach; ?> 


            </table>

<input type="submit" name="Submit" value="Submit">  

<script type="text/javascript">
$(document).ready(function() {
    $('#tasks').DataTable();
} );

</script>