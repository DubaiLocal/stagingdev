<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


/********* All VIEW ROUTES **********************/




$routes->group('admin', static function ($routes) {
    $routes->get('login', 'AdminController::index');
    $routes->post('login', 'AdminController::login');
    $routes->get('logout', 'AdminController::logout');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->post('sub_cat_list', 'SubCategoryController::sub_cat_listing');
    $routes->post('nearby_loc_list', 'NeabyLocationController::nearby_location_listing');

    $routes->get('add-district-from-address', 'AdminController::add_district_from_address');
    $routes->post('save-district-from-address', 'AdminController::save_district_from_address');
    $routes->get('add-business-name-in-keywords', 'AdminController::add_business_name_keywords');
    $routes->post('save-business-name-in-keywords', 'AdminController::save_business_name_keywords');

    $routes->get('move-subcategory-business', 'AdminController::move_subcategory_business');
    $routes->post('sub-category-business', 'AdminController::sub_category_business');
    $routes->post('save-move-subcategory-business', 'AdminController::save_move_subcategory_business');

    $routes->get('move-subcategory-keywords', 'AdminController::move_subcategory_keywords');
    $routes->post('sub-category-keywords', 'AdminController::sub_category_keywords');
    $routes->post('save-move-subcategory-keywords', 'AdminController::save_move_subcategory_keywords');

    $routes->get('add-multiple-business-category', 'AdminController::add_multiple_business_category');
    $routes->post('save-multiple-business-category', 'AdminController::save_multiple_business_category');

    $routes->get('upload-keywords-csv', 'AdminController::upload_keywords_csv');
    $routes->post('save-upload-keywords-csv', 'AdminController::save_upload_keywords_csv');




    /* Business */
    $routes->group('business', static function ($routes) {
        $routes->get('listing?(:alphanum)', 'BussinessController::load_businesses_search');
        $routes->get('listing/subcategory/(:alphanum)', 'BussinessController::load_businesses_subcategory/$1');
        $routes->get('listing', 'BussinessController::load_businesses');
        $routes->get('preview/(:segment)', 'BussinessController::single_business_preview/$1');
        $routes->post('updatebussinesActive', 'BussinessController::activeInactive');
        $routes->post('check_exists', 'BussinessController::check_existing_business');
        $routes->get('create', 'BussinessController::create');
        $routes->post('save', 'BussinessController::save');
        $routes->get('edit/(:any)', 'BussinessController::edit/$1');
        $routes->post('update/(:any)', 'BussinessController::update/$1');

        $routes->get('pending-business', 'BussinessController::pending_business');
        $routes->post('updatebusinespendingstatus', 'BussinessController::update_business_pending_status');
        $routes->get('pending-bussiness/edit/(:alphanum)', 'BussinessController::pending_edit/$1');
        $routes->Post('pending-bussiness/update/(:alphanum)', 'BussinessController::pending_update/$1');
        $routes->post('pending-business/save-remarks', 'BussinessController::pending_business_remarks');
    });
    /* $routes->get('business/listing', 'BussinessController::load_businesses');
    $routes->get('business-preview/(:segment)', 'BussinessController::single_business_preview/$1');
    $routes->post('business/updatebussinesActive', 'BussinessController::activeInactive');
    $routes->post('business/check_exists', 'BussinessController::check_existing_business');
    $routes->get('business/create', 'BussinessController::create');
    $routes->post('business/save', 'BussinessController::save');
    $routes->get('business/edit/(:any)', 'BussinessController::edit/$1');
    $routes->Post('bussiness/update/(:any)', 'BussinessController::update/$1');

    $routes->get('business/pending-business', 'BussinessController::pending_business');
    $routes->post('business/updatebusinespendingstatus', 'BussinessController::update_business_pending_status');
    $routes->get('pending-bussiness/edit/(:alphanum)', 'BussinessController::pending_edit/$1');
    $routes->Post('pending-bussiness/update/(:alphanum)', 'BussinessController::pending_update/$1'); */
    /* End Business */

    /* Category */
    $routes->group('category', static function ($routes) {
        $routes->get('', 'CategoryController::index');
        $routes->get('create', 'CategoryController::create');
        $routes->post('save', 'CategoryController::save');
        $routes->get('edit/(:alphanum)', 'CategoryController::edit/$1');
        $routes->post('update/(:alphanum)', 'CategoryController::update/$1');
        $routes->post('updatecategorystatus', 'CategoryController::update_category_status');
    });
    /* End Category */

    /* Sub Category */
    $routes->group('sub-category', static function ($routes) {
        $routes->get('create', 'SubCategoryController::create');
        $routes->post('save', 'SubCategoryController::save');
        $routes->get('edit/(:alphanum)', 'SubCategoryController::edit/$1');
        $routes->post('update/(:alphanum)', 'SubCategoryController::update/$1');
        $routes->post('updatesubcategorystatus', 'SubCategoryController::update_sub_category_status');
        $routes->get('(:alphanum)', 'SubCategoryController::index/$1');
    });
    /* End Sub Category */
});

