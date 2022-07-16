<?php include ('session.php');?>    
<?php include ('header.php');
include('connect.php');
$result = mysqli_query($link,"SELECT * FROM student WHERE reg_no ='".$_SESSION['id']."'") or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
$department = $row['department'];
$course_name = $row['course_name'];
?>   
<script type="text/javascript">
    function load_course(department){
        $.ajax({url: "ajx_class.php?department="+department, success: function(result){
            $("#div_class").html(result);
          }});
    }
     function search_by_course(department,course_name){
        $.ajax({url: "ajx_subject.php?course_name="+course_name, success: function(result){
            $("#div_subject").html(result);
          }});
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
                <a class="navbar-brand" href="# ">Exam Schedule</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown"> 
                    <a data-toggle="dropdown" href="#" aria-expanded="false">
                                            
                      <strong style="color:#000 !important;padding:5px">Welcome <?=$_SESSION['UserFullName']?></strong>
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
                                          
                                            <div class="alert alert-info"><strong><center>Seat Allocation</center></strong></div>
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
                            <table class="table table-striped table-bordered table-hover" >
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>Exam List</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Exam Type</th>
                                        <th>Exam Date</th>
                                        <th>Exam Time</th>                                        
                                        <th>Department</th>                                        
                                        <th>Course Name</th>
                                        <th>Semester</th> 
                                        <th>Subject</th>
                                        <th>Hall Allocated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                                     $hallArr =array();
                                    $query = mysqli_query($link,"select * from room") or die(mysqli_error($link));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $roomid = $row['roomid'];
                                        $room_name = $row['room_name'];
                                        $hallArr[$roomid] = $room_name;
                                    }
                                    
                                    $query = mysqli_query($link,"select * from examsched where department='".$department."' AND course_name='".$course_name."'") or die(mysqli_error($link));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['examid'];
                                        
                                      ECHO $ssql = "select * from allot_student  WHERE exam_id='".$id."' AND reg_no='".$_SESSION['id']."' ";
                                        $query11 = mysqli_query($link,$ssql) or die(mysqli_error($link));
                                        if($row11  = mysqli_fetch_array($query11)) {
                                            $room_id = $row11['room_id'];
                                        }
                                       
                                        ?>
                                        <tr class="warning">
                                            <td><?php echo $row['exam_type']; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($row['exam_date'])); ?></td> 
                                            <td><?php echo $row['exam_time']; ?></td> 
                                            <td><?php echo $row['department']; ?></td> 
                                            <td><?php echo $row['course_name']; ?></td> 
                                            <td><?php echo $row['semester']; ?></td>
                                            <td><?php echo $row['subject_code']; ?></td>  
                                            <td><?php echo $hallArr[$row['room_id']]; ?></td> 
                                            <td><a href="javascript:void(0)" onclick="window.open('ai_exam_seats_allocated_disp.php?cDay=<?=$row['exam_date']?>&cTime=<?=$row['exam_time']?>&hall_id=<?=$room_id?>&course_name=<?=$row['course_name']?>&display=yes','<?=$row['exam_date']?><?=$row['exam_time']?>','width=1000px,height=800px,scrolbars=yes')">View Seat Allocation</a></td>  
                                      
                                <?php } ?>
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
