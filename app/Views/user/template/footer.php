</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?php echo base_url(); ?>/assets/jss/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/jss/vendor-all.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/jss/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/jss/pcoded.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/jss/jquery.MultiFile.js"></script>
<script>
    $("#logo").change(function() {
        if ($('#logo').get(0).files.length === 0) {
            console.log("No files selected.");
        } else {
            $("#show_logo").hide();
        }
    });
    $('#more_images').change(
        function(e) {
            var numFiles = e.currentTarget.files.length;
            if (numFiles == 0) {
                // no files
            } else {
                // files chosen
                $(".show_more_images").hide();
            }
            return false;
        });
    /* $("#more_images").change(function() {
        console.log($('#more_images').get(0).files);
        debugger;
        if ($('#more_images').get(0).files.length === 0) {
            console.log("No files selected.");
        } else {
            $("#show_more_images").hide();
        }
    }); */
    // $('#country_id').attr('disabled', true);
    $('#more_images').MultiFile({
        // list: '#myList',
        max: 6,
        // max_size: 1024,
        preview: true,
        previewCss: 'max-height:100px; max-width:100px;',
        error: function(s) {
            if (typeof console != 'undefined') console.log(s);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: s,
            });
        },
    });
</script>
<!-- Script to check If Business Name Exists -->
<script>
    $("#save_business #name").on("blur", function() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>/admin/business/check_exists",
            data: {
                name: $("#save_business #name").val(),
            },
            success: function(result) {
                if (result == "1") {
                    Swal.fire({
                        title: 'Business Exists Please add another ',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $("#save_business #name").val("");
                        }
                    });
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('input[name="open_hours[]"]').timepicker({
            timeFormat: 'h:mm p',
            interval: 30,
            // minTime: '10',
            // maxTime: '6:00pm',
            // defaultTime: '11',
            // startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        $('input[name="close_hours[]"]').timepicker({
            timeFormat: 'h:mm p',
            interval: 30,
            // minTime: '10',
            // maxTime: '6:00pm',
            // defaultTime: '11',
            // startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        $("#rating").keypress(function(evt) {
            evt.preventDefault();
        });
        $('#category').change(function() {
            var category = $(this).val();
            if (category != 0) {
                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url('/user/sub_cat_list'); ?>",
                    data: {
                        id: category
                    },
                    cache: false,
                    success: function(returndata) {
                        $('#sub_category').html(returndata);
                    }
                });
            }
        });

        $('#district').change(function() {
            var district = $(this).val();
            // console.log(district);
            if (district != 0) {
                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url('/admin/nearby_loc_list'); ?>",
                    data: {
                        id: district
                    },
                    cache: false,
                    success: function(returndata) {
                        // console.log(returndata);
                        $('#nearby_location').html(returndata);
                    }
                });
            }
        });
    })
</script>
<script>
    $(document).ready(function() {
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (2 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
        /* console.log("Hello");
        console.log(getCookie("current_business_url")); */
        if (getCookie("current_business_url")) {
            window.location.replace(getCookie("current_business_url"));
            window.location.href = getCookie("current_business_url");
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Validate Add Business form -->
<script>
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please");
    $("#save_business").validate({
        rules: {
            name: {
                required: true,
                // lettersonly: true,
            },
            category_id: "required",
            subcategory_id: "required",
            // unique_url: "required",
            email: {
                // required: true,
                email: true
            },
            // num_rating: "required",
            // aeverage_rating: "required",
            address: "required",
            district: "required",
            description: {
                required: true,
                minlength: 500,
                maxlength: 2500
            },
            logo: "required",
            'more_images[]': "required",
            // phone: "required"
        },
        messages: {
            name: {
                required: "Enter Name",
                // lettersonly: "Enter only characters"
            },
            category_id: "Select category",
            subcategory_id: "Select subcategory",
            // unique_url: "Enter Website URL",
            email: {
                // required: "Enter Email",
                email: "Enter correct email",
            },
            // num_rating: "Enter Rating",
            // aeverage_rating: "Enter Aeverage Rating",
            address: "Enter address",
            district: "Select district",
            description: {
                required: "Enter Description",
                minlength: "Enter minimum 100 words/500 characters",
                maxlength: "Description can only be of maximum 500 words/2500 characters"
            },
            logo: "Select Banner",
            'more_images[]': "Select Gallery Images",
            // phone: "Enter Phone",
        },
        submitHandler: function(form) {
            // return false;
            form.submit();
        },
        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1 ?
                    'You missed 1 field. It has been highlighted' :
                    'You missed ' + errors + ' fields. They have been highlighted';
                $("div.error span").html(message);
                $("div.error").show();
            } else {
                $("div.error").hide();
            }
        }
    });
    $("#update_user_business").validate({
        rules: {
            name: {
                required: true,
                // lettersonly: true,
            },
            category_id: "required",
            subcategory_id: "required",
            email: {
                // required: true,
                email: true
            },
            district: "required",
            address: "required",
            description: "required",
            // phone: "required"
        },
        messages: {
            name: {
                required: "Enter Name",
                // lettersonly: "Enter only characters"
            },
            category_id: "Select category",
            subcategory_id: "Select subcategory",
            email: {
                // required: "Enter Email",
                email: "Enter correct email",
            },
            district: "Select District",
            address: "Enter address",
            description: "Enter Description",
            // phone: "Enter Phone",
        },
        submitHandler: function(form) {
            //return false;
            form.submit();
        },
        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1 ?
                    'You missed 1 field. It has been highlighted' :
                    'You missed ' + errors + ' fields. They have been highlighted';
                $("div.error span").html(message);
                $("div.error").show();
            } else {
                $("div.error").hide();
            }
        }
    });
</script>