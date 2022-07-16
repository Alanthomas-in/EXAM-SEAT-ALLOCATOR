<?php include ('inc_controlls.php');?> 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>homepage</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

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
            <style type="text/css">
                table{
                    background-color: #FFFFFF
                }
            </style>
            
<style type="text/css">
    .bg-info, .bg-info>a {
    color: #fff!important;
}
.bg-info {
    background-color: #17a2b8!important;
}
.small-box {
    border-radius: .25rem;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    display: block;
    margin-bottom: 20px;
    position: relative;
}

@media (min-width: 992px)
.col-lg-3 {
    -webkit-flex: 0 0 25%;
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
}
.col-6 {
    -webkit-flex: 0 0 50%;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 7.5px;
    padding-left: 7.5px;
}
.small-box>.inner {
    padding: 10px;
}

*, ::after, ::before {
    box-sizing: border-box;
}

div {
    display: block;
}
.bg-info, .bg-info>a {
    color: #fff!important;
}
.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.fad, .small-box .icon>i.fal, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: 15px;
    transition: -webkit-transform .3s linear;
    transition: transform .3s linear;
    transition: transform .3s linear,-webkit-transform .3s linear;
}
.small-box>.small-box-footer {
    background-color: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
}
.bg-info, .bg-info>a {
    color: #fff!important;
}
a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
}
*, ::after, ::before {
    box-sizing: border-box;
}

user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
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
        <?php if($_SESSION['user_type']=='ADMINISTRATOR'){
            $userHome = "home3.php";
        } else if($_SESSION['user_type']=='FACULTY'){
         } else if($_SESSION['user_type']=='Student'){
         }
            ?>
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