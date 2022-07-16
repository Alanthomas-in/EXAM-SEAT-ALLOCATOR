<?php include ('session.php');?>	
<?php
include('header.php');
include ('connect.php');
$get_id = $_GET['id'];
?>
<style type="text/css">
    label{
        color: #FFF;
    }
</style>
<?php
                            if (isset($_POST['update'])) {

                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $department = $_POST['department'];
                                $gender = $_POST['gender'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                 $old_email = $_POST['old_email'];
                                  $dob = $_POST['dob'];
                                   $phone = $_POST['phone'];
                                
                               //login_details(email_id, fname, password, lname, gender, dob, contact, usr_type
                                //echo "update teachers set fname='$fname',lname='$lname',arank='$arank',designation='$designation',department='$department',email='$email',password='$password' where teachid='$get_id'";
                                mysqli_query($link,"update teachers set fname='$fname $lname',department='$department',email='$email' where teachid='$get_id'") or die(mysqli_query($link));
                                mysqli_query($link,"update login_details set fname='$fname',lname='$lname',gender='$gender',dob='$dob',email_id='$email',password='$password',contact='$phone' where email_id='$old_email'") or die(mysqli_query($link));
                                echo "<script langauage='javascript'>alert('Teacher details updated successfully');window.location.href='forteacher.php?department=$department';</script>";
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
                            $query = mysqli_query($link,"select * from teachers where teachid='$get_id'") or die(mysqli_error($link));
                            $row = mysqli_fetch_array($query);
                            $query1 = mysqli_query($link,"select * from login_details WHERE email_id='".$row['email']."' AND usr_type='teacher'") or die(mysqli_error($link));
                            if($row1 = mysqli_fetch_array($query1)){      
                            ?>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Edit Teacher</strong> </div>
                                <hr>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">FirstName</label>
                                    <div class="controls">
                                        <input type="text" name="fname" class ="form-control" value="<?php echo $row1['fname']; ?>"  required    pattern="^[A-Za-z]+" title="Please enter Charactors only">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LastName</label>
                                    <div class="controls">
                                        <input type="text"  name="lname"  class ="form-control" value="<?php echo $row1['lname']; ?>" required    pattern="^[A-Za-z]+" title="Please enter Charactors only">
                                    </div>
                                </div>                             
                                

                            

                                   <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">
                                        <select name="department" class = "form-control" required>
                                          <?php 
                                          include ('connect.php');

                                         foreach ($DEPARTMENT_ARR as $Department) {?>
                                                <option  <?php if($Department==$row['department']) echo " selected";?>><?=$Department?></option>
                                          <?php }?>
                                        </select>
                                </div>
                                   </div>
                                   <div class="control-group">
                                    <label class="control-label" for="inputPassword">Gender:</label>
                                    <div class="controls">
                                        <select name="gender" class = "form-control" required>
                                           <option>[Select]</option>
                                          <option  <?php if($row1['gender']=='Male') echo " selected";?>>Male</option>
                                          <option  <?php if($row1['gender']=='Female') echo " selected";?>>Female</option>
                                        </select>
                                        </div>
                                   </div>
                                     <div class="control-group">
                                    <label class="control-label" for="inputPassword">Date of Birth:</label>
                                    <div class="controls">
                                        <input type="date" name="dob"  class = "form-control" value="<?php echo $row1['dob']; ?>" required>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Phone/Mobile:</label>
                                    <div class="controls">
                                        <input type="text" name="phone" class = "form-control" value="<?php echo $row1['contact']; ?>" required  pattern="[0-9]{10}" title="Please enter 10 digit Numbers only">
                                </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email:</label>
                                    <div class="controls">
                                        <input type="email" name="email" class = "form-control" value="<?php echo $row['email']; ?>" required  >
                                        <input type="hidden" name="old_email" class = "form-control" value="<?php echo $row['email']; ?>">
                                </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="password" name="password" class = "form-control" value="<?php echo $row1['password']; ?>" required  pattern="[0-9A-Za-z]{6,}" title="Please enter atleast 6 letters or numbers">
                                    </div>
                                </div>
                               
                                
                                    <hr/>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <span><a href = "forteacher.php" class = "btn btn-danger"> Back</a></span>
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

