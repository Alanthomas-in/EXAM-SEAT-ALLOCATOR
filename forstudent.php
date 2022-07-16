<?php include ('session.php');?>	
<?php include ('header.php');?>	
<script type="text/javascript">
    function load_course(department){
        $.ajax({url: "ajx_class.php?department="+department, success: function(result){
            $("#div_class").html(result);
          }});
    }
    function search_by_course(department,course_name){
        window.location.href= 'forstudent.php?department='+department+'&course_name='+course_name;
    }
</script>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#	"><?php if($_SESSION['user_type']=='Student') echo "My Profile"; else echo 'Students';?></a>
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
                        
                        
                        <div class="hero-unit-table">  

                            <table class="table table-striped table-bordered table-hover">
                                <?php if($_SESSION['user_type']!='Student'){?>
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Students List</strong>
                                </div>
                                <label class="control-label" for="inputPassword" style="font-weight: bold;color: #fff">Course : </label><?php include ('ajx_class.php');?>
                                <?php }?>
                                <thead>
                                    <tr>
                                        <th>Registration No</th>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>Department</th>
                                        <th>Course</th>
                                        <th>Year</th>
                                        <th>Email</th>
                                        <th>Phone/Mobile</th>
                                        <th width="300">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($_REQUEST['course_name'])) $course_name  =  $_REQUEST['course_name'];
                                     include ('connect.php');
                                    $rowCnt =0;
                                    $sqlpart='';
                                    if($_SESSION['user_type']=='Student') $sql= "select * from student WHERE reg_no='".$_SESSION['id']."'";
                                    else {
                                        if(trim($course_name)) $sqlpart = " and course_name='".$course_name."'";
                                         $sql= "select * from student WHERE department='".$_REQUEST['department']."' $sqlpart";
                                    }
                                    
                                    $query = mysqli_query($link,$sql) or die(mysqli_error($link));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['reg_no'];
                                        
                                                                
                                       $query1 = mysqli_query($link,"select * from login_details WHERE email_id='".$row['email_id']."' AND usr_type='student'") or die(mysqli_error($link));
                                        if($row1 = mysqli_fetch_array($query1)){        
                                            $rowCnt++;
                                        ?>
                                        <tr class="warning">
                                            <td><?php echo $row['reg_no']; ?></td> 
                                            <td><?php echo $row1['fname']; ?></td> 
                                            <td><?php echo $row1['lname']; ?></td> 
                                            <td><?php echo $row['department']; ?></td> 
                                            <td><?php echo $row['course_name']; ?></td> 
                                            <td><?php echo $row['year_joined']; ?></td> 
                                            <td><?php echo $row['email_id']; ?></td> 
                                            <td><?php echo $row1['contact']; ?></td> 

                                            <td width="160">
                                                <?php if($_SESSION['user_type']!='Student'){?>
                                                <a href="#delete_teacher<?php echo $id; ?>" role="button"  data-target = "#delete_product<?php echo $id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                                <?php }?>
                                                <a href="edit_student.php<?php echo '?id=' . $id; ?>" class="btn btn-success" style="width:85px"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                                            </td>
                                            <!-- product delete modal -->
                                   <?php include ('delete_student_modal.php');?>
                                    <!-- end delete modal -->

                                    </tr>
                                <?php } }
                                if( $rowCnt==0) {?>
                                     <tr class="warning">
                                            <td colspan="8" align="center"><strong style="color: red">Students are not available for the selected Department</strong>
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
</body>
</html>
