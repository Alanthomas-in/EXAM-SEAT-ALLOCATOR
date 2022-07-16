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
                <a class="navbar-brand" href="#	">ROOM / HALL</a>
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
                      <!-- /. NAV SIDE  -->
        <div class="modal" id="myModalSeatAlloc" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Exam Dates</center></strong></div>
                                        </div>
                                        <div class="modal-body" id="seat_alloc_div">

                                      
                                </div>
                                <div class = "modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick='$("#myModalSeatAlloc").hide(); '>Close</button>
                                           

                                </div>
                            </div>
                             </div>
                            </div>
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Add ROOM / HALL 
                            </button>
                            
                        
                        </h1>
                        <?php include ('modal_add_rooma.php');?>
                        
                        <div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;ROOM / HALL List</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>ROOM / HALL</th>
                                        <th>Block Name</th>
                                        <th>Row Count</th>
                                        <th>Column Count</th>
                                        <th>Total Seats</th>
                                        <th>Allocation</th>
                                        <th width="300">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                                    $rowCnt=0;
                                    $query = mysqli_query($link,"select * from room") or die(mysqli_error($link));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['roomid'];
                                        $rowCnt++;                                                                
                                        $query1 = mysqli_query($link,"SELECT *FROM room");?>
                                        <tr class="warning">
                                           <td><?php echo $row['room_name']; ?></td> 
                                           <td><?php echo $row['block_name']; ?></td> 
                                           <td><?php echo $row['row_count']; ?></td>
                                           <td><?php echo $row['col_count']; ?></td>  
                                           <td><?php echo $row['row_count']*$row['col_count']; ?></td>  
                                           <td><a href="javascript:void(0)" onclick="load_seat_based_on_date('<?=$row['roomid']?>')">Allocate a Teacher</a></td> 
                                            <td width="160">
                                                <a href="#delete_room<?php echo $id; ?>" role="button"  data-target = "#delete_product<?php echo $id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                                <a href="edit_room.php<?php echo '?id=' . $id; ?>" class="btn btn-success" style="width:85px"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                                            </td>
                                            <!-- product delete modal -->
                                   <?php include ('delete_room_modal.php');?>
                                    <!-- end delete modal -->
                                    </tr>
                                <?php } 
                                if( $rowCnt==0) {?>
                                     <tr class="warning">
                                            <td colspan="8" align="center"><strong style="color: red">Halls not available</strong>
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
