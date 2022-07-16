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
                <a class="navbar-brand" href="#	">HOME</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              <li class="dropdown"> 
                    <a  data-toggle="dropdown" href="#" aria-expanded="false">
                                  
            <strong style="color:#000 !important;padding:5px">Welcome Admin</strong>
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
                   <div class="col-md-8">
                    <h3 style="color: #FFF">Departments</h3><br><br>
                        <!-- /. NAV SIDE  -->
                        <h1 class="page-header" style="text-align: LEFT;">
                           
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Add Teacher
                            </button>
                            
                        
                        </h1>
                        <?php include ('modal_add_teachera.php');?>
                        
                        <div id="page-wrapper"  class="col-md-12">
                          <div class="row">
                                            <?php 
                                          include ('connect.php');

                                         foreach ($DEPARTMENT_ARR as $Department) {?>
                                            <div class="col-lg-5 col-5">
                                                <!-- small box -->
                                                <div class="small-box bg-info">
                                                  <table  width="280">
                                                    <TR bgcolor="#17a2b8">
                                                      <td><div class="icon" >
                                                    <i class="ion ion-bag"></i>
                                                  </div></td>
                                                      <td><div class="inner">
                                                    <p style="height:120px;padding:20px"><?=$Department?></p>
                                                  </div></td>
                                                    </TR>
                                                  </table>
                                                  
                                                  
                                                  <a href="forteacher.php?department=<?=$Department?>" class="small-box-footer">View Teachers <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                              </div>
                                              <!-- ./col -->
                                                <option></option>
                                          <?php }?>
                                              
                	
                            </div>
                            </div>
                         <!-- /. PAGE WRAPPER  -->
                </div>
                </div>   
                     
                     </div>
            </div>
        </div>
        <!-- Main Slider End -->  
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
