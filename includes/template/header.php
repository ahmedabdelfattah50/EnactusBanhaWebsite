<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle?></title>
    <link rel="icon" href="images/enactus_icon.png">
    <link rel="stylesheet" href="<?php echo $cssPath?>bootrap_ltr_4.5.3.min.css">
    <link rel="stylesheet" href="<?php echo $cssPath?>all.css" />
    <link rel="stylesheet" href="<?php echo $cssPath?>fancyBox.min.css" />
    <link rel="stylesheet" href="<?php echo $cssPath?>slick.css" />
    <link rel="stylesheet" href="<?php echo $cssPath?>slick-theme.css" />
    <link rel="stylesheet" href="<?php echo $cssPath?>basics.css" />
    <link rel="stylesheet" href="<?php echo $cssPath?><?php echo $pageStyle; ?>"/>
</head>
<body>
    <!-- ============== Start Navbar =============== -->    
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/encatus_logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav col-12 d-flex justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($pageActive == "home") ? "active" : "" ?>" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($pageActive == "aboutUs") ? "active" : "" ?>" href="aboutUs.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($pageActive == "events") ? "active" : "" ?>" href="events.php">Events</a>
                        </li>
                        <li class="nav-item dropdown ourServicesDropDown">
                            <a class="nav-link dropdown-toggle <?php echo ($pageActive == "commtees") ? "active" : "" ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Commtees
                            </a>
                            <div class="dropdown-menu companyServicesMenu">
                                <a class="dropdown-item" href="commtee.php">IT</a>
                                <a class="dropdown-item" href="#">PM</a>                              
                                <a class="dropdown-item" href="#">Media</a>                              
                                <a class="dropdown-item" href="#">HR</a>                              
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($pageActive == "gallary") ? "active" : "" ?>" href="gallary.php">Gallary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($pageActive == "contact") ? "active" : "" ?>" href="contactUs.php">contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ============== End Navbar =============== -->