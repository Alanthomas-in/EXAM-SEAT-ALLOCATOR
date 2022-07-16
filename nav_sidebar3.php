<?php if($_SESSION['user_type']=='ADMINISTRATOR'){?>
                        <nav class="navbar bg-light" style="border: 1px double #036;border-style: double;">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="home3.php"><i class="fa fa-tachometer-alt"></i>Dashboards</a>
                                </li>
                                
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="teacher_department.php" ><i class="fa fa-user"></i>Teacher Management</a>
                                 <!--<div class="dropdown-menu" data-toggle="dropdown">
                                    <a class="nav-link" href="forteacher.php" ><i class="fa fa-plus-square"></i>Manage</a>
                                </div>-->
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="student_department.php" ><i class="fa fa-male"></i>Student Management</a>
                                 <!-- <div class="dropdown-menu" data-toggle="dropdown">
                                    <a class="nav-link" href="forstudent.php" ><i class="fa fa-plus-square"></i>Manage</a>
                                </div>-->
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="forroom.php" ><i class="fa fa-building"></i>Hall Management</a>
                                <!-- <div class="dropdown-menu" data-toggle="dropdown">
                                    <a class="nav-link" href="forroom.php" ><i class="fa fa-plus-square"></i>Manage</a>
                                </div>-->
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="forexam.php" ><i class="fa fa-book"></i>Exam Management</a>
                                 <!--<div class="dropdown-menu"data-toggle="dropdown">
                                    <a class="nav-link" href="forexam.php" ><i class="fa fa-eye"></i>Manage Exams</a>
                                </div>-->
                                    </div>
                                </li>
                               <!-- <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="forCYS.php" ><i class="fa fa-book"></i>Departments</a>
                                
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="forsubject.php" ><i class="fa fa-book"></i>Subject</a>
                                 <div class="dropdown-menu" data-toggle="dropdown">
                                    <a class="nav-link" href="forsubject.php" ><i class="fa fa-eye"></i>Manage</a>
                                </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="schoolyr.php" ><i class="fa fa-book"></i>Batch</a>
                               "nav-link" href="schoolyr.php" ><i class="fa fa-eye"></i>Manage</a>
                                </div>
                                    </div>
                                </li>-->
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="logout.php" ><i class="fa fa-book"></i>Logout</a>
                                    </div>
                                </li> 
                            </ul>
                        </nav>

       

<?php } else if($_SESSION['user_type']=='FACULTY'){?>

        <nav class="navbar bg-light" style="border: 1px double #036;border-style: double;">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php"><i class="fa fa-tachometer-alt"></i>Dashboards</a>
                                </li>                                
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="student_department.php" ><i class="fa fa-male"></i>Student Management</a>
                                 <!-- <div class="dropdown-menu">
                                    <a class="nav-link" href="forstudent.php" data-toggle="dropdown"><i class="fa fa-plus-square"></i>Manage</a>
                                </div> -->
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="forexam.php" ><i class="fa fa-book"></i>Exam Management</a>
                                 <!-- <div class="dropdown-menu">
                                    <a class="nav-link" href="forexam.php" data-toggle="dropdown" ><i class="fa fa-eye"></i>View Exams</a>
                                </div> -->
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="logout.php" ><i class="fa fa-book"></i>Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
<?php } else if($_SESSION['user_type']=='Student'){?>

      <nav class="navbar bg-light" style="border: 1px double #036;border-style: double;">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="home1.php"><i class="fa fa-tachometer-alt"></i>Dashboards</a>
                                </li>    
                                <li class="nav-item">
                                    <a class="nav-link" href="coedexam.php" ><i class="fa fa-book"></i>View Exams</a>
                                </li>                             

                                                               <!-- <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="#" data-toggle="dropdown"><i class="fa fa-book"></i>Results</a>
                                 <div class="dropdown-menu">
                                    <a class="nav-link" href="stud_results.php" ><i class="fa fa-eye"></i>View Results</a>
                                </div>
                                    </div>
                                </li> -->
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                    <a class="nav-link" href="logout.php" ><i class="fa fa-book"></i>Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
<?php } ?>

   <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>