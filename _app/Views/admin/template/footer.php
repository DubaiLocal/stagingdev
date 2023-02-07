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
                    <script src="<?php echo base_url(); ?>/assets/plugins/multiselect/js/bootstrap-multiselect.min.js"></script>

                    <script>
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
                            $(".arrow_down").click(function() {
                                $(".onclick_box_show").toggle();
                            });
                            $('#category').change(function() {
                                var category = $(this).val();
                                // console.log(category);
                                if (category != 0) {
                                    $.ajax({
                                        type: 'post',
                                        url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                        data: {
                                            id: category
                                        },
                                        cache: false,
                                        success: function(returndata) {
                                            // console.log(returndata);
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
                            $("#btnsearch").click(function(e) {
                                e.preventDefault();
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo base_url('/bussiness/search'); ?>",
                                    data: $("#searchForm").serialize(),
                                    cache: false,
                                    // headers: {"Accepts": "application/json; charset=utf-8"},
                                    success: function(res) {
                                        $('.ajax_table').html(res);
                                        // Success message
                                        console.log(res);
                                    },
                                    error: function(err) {
                                        //clear all fields
                                        $("#searchForm").trigger("reset");
                                    },
                                    complete: function() {
                                        /* setTimeout(function() {
                                            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                                        }, 1000); */
                                    }
                                });
                            });
                        })
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <script>
                        $.validator.addMethod("wordCount", function(value, element, wordCount) {

                            return value.split(' ').length <= wordCount;

                        }, 'Exceeded word count');

                        var select_val_cntry = $('#country_id option:selected').val();
                        $('#hdn_cntry').val(select_val_cntry);
                        $("#add_business").validate({
                            rules: {
                                name: "required",
                                category_id: "required",
                                subcategory_id: "required",
                                nearby_loc: "required",
                                address: "required",
                                description: {
                                    required: true,
                                    minlength: 500,
                                    maxlength: 2500
                                },
                                // phone: "required",
                                // 'open_hours[]': "required",
                            },
                            messages: {
                                name: "Enter Name",
                                category_id: "Select category",
                                subcategory_id: "Select subcategory",
                                nearby_loc: "Select Nearby location",
                                address: "Enter address",
                                description: {
                                    required: "Enter Description",
                                    minlength: "Enter minimum 100 words/500 characters",
                                    maxlength: "Description can only be of maximum 500 words/2500 characters"
                                },
                                // phone: "Enter Phone",
                                // 'open_hours[]': "Enter Timing",
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
                        $("#update_business").validate({
                            rules: {
                                name: "required",
                                category_id: "required",
                                subcategory_id: "required",
                                district: "required",
                                nearby_loc: "required",
                                address: "required",
                                description: {
                                    required: true,
                                    minlength: 500,
                                    maxlength: 2500
                                },
                                // phone: "required",
                                // 'open_hours[]': "required",
                            },
                            messages: {
                                name: "Enter Name",
                                category_id: "Select category",
                                subcategory_id: "Select subcategory",
                                district: "Select District",
                                nearby_loc: "Select Nearby location",
                                address: "Enter address",
                                description: {
                                    required: "Enter Description",
                                    minlength: "Enter minimum 100 words/500 characters",
                                    maxlength: "Description can only be of maximum 500 words/2500 characters"
                                },
                                // phone: "Enter Phone",
                                // 'open_hours[]': "Enter Timing",
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
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.min.js"></script>
                    <script>
                        function catStatusUpdate(Id, status) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/category/updatecategorystatus",
                                data: {
                                    id: Id,
                                    status: status
                                },
                                success: function(result) {
                                    if (result == 1) {
                                        Swal.fire({
                                            title: 'Status has been updated!',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire(
                                            'Status not update please try again!',
                                            '',
                                            'error'
                                        );
                                    }
                                }
                            });
                        }

                        function catMenuItemStatusUpdate(CatId, status) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/category/updatemenucategorystatus",
                                data: {
                                    CatId: CatId,
                                    status: status
                                },
                                success: function(result) {
                                    if (result == 1) {
                                        Swal.fire({
                                            title: 'Status has been updated!',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire(
                                            'Status not update please try again!',
                                            '',
                                            'error'
                                        );
                                    }
                                }
                            });
                        }
                    </script>
                    <script>
                        function StatusUpdate(UserId, status) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/subcategory/updatesubcategorystatus",
                                data: {
                                    UserId: UserId,
                                    status: status
                                },
                                success: function(result) {
                                    if (result == 1) {
                                        Swal.fire({
                                            title: 'Status has been updated!',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire(
                                            'Status not update please try again!',
                                            '',
                                            'error'
                                        );
                                    }
                                }
                            });
                        }
                    </script>
                    <script>
                        function featureStatusUpdate(UserId, status) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/featured/updatefeaturestatus",
                                data: {
                                    UserId: UserId,
                                    status: status
                                },
                                success: function(result) {
                                    if (result == 1) {
                                        Swal.fire({
                                            title: 'Status has been updated!',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire(
                                            'Status not update please try again!',
                                            '',
                                            'error'
                                        );
                                    }
                                }
                            });
                        }
                    </script>
                    <script>
                        function bussinessStatusUpdate(businessId, status) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/business/updatebusinespendingstatus",
                                data: {
                                    businessId: businessId,
                                    status: status
                                },
                                success: function(result) {
                                    if (result == 1) {
                                        Swal.fire({
                                            title: 'This bussiness is moved in approved Businesses!',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire(
                                            'Status not update please try again!',
                                            '',
                                            'error'
                                        );
                                    }
                                }
                            });
                        }
                    </script>
                    <script>
                        function bussinessActiveInActive(businessId, status) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/business/updatebussinesActive",
                                data: {
                                    id: businessId,
                                    status: status
                                },
                                success: function(result) {
                                    if (result == 1) {
                                        Swal.fire({
                                            title: 'Status changed to active',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Status changed to Inactive',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    </script>
                    <script>
                        /* $(document).ready(function() {
                                $('#contact_us_table').DataTable({
                                    "order": [[ 0, "desc" ]],
                                    responsive: true,
                                    autoWidth: false,
                                    language: { search: "",
                                    searchPlaceholder: "Search",
                                    sLengthMenu: "_MENU_items",
                                    },
                                    dom: 'Bfrtip',
                                    buttons: [
                                        'csv'
                                    ]
                                });
                            }); */
                    </script>
                    <script>
                        function PendingClaimsStatusUpdate(id, status) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/pendingclaimsupdatestatus",
                                data: {
                                    id: id,
                                    status: status
                                },
                                success: function(result) {
                                    console.log(result);
                                    debugger;
                                    if (result == 1) {
                                        Swal.fire({
                                            title: 'Status has been updated!',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire(
                                            'Status not update please try again!',
                                            '',
                                            'error'
                                        );
                                    }
                                }
                            });
                        }
                    </script>
                    <script>
                        function pendingFeatureUpdate(id, val) {
                            var formData = new FormData();

                            formData.append("id", id);
                            formData.append("val", val.value);
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/pendingClaimsUpdateFeature",
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(result) {
                                    // console.log(result);
                                    // debugger;
                                    if (result == 1) {
                                        Swal.fire({
                                            title: 'Feature has been updated!',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire(
                                            'Feature has not been updated please try again!',
                                            '',
                                            'error'
                                        );
                                    }
                                }
                            });
                        }
                    </script>
                    <!-- Script for adding remarks pending business -->
                    <script>
                        $(document).ready(function() {
                            $(document).on("click", ".admin_pending_remarks_submit", function() {
                                console.log($(this).parent().parent().find("#admin_pending_remarks").val());
                                var remarks = $(this).parent().parent().find("#admin_pending_remarks").val();
                                var b_id = $(this).parent().parent().find("#b_id").val();
                                if (remarks == "") {
                                    Swal.fire(
                                        'Enter Remarks!',
                                        '',
                                        'error'
                                    );
                                } else {
                                    $.ajax({
                                        type: 'post',
                                        url: "<?php echo base_url('/admin/business/pending-business/save-remarks'); ?>",
                                        data: {
                                            id: b_id,
                                            remarks: remarks
                                        },
                                        cache: false,
                                        success: function(returndata) {
                                            console.log(returndata);
                                            if (returndata == 1) {
                                                Swal.fire(
                                                    'Saved!',
                                                    '',
                                                    'success'
                                                );
                                            }

                                        }
                                    });
                                }
                            });
                        });
                    </script>
                    <!-- Script to check If Business Name Exists -->
                    <script>
                        $("#add_business #name").on("blur", function() {
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url(); ?>/admin/business/check_exists",
                                data: {
                                    name: $("#add_business #name").val(),
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
                                                $("#add_business #name").val("");
                                            }
                                        });
                                    }
                                }
                            });
                        });
                    </script>

                    <!-- Script for moving business from one subcategory to another -->
                    <script>
                        if (localStorage.getItem("category") != null) {

                            $('.move-subcategory-business #move_from_category option[value="' + localStorage.getItem("category") + '"]').attr("selected", "selected");
                            $.ajax({
                                type: 'post',
                                url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                data: {
                                    id: localStorage.getItem("category")
                                },
                                cache: false,
                                success: function(returndata) {
                                    $('.move-subcategory-business #move_from_sub_category').html(returndata);
                                    $('.move-subcategory-business #move_from_sub_category option[value="' + localStorage.getItem("sub_category") + '"]').attr("selected", "selected");
                                }
                            });
                            $.ajax({
                                type: 'post',
                                url: "<?php echo base_url('/admin/sub-category-business'); ?>",
                                data: {
                                    id: localStorage.getItem("sub_category")
                                },
                                cache: false,
                                success: function(returndata) {
                                    $('.move-subcategory-business #move_from_business').html(returndata);
                                    $(".move-subcategory-business #move_from_business").multiselect('rebuild');
                                }
                            });

                        }

                        $('.move-subcategory-business #move_from_business').multiselect({
                            maxHeight: 300,
                            onDropdownHide: function(event) {
                                var business_array = [];
                                $(".move-subcategory-business #business_details .row").html("");
                                $('.move-subcategory-business #move_from_business option:selected').map(function(a, item) {
                                    business_array.push(item.value);

                                    $(".move-subcategory-business #business_details .row").append('<div class="col-md-12"><h5>' + $(this).text() + '</h5><p>' + $(this).data('description') + '</p></div>');
                                });


                            }
                        });
                        $('.move-subcategory-business #move_from_category').change(function() {
                            var category = $(this).val();
                            $(".move-subcategory-business #business_details .row").html("");
                            if (category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                    data: {
                                        id: category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        $('.move-subcategory-business #move_from_sub_category').html(returndata);
                                    }
                                });
                            }
                        });
                        $('.move-subcategory-business #move_from_sub_category').change(function() {
                            var sub_category = $(this).val();
                            $(".move-subcategory-business #business_details .row").html("");
                            if (sub_category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub-category-business'); ?>",
                                    data: {
                                        id: sub_category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        $('.move-subcategory-business #move_from_business').html(returndata);
                                        $(".move-subcategory-business #move_from_business").multiselect('rebuild');
                                    }
                                });
                            }
                        });
                        $('.move-subcategory-business #move_to_category').change(function() {
                            var category = $(this).val();

                            if (category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                    data: {
                                        id: category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        $('.move-subcategory-business #move_to_sub_category').html(returndata);
                                    }
                                });
                            }
                        });
                        /* $('.move-subcategory-business #move_to_sub_category').change(function() {
                            var sub_category = $(this).val();

                            if (sub_category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub-category-business'); ?>",
                                    data: {
                                        id: sub_category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        // $('#move_to_business').html(returndata);
                                    }
                                });
                            }
                        }); */
                        var dateFormat = "dd-mm-yy",
                            from = $("#date_from").datepicker({
                                dateFormat: 'dd-mm-yy',
                                defaultDate: "+1w",
                                changeMonth: true,
                                numberOfMonths: 1
                            }).on("change", function() {
                                to.datepicker("option", "minDate", getDate(this));
                                localStorage.setItem("minDate", getDate(this));
                            }),
                            to = $("#date_to").datepicker({
                                dateFormat: 'dd-mm-yy',
                                defaultDate: "+1w",
                                changeMonth: true,
                                numberOfMonths: 1
                            }).on("change", function() {
                                from.datepicker("option", "maxDate", getDate(this));
                                console.log(getDate(this));

                                localStorage.setItem("maxDate", getDate(this));
                                var sub_category = $('.move-subcategory-business #move_from_sub_category').val();
                                $(".move-subcategory-business #business_details .row").html("");
                                if (sub_category != 0) {
                                    $.ajax({
                                        type: 'post',
                                        url: "<?php echo base_url('/admin/sub-category-business'); ?>",
                                        data: {
                                            id: sub_category,
                                            from: localStorage.getItem("minDate"),
                                            to: localStorage.getItem("maxDate")
                                        },
                                        cache: false,
                                        success: function(returndata) {
                                            console.log(returndata);
                                            $('.move-subcategory-business #move_from_business').html(returndata);
                                            $(".move-subcategory-business #move_from_business").multiselect('rebuild');
                                        }
                                    });
                                }

                            });

                        function getDate(element) {
                            var date;
                            try {
                                date = $.datepicker.parseDate(dateFormat, element.value);
                            } catch (error) {
                                date = null;
                            }

                            return date;
                        }
                        $(document).on("click", ".move-subcategory-business #move_from_submit", function(e) {
                            e.preventDefault();
                            if ($('.move-subcategory-business #move_to_category').val() == "" || $('.move-subcategory-business #move_to_sub_category').val() == "") {
                                Swal.fire(
                                    'Please change category/subcategory!',
                                    '',
                                    'error'
                                );
                                return false;
                            }
                            if ($('.move-subcategory-business #move_to_sub_category').val() == $('.move-subcategory-business #move_from_sub_category').val()) {
                                Swal.fire(
                                    'Please change subcategory!',
                                    '',
                                    'error'
                                );
                                return false;
                            }
                            var business_array = [];

                            $('.move-subcategory-business #move_from_business option:selected').map(function(a, item) {
                                business_array.push(item.value);
                            });

                            if (business_array.length > 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/save-move-subcategory-business'); ?>",
                                    data: {
                                        move_to_category: $('.move-subcategory-business #move_to_category').val(),
                                        move_to_sub_category: $('.move-subcategory-business #move_to_sub_category').val(),
                                        move_from_category: $('.move-subcategory-business #move_from_category').val(),
                                        move_from_sub_category: $('.move-subcategory-business #move_from_sub_category').val(),
                                        business_array: business_array
                                    },
                                    cache: false,
                                    success: function(returndata) {

                                        if (returndata == "1") {
                                            localStorage.setItem("category", $('.move-subcategory-business #move_from_category').val());
                                            localStorage.setItem("sub_category", $('.move-subcategory-business #move_from_sub_category').val());
                                            Swal.fire({
                                                title: 'Moved!',
                                                showDenyButton: false,
                                                showCancelButton: false,
                                                confirmButtonText: 'OK',
                                            }).then((result) => {
                                                /* Read more about isConfirmed, isDenied below */
                                                if (result.isConfirmed) {
                                                    location.reload();
                                                }
                                            });
                                        }
                                    }
                                });
                            } else {
                                Swal.fire(
                                    'Please Select Business!',
                                    '',
                                    'error'
                                );
                                return false;
                            }

                        });
                    </script>

                    <!-- Script for moving Keywords from one subcategory to another -->
                    <script>
                        if (localStorage.getItem("keywords_category") != null) {

                            $('.move-subcategory-keywords #move_from_category option[value="' + localStorage.getItem("keywords_category") + '"]').attr("selected", "selected");
                            $.ajax({
                                type: 'post',
                                url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                data: {
                                    id: localStorage.getItem("keywords_category")
                                },
                                cache: false,
                                success: function(returndata) {
                                    $('.move-subcategory-keywords #move_from_sub_category').html(returndata);
                                    $('.move-subcategory-keywords #move_from_sub_category option[value="' + localStorage.getItem("keywords_sub_category") + '"]').attr("selected", "selected");
                                }
                            });
                            $.ajax({
                                type: 'post',
                                url: "<?php echo base_url('/admin/sub-category-keywords'); ?>",
                                data: {
                                    id: localStorage.getItem("sub_category")
                                },
                                cache: false,
                                success: function(returndata) {
                                    $('.move-subcategory-keywords #move_from_keywords').html(returndata);
                                    $(".move-subcategory-keywords #move_from_keywords").multiselect('rebuild');
                                }
                            });

                        }

                        $('.move-subcategory-keywords #move_from_keywords').multiselect({
                            maxHeight: 300
                        });
                        $('.move-subcategory-keywords #move_from_category').change(function() {
                            var category = $(this).val();
                            $(".move-subcategory-keywords #business_details .row").html("");
                            if (category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                    data: {
                                        id: category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        $('.move-subcategory-keywords #move_from_sub_category').html(returndata);
                                    }
                                });
                            }
                        });
                        $('.move-subcategory-keywords #move_from_sub_category').change(function() {
                            var sub_category = $(this).val();

                            if (sub_category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub-category-keywords'); ?>",
                                    data: {
                                        id: sub_category
                                    },
                                    cache: false,
                                    success: function(returndata) {

                                        $('.move-subcategory-keywords #move_from_keywords').html(returndata);
                                        $(".move-subcategory-keywords #move_from_keywords").multiselect('rebuild');
                                    }
                                });
                            }
                        });
                        $('.move-subcategory-keywords #move_to_category').change(function() {
                            var category = $(this).val();

                            if (category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                    data: {
                                        id: category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        $('.move-subcategory-keywords #move_to_sub_category').html(returndata);
                                    }
                                });
                            }
                        });

                        $(document).on("click", ".move-subcategory-keywords #move_from_submit", function(e) {
                            e.preventDefault();
                            if ($('.move-subcategory-keywords #move_to_category').val() == "" || $('.move-subcategory-keywords #move_to_sub_category').val() == "") {
                                Swal.fire(
                                    'Please change category/subcategory!',
                                    '',
                                    'error'
                                );
                                return false;
                            }
                            if ($('.move-subcategory-keywords #move_to_sub_category').val() == $('.move-subcategory-keywords #move_from_sub_category').val()) {
                                Swal.fire(
                                    'Please change subcategory!',
                                    '',
                                    'error'
                                );
                                return false;
                            }
                            var keywords_array = [];

                            $('.move-subcategory-keywords #move_from_keywords option:selected').map(function(a, item) {
                                keywords_array.push(item.value);
                            });

                            if (keywords_array.length > 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/save-move-subcategory-keywords'); ?>",
                                    data: {
                                        move_to_category: $('.move-subcategory-keywords #move_to_category').val(),
                                        move_to_sub_category: $('.move-subcategory-keywords #move_to_sub_category').val(),
                                        move_from_category: $('.move-subcategory-keywords #move_from_category').val(),
                                        move_from_sub_category: $('.move-subcategory-keywords #move_from_sub_category').val(),
                                        keywords_array: keywords_array
                                    },
                                    cache: false,
                                    success: function(returndata) {

                                        if (returndata == "1") {
                                            localStorage.setItem("keywords_category", $('.move-subcategory-keywords #move_from_category').val());
                                            localStorage.setItem("keywords_sub_category", $('.move-subcategory-keywords #move_from_sub_category').val());
                                            Swal.fire({
                                                title: 'Moved!',
                                                showDenyButton: false,
                                                showCancelButton: false,
                                                confirmButtonText: 'OK',
                                            }).then((result) => {
                                                /* Read more about isConfirmed, isDenied below */
                                                if (result.isConfirmed) {
                                                    location.reload();
                                                }
                                            });
                                        }
                                    }
                                });
                            } else {
                                Swal.fire(
                                    'Please Select Business!',
                                    '',
                                    'error'
                                );
                                return false;
                            }

                        });
                    </script>

                    <!-- Script for Multiple  business categories -->
                    <script>
                        if (localStorage.getItem("multiple_business_category") != null) {

                            $('.multiple-business-category #move_from_category option[value="' + localStorage.getItem("multiple_business_category") + '"]').attr("selected", "selected");
                            $.ajax({
                                type: 'post',
                                url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                data: {
                                    id: localStorage.getItem("multiple_business_category")
                                },
                                cache: false,
                                success: function(returndata) {
                                    $('.multiple-business-category #move_from_sub_category').html(returndata);
                                    $('.multiple-business-category #move_from_sub_category option[value="' + localStorage.getItem("multiple_business_sub_category") + '"]').attr("selected", "selected");
                                }
                            });
                            $.ajax({
                                type: 'post',
                                url: "<?php echo base_url('/admin/sub-category-business'); ?>",
                                data: {
                                    id: localStorage.getItem("multiple_business_sub_category")
                                },
                                cache: false,
                                success: function(returndata) {
                                    $('.multiple-business-category #move_from_business').html(returndata);
                                    $(".multiple-business-category #move_from_business").multiselect('rebuild');
                                }
                            });

                        }

                        $('.multiple-business-category #move_from_business').multiselect({
                            maxHeight: 300,
                            onDropdownHide: function(event) {
                                var business_array = [];
                                $(".multiple-business-category #business_details .row").html("");
                                $('.multiple-business-category #move_from_business option:selected').map(function(a, item) {
                                    business_array.push(item.value);

                                    $(".multiple-business-category #business_details .row").append('<div class="col-md-12"><h5>' + $(this).text() + '</h5><p>' + $(this).data('description') + '</p></div>');
                                });


                            }
                        });
                        $('.multiple-business-category #move_from_category').change(function() {
                            var category = $(this).val();
                            $(".multiple-business-category #business_details .row").html("");
                            if (category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                    data: {
                                        id: category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        $('.multiple-business-category #move_from_sub_category').html(returndata);
                                    }
                                });
                            }
                        });
                        $('.multiple-business-category #move_from_sub_category').change(function() {
                            var sub_category = $(this).val();
                            $(".multiple-business-category #business_details .row").html("");
                            if (sub_category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub-category-business'); ?>",
                                    data: {
                                        id: sub_category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        $('.multiple-business-category #move_from_business').html(returndata);
                                        $(".multiple-business-category #move_from_business").multiselect('rebuild');
                                    }
                                });
                            }
                        });
                        $('.multiple-business-category #move_to_category').change(function() {
                            var category = $(this).val();

                            if (category != 0) {
                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url('/admin/sub_cat_list'); ?>",
                                    data: {
                                        id: category
                                    },
                                    cache: false,
                                    success: function(returndata) {
                                        $('.multiple-business-category #move_to_sub_category').html(returndata);
                                    }
                                });
                            }
                        });
                        $(document).on("click", ".multiple-business-category #move_from_submit", function(e) {
                            e.preventDefault();
                            if ($('.multiple-business-category #move_to_category').val() == "" || $('.multiple-business-category #move_to_sub_category').val() == "") {
                                Swal.fire(
                                    'Please change category/subcategory!',
                                    '',
                                    'error'
                                );
                                return false;
                            }
                            if ($('.multiple-business-category #move_to_sub_category').val() == $('.multiple-business-category #move_from_sub_category').val()) {
                                Swal.fire(
                                    'Please change subcategory!',
                                    '',
                                    'error'
                                );
                                return false;
                            }
                            var business_array = [];

                            $('.multiple-business-category #move_from_business option:selected').map(function(a, item) {
                                business_array.push(item.value);
                            });


                            if (business_array.length > 0) {
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, Add!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            type: 'post',
                                            url: "<?php echo base_url('/admin/save-multiple-business-category'); ?>",
                                            data: {
                                                move_to_category: $('.multiple-business-category #move_to_category').val(),
                                                move_to_sub_category: $('.multiple-business-category #move_to_sub_category').val(),
                                                move_from_category: $('.multiple-business-category #move_from_category').val(),
                                                move_from_sub_category: $('.multiple-business-category #move_from_sub_category').val(),
                                                business_array: business_array
                                            },
                                            cache: false,
                                            success: function(returndata) {

                                                if (returndata == "1") {
                                                    localStorage.setItem("multiple_business_category", $('.multiple-business-category #move_from_category').val());
                                                    localStorage.setItem("multiple_business_sub_category", $('.multiple-business-category #move_from_sub_category').val());
                                                    Swal.fire({
                                                        title: 'Added!',
                                                        showDenyButton: false,
                                                        showCancelButton: false,
                                                        confirmButtonText: 'OK',
                                                    }).then((result) => {
                                                        /* Read more about isConfirmed, isDenied below */
                                                        if (result.isConfirmed) {
                                                            location.reload();
                                                        }
                                                    });
                                                }
                                            }
                                        });
                                    }
                                });

                            } else {
                                Swal.fire(
                                    'Please Select Business!',
                                    '',
                                    'error'
                                );
                                return false;
                            }

                        });
                    </script>

                    <!-- Script for Uploading Keywords CSV -->
                    <script>
                        /* $(".upload-csv-keywords #upload_keywords_csv").on('submit',(function(e) {
                        // $(document).on("click", ".upload-csv-keywords #save_keywords", function(e) {
                            e.preventDefault();
                            $.ajax({
                                type: 'post',
                                url: "<?php echo base_url('/admin/save-upload-keywords-csv'); ?>",
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(returndata) {

                                    console.log(returndata);
                                }
                            });

                            // Swal.fire({
                            //     title: 'Are you sure?',
                            //     text: "You won't be able to revert this!",
                            //     icon: 'warning',
                            //     showCancelButton: true,
                            //     confirmButtonColor: '#3085d6',
                            //     cancelButtonColor: '#d33',
                            //     confirmButtonText: 'Yes, Update Keywords!'
                            // }).then((result) => {
                            //     if (result.isConfirmed) {
                            //         $.ajax({
                            //             type: 'post',
                            //             url: "<?php echo base_url('/admin/save-upload-keywords-csv'); ?>",
                            //             data: {
                            //                 category: $('.upload-csv-keywords #category').val(),
                            //                 sub_category: $('.upload-csv-keywords #sub_category').val(),
                            //             },
                            //             contentType: false,
                            //             cache: false,
                            //             processData: false,
                            //             success: function(returndata) {
                            //                 if (returndata == "1") {
                            //                     localStorage.setItem("keyword_csv_category", $('.upload-csv-keywords #category').val());
                            //                     localStorage.setItem("keyword_csv_sub_category", $('.upload-csv-keywords #_sub_category').val());
                            //                     Swal.fire({
                            //                         title: 'Added!',
                            //                         showDenyButton: false,
                            //                         showCancelButton: false,
                            //                         confirmButtonText: 'OK',
                            //                     }).then((result) => {
                            //                         if (result.isConfirmed) {
                            //                             location.reload();
                            //                         }
                            //                     });
                            //                 }
                            //             }
                            //         });
                            //     }
                            // });

                        })); */
                    </script>
                    </body>

                    </html>