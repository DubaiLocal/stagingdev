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
$routes->get('/admin/login', 'AdminController::index');
$routes->post('/admin/login', 'AdminController::login');
$routes->get('/admin/dashboard', 'AdminController::dashboard'); ///added by priyanka 

$routes->get('/admin-logout', 'AdminController::logout');
$routes->get('/bussiness/listing', 'BussinessController::loadRecord', ['filter' => 'auth']);
$routes->get('/bussiness/listing/(:any)', 'BussinessController::loadRecord/$1', ['filter' => 'auth']);
$routes->get('/loadRecord', 'BussinessController::loadRecord');
$routes->get('/bussiness/edit/(:any)', 'BussinessController::edit/$1');
$routes->Post('/bussiness/update/(:any)', 'BussinessController::update/$1');

$routes->get('/admin/pending-bussiness/edit/(:alphanum)', 'BussinessController::pending_edit/$1');
$routes->Post('/admin/pending-bussiness/update/(:alphanum)', 'BussinessController::pending_update/$1');

// $routes->post('/bussiness/search/list', 'BussinessController::search');
$routes->post('/bussiness/search', 'BussinessController::search_ajax');
// $routes->get('/bussiness/search', 'BussinessController::search');
$routes->get('/bussiness/search', 'BussinessController::search_ajax');
$routes->post('/admin/businessess/search_sub_cat_list', 'BussinessController::search_sub_cat_listing');
$routes->post('/admin/businessess/search_nearby_location_list', 'BussinessController::search_nearby_location_listing');


$routes->get('/admin/category', 'CategoryController::index');
$routes->get('/admin/category/create', 'CategoryController::create');
$routes->post('/admin/category/save', 'CategoryController::save');
$routes->get('/admin/category/edit/(:any)', 'CategoryController::edit/$1');
$routes->post('/admin/category/update/(:any)', 'CategoryController::update/$1');


$routes->get('/admin/sub-category', 'SubCategoryController::index');
$routes->get('/admin/sub-category/create', 'SubCategoryController::create');
$routes->post('/admin/sub-category/save', 'SubCategoryController::save');
$routes->get('/admin/sub-category/edit/(:any)', 'SubCategoryController::edit/$1');
$routes->post('/admin/sub-category/update/(:any)', 'SubCategoryController::update/$1');

$routes->get('/bussiness/create', 'BussinessController::create'); ///added by shraddha 
$routes->post('/bussiness/save', 'BussinessController::save'); ///added by shraddha 
$routes->post('/bussiness/unique_search', 'BussinessController::unique_search');

$routes->post('/admin/updatebussinesActive', 'BussinessController::ActiveInactive');

$routes->post('/admin/category/updatecategorystatus', 'CategoryController::update_category_status');
$routes->post('/admin/category/updatemenucategorystatus', 'CategoryController::update_menu_category_status');
$routes->post('/admin/subcategory/updatesubcategorystatus', 'SubCategoryController::update_sub_category_status');
$routes->get('/admin/featured', 'FeatureController::index');
$routes->get('/admin/featured/create', 'FeatureController::create');
$routes->post('/admin/featured/save', 'FeatureController::save');
$routes->get('/admin/featured/edit/(:any)', 'FeatureController::edit/$1');
$routes->post('/admin/featured/updatefeaturestatus', 'FeatureController::update_feature_status');
$routes->post('/admin/featured/update/(:any)', 'FeatureController::update/$1');
$routes->get('/admin/bussiness/pending-bussiness', 'BussinessController::pending_bussiness');
/* Add remarks for pending business */
$routes->post('/admin/bussiness/pending-bussiness/save-remarks', 'BussinessController::pending_bussiness_remarks');
$routes->get('/bussiness/delete/(:any)', 'BussinessController::delete/$1');

$routes->post('/front/updatebussinesstatus', 'BussinessController::update_bussiness');
// $routes->post('/admin/menu-front', 'FeatureController::header_menu_front');

$routes->get('/admin/pending-claims', 'AdminController::pending_claims');
$routes->post('/admin/pendingclaimsupdatestatus', 'AdminController::pending_claims_update_status');
$routes->post('/admin/pendingClaimsUpdateFeature', 'AdminController::pending_claims_update_feature');



//FRONT VIEW ROUTES

$routes->get('/', 'FrontController::index');
$routes->post('/front/index', 'FrontController::index');
$routes->post('/front/index', 'FrontController::servicelist');


$routes->post('/category', 'FrontController::category');
$routes->post('/front/single_category_subcat', 'FrontController::single_category_subcat');

$routes->get('/search', 'FrontController::front_search');
$routes->get('/browse-business-directory', 'FrontController::fetch_business_directory');
$routes->get('/about-us', 'FrontController::about_us');
$routes->get('/contact-us', 'FrontController::contact_us');
$routes->post('/contact_us', 'FrontController::contact_us_save');
$routes->get('/privacy-policy', 'FrontController::privacy_policy');
$routes->get('/change-password', 'FrontController::view_change_password');

//home VIEW ROUTES

$routes->get('/bussiness', 'FrontController::bussiness');
$routes->get('/category', 'FrontController::category');

$routes->get('/category/(:any)', 'FrontController::subcategory_listings/$1');
$routes->get('/sub-category/(:any)', 'FrontController::subcategory_business_listings/$1');
$routes->get('/business', 'FrontController::show_business');
$routes->get('/business/(:alphanum)', 'FrontController::single_business/$1');
$routes->get('/business-preview/(:alphanum)', 'FrontController::single_business_preview/$1');

$routes->get('/show-business', 'FrontController::business_listing');
// $routes->get('/business_detail', 'FrontController::businessdetails');
$routes->get('/dubai-explore', 'FrontController::dubai_explore');

// Test route for 404 error
$routes->get('/test-error', 'FrontController::test_error');

$routes->post('/front/subcat_business_list_more', 'FrontController::subcat_business_list_more');

$routes->get('/admin/subcategory/index/(:any)', 'CategoryController::fetch_subcategory/$1');
$routes->get('/admin/subcategory', 'CategoryController::fetch_subcategory');






/* User routes */


// Register
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
$routes->Post('/business/update/(:any)', 'UserController::update_user_business/$1');


$routes->Post('/review-now-text', 'FrontController::save_review_now_text');
$routes->Post('/send-enquiry', 'FrontController::save_enquiry');
$routes->Post('/send-enquiry-add-business', 'FrontController::save_enquiry_add_business');
$routes->Post('/claim-business', 'FrontController::save_claim_business');
$routes->Post('/save-review', 'FrontController::save_review');




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
