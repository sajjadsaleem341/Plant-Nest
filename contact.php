<?php
include 'header.php';
?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(img/bg-img/24.jpg);">
        <h2>Contact US</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Contact Area Info Start ##### -->
<div class="contact-area-info section-padding-0-100">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <!-- Contact Thumbnail -->
            <div class="col-12 col-md-6">
                <div class="contact--thumbnail">
                    <img src="img/bg-img/25.jpg" alt="">
                </div>
            </div>

            <div class="col-12 col-md-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>CONTACT US</h2>
                    <p>We are improving our services to serve you better.</p>
                </div>
                <!-- Contact Information -->
                <div class="contact-information">
                    <p><span>Address:</span> 505 Silk Rd, New York</p>
                    <p><span>Phone:</span> +1 234 122 122</p>
                    <p><span>Email:</span> info.deercreative@gmail.com</p>
                    <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                    <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Contact Area Info End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>GET IN TOUCH</h2>
                    <p>Send us a message, we will call back later</p>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <form action="send_message.php" id="contactForm">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="c_name" id="contact-name"
                                        placeholder="Your Name">
                                    <p class="help-block text-danger" id="c_name_error" style="padding:0 1rem 0"></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="c_email" id="contact-email"
                                        placeholder="Your Email">
                                    <p class="help-block text-danger" id="c_email_error" style="padding:0 1rem 0"></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="c_subject" id="contact-subject"
                                        placeholder="Subject">
                                    <p class="help-block text-danger" id="c_subject_error" style="padding:0 1rem 0"></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="c_message" id="message" cols="30" rows="10"
                                        placeholder="Message"></textarea>
                                    <p class="help-block text-danger" id="c_message_error" style="padding:0 1rem 0"></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" onclick="send_message()" class="btn alazea-btn mt-15">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function send_message() {
                    jQuery('.help-block').html('');
                    var c_name = jQuery("#contact-name").val();
                    var c_email = jQuery("#contact-email").val();
                    var c_subject = jQuery("#contact-subject").val();
                    var c_message = jQuery("#message").val();
                    var is_error = '';
                    if (c_name == "") {
                        jQuery('#c_name_error').html('Please enter your name');
                        is_error = 'yes';
                    }
                    if (c_email == "") {
                        jQuery('#c_email_error').html('Please enter your email');
                        is_error = 'yes';
                    } else {
                        // Check email format using a regular expression
                        var c_emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                        if (!c_email.match(c_emailRegex)) {
                            jQuery('#c_email_error').html('Please enter a valid email address');
                            is_error = 'yes';
                        }
                    }
                    if (c_subject == "") {
                        jQuery('#c_subject_error').html('Please enter a subject');
                        is_error = 'yes';
                    }
                    if (c_message == "") {
                        jQuery('#c_message_error').html('Please enter your message');
                        is_error = 'yes';
                    } else {
                        jQuery.ajax({
                            url: 'send_message.php',
                            type: 'post',
                            data: 'name=' + c_name + '&email=' + c_email + '&subject=' + c_subject +
                                '&message=' + c_message,
                            success: function(result) {
                                if (result == 'ThankYou') {
                                    jQuery("#message_send").click();
                                }
                            }
                        });
                        jQuery("#contact-name").val('');
                        jQuery("#contact-email").val('');
                        jQuery("#contact-subject").val('');
                        jQuery("#contact-message").val('');
                    }
                }
            </script>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->

<?php
include 'footer.php';
?>