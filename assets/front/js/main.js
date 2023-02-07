$(document).ready(function () {



    /* Bootstrap jqvalidation script */

    // $(function () { $("input, select, textarea").not("[type=submit]").jqBootstrapValidation(); } );



    // Select search script

    $('.my-select').selectpicker();



    var indexBanner = $("#index-banner"); 

    indexBanner.owlCarousel({

        items: 1,

        animateOut: 'fadeOut',

        animateIn: 'fadein', 

        nav: false,   

        dots: true,    

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: true,       

        autoplay: true,

        smartSpeed: 3000,

        autoplayTimeout: 5000

    });



    // Landing Banner Carousel

    var lBanner = $("#landing-banner"); 

    lBanner.owlCarousel({

        nav: true, 

        dots: false,   

        mouseDrag  : false,

        autoplayHoverPause: true,

        loop: true,                

        navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

         navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

        navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

        loop: true,     

        margin: 30,        

        autoplay: true,

        smartSpeed: 3000,

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



    var our_dir = $("#our-directory"); 

    our_dir.owlCarousel({

        nav: true, 

        dots: false,     

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: false,               

         navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

            1200:{

                items: 4

            },
			
			1300:{

                items: 5

            }

        }

    });



    var our_dir_1 = $("#our-directory-1"); 

    our_dir_1.owlCarousel({

        nav: true, 

        dots: false,     

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: false,               

        navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

            1200:{

                items: 4

            },
			
			1300:{

                items: 5

            }

        }

    });



    var our_dir_2 = $("#our-directory-2"); 

    our_dir_2.owlCarousel({

        nav: true, 

        dots: false,     

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: false,               

        navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

            1200:{

                items: 4

            },
			
			1300:{

                items: 5

            }

        }

    });



    var our_dir_3 = $("#our-directory-3"); 

    our_dir_3.owlCarousel({

        nav: true, 

        dots: false,     

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: false,               

         navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

            1200:{

                items: 4

            },
			
			1300:{

                items: 5

            }

        }

    });



    var our_dir_4 = $("#our-directory-4"); 

    our_dir_4.owlCarousel({

        nav: true, 

        dots: false,     

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: false,               

        navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

            1200:{

                items: 4

            },
			
			1300:{

                items: 5

            }

        }

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

        navText: ["<img src='../assets/front/images/arrow-prev.png'>","<img src='../assets/front/images/arrow-next.png'>"],

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

        nav: false,   

        dots: false,    

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: true,     

        margin: 30,        

        autoplay: true,

        smartSpeed: 2000,

        autoplayTimeout: 5000,

        responsive: {

            0:{

                items: 1

            },

            600:{

                items: 1

            },

            1000:{

                items: 3

            }

        }

    });
	
	
	 //* Tips & Articles Carousel

    var mainEvents = $("#upcoming_events"); 

    mainEvents.owlCarousel({

        nav: false,   

        dots: false,    

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: true,     

        margin: 30,        

        autoplay: true,

        smartSpeed: 2000,

        autoplayTimeout: 5000,

        responsive: {

            0:{

                items: 1

            },

            600:{

                items: 2

            },
			
			 
            1000:{

                items: 3

            }

        }

    });



    owlCities.on('changed.owl.carousel', function(e) {

        //console.log(e.item.index);

        tipsArticles.trigger('to.owl.carousel', e.item.index);

    });





    /* Business detail page gallary light box script */

    $('.gallery').each(function() { // the containers for all your galleries

        $(this).magnificPopup({

            delegate: 'a.light-box-img', // the selector for gallery item

            type: 'image',

            gallery: {

                enabled:true

            }

        });

    });



    $('.submit-review-form-btn').on('click', function(e) {

        e.preventDefault();

        $(this).attr('type','submit');

        $('.form-fields').slideDown();        

    });



    //* Category Gallery Carousel

    var categoryGallery = $("#category-gallery"); 

    categoryGallery.owlCarousel({

        nav: false,   

        dots: false,    

        mouseDrag  : true,

        autoplayHoverPause: true,

        loop: true,     

        margin: 0,        

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



    // Init WOW.js and get instance

    var wow = new WOW({

        mobile: false

    });

    wow.init();    

    

    if ($(window).width() > 992) {

        //* Repate on scroll blocks animation

        WOW.prototype.addBox = function(element) {

            this.boxes.push(element);

        };

        

        // Attach scrollSpy to .wow elements for detect view exit events,

        // then reset elements and add again for animation

        $('.wow').on('scrollSpy:exit', function() {

            $(this).css({

            'visibility': 'hidden',

            'animation-name': 'none'

            }).removeClass('animated');

            wow.addBox(this);

        }).scrollSpy();  

    }



    // Index category change images

    //* Category Gallery Carousel

    var subCategory_1 = $("#category_gallery_1"); 

    subCategory_1.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadein',

        items: 1,

        nav: false,   

        dots: false,    

        mouseDrag: false,

        autoplayHoverPause: true,

        loop: true,     

        margin: 0,        

        autoplay: true,

        smartSpeed: 2000,

        autoplayTimeout: 5000,

    });



    var subCategory_2 = $("#category_gallery_2"); 

    subCategory_2.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadein',

        items: 1,

        nav: false,   

        dots: false,    

        mouseDrag: false,

        autoplayHoverPause: true,

        loop: true,     

        margin: 0,        

        autoplay: true,

        smartSpeed: 2000,

        autoplayTimeout: 6000,

    });



    var subCategory_3 = $("#category_gallery_3"); 

    subCategory_3.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadein',

        items: 1,

        nav: false,   

        dots: false,    

        mouseDrag: false,

        autoplayHoverPause: true,

        loop: true,     

        margin: 0,        

        autoplay: true,

        smartSpeed: 2000,

        autoplayTimeout: 5000,

    });



    var subCategory_4 = $("#category_gallery_4"); 

    subCategory_4.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadein',

        items: 1,

        nav: false,   

        dots: false,    

        mouseDrag: false,

        autoplayHoverPause: true,

        loop: true,     

        margin: 0,        

        autoplay: true,

        smartSpeed: 2000,

        autoplayTimeout: 5000,

    });



    var subCategory_5 = $("#category_gallery_5"); 

    subCategory_5.owlCarousel({

        animateOut: 'fadeOut',

        animateIn: 'fadein',

        items: 1,

        nav: false,   

        dots: false,    

        mouseDrag: false,

        autoplayHoverPause: true,

        loop: true,     

        margin: 0,        

        autoplay: true,

        smartSpeed: 2000,

        autoplayTimeout: 6000,

    });



});