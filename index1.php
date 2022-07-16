<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Exam Seat Allocator</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style>

a{
text-decoration:none;
font-size:20px;
}
a:hover{
background-color:black;
color:white;
}
#frm{
width:1350px;
background-color:white;
height:25px;

}

#frmm{

}
#myBtn{
margin-top:50px;
height:60px;
width:150px;
font-size: 14px;
font-weight: bold;

}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 300px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 30%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background:-webkit-linear-gradient(right, #ffb914,white);
    color: black;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background:-webkit-linear-gradient(right, #ffb914,white);
    color: black;
}

#mission p {
margin-left:20px;
text-align:justify;
}
#vision p {
margin-left:20px;
text-align:justify;
}
#mission{
float:left;
margin-top:20px;
position:inherit;
display:inline-block;
width:48%;
height:200px;
background-color:skyblue;
border:1px solid;
}
#vision{
float:right;
margin-top:20px;
width:48%;
height:200px;
position:inherit;
display: inline-block;
background-color:skyblue;
border:1px solid;
}
footer {
margin-top:300px;
}
.linka{
    font-size: 14px;
    font-weight: bold
}
a:hover {
  background-color: yellow;
}
</style>
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        kecollegemnm@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        0478 2817478
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid" style="background-color: #FFF !important">
               
                            <a href="index1.php">
                               <center> <img src="img/ea.png" alt="Logo" width="300"></center>
                            </a>
                      
            </div>
        </div>    
        
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-11">
                        
                    </div>
                   
                </div>
            </div>
        </div>
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="linka">Login</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">    
                        <div class="register-form">
                            <div class="row">
                                <div class="col-lg-8">  
                                    <img src="img/KE.jpg"/>
                                 </div>
                                  <div class="col-lg-4"> 
                                <div class="wrapper row3">
<div class="rounded" style="border: 2px double #036">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30" align="center"> 
    <h2 style="background-color: #CCC;color: #000">LOGIN</h2>
    <a href="index3.php" class="linka">ADMINISTRATOR/</a>
    <a href="index.php" class="linka">FACULTY/</a>
    <a href="index1.php" class="linka">STUDENT</a>
<center><button id="myBtn">Student Login</button></center>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width: 600px !important;">
    <div class="modal-header">
      
      <strong>Student Login</strong>
    </div>
    <div class="modal-body">
        <span class="close">&times;</span>
  <form action="#" method="POST" style="background-color:white;">
     <center>

    
    <input name="username"  placeholder="User Name" style="margin-left:15px;margin-bottom:10px;width:200px" required="" type="text">
<br/>
<input type="password" name="password" placeholder="Password"   style="width:200px" required=""/><br />

<input type="submit" name="go" value="Log In">

</center>
</form>
<?php
        include('connect.php');              
        if(isset($_POST['go'])){              
            $username=$_POST['username'];
            $password=$_POST['password'];
            $result1 = mysqli_query($link,"SELECT * FROM login_details WHERE email_id ='$username' AND password = '$password' and usr_type='student'") or die(mysqli_error($link));
            $row1 = mysqli_fetch_array($result1);
            $numberOfRows = mysqli_num_rows($result1); 
            $result = mysqli_query($link,"SELECT * FROM student WHERE email_id ='$username'") or die(mysqli_error($link));
            $row = mysqli_fetch_array($result);                                
            if ($numberOfRows == 0) {
                echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</center></font>";
            } else if ($numberOfRows > 0) {
                session_start();
                $_SESSION['id'] = $row['reg_no'];
                $_SESSION['user_type']="Student";
                $_SESSION['UserFullName']= $row1['fname'].' '.$row1['lname'];
                echo "<script language='javascript'>window.location.href='home1.php';</script>";
            }
        } ?>
    </div>
    <div class="modal-footer">
      <h4>EXAM SEAT ALLOCATOR v1.0</h4>
    </div>
  </div>
</div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}


</script>
</div></main>
</div>
  </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Login End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><a href="https://goo.gl/maps/6AuprQYrxFXrEi4v9" target="_blank"><i class="fa fa-map-marker"></i></a>KE College Mannanam</p>
                                <p><i class="fa fa-envelope"></i>kecollegemnm@gmail.com</p>
                                <p><i class="fa fa-phone"></i>0481-2597374</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href="https://kecollege.ac.in/" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/kecollege.mannanam/" target="_blank"><i class="fab fa-facebook-f"></i></a><!-- 
                                    <a href=""><i class="fab fa-linkedin-in"></i></a> -->
                                    <a href="https://www.instagram.com/entecollege/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/c/KuriakoseEliasCollegeMannanam" target="_blank"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!--  <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Pyament Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                
                <div class="row payment align-items-center">
                    
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
          <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        Copyright &copy; examseatallocator.com.  All Rights Reserved.
                    </div>

                    <div class="col-md-6 template-by">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->     
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>


        
    </body>
</html>
