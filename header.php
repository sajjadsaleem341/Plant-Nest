<?php
require "config.php";
require "functions.php";
require "add_cart_func.php";

// $active = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);

$sql = "select * from categories";
$res = mysqli_query($con,$sql);
$cat_arr=array();
while($row=mysqli_fetch_assoc($res)){
    $cat_arr[]=$row;
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Alazea - Gardening &amp; Landscaping HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <link rel="stylesheet" href="izitoast/css/iziToast.min.css">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/form.css">

</head>

<body>
    <button hidden id="message_send"></button>
    <button hidden id="registration_success"></button>
    <button hidden id="password_update"></button>
    <button hidden id="profile_update"></button>
    <button hidden id="upload"></button>
    <button hidden id="reset_link"></button>
    <button hidden id="reset_password"></button>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="infodeercreative@gmail.com"><i class="fa fa-envelope-o"
                                        aria-hidden="true"></i> <span>Email: sajjadsaleem341@gmail.com</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i
                                        class="fa fa-phone" aria-hidden="true"></i> <span>Call Us:
                                        +923176122252</span></a>
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Login -->
                                <div class="login">
                                    <?php
                                        if(isset($_SESSION['USER_LOGIN'])){
                                        ?>
                                    <div class="language-dropdown">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle mr-30" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><a style="margin:auto"><i class="fa fa-user"
                                                        aria-hidden="true"></i></a><?= $_SESSION['USER_NAME'] ?></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Profile</a>
                                                <a class="dropdown-item" href="#">Orders</a>
                                                <a class="dropdown-item" href="#">Wishlist</a>
                                                <a class="dropdown-item" href="logout.php">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }else{
                                        ?>
                                    <a href="#myModal" data-toggle="modal"><i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Login</span></a>
                                    <?php
                                        }
                                        ?>
                                </div>
                                <!-- Cart -->
                                <div class="cart">
                                    <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span
                                                class="cart-quantity">(<?php echo $totalProduct?>)</span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="shop.php">Shop</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Shop</a></li>
                                                    <li><a href="product.php">product details</a></li>
                                                    <li><a href="cart.php">Shopping Cart</a></li>
                                                    <li><a href="checkout.php">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="portfolio.php">Portfolio</a>
                                                <ul class="dropdown">
                                                    <li><a href="portfolio.php">Portfolio</a></li>
                                                    <li><a href="single-portfolio.php">Portfolio Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.php">Blog</a>
                                                <ul class="dropdown">
                                                    <li><a href="blog.php">Blog</a></li>
                                                    <li><a href="single-post.php">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="portfolio.php">Portfolio</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>

                                <!-- Search Icon -->
                                <div id="searchIcon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="search.php" method="get">
                            <input type="text" name="str" id="search"
                                placeholder="Type keywords &amp; press enter...">
                            <!-- <button type="submit" class="d-none"></button> -->
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="static" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign In and Sign Up From</h4>
                    <button style="background-color: #70c745;" type="button" class="btn text-white" data-dismiss="modal"
                        onclick="location.reload()">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="register_msg">
                        <p style="color:red;font-weight:bold;text-align:center"></p>
                    </div>

                    <div>
                        <p class="help-block text-danger" id="al_email_error"
                            style="text-align:center;font-weight:bold;"></p>
                    </div>

                    <p class="help-block text-danger" id="al_email_error" style="padding:0 1rem 0"></p>

                    <div class="form-modal">

                        <div class="form-toggle">
                            <button id="login-toggle" onclick="toggleLogin()">Sign in</button>
                            <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
                        </div>
                        <!-- Login Form -->
                        <div id="login-form">
                            <form>
                                <input type="email" placeholder="Enter your email" name="l_email" id="l_email"
                                    autofocus>
                                <p class="help-block text-danger" id="l_email_error" style="padding:0 1rem 0"></p>

                                <input type="password" placeholder="Enter password" name="l_password" id="l_password" />
                                <p class="help-block text-danger" id="l_password_error" style="padding:0 1rem 0"></p>

                                <button type="button" class="btn login" onclick="user_login()">login</button>
                                <p class="forgot_link" type="button" id="forgot-toggle" onclick="toggleForgot()">Forgot
                                    Password</p>
                                <hr />

                                <div class="login_msg">
                                    <p style="color:red;"></p>
                                </div>

                            </form>
                        </div>

                        <!-- Signup Form -->
                        <div id="signup-form">
                            <form>
                                <input type="text" name="name" id="name" placeholder="Enter your name" autofocus>
                                <p class="help-block text-danger" id="name_error" style="padding:0 1rem 0"></p>

                                <input type="email" name="email" id="email" placeholder="Enter your email" />
                                <p class="help-block text-danger" id="email_error" style="padding:0 1rem 0"></p>

                                <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile" />
                                <p class="help-block text-danger" id="mobile_error" style="padding:0 1rem 0"></p>

                                <input type="password" name="password" id="password" placeholder="Password" />
                                <p class="help-block text-danger" id="password_error" style="padding:0 1rem 0"></p>

                                <input type="password" name="c_password" id="c_password"
                                    placeholder="Confirm password" />
                                <p class="help-block text-danger" id="c_password_error" style="padding:0 1rem 0"></p>

                                <button type="button" class="btn signup" onclick="user_register()">create
                                    account</button>
                                <p>Clicking <strong>create account</strong> means that you are agree to our <a
                                        href="">terms of services</a>.</p>
                                <hr />
                            </form>
                        </div>

                        <!-- Forgot Form -->
                        <div id="forgot-form">
                            <form method="post">
                                <input type="email" name="r_email" id="r_email" placeholder="Enter your email" />
                                <p class="help-block text-danger" id="r_email_error" style="padding:0 1rem 0"></p>

                                <button type="button" class="btn forgot" onclick="recover_password()">Send Mail</button>
                                <hr />
                                <div class="login_msg">
                                    <p style="color:red;"></p>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button style="background-color: #70c745;" type="button" class="btn text-white" data-dismiss="modal"
                        onclick="location.reload()">Close</button>
                </div>

            </div>
        </div>
    </div>