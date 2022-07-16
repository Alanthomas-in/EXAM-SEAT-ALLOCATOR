  <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
     <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <script type="text/javascript">
      function load_seat_allocation(hall_id){
         $("#myModalSeatAlloc").show(); 
         $.ajax({url: "ai_exam_seats_allocated.php?hall_id="+hall_id, success: function(result){
          $("#seat_alloc_div").html(result);
        }});
      }
       function load_seat_based_on_date(hall_id){
         $("#myModalSeatAlloc").show(); 
         $.ajax({url: "ai_seat_based_on_date.php?hall_id="+hall_id, success: function(result){
          $("#seat_alloc_div").html(result);
        }});
      }
      function update_teacher(hall_id,cDay,cTime,fname){
          $.ajax({url: "ai_update_teacher.php?hall_id="+hall_id+"&cDay="+cDay+"&cTime="+cTime+"&fname="+fname, success: function(result){
          //$("#seat_alloc_div").html(result);
        }});
      }
      function update_attendance_marks(stud_id,subject_code){
        var attendance =0;
        if(document.getElementById('chk_stud_'+stud_id).checked==true){
           attendance =1;
        }
        txt_marks = document.getElementById('txt_marks_'+stud_id).value;

        $.ajax({url: "ai_update_atten_marks.php?stud_id="+stud_id+"&subject_code="+subject_code+"&txt_marks="+txt_marks+"&attendance="+attendance, success: function(result){
          //$("#seat_alloc_div").html(result);
        }});
      }

    </script>