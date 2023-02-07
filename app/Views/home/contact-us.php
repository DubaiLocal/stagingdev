<?php echo view('home/template/header'); ?>
<section class="categories-banner about_banner">
    <div class="container">
        <div class="col-12 text-center">
            <h1 class="fw-600">Contact Us</h1>
        </div>
    </div>
</section>


<section class="contactus_new">
    <div class="container">
        <div class="contact_main_new">
            <div class="contact_infos_box">
                <h3>Contact Info</h3>
                <div class="contact_block">
                    <h4>Office Address</h4>
                    <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Office 104-105 Level 1 <br />Emaar Square – Building 4 <br />Sheikh Mohammed Bin Rashid Boulevard <br /> Downtown Dubai, United Arb Emirates</p>
                </div>
                <div class="contact_block c_social_icons">
                    <h4>Follow Us On</h4>
                    <a target="_blank" href="https://www.facebook.com/dubailocalae"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://www.instagram.com/dubailocal.ae/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCvtzJuu8QXg48f7oMwgwKRA"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                </div>
            </div> <!--contact_infos_box-->

            <div class="contact_block">
                <!--<h3 class="text-center py-2">Contact Us</h3>-->
                <form id="contact_form">
                    <p id="thanks_contact">Thank you for Contacting with us</p>

                    <h3>Get In Touch</h3>

                    <div class="form_row">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">Name<sup>*</sup></label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="emailHelp" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email<sup>*</sup></label>
                                    <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                            </div>
                        </div>
                    </div><!--form_row-->

                    <div class="form_row">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="comp_url">Company URL<sup>*</sup></label>
                                    <input type="text" name="comp_url" id="comp_url" class="form-control" placeholder="Enter your Company URL" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="comp_url">Mobile Number</label>
                                    <input type="text" name="mobil_num" id="mobil_num" class="form-control" placeholder="Enter your Mobile Number" />
                                </div>
                            </div>
                        </div>
                    </div><!--form_row-->

                    <div class="form_row">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="query">Query<sup>*</sup></label>
                                    <textarea name="query" id="query" cols="20" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                    </div><!--form_row-->

                    <div class="form_row">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LfYycwhAAAAADfGTmZ76aHNBVcO2kXn_8uVWs0v" data-callback="recaptchaCallback"></div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                </div>
                            </div>

                        </div>
                    </div><!--form_row-->

                    <div class="contact_btn">
                        <button type="submit" class="btn btn-primary" id="contact_submit">Submit</button>
                    </div>

                </form>
            </div>

        </div>

    </div>
</section>



<?php echo view('home/template/footer'); ?>