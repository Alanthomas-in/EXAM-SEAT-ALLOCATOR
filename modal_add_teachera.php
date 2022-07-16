 <script type="text/javascript">
  function checkEmail(email){
      $.ajax({url: "ajx_chcek_teacher_emai.php?email="+email, success: function(result){
          $("#email_div").html(result);
      }});
  }
</script>
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Teacher </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">First Name:</label>
                                           <input type="text" name="fname" class = "form-control" required    pattern="^[A-Za-z]+" title="Please enter Charactors only">
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Last Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="lname" required  pattern="^[A-Za-z]+" title="Please enter Charactors only">
                                    </div>
                                </div>
                               
                               

                              
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">
                                        <select name="department" class = "form-control" required>
                                          <?php 
                                          include ('connect.php');

                                         foreach ($DEPARTMENT_ARR as $Department) {?>
                                                <option><?=$Department?></option>
                                          <?php }?>
                                        </select>
                                </div>
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
                                    <label class="control-label" for="inputPassword">Phone/Mobile:</label>
                                    <div class="controls">
                                        <input type="text" name="phone" class = "form-control" required   pattern="[0-9]{10}" title="Please enter 10 digit Numbers only">
                                </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email:</label>
                                    <div class="controls">
                                        <input type="email" name="email" class = "form-control" required  onblur="checkEmail(this.value)"><div id="email_div"></div>
                                </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="password" name="password" class = "form-control" required  pattern="[0-9A-Za-z]{6,}" title="Please enter atleast 6 letters or numbers">
                                    </div>
                                </div>
                               
								<div class = "modal-footer">
                                                                    <button name = "go" class="btn btn-primary" onclick="validate()">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									   <?php include ('connect.php');
                            if (isset($_POST['go'])) {

                              $fname=$_POST['fname'] ;
					$lname= $_POST['lname'] ;					
					$password=$_POST['password'] ;
					$gender=$_POST['gender'] ;
						$department=$_POST['department'];
            $email=$_POST['email'];
            $dob=$_POST['dob'];
            $phone=$_POST['phone'];
            
                                      if($fname=="")   
                                      {
                                          echo "<script language='javascript' type='text/javascript'>";
                                           echo "alert('First Name not be empty');";
                                            echo "</script>";
                                      }
                                      if($lname=="")   
                                      {
                                          echo "<script language='javascript' type='text/javascript'>";
                                           echo "alert('Last Name not be empty');";
                                            echo "</script>";
                                      }
                                    
                                      if($department=="")   
                                      {
                                          echo "<script language='javascript' type='text/javascript'>";
                                           echo "alert('Department not be empty');";
                                            echo "</script>";
                                      }
                                      if($gender=="[Select]")   
                                      {
                                          echo "<script language='javascript' type='text/javascript'>";
                                           echo "alert('Department not be empty');";
                                            echo "</script>";
                                      }
                                       if($dob=="")   
                                      {
                                          echo "<script language='javascript' type='text/javascript'>";
                                           echo "alert('Department not be empty');";
                                            echo "</script>";
                                      }
                                      if($email=="")   
                                      {
                                          echo "<script language='javascript' type='text/javascript'>";
                                           echo "alert('Email not be empty');";
                                            echo "</script>";
                                      }
                                      else
                                      {
                                        $Flag=0;
                                         mysqli_query($link,"insert into login_details(email_id, fname, password, lname, gender, dob, contact, usr_type) 
                              values ('$email','$fname','$password','$lname','$gender','$dob','$phone','teacher')
                                ") or die(mysqli_error($link)); 
                               if($Flag==0){
                                mysqli_query($link,"insert into teachers (teachid, fname, department, email)
                            	values ('','$fname $lname','$department','$email')
                                ") or die(mysqli_error($link));
                                header('location:forteacher.php?department='.$department);

                                } 
                            }
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>