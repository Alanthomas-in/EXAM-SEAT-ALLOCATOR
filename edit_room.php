<?php include ('session.php');?>	
<?php
include('header.php');
include ('connect.php');
$get_id = $_GET['id'];
?>
<?php
if (isset($_POST['update'])) {

    $room_name = $_POST['room_name'];
    $block_name = $_POST['block_name'];
    
   $col_count = $_POST['col_count'];
 $row_count = $_POST['row_count'];
    mysqli_query($link,"update room set room_name='$room_name',block_name='$block_name',col_count='$col_count',row_count='$row_count' where roomid='$get_id'") or die(mysqli_query($link));
 echo "<script langauage='javascript'>alert('Hall details updated successfully');</script>";
}
?>
<style type="text/css">
    label{
        color: #FFF;
    }
</style>
<div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="# ">Exam Schedule</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                  <li class="dropdown"> 
                    <a data-toggle="dropdown" href="#" aria-expanded="false">
                                            
                      <strong style="color:#000 !important;padding:5px">Welcome <?php if(isset($_SESSION['UserFullName'])) echo $_SESSION['UserFullName']; else echo "Admin";?></strong>
                    </a>
                  
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!--/. NAV TOP  -->
                       <?php include ('nav_sidebar3.php');?>
                   </div>
                   <div class="col-md-9">
                         <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
        
                        </h1>
            <div class="modal" id="myModalSeatAlloc" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Edit Room</center></strong></div>
                                        </div>
                                        <div class="modal-body" id="seat_alloc_div">

                                      
                                </div>
                                <div class = "modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick='$("#myModalSeatAlloc").hide(); '>Close</button>
                                           

                                </div>
                            </div>
                             </div>
                            </div>
                    
                        <div class="hero-unit-table">   
                            <?php 
                            $query = mysqli_query($link,"select * from room where roomid='$get_id'") or die(mysqli_error($link));
                            $row = mysqli_fetch_array($query);
                            ?>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Edit Room</strong> </div>
                                <hr>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Room</label>
                                    <div class="controls">
                                        <input type="text" name="room_name" class ="form-control" value="<?php echo $row['room_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Block Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="block_name"  value="<?php echo $row['block_name']; ?>" required>
                                    </div>
                                </div>
                               <div class="control-group">
                                           <label class="control-label" for="inputEmail">Row Count :</label>
                                           <input type="text" name="row_count" class = "form-control"  value="<?php echo $row['row_count']; ?>" required  pattern="[0-9]+" title="Please enter Numbers only">
                                          
                                 </div>
                               <div class="control-group">
                                           <label class="control-label" for="inputEmail">Column Count :</label>
                                           <input type="text" name="col_count" class = "form-control" value="<?php echo $row['col_count']; ?>"  required  pattern="[0-9]+" title="Please enter Numbers only">
                                          
                                 </div>
                                
                                    <hr/>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <span><a href = "forroom.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> 
                
                
                </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
                </div>   
                     
                     </div>
            </div>
        </div>
       
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
   
