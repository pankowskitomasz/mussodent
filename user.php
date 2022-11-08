<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();   
}

include_once "php/comm.php";
include_once "php/db.php";
include_once "php/t_message.php";
include_once "php/t_user.php";

//to remove before pub
//include_once "php/support.php";
//createAdminAccount("password","admin@mussodent.com","9731");

//echo $_SESSION["viewTemplate"]."|".$_SESSION["view"];
//print_r($_POST);

if(isset($_POST["username"])
&& isset($_POST["userpass"])){
    DatabaseConnect();
    $usr = new TUser($GLOBALS['connection']);   
    $usr->getByName(htmlspecialchars($_POST["username"]));
    if($usr->getData("username")===htmlspecialchars($_POST['username'])
    && $usr->getData("password")===sha1(htmlspecialchars($_POST['userpass']))
    ){
        $_SESSION["UserLogged"] = $usr->getData("username");
    }
}

if(isset($_SESSION["UserLogged"])){
    //reading view config
    if(isset($_POST["login"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["dashboard"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["messages"])){
        $_SESSION["view"] = "messages";
    }
    if(isset($_POST["users"])){
        $_SESSION["view"] = "users";
    }
    if(isset($_POST["edituser"])){
        $_SESSION["view"] = "edituser";
    }
    if(isset($_POST["msginfo"])){
        $_SESSION["view"] = "msginfo";
    }
    if(isset($_POST["msgsearch"])){
        $_SESSION["view"] = "msgsearch";
    }
    if(isset($_POST["logout"])){
        $_SESSION["view"] = "logout";
    }
    
    //template selection and config
    if(isset($_SESSION["view"])){
        switch($_SESSION["view"]){
            case "messages":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "users":
                $_SESSION["viewTemplate"] = "templates/tmp_users.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "dashboard":
                $_SESSION["viewTemplate"] = "templates/tmp_dashboard.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "msginfo":
                $_SESSION["viewTemplate"] = "templates/tmp_message_info.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "msgsearch":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "edituser":
                $_SESSION["viewTemplate"] = "templates/tmp_edituser.php";
                break;
            default: 
                $_SESSION["viewTemplate"] = "templates/tmp_login.php";     
                $_SESSION = array();
                session_destroy(); 
        }
    }
}
else{
    $_SESSION["viewTemplate"] = "templates/tmp_login.php";
}

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
        <meta property="og:title" content="Musso Dental">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <meta property="og:locale" content="en_US">
        <link rel="icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <title>Musso Dental | User area </title>
    </head>
    <body class="font-text text-muted">
        <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom border-secondary shadow">
            <a href="index.html"
                class="navbar-brand mx-3 mx-md-3">
                <img src="img/logo.png"
                    alt="logo">
                <span class="d-none d-sm-inline font-logo m-2 text-green">Musso Dental</span>
            </a>
            <button class="navbar-toggler mx-3 mx-md-3"
                data-target="#main-nav"
                data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" 
                id="main-nav">
                <ul class="navbar-nav ml-auto font-menu">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link text-green">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link text-green">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="services.html" class="nav-link text-green">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link text-green">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="user.php" class="nav-link text-green">
                            <span class="fa fa-user-circle-o"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <section class="container-fluid user-s1 p-0 m-0 d-flex min-vh-100">
            <div class="text-center text-md-left w-100">
                <div class="row w-100 mx-0">
                    <?php if(isset($_SESSION["UserLogged"])){ ?>
                        <div class="col-12 font-menu w-100 mx-0 p-0">                    
                            <ul class="breadcrumb w-100">
                                <li class="breadcrumb-item">
                                    <?php if(isset($_SESSION["UserLogged"])){echo $_SESSION["UserLogged"];} ?>
                                </li>
                                <li class="breadcrumb-item">
                                    <?php if(isset($_SESSION["view"])){echo $_SESSION["view"];} ?>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                    <div class="col-12 font-menu w-100 mx-0 p-0 min-vh-50"> 
                        <?php
                            if(isset($_SESSION["viewTemplate"])){
                                include $_SESSION["viewTemplate"]; 
                            }
                            else{
                                include "templates/tmp_login.php";                            
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <footer class="container-fluid border-top border-secondary bg-light shadow-lg px-3 pt-2">
            <div class="row text-center text-md-left py-2">
                <div class="col-12 col-sm-6 col-md-4 pb-2">
                    <h4 class="font-weight-bold text-green h6"><small>Contact</small></h4>
                    <ul class="list-unstyled pl-3">
                        <li class="pb-2"><small>Tel.: 123 - 456 -678</small></li>
                        <li class="pb-2"><small>Fax: 123 - 456 -789</small></li>
                        <li><small>Email: musso&#64;mail.com</small></li>
                    </ul>                     
                </div>
                <div class="col-12  col-sm-6 col-md-4 pb-2">
                    <h4 class="font-weight-bold text-green h6"><small>Location</small></h4>
                    <ul class="list-unstyled pl-3">
                        <li class="pb-2"><small>Kate Musso, DDS</small></li>
                        <li class="pb-2"><small>1234 Pine Str.</small></li>
                        <li><small>Woodland, TX</small></li>
                    </ul>
                </div>
                <div class="col-12  col-sm-12 col-md-4 pb-2">
                    <h4 class="font-weight-bold text-green h6"><small>Hours</small></h4>
                    <div class="row">
                        <div class="col-6 col-md-4 text-right">
                            <ul class="list-unstyled">
                                <li><small>MON</small></li>
                                <li><small>TUE</small></li>
                                <li><small>WED</small></li>
                                <li><small>THU</small></li>
                                <li><small>FRI</small></li>
                                <li><small>SAT</small></li>
                                <li><small>SUN</small></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-8 border-left border-green text-left ">
                            <ul class="list-unstyled">
                                <li><small>7:00 <sub>AM</sub> - 5:00 <sub>PM</sub></small></li>
                                <li><small>7:00 <sub>AM</sub> - 5:00 <sub>PM</sub></small></li>
                                <li><small>7:00 <sub>AM</sub> - 5:00 <sub>PM</sub></small></li>
                                <li><small>7:00 <sub>AM</sub> - 5:00 <sub>PM</sub></small></li>
                                <li><small>7:00 <sub>AM</sub> - 2:00 <sub>PM</sub></small></li>
                                <li><small>CLOSED</small></li>
                                <li><small>CLOSED</small></li>
                            </ul>
                        </div>
                    </div>                        
                </div>
            </div>
            <div class="row mx-2 border-top border-secondary">
                <div class="col-12 col-md-6 order-0 order-md-1 text-center text-md-right">
                    <small class="text-shadow-light">  
                        <a href="privacy.html"
                            class="font-header text-green initialism">
                            Privacy &amp; Cookies
                        </a>
                    </small>  
                </div>
                <div class="col-12 col-md-6 order-1 order-md-0 text-center text-md-left">
                    <small class="w-100">
                        Copyright &copy; 2019-2021 Tomasz Pankowski
                    </small>
                </div>
            </div>
        </footer>
        <div class="modal" id="privacyModal">
            <div class="modal-dialog font-header">
                <div class="modal-content border-green p-2">
                    <div class="modal-header text-center">
                        <h4 class="font-header text-green font-weight-bold">GPDR Declaration</h4>
                        <a href="#privacyModal" 
                            data-target="#privacyModal"
                            data-dismiss="modal"
                            class="close text-green">
                            &times;
                        </a>
                    </div>
                    <div class="modal-body">
                        <p class="initialism">
                            This website is a <span class="text-danger"> demo version </span> of real website,  It doesn't collect and process,
                            in long term meaning (longer than needed for website operation during visitor's
                            presence), any user (visitor) data.
                        </p>
                        <p class="initialism pt-2">
                            All information collected during visitor's 
                            presence on this website is used only for technical purposes, required for 
                            correct operation of website or demonstration purposes related to technical 
                            mechanisms and presentation of its operation... 
                            <a href="privacy.html" class="text-green font-weight-bold">More about privacy</a>
                        </p>                        
                        <p class="initialism pt-2">
                            If you accept privacy policy please click button "accept". If you 
                            refuse it, leave page by closing it in your web browser, please.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-dark mx-auto"
                            onclick="acceptPrivacyPolicy()">
                            Accept
                        </button>
                    </div>
                </div>
            </div>
        </div>  
        <script src="js/main.min.js"></script>
    </body>
</html>