/******** User Routes************/
$routes->group('user', static function ($routes) {

    $routes->get('login', 'UserController::login');
    $routes->post('login', 'UserController::user_login');
    $routes->get('logout', 'UserController::logout');
    $routes->get('dashboard', 'UserController::user_dashboard');
    $routes->get('business', 'UserController::user_approved_bussiness');
    $routes->get('pending-business', 'UserController::user_pending_business');
    $routes->get('preview/(:segment)', 'UserController::single_business_preview/$1');

    $routes->post('sub_cat_list', 'SubCategoryController::sub_cat_listing');

    /* Business */
    $routes->group('business', static function ($routes) {

        $routes->get('create', 'UserController::create_business');
        $routes->post('save', 'UserController::save_business');
        $routes->get('edit/(:alphanum)', 'UserController::edit_business/$1');
        $routes->post('update/(:alphanum)', 'UserController::update_business/$1');
    });
    // End


    $routes->get('test-thumbnail', 'UserController::test_thumbnail');
    $routes->post('test-thumbnail', 'UserController::test_save_thumbnail');
});

/******* End User Routes ********/


/******* SEO Routes ********/
$routes->group('seo', static function ($routes) {

    $routes->get('login', 'SeoController::login');
    $routes->post('login', 'SeoController::user_login');
    $routes->get('logout', 'SeoController::logout');
    $routes->get('dashboard', 'SeoController::user_dashboard');
    $routes->get('manage-category-seo', 'SeoController::manage_category_seo');

    // Category
    $routes->group('category', static function ($routes) {
        $routes->get('edit/(:any)', 'SeoController::edit_category/$1');
        $routes->post('update/(:any)', 'SeoController::update_category/$1');
    });
    // End Category

    // Sub Category
    $routes->group('sub-category', static function ($routes) {
        $routes->get('edit/(:any)', 'SeoController::edit_sub_category/$1');
        $routes->post('update/(:any)', 'SeoController::update_sub_category/$1');
        $routes->get('(:alphanum)', 'SeoController::sub_category_listing/$1');
    });
    // End Sub Category
});

/******* End SEO Routes ********/

/***************************FRONT ROUTES ***********************/

$routes->get('/', 'HomeController::index');
$routes->get('/home2', 'HomeController::index2');

/**** Search routes ****/


$routes->get('/search?(:any)', 'HomeController::search_query');
$routes->post('/search/loadmore?(:any)', 'HomeController::search_query_load_more');

$routes->post('/get-all-subcategories', 'SubCategoryController::get_subcategories_cat');
$routes->post('/get-all-subcategories-test', 'SubCategoryController::get_subcategories_cat_test');
$routes->post('/districts', 'DistrictsController::get_all_districts');


/**** END Search routes ****/

$routes->get('/browse-business-directory', 'HomeController::fetch_business_directory');
$routes->get('/dubai-explore', 'HomeController::dubai_explore');

$routes->get('/about-us', 'HomeController::about_us');
$routes->get('/contact-us', 'HomeController::contact_us');
$routes->post('/contact_us', 'HomeController::contact_us_save');
$routes->get('/privacy-policy', 'HomeController::privacy_policy');

// Single category 
$routes->get('/category/(:segment)', 'HomeController::subcategory_listings/$1');

// 5 category 
$routes->get('/category', 'HomeController::category');
// In 5 category page get single category from navs
$routes->post('/single-category-subcat', 'HomeController::single_category_subcat');

// Subcategory  
$routes->get('/businesses/(:segment)', 'HomeController::business_listings_subcategory/$1');
$routes->post('/businesses/loadmore?(:any)', 'HomeController::business_listings_subcategory_load_more/$1');
$routes->get('/businesses/(:segment)/(:segment)', 'HomeController::business_listings_subcategory_district/$1/$2');

// Business  
$routes->get('/business/(:segment)', 'HomeController::single_business/$1');


// Front Pages Forms
$routes->Post('/review-now-text', 'HomeController::save_review_now_text');
$routes->Post('/save-review', 'HomeController::save_review');
$routes->Post('/send-enquiry', 'HomeController::save_enquiry');
$routes->Post('/send-enquiry-add-business', 'HomeController::save_enquiry_add_business');
$routes->Post('/claim-business', 'HomeController::save_claim_business');

// $routes->post('/category', 'HomeController::category');

/*********** End All Views ********************/



/* User Routes */


/* // Register
$routes->get('/register', 'UserController::register'); // added by shraddha 18/08/2022
$routes->post('/register', 'UserController::save_user'); // added by shraddha 18/08/2022

// Login
$routes->get('/login', 'UserController::login'); // added by shraddha 18/08/2022
$routes->post('/login', 'UserController::user_login'); // added by shraddha 18/08/2022

// Dashboard
$routes->get('/dashboard', 'UserController::user_dashboard');

// Create business
$routes->get('/add-business', 'UserController::add_bussiness'); // added by shraddha 18/08/2022
$routes->post('/user/business/save', 'UserController::save_bussiness'); // added by shraddha 18/08/2022
$routes->get('/mybussiness', 'UserController::user_approved_bussiness');
$routes->get('/pending-bussiness', 'UserController::user_pending_bussiness');

$routes->get('/logout', 'UserController::user_logout');


$routes->get('/business/edit/(:any)', 'UserController::user_business_edit/$1');
$routes->Post('/business/update/(:any)', 'UserController::update_user_business/$1'); */






/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
