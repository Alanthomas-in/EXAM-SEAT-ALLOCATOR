<?php include ('session.php');?>	
<?php
include('header.php');
$get_id = $_GET['id'];
?>
<style type="text/css">
    label{
        color: #FFF;
    }
</style>
<script type="text/javascript">
    function load_course(department){
        $.ajax({url: "ajx_class.php?department="+department, success: function(result){
            $("#div_class").html(result);
          }});
    }
</script>

                <?php include ('connect.php');
                            if (isset($_POST['update'])) {

                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $department = $_POST['department'];
                                $email = $_POST['email'];
                                $phone =  $_POST['phone'];
                                $dob = $_POST['dob'];
                                $pwd =  $_POST['pwd'];
                                $reg_no = $_POST['reg_no'];
                                $gender = $_POST['gender'];
                                $old_email = $_POST['old_email'];
                                  $year_joined = $_POST['year_joined'];
                                $sel_course =  $_POST['sel_course']; 
                               mysqli_query($link,"update student set reg_no='$reg_no',email_id='$email', course_name='$sel_course', year_joined='$year_joined', department='$department' where reg_no='$get_id'") ;
                              // echo "update login_details set fname='$fname',lname='$lname',gender='$gender',dob='$dob',email_id='$email',password='$pwd',contact='$phone' where email_id='$old_email'";
                               mysqli_query($link,"update login_details set fname='$fname',lname='$lname',gender='$gender',dob='$dob',email_id='$email',password='$pwd',contact='$phone' where email_id='$old_email'") or die(mysqli_query($link));
                                echo "<script langauage='javascript'>alert('Student details updated successfully');window.location.href='forstudent.php?department=$department';</script>";
                            }
                            ?>
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
                           // echo "select * from student where student_id='$get_id'";
                            $query = mysqli_query($link,"select * from student where reg_no='$get_id'") or die(mysqli_error($link));
                            $row = mysqli_fetch_array($query);
                            $query1 = mysqli_query($link,"select * from login_details WHERE email_id='".$row['email_id']."' AND usr_type='student'") or die(mysqli_error($link));
                            if($row1 = mysqli_fetch_array($query1)){ 
                            ?>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Edit Student</strong> </div>
                                <hr>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Register No</label>
                                    <div class="controls">
                                        <input type="text" name="reg_no" class ="form-control" value="<?php echo $row['reg_no']; ?>"  pattern="[0-9]{11}" title="Please enter 11 Digits only">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">FirstName</label>
                                    <div class="controls">
                                        <input type="text" name="fname" class ="form-control" value="<?php echo $row1['fname']; ?>"  required pattern="^[A-Za-z]+" title="Please enter Charactors only">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LastName</label>
                                    <div class="controls">
                                        <input type="text"  name="lname"  class ="form-control" value="<?php echo $row1['lname']; ?>" required   pattern="^[A-Za-z]+" title="Please enter Charactors only">
                                    </div>
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">
                                        <select name="department" class = "form-control" required onchange="load_course(this.value)">
                                          <?php 
                                          include ('connect.php');

                                         foreach ($DEPARTMENT_ARR as $Department) {?>
                                                <option <?php if($row['department']==$Department) echo " selected";?>><?=$Department?></option>
                                          <?php }?>
                                        </select>
                                </div>
                                   </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Course </label>
                                    <div class="controls" id="div_class">
                                        <?php 
                                        $course_det_arr = $COURSE_ARR[$row['department']];?> 
                                        <select id="sel_course" name="sel_course" class = "form-control" required>
                                            <option value="">[Select]</option>
                                            <?php    
                                            foreach($course_det_arr as $course){?>
                                                <option <?php if($row['course_name']==$course) echo " selected";?>><?=$course?></option>
                                            <?php } ?>
                                        </select>
                                           
                                    </div>
                                </div>
                              <div class="control-group">
                                           <label class="control-label" for="inputEmail">Year Joined:</label>
                                           <input type="text" name="year_joined" class = "form-control"   value="<?php echo $row['year_joined']; ?>"  required   pattern="[0-9]{4}" title="Please 4 digits only" title="Please enter Numbers only">
                                          
                                 </div>
                                   <div class="control-group">
                                    <label class="control-label" for="inputPassword">Gender:</label>
                                    <div class="controls">
                                        <select name="gender" class = "form-control" required>
                                           <option>[Select]</option>
                                          <option <?php if($row1['gender']=='Male') echo " selected";?>>Male</option>
                                          <option <?php if($row1['gender']=='Female') echo " selected";?>>Female</option>
                                        </select>
                                        </div>
                                   </div>
                                     <div class="control-group">
                                    <label class="control-label" for="inputPassword">Date of Birth:</label>
                                    <div class="controls">
                                        <input type="date" name="dob"  class = "form-control" required  value="<?php echo $row1['dob']; ?>">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Phone:</label>
                                    <div class="controls">
                                        <input type="text" name="phone" class = "form-control" required  pattern="[0-9]{10}" title="Please enter 10 digit Numbers only"  value="<?php echo $row1['contact']; ?>">
                                </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email</label>
                                    <div class="controls">
                                        <input type="email" name="email"  class = "form-control" value="<?php echo $row['email_id']; ?>" required>
                                        <input type="hidden" name="old_email"  class = "form-control" value="<?php echo $row['email_id']; ?>">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="password" name="pwd" class = "form-control" value="<?php echo $row1['password']; ?>" required  pattern="[0-9A-Za-z]{6,}" title="Please enter atleast 6 letters or numbers"> 
                                    </div>
                                </div>
                               
                                
                                    <hr/>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <span><a href = "forstudent.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                            <?php }?>


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
