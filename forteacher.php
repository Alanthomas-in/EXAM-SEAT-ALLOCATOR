<?php include ('session.php');?>	
<?php include ('header.php');?>	

    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#	">TEACHERS</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown"> 
                    <a  data-toggle="dropdown" href="#" aria-expanded="false">
                                            
                      <strong style="color:#000 !important;padding:5px">Welcome Admin</strong>
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
                        
                        <div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" >
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Teachers List</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>Department</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th width="300">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                                    $rowCnt=0;
                                    //echo "select * from teachers WHERE department='".$_REQUEST['department']."'";
                                    $query = mysqli_query($link,"select * from teachers WHERE department='".$_REQUEST['department']."'") or die(mysqli_error($link));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['teachid'];   
                                        //echo "select * from login_details WHERE email_id='".$row['email']."' AND usr_type='teacher'";
                                        $query1 = mysqli_query($link,"select * from login_details WHERE email_id='".$row['email']."' AND usr_type='teacher'") or die(mysqli_error($link));
                                        if($row1 = mysqli_fetch_array($query1)){    
                                        $rowCnt++;                
                                        ?>
                                        <tr class="warning">
                                            <td><?php echo $row1['fname']; ?></td> 
                                            <td><?php echo $row1['lname']; ?></td> 
                                            <td><?php echo $row['department']; ?></td> 
                                            <td><?php echo $row['email']; ?></td> 
                                            <td><?php echo $row1['contact']; ?></td> 

                                            <td width="160">
                                                <a href="#delete_teacher<?php echo $id; ?>" role="button"  data-target = "#delete_product<?php echo $id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                                <a href="edit_teacher.php<?php echo '?id=' . $id; ?>" class="btn btn-success" style="width:85px"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                                            </td>
                                            <!-- product delete modal -->
                                   <?php include ('delete_teacher_modal.php');?>
                                    <!-- end delete modal -->

                                    </tr>
                                <?php } }
                                if( $rowCnt==0) {?>
                                     <tr class="warning">
                                            <td colspan="8" align="center"><strong style="color: red">Teachers are not Available for the selected Department</strong>
                                            </td>
                                        </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                
                
                </div>
             <!-- /. PAGE INNER  -->
            </div>
                </div>   
                     
                     </div>
            </div>
        </div>
       
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
