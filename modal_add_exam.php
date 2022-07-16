 <?php include ('connect.php');
if ($_POST['go']=='Save') {

    $exam_type=$_POST['exam_type'] ;
    $exam_date= $_POST['exam_date'] ;					
    $exam_time=$_POST['exam_time'] ;
    $department=$_POST['department'] ;
    $sel_course=$_POST['sel_course'] ;
    $sel_subject=$_POST['sel_subject'] ;
    $room_name=$_POST['room_name'] ;
    $semester=$_POST['semester'] ;   
    $year_joined=$_POST['year_joined'] ;   

//echo "insert into examsched( exam_type, exam_date, exam_time, subject_code, semester, department, course_name,room_id, status) 
 // values ('$exam_type','$exam_date','$exam_time','$sel_subject','$semester','$department','$sel_course','$room_name','active'
  //  ";
    mysqli_query($link,"insert into examsched( exam_type, exam_date, exam_time, subject_code, semester, department, course_name,room_id, year_joined) 
	 values ('$exam_type','$exam_date','$exam_time','$sel_subject','$semester','$department','$sel_course','$room_name','$year_joined')
    ") or show_error_dialog(mysqli_error($link));
    //header('location:exam.php');
}
function show_error_dialog($message){
   if(startsWith($message,"Duplicate entry")){
      echo "<script language='javascript'>alert('You are trying to enter exam details that are already added'); window.location.href='forexam.php';</script>";
   }

}
function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

?>

									 <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Exam </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" id="frm_exam" action="">
                                
                                <hr>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Exam Type :</label>
                                    <div class="controls">
                                       <select type="text" name="exam_type" class = "form-control" placeholder="Category" required>
                                          <option value="">--Select--</option>
                                      		<option>Internal Exam I</option>
                                          <option>Internal Exam II</option>
                                      		<option>University Exam</option>
                                        </select>
                                    </div>
                                </div>
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Exam Date :</label>
                                           <input type="date" name="exam_date" class = "form-control" placeholder="Category" required>
		
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Exam Time :</label>
                                    <div class="controls">
                                       	<input type="time" name="exam_time" class = "form-control" placeholder="Category"required >
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
                                    <label class="control-label" for="inputPassword">Subject:</label>
                                    <div class="controls" id="div_subject">
									                   <select name="sel_subject"  class = "form-control" required>
                                      <option>English I</option>
                                      <option>Additional Languag I</option>
                                      <option>Methodology and Perspectives of Business Education</option>
                                      <option>Functional Application of Management</option>
                                      <option>Managerial Economics</option>
                                      <option>English II</option>
                                      <option>Additional Language II</option>
                                      <option>Informatics and Cyber Laws</option>
                                      <option>Business Communication And Office Management</option>
                                      <option>Financial Accounting</option> 
                                      <option>Business Regulatory Framework</option>
                                      <option>English III</option>
                                      <option>Entrepreneurship Development</option>
                                      <option>Company Administration</option>
                                      <option>Advanced Financial Accounting</option>
                                      <option>Information Technology in Business</option>
                                      <option>Course from Elective Stream</option>
                                      <option>English IV</option>
                                      <option>Capital Market</option>
                                      <option>Banking Theory and Practice</option>
                                      <option>Corporate Accounting</option>
                                      <option>Business Statistics</option>
                                      <option>Course from Elective Stream</option>
                                      <option>Fundamentals of Income Tax</option>
                                      <option>Cost Accounting</option>
                                      <option>Accounting for Specialized Institutions</option>
                                      <option>Open Course</option>
                                      <option>Course from Elective Stream</option>
                                      <option>Project</option>
                                      <option>Auditing</option>
                                      <option>Applied Costing</option>
                                      <option>Management Accounting</option>
                                      <option>Open Course</option>
                                      <option>Course from Elective Stream</option>
                                      <option>Project</option>
                                    </select>
                                    </div>
                                </div>
								
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Room:</label>
                                    <div class="controls">
									<select  name="room_name"  id="room_name" class = "form-control" placeholder="Category" required >
                                        <option value="">--Select--</option>
	<?php $room_query=mysqli_query($link,"select * from room ")or die(mysqli_error($link));
while($room_row=mysqli_fetch_array($room_query)){
	?>
	<option value="<?=$room_row['roomid']?>"><?php echo $room_row['room_name']; ?></option>
	<?php } ?>
	</select>
                                    </div>
                                </div>				
								
								
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Semester:</label>
                                    <div class="controls">
									<select name="semester" id="semester" class = "form-control" placeholder="Category" required >
                    <option value="">--Select--</option>
                                      <option>1ST</option>
									 <option>2ND</option>
                                                                         <option>3RD</option>
                                                                         <option>4TH</option>
                                                                         <option>5TH</option>
                                                                         <option>6TH</option>
	</select>
                                    </div>
                                </div>
								

                              
								<div class = "modal-footer">
                  <input type="hidden" name="hid_save" id="hid_save"  >
											 <input type="submit" name = "go" class="btn btn-primary"  value="Save"/>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							 </form> 
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  
									  
									   
									  
									  
									  
                                </div>
                            </div>
                            <script type="text/javascript">
                              function validate_exam(){
                                  if(document.getElementById('room_name').value=='--Select--'){
                                      alert("Please select Room/Hall");
                                      return false;
                                  } else if(document.getElementById('semester').value=='--Select--'){
                                      alert("Please select Semester");
                                      return false;
                                  } else {
                                      document.getElementById('hid_save').value='Save';
                                      document.getElementById('frm_exam').submit();
                                  }
                                 
                              }
                            </script>