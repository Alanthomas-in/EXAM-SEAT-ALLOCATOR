<?php include ('session.php');?>    
<?php include ('header.php');
include('connect.php');
$examid= $_REQUEST['examid'];
if(trim($examid)){
    //echo "delete examsched where examid='$examid'";
    mysqli_query($link,"delete from examsched where examid='$examid'") or die(mysqli_error($link));
}
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
                     <?php //if(!isset($_SESSION['teachid'])){?>      
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1">
                              Add Exam
                            </button><?php// }?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <!-- Reports:
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reports1" >
                             Class
                            </button>
                            
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#teacher1">
                             Teacher
                            </button>
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#room1">
                             Room
                            </button>
                             -->
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
                    <?php include ('modal_add_exam.php');?>
                    <?php //include ('modal_class2.php');?>
                            <?php //include ('modal_teacher2.php');?>
                            <?php //include ('modal_room2.php');?>
                    
                        <div class="hero-unit-table">   
                            <form action="" method="POST" id="frm1">
                            <table class="table table-striped table-bordered table-hover" >
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>Exam List</strong>

                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword" style="color: #FFF">Exam Type :</label>
                                    <div class="controls">
                                       <select type="text" name="exam_type" class = "form-control" placeholder="Category" onchange="document.getElementById('frm1').submit()">
                                          <option <?php if($_REQUEST['exam_type']=='') echo "selected";?> value="">All</option>
                                            <option <?php if($_REQUEST['exam_type']=='Internal Exam I') echo "selected";?>>Internal Exam I</option>
                                           <option <?php if($_REQUEST['exam_type']=='Internal Exam II') echo "selected";?>>Internal Exam II</option>
                                            <option <?php if($_REQUEST['exam_type']=='University Exam') echo "selected";?>>University Exam</option>
                                        </select>
                                    </div>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Exam Type</th>
                                        <th>Exam Date</th>
                                        <th>Exam Time</th>                                        
                                        <th>Department</th>                                        
                                        <th>Course Name</th>
                                        <th>Year</th>
                                        <th>Semester</th> 
                                        <th>Subject</th>
                                        <th>Hall Allocated</th>
                                        <th>Allocation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                                    $rowCnt =0;
                                    $hallArr =array();
                                    $query = mysqli_query($link,"select * from room") or die(mysqli_error($link));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $roomid = $row['roomid'];
                                        $room_name = $row['room_name'];
                                        $hallArr[$roomid] = $room_name;
                                    }
                                    $sql = "";
                                    if(trim($_REQUEST['exam_type'])){
                                        $sql = " AND exam_type='".$_REQUEST['exam_type']."'";
                                    }
                                    $tsql = "";
                                    if($_SESSION['user_type']=="FACULTY"){
                                        $psql = " fname='".$_SESSION['UserFullName']."'";
                                        //echo "select * from exam_room_teacher WHERE $psql";
                                        $query1 = mysqli_query($link,"select * from exam_room_teacher WHERE $psql") or die(mysqli_error($link));
                                        $row1 = mysqli_fetch_array($query1);
                                        $room_id = $row1['room_id'];
                                        $exam_date = $row1['exam_date'];
                                        $exam_time = $row1['exam_time'];
                                        $tsql = "  AND exam_date='".$exam_date."' AND exam_time='".$exam_time."'";
                                        //echo "select * from examsched WHERE 1=1 $sql $tsql";
                                    }

                                    $query = mysqli_query($link,"select * from examsched WHERE 1=1 $sql $tsql") or die(mysqli_error($link));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['examid'];
                                        $rowCnt++;?>
                                        <tr class="warning">
                                            <td><?php echo $row['exam_type']; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($row['exam_date'])); ?></td> 
                                            <td><?php echo $row['exam_time']; ?></td> 
                                            <td><?php echo $row['department']; ?></td> 
                                            <td><?php echo $row['course_name']; ?></td> 
                                            <td><?php echo $row['year_joined']; ?></td> 
                                            <td><?php echo $row['semester']; ?></td>
                                            <td><?php echo $row['subject_code']; ?></td>  
                                            <td><?php echo $hallArr[$row['room_id']]; ?></td> 
                                            <td><a href="javascript:void(0)" onclick="window.open('ai_exam_seats_allocated_disp.php?cDay=<?=$row['exam_date']?>&cTime=<?=$row['exam_time']?>&hall_id=<?=$row['room_id']?>&course_name=<?=$row['course_name']?>&examid=<?=$row['examid']?>','<?=$row['exam_date']?><?=$row['exam_time']?>','width=1000px,height=800px,scrolbars=yes')">View Seat Allocation</a></td>  
                                            <td><a href="forexam.php?examid=<?=$row['examid']?>" >Delete</a></td>
                                        </tr> 
                                <?php } 
                                if( $rowCnt==0) {?>
                                     <tr class="warning">
                                            <td colspan="8" align="center"><strong style="color: red">Exams Schedules are not available.</strong>
                                            </td>
                                        </tr>
                                <?php }?>
                                </tbody>
                            </table>
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
</body>
</html>
