<?php include ('inc_controlls.php');?> 
<script type="text/javascript">
  function checkRegNo(reg_no){
      $.ajax({url: "ajx_chcek_reg_no.php?reg_no="+reg_no, success: function(result){
          $("#reg_div").html(result);
      }});
  }
  function checkEmail(email){
      $.ajax({url: "ajx_chcek_emai.php?email="+email, success: function(result){
          $("#email_div").html(result);
      }});
  }
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Student </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Register No</label>
                                    <div class="controls">
                                        <input type="text" name="reg_no" class ="form-control" value="" required pattern="[0-9]{11}" title="Please enter 11 Digits only" onblur="checkRegNo(this.value)"><div id="reg_div"></div>
                                    </div>
                                </div>   
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">First Name:</label>
                                           <input type="text" name="fname" class = "form-control" required   pattern="^[A-Za-z]+" title="Please enter Charactors only">
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Last Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="lname"  required   pattern="^[A-Za-z]+" title="Please enter Charactors only">
                                    </div>
                                </div>
                               <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">
                                        <select name="department" class = "form-control" required onchange="load_course(this.value)">
                                          <?php 
                                          include ('connect.php');

                                         foreach ($DEPARTMENT_ARR as $Department) {?>
                                                <option><?=$Department?></option>
                                          <?php }?>
                                        </select>
                                </div>
                                   </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Course </label>
                                    <div class="controls" id="div_class">
                                        <?php
                                        $department= 'Department of Commerce and Management';
                                        $course_det_arr = $COURSE_ARR[$department];?>
                                        <select id="sel_course" name="sel_course" class = "form-control" onchange="search_by_course('<?=$department?>',this.value)">
                                            <?php    
                                            foreach($course_det_arr as $course){?>
                                                <option ><?=$course?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                              <div class="control-group">
                                           <label class="control-label" for="inputEmail">Year Joined:</label>
                                           <input type="text" name="year_joined" class = "form-control"   required  pattern="[0-9]{4}" title="Please 4 digits only" >
                                          
                                 </div>
                                   <div class="control-group">
                                    <label class="control-label" for="inputPassword">Gender:</label>
                                    <div class="controls">
                                        <select name="gender" class = "form-control" required>
                                           <option>[Select]</option>
                                          <option>Male</option>
                                          <option>Female</option>
                                        </select>
                                        </div>
                                   </div>
                                     <div class="control-group">
                                    <label class="control-label" for="inputPassword">Date of Birth:</label>
                                    <div class="controls">
                                        <input type="date" name="dob"  class = "form-control" required>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Phone:</label>
                                    <div class="controls">
                                        <input type="text" name="phone" class = "form-control" required pattern="[0-9]{10}" title="Enter 10 digit mobile number">
                                </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="inputPassword" >Email</label>
                                    <div class="controls">
                                        <input type="email" name="email"  class = "form-control" required  onblur="checkEmail(this.value)"><div id="email_div"></div>
                                    </div>
                                </div>
                               
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="password" name="pwd" class = "form-control" required  pattern="[0-9A-Za-z]{6,}" title="Please enter atleast 6 letters or numbers">
                                    </div>
                                </div>
                               
								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									   <?php include ('connect.php');
                            if (isset($_POST['go'])) {

                                $fname=$_POST['fname'] ;
                				$lname= $_POST['lname'] ;					
                				$sel_course=addslashes($_POST['sel_course']) ;
                				$email=$_POST['email'] ;
                				$phone=$_POST['phone'];
                                $year_joined = $_POST['year_joined'];
                                $pwd = $_POST['pwd'];
                                $reg_no = $_POST['reg_no'];
                                $gender=$_POST['gender'] ;
                                $department=addslashes($_POST['department']);
                                $dob=$_POST['dob'];
                                $Flag=0;
                             mysqli_query($link,"insert into login_details(email_id, fname, password, lname, gender, dob, contact, usr_type) 
                              values ('$email','$fname','$pwd','$lname','$gender','$dob','$phone','student')
                                ") or die(mysqli_error($link)); 
                               if($Flag==0){
                                    mysqli_query($link,"INSERT INTO student(reg_no, email_id, course_name, year_joined, department)
                            	   values ('$reg_no','$email','$sel_course','$year_joined','$department')") or die(mysqli_error($link));
header('location:forstudent.php?department='.$department);
                                }
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>