<?php  
$mysqli= @new mysqli("localhost", "root", "", "school_management_system_2021");
$query= "SELECT * FROM at_add_attendance";
$result= mysqli_query($mysqli,$query);
?>
<?php 
if(isset($_GET['status'])){
    if($_GET['status']=='delete'){
        $id= $_GET['id'];
        $deleteID= "delete from at_add_attendance where ID='$id'";
        $delSMS= $crud->delete($deleteID);
    } 
    if(isset($delSMS)){
        echo $delSMS; 
    }
}
 ?>
<!--== User Details ==-->
<div class="sb2-2-3">
    <div class="row">
        <div class="col-md-12">
            <div class="box-inn-sp">
                <div class="inn-title">
                    <h4>Attendence Details</h4>
                </div>
                <div class="tab-inn">
                    <div class="table-responsive table-desi">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Class</th>
                                    <th>Student Name</th>
                                    <th>Attend Status</th>
                                    <th>Teacher's Comment</th>
                                    <th>Student ID</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                        while($row= mysqli_fetch_assoc($result)){
                            $ID=$row['ID'];
                            $Class=$row['Class'];
                            $SName=$row['Student_Name'];
                            $Attendance_Status=$row['Attendance'];
                            $TComment=$row['Teachers_Comnt'];
                            $SID=$row['Student_Id'];      
                        ?>
                                <tr>
                                    <td><?php echo $ID ?></span> </td>
                                    <td><?php echo $Class ?> </td>
                                    <td><?php echo $SName ?></td>
                                    <td><?php echo $Attendance_Status ?></td>
                                    <td><?php echo $TComment ?></td>
                                    <td><?php echo $SID ?></td>

                                    <td>
                                        <a class="ad-st-view bg-info" href="ad-attendence-edit.php?status=edit&&id=<?php echo $ID; ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a onclick="confirm('Are you sure?')" href="?status=delete&&id=<?php echo $ID; ?>" class="ad-st-view bg-danger">Delete</a>
                                    </td>
                                
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>