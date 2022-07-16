<?php include ('session.php');?>	
<?php include ('header.php');?>	
<body>
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
                      						
					  <strong style="color:#000 !important;padding:5px">Welcome : <?=$_SESSION['UserFullName']?></strong>
                    </a>
                  
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
         <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <!--/. NAV TOP  -->
                       <?php include ('nav_sidebar3.php');?>
                   </div>
                   <div class="col-md-10">
                    
                        <!-- /. NAV SIDE  -->
                        <div id="page-wrapper"  class="col-md-12">
                            <div id="page-inner">

                             <div class="row">
                                 <div class="col-md-8">
                                 <img src="img/KE2.jpg" width="100%" />
                                    </div>
                                    <div class="col-md-4">
                                   
                                       <div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <div class="alert alert-info"><center><h1><b>Vision</h1></b></center> <br><p align="justify"> A leading globally-competitive training center for professional teachers in elementary and secondary levels.</p>
                                   
                        </div>
                         <div class="alert alert-info"><center><h1><b>About</h1></b></center><br><p align="justify"> The College is named after our heavenly Patron, Saint Kuriakose Elias Chavara, the Co-founder of the Congregation of the Carmelites of Mary Immaculate(CMI), is our source of inspiration. His glorious vision of moulding a new generation through education deeply rooted in the faith in God and love of humanity is taken up by our institutions and we take pride in discharging this noble reponsibility. The congregation of the Carmelites of Mary Immaculate (CMI), one of the leading educational agencies in India.</p>
                                   
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
