<?php
include 'header.php';
?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(img/bg-img/20.jpg);">
        <h2>Feedback</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Feedback Area Start ##### -->
<section class="contact-area">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>We Value Your Feedback</h2>
                    <p>Let us know how we're doing and how we can improve</p>
                </div>
                <!-- Feedback Form Area -->
                <div class="contact-form-area mb-100">
                    <form action="send_feedback.php" id="feedbackForm">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="f_name" id="feedback-name"
                                        placeholder="Your Name">
                                    <p class="help-block text-danger" id="f_name_error" style="padding:0 1rem 0"></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="f_email" id="feedback-email"
                                        placeholder="Your Email">
                                    <p class="help-block text-danger" id="f_email_error" style="padding:0 1rem 0"></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="f_subject" id="feedback-subject"
                                        placeholder="Feedback Subject">
                                    <p class="help-block text-danger" id="f_subject_error" style="padding:0 1rem 0"></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="f_message" id="feedback-message" cols="30" rows="10"
                                        placeholder="Your Feedback"></textarea>
                                    <p class="help-block text-danger" id="f_message_error" style="padding:0 1rem 0"></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" onclick="send_feedback()" class="btn alazea-btn mt-15">Send Feedback</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function send_feedback() {
                    jQuery('.help-block').html('');
                    var f_name = jQuery("#feedback-name").val();
                    var f_email = jQuery("#feedback-email").val();
                    var f_subject = jQuery("#feedback-subject").val();
                    var f_message = jQuery("#feedback-message").val();
                    var is_error = '';
                    if (f_name == "") {
                        jQuery('#f_name_error').html('Please enter your name');
                        is_error = 'yes';
                    }
                    if (f_email == "") {
                        jQuery('#f_email_error').html('Please enter your email');
                        is_error = 'yes';
                    } else {
                        // Check email format using a regular expression
                        var f_emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                        if (!f_email.match(f_emailRegex)) {
                            jQuery('#f_email_error').html('Please enter a valid email address');
                            is_error = 'yes';
                        }
                    }
                    if (f_subject == "") {
                        jQuery('#f_subject_error').html('Please enter a subject');
                        is_error = 'yes';
                    }
                    if (f_message == "") {
                        jQuery('#f_message_error').html('Please enter your feedback');
                        is_error = 'yes';
                    } else {
                        jQuery.ajax({
                            url: 'send_feedback.php',
                            type: 'post',
                            data: 'name=' + f_name + '&email=' + f_email + '&subject=' + f_subject +
                                '&feedback=' + f_message,
                            success: function(result) {
                                if (result == 'ThankYou') {
                                    jQuery("#feedback_send").click();
                                }
                            }
                        });
                        jQuery("#feedback-name").val('');
                        jQuery("#feedback-email").val('');
                        jQuery("#feedback-subject").val('');
                        jQuery("#feedback-message").val('');
                    }
                }
            </script>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">
                <img src="img/bg-img/25.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<!-- ##### Feedback Area End ##### -->

<?php
include 'footer.php';
?>
