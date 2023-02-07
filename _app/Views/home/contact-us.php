<?php echo view('home/template/header'); ?>
<section class="categories-banner about_banner">
    <div class="container">
        <div class="col-12 text-center">
            <h1 class="fw-600">Contact Us</h1>
        </div>
    </div>
</section>
<div class="container py-3">
    <div class="row">

        <div class="col-md-6">
            <div class="contact_us">
                <img src="<?php echo base_url(); ?>/assets/front/images/contact_us.png" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="contact_block">
                <!--<h3 class="text-center py-2">Contact Us</h3>-->
                <form id="contact_form">
                    <p id="thanks_contact">Thank you for Contacting with us</p>
                    <div class="form-group">
                        <label for="first_name">Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="emailHelp" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="comp_url">Company URL</label>
                        <input type="text" name="comp_url" id="comp_url" class="form-control" placeholder="Enter your Company URL" />
                    </div>
                    <div class="form-group">
                        <label for="query">Query</label>
                        <textarea name="query" id="query" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LfYycwhAAAAADfGTmZ76aHNBVcO2kXn_8uVWs0v"></div>
                        <div id="g-recaptcha"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="contact_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo view('home/template/footer'); ?>