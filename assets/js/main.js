$(function () {



    // Select search script

    $('.my-select').selectpicker();



    // Services Listing City Carousel

    var ls_1 = $("#localized-slider-1"); 

    ls_1.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadein',        

        nav: true, 

        dots: false,   

        mouseDrag  : false,

        autoplayHoverPause: true,

        loop: false,                

        navText: ["<img src='../images/prev.png'>","<img src='../images/next.png'>"],

        autoplay: false,

        smartSpeed: 600,        

        responsive: {

            0:{

                items: 1

            },

            600:{

                items: 1

            },

            1000:{

                items: 1

            }

        }

    });



    // Latest Business Listing City Carousel

    var ls_2 = $("#localized-slider-2"); 

    ls_2.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadein',        

        nav: true, 

        dots: false,   

        mouseDrag  : false,

        autoplayHoverPause: true,

        loop: false,                

        navText: ["<img src='../images/prev.png'>","<img src='../images/next.png'>"],

        autoplay: false,

        smartSpeed: 600,        

        responsive: {

            0:{

                items: 1

            },

            600:{

                items: 1

            },

            1000:{

                items: 1

            }

        }

    });



    //* Tips & Articles Carousel

    var latest_business_listing = $("#latest-business-listing"); 

    latest_business_listing.owlCarousel({

        nav: false,   

        dots: false,    

        mouseDrag  : false,

        autoplayHoverPause: true,

        loop: false,     

        margin: 30,        

        autoplay: false,

        smartSpeed: 600,

        responsive: {

            0:{

                items: 1

            },

            600:{

                items: 1

            },

            1000:{

                items: 1

            }

        }

    });



    ls_2.on('changed.owl.carousel', function(e) {

        //console.log(e.item.index);

        latest_business_listing.trigger('to.owl.carousel', e.item.index);

    });



    $("#our-directory, #our-directory-1, #our-directory-2, #our-directory-3, #our-directory-4").each(function() {

        $(this).owlCarousel({

            nav: true, 

            dots: false,     

            mouseDrag  : true,

            autoplayHoverPause: true,

            loop: false,               

            navText: ["<img src='../images/arrow-prev.png'>","<img src='../images/arrow-next.png'>"],

            margin: 30,        

            autoplay: false,

            smartSpeed: 600,

            responsive: {

                0:{

                    items: 1

                },

                600:{

                    items: 2

                },

                1000:{

                    items: 4

                }

            }

        });

    });



    // Tips & Articles Carousel

    var owlCities = $("#localized-slider-3"); 

    owlCities.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadein',        

        nav: true, 

        dots: false,   

        mouseDrag  : false,

        autoplayHoverPause: true,

        loop: false,                

        navText: ["<img src='../images/prev.png'>","<img src='../images/next.png'>"],

        autoplay: false,

        smartSpeed: 600,        

        responsive: {

            0:{

                items: 1

            },

            600:{

                items: 1

            },

            1000:{

                items: 1

            }

        }

    });



   
	
	
	//* Tips & Articles Carousel

    var tipsArticles = $("#tips-articles"); 

    tipsArticles.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadeIn',

        nav: false,   

        dots: false,    

        mouseDrag  : false,

        autoplayHoverPause: true,

        loop: false,     

        margin: 30,        

        autoplay: false,

        smartSpeed: 2000,

        autoplayTimeout: 10000,

        responsive: {

            0:{

                items: 1

            },

            600:{

                items: 1

            },

            1000:{

                items: 1

            }

        }

    });




    owlCities.on('changed.owl.carousel', function(e) {

        //console.log(e.item.index);

        tipsArticles.trigger('to.owl.carousel', e.item.index);

    });



});