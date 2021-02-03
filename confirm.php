<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" 
        content="ie=edge">
    <link rel="icon" 
        href="img/favicon.png">
    <link rel="stylesheet"
        type="text/css"
        href="css/styles.min.css">
    <link rel="stylesheet"
        type="text/css"
        href="css/font-awesome.min.css">
    <title>Mussdent | Message sent</title>
</head>
<body class="font-text">
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
                    <li class="nav-item active">
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
    <section class="container confirm-s1 d-flex py-3 min-vh-100">
        <div class="my-auto w-100">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3 text-center">
                    <h3 class="text-center font-header text-secondary">Message sent!</h3>
                    <table class="table table-hover text-left font-menu bg-light opacity-8">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2" class="font-header">Summary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>First name</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['fname']))
                                        echo htmlspecialchars($_POST['fname']);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Last name</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['lname']))
                                        echo htmlspecialchars($_POST['lname']);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['fphone']))
                                        echo htmlspecialchars($_POST['fphone']);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['fmail']))
                                        echo htmlspecialchars($_POST['fmail']);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['fmsg']))
                                        echo htmlspecialchars($_POST['fmsg']);
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="contact.html" 
                        class="btn btn-outline-secondary font-header">OK</a>
                </div>
            </div>
        </div>
    </section>
        <footer class="container-fluid border-top border-secondary bg-light shadow-lg px-3 pt-2">
            <div class="row text-center text-md-left py-2">
                <div class="col-12 col-sm-6 col-md-4 pb-2">
                    <small>
                        <h4 class="font-weight-bold text-green h6">Contact</h4>
                        <ul class="list-unstyled pl-3">
                            <li class="pb-2">Tel.: 123 - 456 -678</li>
                            <li class="pb-2">Fax: 123 - 456 -789</li>
                            <li>Email: musso&#64;mail.com</li>
                        </ul> 
                    </small>                   
                </div>
                <div class="col-12  col-sm-6 col-md-4 pb-2">
                    <small>
                        <h4 class="font-weight-bold text-green h6">Location</h4>
                        <ul class="list-unstyled pl-3">
                            <li class="pb-2">Kate Musso, DDS</li>
                            <li class="pb-2">1234 Pine Str.</li>
                            <li>Woodland, TX</li>
                        </ul>
                    </small>
                </div>
                <div class="col-12  col-sm-12 col-md-4 pb-2">
                    <small>
                        <h4 class="font-weight-bold text-green h6">Hours</h4>
                        <div class="row">
                            <div class="col-6 col-md-4 text-right">
                                <ul class="list-unstyled">
                                    <li>MON</li>
                                    <li>TUE</li>
                                    <li>WED</li>
                                    <li>THU</li>
                                    <li>FRI</li>
                                    <li>SAT</li>
                                    <li>SUN</li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-8 border-left border-green text-left ">
                                <ul class="list-unstyled">
                                    <li>7:00 <sub>AM</sub> - 5:00 <sub>PM</sub></li>
                                    <li>7:00 <sub>AM</sub> - 5:00 <sub>PM</sub></li>
                                    <li>7:00 <sub>AM</sub> - 5:00 <sub>PM</sub></li>
                                    <li>7:00 <sub>AM</sub> - 5:00 <sub>PM</sub></li>
                                    <li>7:00 <sub>AM</sub> - 2:00 <sub>PM</sub></li>
                                    <li>CLOSED</li>
                                    <li>CLOSED</li>
                                </ul>
                            </div>
                        </div>    
                    </small>                
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
        <div class="modal-dialog text-menu font-menu">
            <div class="modal-content p-2">
                <div class="modal-header text-center">
                    <h4 class="font-logo text-muted">GPDR Declaration</h4>
                    <a href="#privacyModal" 
                        data-target="#privacyModal"
                        data-dismiss="modal"
                        class="close">
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
                        <a href="privacy.html" class="text-secondary">More about privacy</a>
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
    <script type="text/javascript" src="js/main.min.js"></script>
</body>
</html>