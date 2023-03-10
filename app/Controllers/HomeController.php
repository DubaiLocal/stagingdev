<?php

namespace App\Controllers;

use App\Models\FrontModel;
use App\Models\CategoryModel;
use App\Models\CategorySeoModel;
use App\Models\SubCategoryModel;
use App\Models\SubCategorySeoModel;
use App\Models\BussinessesModel;
use App\Models\BusinessCategoryModel;
use App\Models\ReviewNowModel;
use App\Models\ReviewsModel;
use App\Models\EnquiryModel;
use App\Models\BusinessClaimsModel;
use App\Models\DistrictsModel;
use App\Models\ContactUsModel;
use CodeIgniter\I18n\Time;

class HomeController extends BaseController
{
    public function index()
    {
        helper(['curl']);
        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();
        $categories = $CategoryModel->allCategoriesActive();
        $SubCategoryModel = new SubCategoryModel();
        $BussinessesModel = new BussinessesModel();
        $districtsModel = new DistrictsModel();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $all_businesses = $BussinessesModel->home_business_listings_all();
        $districts = $districtsModel->all_districts();

        // $appSettings = new AppSettingsModel();
        // $app_data = $appSettings->get_app_data();

        $data = [
            'all_feature_business' => $all_businesses,
            'categories' => $categories,
            'menu_categories' => $menu_categories,
            'menu_sub_categories' => $menu_sub_categories,
            'districts' => $districts,
            // 'app_data' => $app_data[0],
        ];
        return view('home/index',$data);
    }
    public function index2()
    {
        helper(['curl']);
        $front = new FrontModel();
        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();
        $categories = $CategoryModel->allCategoriesActive();
        $SubCategoryModel = new SubCategoryModel();
        $BussinessesModel = new BussinessesModel();
        $districtsModel = new DistrictsModel();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $all_businesses = $BussinessesModel->home_business_listings("");
        $all_best_rate_business = $BussinessesModel->home_business_listings("1");
        $all_most_view_business = $BussinessesModel->home_business_listings("2");
        $all_popular_business = $BussinessesModel->home_business_listings("3");
        $all_featured_business = $BussinessesModel->home_business_listings("4");
        $districts = $districtsModel->all_districts();
        $blog_data = [];
        $tips_data = [];
        /* $blog_explore_curl = perform_http_request_blog("176");
        $blog_data = [];
        $i = 0;
        if ($blog_explore_curl) {
            foreach ($blog_explore_curl as $post) {
                $blog_data[$i]['wpTitle'] = $post['title']['rendered'];
                $blog_data[$i]['wpContent'] = $post['excerpt']['rendered'];
                $blog_data[$i]['wpLink'] = $post['link'];
                $blog_data[$i]['wpImageURL'] = $post['_embedded']['wp:featuredmedia']['0']['source_url'];
                $blog_data[$i]['wpDate'] = $post['date_gmt'];
                $blog_data[$i]['wpLink'] = $post['link'];
                $i++;
                if ($i == 3) break;
            }
        }
        $tips_explore_curl = perform_http_request_blog("189");

        $tips_data = [];
        $i = 0;
        if ($tips_explore_curl) {
            foreach ($tips_explore_curl as $post) {
                $tips_data[$i]['wpTitle'] = $post['title']['rendered'];
                $tips_data[$i]['wpContent'] = $post['excerpt']['rendered'];
                $tips_data[$i]['wpLink'] = $post['link'];
                $tips_data[$i]['wpImageURL'] = $post['_embedded']['wp:featuredmedia']['0']['source_url'];
                $tips_data[$i]['wpDate'] = $post['date_gmt'];
                $tips_data[$i]['wpLink'] = $post['link'];
                $i++;
                if ($i == 8) break;
            }
        } */

        $data = [
            'all_best_rate_business' => $all_best_rate_business,
            'all_feature_business' => $all_businesses,
            'all_featured_business' => $all_featured_business,
            'all_popular_business' => $all_popular_business,
            'all_most_view_business' => $all_most_view_business,
            'popular_categories' => $popular_categories,
            'browse_cities' => $browse_cities,
            'categories' => $categories,
            'menu_categories' => $menu_categories,
            'menu_sub_categories' => $menu_sub_categories,
            'latest_businesses' => $latest_businesses,
            'blog_explore' => $blog_data,
            'tips_explore' => $tips_data,
            'districts' => $districts,
        ];
        return view('home/index2', $data);
    }
    public function fetch_business_directory()
    {
        $CategoryModel = new CategoryModel();
        $categories = $CategoryModel->allCategoriesActive();
        $SubCategoryModel = new SubCategoryModel();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $categoriesDirectory = $CategoryModel->browse_business_directory();


        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();
        /* print("<pre>" . print_r($categoriesDirectory, true) . "</pre>");
        die(); */
        $menu_categories = $CategoryModel->menu_categories();
        $data =
            [
                'categories' => $categories,
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'directory' => $categoriesDirectory,
                // 'pager' => $business->pager,
            ];
        return view('home/browse-business-directory', $data);
    }
    public function dubai_explore()
    {
        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategoryModel();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $data =
            [
                'menu_sub_categories' => $menu_sub_categories,
                'menu_categories' => $menu_categories,
            ];
        return view('home/dubai-explore', $data);
    }
    /* Category Listing */
    public function subcategory_listings($slug = null)
    {
        helper(['curl']);
        $CategoryModel = new CategoryModel();
        $SubCategoryModel = new SubCategoryModel();
        $frontModel = new FrontModel();
        $categorySeoModel = new CategorySeoModel();
        $cat_id = $CategoryModel->get_category_id_by_slug($slug);
        $subcat_data = array();
        if (is_array($cat_id) && count($cat_id) > 0) {
            $subcat_data = $SubCategoryModel->get_subcategories($cat_id[0]['id']);
        }
        /* print("<pre>" . print_r($subcat_data, true) . "</pre>");
        die(); */
        $menu_categories = $CategoryModel->menu_categories();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $tips_explore_curl = perform_http_request_blog_explore();

        $tips_data = [];
        $i = 0;
        if ($tips_explore_curl) {
            foreach ($tips_explore_curl as $post) {
                $tips_data[$i]['wpTitle'] = $post['title']['rendered'];
                $tips_data[$i]['wpContent'] = $post['excerpt']['rendered'];
                $tips_data[$i]['wpLink'] = $post['link'];
                $tips_data[$i]['wpImageURL'] = $post['_embedded']['wp:featuredmedia']['0']['source_url'];
                $tips_data[$i]['wpDate'] = $post['date_gmt'];
                $tips_data[$i]['wpLink'] = $post['link'];
                $i++;
                if ($i == 8) break;
            }
        }
        $cat_seo_data = $categorySeoModel->get_seo_data($cat_id[0]['id']);
        $title = $cat_seo_data[0]->title;
        $meta_title = $cat_seo_data[0]->meta_title;
        $meta_desc = $cat_seo_data[0]->meta_desc;
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'category' => $cat_id,
                'subcat_business_data' => $subcat_data,
                'tips_explore' => $tips_data,
                'meta_title' => $meta_title,
                'title' => $title,
                'meta_desc' => $meta_desc,
                // 'pager' => $subcat_business->pager,
            ];
        return view('home/sub-cat-business-list', $data);
    }
    /* End Category Listing */

    /* Five categories on /Category page */

    public function category()
    {

        helper(['curl']);
        $CategoryModel = new CategoryModel();
        $SubCategoryModel = new SubCategoryModel();
        $single_category_subcat = $SubCategoryModel->single_category_subcat();

        $menu_categories = $CategoryModel->menu_categories();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $tips_explore_curl = perform_http_request_blog_explore();

        $tips_data = [];
        $i = 0;
        if ($tips_explore_curl) {
            foreach ($tips_explore_curl as $post) {
                $tips_data[$i]['wpTitle'] = $post['title']['rendered'];
                $tips_data[$i]['wpContent'] = $post['excerpt']['rendered'];
                $tips_data[$i]['wpLink'] = $post['link'];
                $tips_data[$i]['wpImageURL'] = $post['_embedded']['wp:featuredmedia']['0']['source_url'];
                $tips_data[$i]['wpDate'] = $post['date_gmt'];
                $tips_data[$i]['wpLink'] = $post['link'];
                $i++;
                if ($i == 8) break;
            }
        }
        $data = [
            'menu_priority_categories' => $menu_categories,
            'single_category_subcat' => $single_category_subcat,
            'menu_categories' => $menu_categories,
            'menu_sub_categories' => $menu_sub_categories,
            'tips_explore' => $tips_data,
        ];
        return view('home/category-listing', $data);
    }

    /* End Five categories on /Category page */

    public function single_category_subcat()
    {
        $SubCategoryModel = new SubCategoryModel();
        $id = $this->request->getvar('id');
        $single_category_subcat = $SubCategoryModel->single_category_subcat($id);
        $body = "";
        $body .= '<div class="tab-pane fade show active" id="' . strtolower($single_category_subcat[0]['cat_name']) . '" role="tabpanel" aria-labelledby="' . strtolower($single_category_subcat[0]['cat_name']) . '-tab">
                    <ul class="list-unstyled d-flex flex-wrap justify-content-around">';
        foreach ($single_category_subcat as $single_cat) {
            $body .=    '<li>
                            <a href="' . base_url() . '/businesses/' . $single_cat['slug'] . '" data-id="' . $single_cat['sub_cat_id'] . '">
                                <div class="category-item">
                                    <div class="img">
                                        <img src="' . base_url() . '/assets/sub_cat_img/' . $single_cat['banner'] . '"
                                            alt="">
                                    </div>
                                    <div class="category-info d-flex justify-content-between align-items-center">
                                        <div>
                                            <p>' . $single_cat['sub_cat_name'] . '</p>
                                            <span>' . $single_cat['list_count'] . ' Listing</span>
                                        </div>
                                        <a href="' . base_url() . '/businesses/' . $single_cat['slug'] . '" class="link-icon">
                                            <img src="' . base_url() . '/assets/front/images/circle-red.png"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </li>';
        }
        $body .=    '</ul>
                  </div>';
        return $body;
    }


    /* Business listings from subcategory */
    public function business_listings_subcategory($slug = null)
    {
        $SubCategoryModel = new SubCategoryModel();
        $subcategory_id = $SubCategoryModel->get_subcategory_id_slug($slug);


        $cat_subcat_name = $SubCategoryModel->get_cat_subcategory_slug($slug);


        $subcat_business = new BusinessCategoryModel();
        $subcat_business->select('business.name');
        $subcat_business->select('business.address');
        $subcat_business->select('business.slug');
        $subcat_business->select('business_detail.email');
        $subcat_business->select('business_detail.phone');
        $subcat_business->select('business_detail.banner');
        // $subcat_business->select('business_detail.*');
        $subcat_business->select('avg(reviews.score) as avg_rating');
        $subcat_business->select('business_category.category_id');
        $subcat_business->join('business', 'business.id = business_category.business_id', 'left');
        $subcat_business->join('reviews', 'reviews.business_id = business.id', "left");
        $subcat_business->join('business_detail', 'business.id = business_detail.business_id');
        $subcat_business->where('business_category.subcategory_id', $subcategory_id[0]['id']);
        $subcat_business->where('business.status', "1");
        $subcat_business->where('reviews.status', "1");
        $subcat_business->groupBy('business.id');
        /* $sql = $subcat_business->getCompiledSelect();
		echo $sql;
		die; */

        $subcat_business_data = $subcat_business->paginate(21);
        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();

        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $sidebar_categories =  $SubCategoryModel->sub_categories_with_count(md5($subcat_business_data[0]['category_id']));

        $subCategorySeoModel = new SubCategorySeoModel();
        $sub_cat_seo_data = $subCategorySeoModel->get_seo_data($subcategory_id[0]['id']);
        $title = $sub_cat_seo_data[0]->title;
        $meta_title = $sub_cat_seo_data[0]->meta_title;
        $meta_desc = $sub_cat_seo_data[0]->meta_desc;

        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'subcat_business_data' => $subcat_business_data,
                'sidebar_categories' => $sidebar_categories,
                'cat_name' => $cat_subcat_name,
                // 'pager' => $subcat_business->pager,
                'meta_title' => $meta_title,
                'title' => $title,
                'meta_desc' => $meta_desc,
            ];
        return view('home/business-listing', $data);
    }
    public function business_listings_subcategory_load_more()
    {
        $limit = 21;
        $pager =  $limit * $this->request->getVar('page');
        $slug =  $this->request->getVar('slug');
        $SubCategoryModel = new SubCategoryModel();
        $subcategory_id = $SubCategoryModel->get_subcategory_id_slug($slug);


        $cat_subcat_name = $SubCategoryModel->get_cat_subcategory_slug($slug);


        $subcat_business = new BusinessCategoryModel();
        $subcat_business->select('business.name');
        $subcat_business->select('business.address');
        $subcat_business->select('business.slug');
        $subcat_business->select('business_detail.email');
        $subcat_business->select('business_detail.phone');
        $subcat_business->select('business_detail.banner');
        $subcat_business->select('avg(reviews.score) as avg_rating');
        $subcat_business->join('business', 'business.id = business_category.business_id', 'left');
        $subcat_business->join('reviews', 'reviews.business_id = business.id', "left");
        $subcat_business->join('business_detail', 'business.id = business_detail.business_id');
        $subcat_business->where('business_category.subcategory_id', $subcategory_id[0]['id']);
        $subcat_business->where('business.status', "1");
        $subcat_business->where('reviews.status', "1");
        $subcat_business->groupBy('business.id');
        $subcat_business->limit(10, $pager);
        $subcat_business_data = $subcat_business->get()->getResultArray();
        $body = "";
        $i = $pager * 0.2;
        // print_r($subcat_business_data);
        foreach ($subcat_business_data as $business) {
            $i += 0.2;
            $rating_star = "";
            for ($k = 1; $k <= (int)number_format((float)$business['avg_rating'], 1, '.', ''); $k++) {
                $rating_star .= '<li class="list-inline-item mr-0"><span class="fa fa-star checked"></span></li>';
            }
            if ((5 - (int)$business['avg_rating']) != 0) {
                for ($j = 1; $j <= (5 - (int)number_format((float)$business['avg_rating'], 1, '.', '')); $j++) {
                    $rating_star .= '<li class="list-inline-item mr-0"><span class="fa fa-star"></span></li>';
                }
            };
            $address = "";
            $phone = "";
            if ($business['address'] != "") {
                $address = '<li><span><img src="' . base_url() . '/assets/front/images/location-icon.png" alt=""></span>' . $business['address'] . '</li>';
            }
            if ($business['phone'] == "" || $business['phone'] == "-" || $business['phone'] == " - ") {
            } else {
                $phone = '<li><span><img src="' . base_url() . '/assets/front/images/call-icon.png" alt=""></span><a href="tel:' . $business['phone'] . '">' . $business['phone'] . '</a></li>';
            }

            $body .= '<div class="card list-item wow fadeInUp" data-wow-delay=' . $i . '>
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-3">
                        <div class="business_list_img">
                            <a href="' . base_url() . '/business/' . $business['slug'] . '"> <img src="' . base_url() . '/assets/logo/' . $business['banner'] . '" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-9">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="ratings mb-2">
                                    <ul class="list-unstyled list-inline">
                                        ' . $rating_star . '
                                        <li class="list-inline-item ml-3"><span class="badge badge-primary badge-pill">' . number_format((float)$business['avg_rating'], 1, '.', '') . '</span></li>
                                    </ul>
                                </div>
                                <div class="listing-content">
                                    <h6 class="menu-title">
                                        <a href="' . base_url() . '/business/' . $business['slug'] . '"> ' . $business['name'] . '</a>

                                    </h6>
                                </div>
                                <ul class="list-unstyled contact-det">
                                        ' . $address . '
                                        ' . $phone . '
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-bottom-btn text-center">
                                    <a href="' . base_url() . '/business/' . $business['slug'] . '" class="btn btn-primary theme-btn-red view-det-btn"> View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        echo $body;
    }
    public function business_listings_subcategory_district($slug = null, $district = null)
    {
        $SubCategoryModel = new SubCategoryModel();
        $subcategory_id = $SubCategoryModel->get_subcategory_id_slug($slug);


        $cat_subcat_name = $SubCategoryModel->get_cat_subcategory_slug($slug);


        $subcat_business = new BusinessCategoryModel();
        $subcat_business->select('business.*');
        $subcat_business->select('business_detail.*');
        $subcat_business->select('avg(reviews.score) as avg_rating');
        $subcat_business->join('business', 'business.id = business_category.business_id', 'left');
        $subcat_business->join('reviews', 'reviews.business_id = business.id', "left");
        $subcat_business->join('business_detail', 'business.id = business_detail.business_id');
        $subcat_business->where('business_category.subcategory_id', $subcategory_id[0]['id']);
        $subcat_business->where('business.status', "1");
        $subcat_business->where('reviews.status', "1");
        $subcat_business->where('md5(business.district_id)', $district);
        $subcat_business->groupBy('business.id');

        $subcat_business_data = $subcat_business->paginate(21);
        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();


        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'subcat_business_data' => $subcat_business_data,
                'sidebar_categories' => $sidebar_categories,
                'cat_name' => $cat_subcat_name,
                'pager' => $subcat_business->pager,
            ];
        return view('home/business-listing', $data);
    }
    /* End business listing from category */

    /* Single  business */

    public function single_business($slug = NULL)
    {
        $CategoryModel = new CategoryModel();
        $SubCategoryModel = new SubCategoryModel();
        $business = new BussinessesModel();
        $business_data = $business->single_bussiness($slug);
        if ($business_data[0]->id == "") {
            return redirect()->to(base_url());
        }
        // $sidebar_categories = $CategoryModel->categories_with_count();
        // $front = new Front();
        // $claimed_business = $front->businessClaimed($id);
        // $reviews = $front->all_reviews($id);
        /* print("<pre>" . print_r($business_data, true) . "</pre>");
        die(); */

        $menu_categories = $CategoryModel->menu_categories();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $loggedin = "0";
        $session = session();
        if (session()->get('userid')) {
            $loggedin = "1";
        }
        $preview = "0";
        $single_busines_meta = $business->single_bussiness_meta($slug);
        $location = "";
        if ($single_busines_meta[0]->location == "") {
            $location = "Dubai";
        } else {
            $location = $single_busines_meta[0]->location;
        }
        $meta_title = $single_busines_meta[0]->name . " | " . $location . " | " . $single_busines_meta[0]->cat_name . " - Dubailocal.ae";
        $meta_desc = "";
        if ($single_busines_meta[0]->description != "") {
            $meta_desc = trim($single_busines_meta[0]->description);
            $meta_desc = str_replace('"', '', $meta_desc);
            $meta_desc = str_replace("'", "", $meta_desc);
        }
        // $meta_desc = ;
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'business_data' => $business_data[0],
                'sidebar_categories' => $sidebar_categories,
                'logged_in' => $loggedin,
                'preview' => $preview,
                'isClaimed' => $claimed_business,
                'reviews' => $reviews,
                'meta_title' => $meta_title,
                'title' => $meta_title,
                'meta_desc' => $meta_desc,
            ];
        return view('home/bussiness_detail', $data);
    }

    /* End Single  business */

    public function about_us()
    {
        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategoryModel();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $data =
            [
                'menu_sub_categories' => $menu_sub_categories,
                'menu_categories' => $menu_categories,
            ];
        return view('home/about-us', $data);
    }
    public function contact_us()
    {
        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategoryModel();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $data =
            [
                'menu_sub_categories' => $menu_sub_categories,
                'menu_categories' => $menu_categories,
            ];
        return view('home/contact-us', $data);
    }
    public function contact_us_save()
    {
        $ContactUsModel = new ContactUsModel();
        $name = $this->request->getvar('first_name');
        $userEmail = $this->request->getvar('email');
        $webUrl = $this->request->getvar('comp_url');
        $userQuery = $this->request->getvar('query');
        $mobil_num = $this->request->getvar('mobil_num');
        $saveEntries = $ContactUsModel->saveQueryEntries($name, $userEmail, $webUrl, $mobil_num, $userQuery);
        if ($saveEntries) {
            $message = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                            <style type="text/css">
                                body {
                                    margin: 0px;
                                    padding: 0px;
                                    font-family: Arial, Helvetica, sans-serif;
                                }
                            </style>
                        </head>

                        <body>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" valign="top" scope="col">
                                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" valign="top" scope="col">
                                                    <table width="490" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center" valign="middle" height="137"><img width="184" height=""
                                                                    src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" bgcolor="#FCFCFC" style="border:solid 1px #F2F2F2;">
                                                                <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" valign="middle" height="30"
                                                                            style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                            Someone has contacted you on DubaiLocal. Below are the details</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="19" bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="131" bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Full Name</td>
                                                                                    <td width="24" bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="221" bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $name . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Email Address:</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $userEmail . '</td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Website Url :</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $webUrl . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Phone No.:</td>
                                                                                    <td bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $mobil_num . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#F1EDED
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F1EDED height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Message:</td>
                                                                                    <td bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $userQuery . '</td>
                                                                                </tr>
                                                                                
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="50">&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" height="92"
                                                                style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                Copyright ?? 2023, <a href="' . base_url() . '" target="_blank"
                                                                    style="color:#6FBB65; text-decoration:none;">Dubailocal.ae</a>. All rights
                                                                reserved.</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </body>

                        </html>';
            $email = \Config\Services::email();
            $email->setFrom('localsdubai@gmail.com', 'Dubai local');
            $email->setTo("localsdubai@gmail.com");
            $email->setSubject('Someone Contacted Us on Our Website');
            $email->setMessage($message); //your message here
            if ($email->send()) {
                echo '1';
            } else {
                $data = $email->printDebugger(['headers']);
                // print_r($data);
                echo "email not sent";
            }
            $messageusr = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                        </head>

                        <body>
                            <table
                                style="width: 100%; max-width:650px; border: 1px solid #ccc; margin: auto;font-family: arial, sans-serif; color: #777777;">
                                <tbody>
                                    <tr>
                                        <td
                                            style="text-align: center;font-size: 14px;font-weight: 600;color: #fff;background: #7bc36a;padding: 7px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 18px;">
                                            <table style="width: 100%;background: #fff;padding: 20px;">
                                                <tr>
                                                    <td align="center"><img width="137" height=""
                                                            src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-size: 15px;">
                                            <table style="width: 100%;background: #f3f3f3; border-collapse: collapse;">
                                                <tr style="font-size: 16px;">
                                                    <td colspan="2" style="padding:30px 20px 10px 20px; text-align:left; font-weight:600;">Hello
                                                        ' . $name . '</td>
                                                </tr>
                                                <tr align="center" style="">
                                                    <td style="padding: 10px;line-height: 36px;font-size: 28px;color: #113b51;">Thanks for
                                                        contacting us One of our business executives will get back to you on this soon and
                                                        answer your query.
                                                    </td>
                                                </tr>
                                                <tr align="center" style="">
                                                    <td style="padding: 10px 35px;line-height: 30px;font-size: 20px;">Thanks for your patience
                                                        with this.</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;">Regards!</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;">Team DubaiLocal</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;"><a
                                                            href="https://www.dubailocal.ae">https://www.dubailocal.ae</a></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 20px; text-align: center; font-size: 14px;">Copyright ?? 2023, <a
                                                href="https://dubailocal.ae/"
                                                style="color: #7bc36a; text-decoration: none;">dubailocal.ae</a>. All Rights Reserved.</td>
                                    </tr>

                                </tbody>
                            </table>

                        </body>

                        </html>';
            $emailusr = \Config\Services::email();
            $emailusr->setFrom('localsdubai@gmail.com', "DubaiLocal");
            $emailusr->setTo($userEmail);
            $emailusr->setSubject("Thanks for contacting us");
            $emailusr->setMessage($messageusr);
            if ($emailusr->send()) {
                echo 'Email successfully sent';
                return true;
            } else {
                $data = $emailusr->printDebugger(['headers']);
                print_r($data);
            }
        } else {
            echo "not saved";
        }
    }
    public function privacy_policy()
    {
        $CategoryModel = new CategoryModel();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategoryModel();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        $data =
            [
                'menu_sub_categories' => $menu_sub_categories,
                'menu_categories' => $menu_categories,
            ];
        return view('home/privacy-policy', $data);
    }

    public function save_review_now_text()
    {
        $ReviewNowModel = new ReviewNowModel();
        $text = $this->request->getvar('review_now_text');
        $business_id = $this->request->getvar('busi_id');
        $saveEntries = $ReviewNowModel->saveReviewNow($text, $business_id);
        return redirect()->to(base_url() . '/business/' . md5($business_id));
    }
    public function save_review()
    {
        $ReviewsModel = new ReviewsModel();
        $selected_rating = $this->request->getvar('selected_rating');
        $business_id = $this->request->getvar('busi_id');
        $business_slug = $this->request->getvar('busi_slug');
        $business_name = $this->request->getvar('busi_name');
        $review_text = $this->request->getvar('review_text');
        // echo $selected_rating . " - " . $business_id . " - " . session()->get('userid');
        /* $session = session();
        if (session()->get('userid')) {
            $loggedin = "1";
        } */

        $saveEntries = $ReviewsModel->saveReview($review_text, $selected_rating, $business_id);

        $message = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                            <style type="text/css">
                                body {
                                    margin: 0px;
                                    padding: 0px;
                                    font-family: Arial, Helvetica, sans-serif;
                                }
                            </style>
                        </head>

                        <body>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" valign="top" scope="col">
                                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" valign="top" scope="col">
                                                    <table width="490" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center" valign="middle" height="137"><img width="184" height=""
                                                                    src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" bgcolor="#FCFCFC" style="border:solid 1px #F2F2F2;">
                                                                <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" valign="middle" height="30"
                                                                            style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                            Someone has posted a review on business' . $business_name . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="19" bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="131" bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Business Name</td>
                                                                                    <td width="24" bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="221" bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $business_name . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Review:</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $review_text . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Rating:</td>
                                                                                    <td bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $selected_rating . '</td>
                                                                                </tr>
                                                                                
                                                                                
                                                                                
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="50">&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" height="92"
                                                                style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                Copyright ?? 2023, <a href="' . base_url() . '" target="_blank"
                                                                    style="color:#6FBB65; text-decoration:none;">Dubailocal.ae</a>. All rights
                                                                reserved.</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </body>

                        </html>';
        $email = \Config\Services::email();
        $email->setFrom('localsdubai@gmail.com', 'Dubai local');
        $email->setTo("localsdubai@gmail.com");
        $email->setSubject('Someone has posted a review for a business');
        $email->setMessage($message); //your message here
        $email->send();


        // return redirect()->to(base_url() . '/business/' . md5($business_id));
    }
    public function save_enquiry()
    {
        $EnquiryModel = new EnquiryModel();
        $enq_name = $this->request->getvar('enq_name');
        $email_user = $this->request->getvar('email');
        $phone_no = $this->request->getvar('phone_no');
        $enquiry_text = $this->request->getvar('enquiry_text');
        if ($this->request->getvar('busi_id')) {
            $business_id = $this->request->getvar('busi_id');
        } else {
            $business_id = "";
        }

        // $saveEntries = $EnquiryModel->saveEnquiry($enq_name, $email, $phone_no, $enquiry_text, $business_id);
        $message = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                            <style type="text/css">
                                body {
                                    margin: 0px;
                                    padding: 0px;
                                    font-family: Arial, Helvetica, sans-serif;
                                }
                            </style>
                        </head>

                        <body>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" valign="top" scope="col">
                                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" valign="top" scope="col">
                                                    <table width="490" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center" valign="middle" height="137"><img width="184" height=""
                                                                    src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" bgcolor="#FCFCFC" style="border:solid 1px #F2F2F2;">
                                                                <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" valign="middle" height="30"
                                                                            style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                            Someone has contacted you on DubaiLocal. Below are the details</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="19" bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="131" bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Full Name</td>
                                                                                    <td width="24" bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="221" bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $enq_name . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Email Address:</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $email_user . '</td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Phone No :</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $phone_no . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Message:</td>
                                                                                    <td bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $enquiry_text . '</td>
                                                                                </tr>
                                                                                
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="50">&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" height="92"
                                                                style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                Copyright ?? 2023, <a href="' . base_url() . '" target="_blank"
                                                                    style="color:#6FBB65; text-decoration:none;">Dubailocal.ae</a>. All rights
                                                                reserved.</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </body>

                        </html>';
        $email = \Config\Services::email();
        $email->setFrom('localsdubai@gmail.com', 'Dubai local');
        $email->setTo("localsdubai@gmail.com");
        $email->setSubject('Someone has Enquiry on Our Website');
        $email->setMessage($message); //your message here
        $email->send();


        $messageusr = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                        </head>

                        <body>
                            <table
                                style="width: 100%; max-width:650px; border: 1px solid #ccc; margin: auto;font-family: arial, sans-serif; color: #777777;">
                                <tbody>
                                    <tr>
                                        <td
                                            style="text-align: center;font-size: 14px;font-weight: 600;color: #fff;background: #7bc36a;padding: 7px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 18px;">
                                            <table style="width: 100%;background: #fff;padding: 20px;">
                                                <tr>
                                                    <td align="center"><img width="137" height=""
                                                            src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-size: 15px;">
                                            <table style="width: 100%;background: #f3f3f3; border-collapse: collapse;">
                                                <tr style="font-size: 16px;">
                                                    <td colspan="2" style="padding:30px 20px 10px 20px; text-align:left; font-weight:600;">Hello
                                                        ' . $enq_name . '</td>
                                                </tr>
                                                <tr align="center" style="">
                                                    <td style="padding: 10px;line-height: 36px;font-size: 28px;color: #113b51;">Thanks for
                                                        contacting us One of our business executives will get back to you on this soon and
                                                        answer your query.
                                                    </td>
                                                </tr>
                                                <tr align="center" style="">
                                                    <td style="padding: 10px 35px;line-height: 30px;font-size: 20px;">Thanks for your patience
                                                        with this.</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;">Regards!</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;">Team DubaiLocal</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;"><a
                                                            href="https://www.dubailocal.ae">https://www.dubailocal.ae</a></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 20px; text-align: center; font-size: 14px;">Copyright ?? 2023, <a
                                                href="https://dubailocal.ae/"
                                                style="color: #7bc36a; text-decoration: none;">dubailocal.ae</a>. All Rights Reserved.</td>
                                    </tr>

                                </tbody>
                            </table>

                        </body>

                        </html>';
        $emailusr = \Config\Services::email();
        $emailusr->setFrom('localsdubai@gmail.com', "DubaiLocal");
        $emailusr->setTo($email_user);
        $emailusr->setSubject("Thanks for contacting us");
        $emailusr->setMessage($messageusr);
        if ($emailusr->send()) {
            echo 'Email successfully sent';
            return true;
        } else {
            $data = $emailusr->printDebugger(['headers']);
            print_r($data);
        }
        // $email->printDebugger(['headers']);
        // echo $saveEntries;
        /* print_r($saveEntries);
        die(); */
        // return redirect()->to(base_url() . '/business/' . md5($business_id));
    }
    public function save_enquiry_add_business()
    {
        $EnquiryModel = new EnquiryModel();
        $enq_name = $this->request->getvar('enq_name_add_business');
        $email_user = $this->request->getvar('enq_email_add_business');
        $phone_no = $this->request->getvar('enq_phone_no_add_business');
        $website_url = $this->request->getvar('enq_website_url_add_business');
        $enquiry_text = $this->request->getvar('enq_text_add_business');

        // $saveEntries = $EnquiryModel->saveEnquiryAddBusiness($enq_name, $email, $phone_no, $enquiry_text, $website_url);


        $message = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                            <style type="text/css">
                                body {
                                    margin: 0px;
                                    padding: 0px;
                                    font-family: Arial, Helvetica, sans-serif;
                                }
                            </style>
                        </head>

                        <body>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" valign="top" scope="col">
                                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" valign="top" scope="col">
                                                    <table width="490" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center" valign="middle" height="137"><img width="184" height=""
                                                                    src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" bgcolor="#FCFCFC" style="border:solid 1px #F2F2F2;">
                                                                <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" valign="middle" height="30"
                                                                            style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                            Someone has shown interest in becoming a partner with DubaiLocal. Below are the details</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="19" bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="131" bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Full Name</td>
                                                                                    <td width="24" bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="221" bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $enq_name . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Email Address:</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $email_user . '</td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Phone No :</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $phone_no . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Website Url:</td>
                                                                                    <td bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $website_url . '</td>
                                                                                </tr>
                                                                                        <tr>
                                                                                    <td bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Message:</td>
                                                                                    <td bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $enquiry_text . '</td>
                                                                                </tr>
                                                                                
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="50">&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" height="92"
                                                                style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                Copyright ?? 2023, <a href="' . base_url() . '" target="_blank"
                                                                    style="color:#6FBB65; text-decoration:none;">Dubailocal.ae</a>. All rights
                                                                reserved.</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </body>

                        </html>';
        $email = \Config\Services::email();
        $email->setFrom('localsdubai@gmail.com', 'Dubai local');
        $email->setTo("localsdubai@gmail.com");
        $email->setSubject('Someone has Enquiry on Our Website');
        $email->setMessage($message); //your message here
        $email->send();

        $messageusr = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                        </head>

                        <body>
                            <table
                                style="width: 100%; max-width:650px; border: 1px solid #ccc; margin: auto;font-family: arial, sans-serif; color: #777777;">
                                <tbody>
                                    <tr>
                                        <td
                                            style="text-align: center;font-size: 14px;font-weight: 600;color: #fff;background: #7bc36a;padding: 7px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 18px;">
                                            <table style="width: 100%;background: #fff;padding: 20px;">
                                                <tr>
                                                    <td align="center"><img width="137" height=""
                                                            src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-size: 15px;">
                                            <table style="width: 100%;background: #f3f3f3; border-collapse: collapse;">
                                                <tr style="font-size: 16px;">
                                                    <td colspan="2" style="padding:30px 20px 10px 20px; text-align:left; font-weight:600;">Hello
                                                        ' . $enq_name . '</td>
                                                </tr>
                                                <tr align="center" style="">
                                                    <td style="padding: 10px;line-height: 36px;font-size: 28px;color: #113b51;">Thanks for contacting us and showing interest in becoming a partner with DubaiLocal. One of our business executives will get back to you on this soon and answer your query.
                                                    </td>
                                                </tr>
                                                <tr align="center" style="">
                                                    <td style="padding: 10px 35px;line-height: 30px;font-size: 20px;">Thanks for your patience
                                                        with this.</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;">Regards!</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;">Team DubaiLocal</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;"><a
                                                            href="https://www.dubailocal.ae">https://www.dubailocal.ae</a></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 20px; text-align: center; font-size: 14px;">Copyright ?? 2023, <a
                                                href="https://dubailocal.ae/"
                                                style="color: #7bc36a; text-decoration: none;">dubailocal.ae</a>. All Rights Reserved.</td>
                                    </tr>

                                </tbody>
                            </table>

                        </body>

                        </html>';
        $emailusr = \Config\Services::email();
        $emailusr->setFrom('localsdubai@gmail.com', "DubaiLocal");
        $emailusr->setTo($email_user);
        $emailusr->setSubject("Thanks for contacting us");
        $emailusr->setMessage($messageusr);
        if ($emailusr->send()) {
            echo 'Email successfully sent';
            return true;
        } else {
            $data = $emailusr->printDebugger(['headers']);
            print_r($data);
        }

        // echo $saveEntries;
        /* print_r($saveEntries);
        die(); */
        // return redirect()->to(base_url() . '/business/' . md5($business_id));
    }
    public function save_claim_business()
    {
        $BusinessClaimsModel = new BusinessClaimsModel();
        $name = $this->request->getvar('name');
        $email_user = $this->request->getvar('email');
        $phone_no = $this->request->getvar('phone_no');
        $business_id = $this->request->getvar('busi_id');
        // $saveEntries = $BusinessClaimsModel->saveClaims($name, $email, $phone_no, $business_id);
        $message = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                            <style type="text/css">
                                body {
                                    margin: 0px;
                                    padding: 0px;
                                    font-family: Arial, Helvetica, sans-serif;
                                }
                            </style>
                        </head>

                        <body>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" valign="top" scope="col">
                                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" valign="top" scope="col">
                                                    <table width="490" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center" valign="middle" height="137"><img width="184" height=""
                                                                    src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" bgcolor="#FCFCFC" style="border:solid 1px #F2F2F2;">
                                                                <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" valign="middle" height="30"
                                                                            style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                            Someone has approached for a business claim. Below are the details</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="420" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="19" bgcolor="#F1EDED"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="131" bgcolor="#F1EDED" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Full Name</td>
                                                                                    <td width="24" bgcolor="#F5F3F3"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td width="221" bgcolor="#F5F3F3" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $name . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Email Address:</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $email_user . '</td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Phone No :</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $phone_no . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f7f7" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        Business Name:</td>
                                                                                    <td bgcolor="#f9f7f7"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        &nbsp;</td>
                                                                                    <td bgcolor="#f9f8f8" height="50"
                                                                                        style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                                        ' . $business_id . '</td>
                                                                                </tr>
                                                                                
                                                                                
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="50">&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" height="92"
                                                                style="font-size:16px; color:#737678; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-weight:400;">
                                                                Copyright ?? 2023, <a href="' . base_url() . '" target="_blank"
                                                                    style="color:#6FBB65; text-decoration:none;">Dubailocal.ae</a>. All rights
                                                                reserved.</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </body>

                        </html>';
        $email = \Config\Services::email();
        $email->setFrom('localsdubai@gmail.com', 'Dubai local');
        $email->setTo("localsdubai@gmail.com");
        $email->setSubject('Someone has approached for a business claim');
        $email->setMessage($message); //your message here
        $email->send();


        $messageusr = '<!DOCTYPE html>
                        <html>

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Dubai local</title>
                        </head>

                        <body>
                            <table
                                style="width: 100%; max-width:650px; border: 1px solid #ccc; margin: auto;font-family: arial, sans-serif; color: #777777;">
                                <tbody>
                                    <tr>
                                        <td
                                            style="text-align: center;font-size: 14px;font-weight: 600;color: #fff;background: #7bc36a;padding: 7px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 18px;">
                                            <table style="width: 100%;background: #fff;padding: 20px;">
                                                <tr>
                                                    <td align="center"><img width="137" height=""
                                                            src="https://dubailocal.ae/assets/front/images/logo.png" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-size: 15px;">
                                            <table style="width: 100%;background: #f3f3f3; border-collapse: collapse;">
                                                <tr style="font-size: 16px;">
                                                    <td colspan="2" style="padding:30px 20px 10px 20px; text-align:left; font-weight:600;">Hello
                                                        ' . $name . '</td>
                                                </tr>
                                                <tr align="center" style="">
                                                    <td style="padding: 10px;line-height: 36px;font-size: 28px;color: #113b51;">Thanks for contacting us in regards to claiming your business page on our portal. One of our business executives will get back to you on this soon.
                                                    </td>
                                                </tr>
                                                <tr align="center" style="">
                                                    <td style="padding: 10px 35px;line-height: 30px;font-size: 20px;">Thanks for your patience
                                                        with this.</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;">Regards!</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;">Team DubaiLocal</td>
                                                </tr>
                                                <tr align="left" style="">
                                                    <td style="padding: 10px 35px;line-height: 22px;color: #333333;"><a
                                                            href="https://www.dubailocal.ae">https://www.dubailocal.ae</a></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 20px; text-align: center; font-size: 14px;">Copyright ?? 2023, <a
                                                href="https://dubailocal.ae/"
                                                style="color: #7bc36a; text-decoration: none;">dubailocal.ae</a>. All Rights Reserved.</td>
                                    </tr>

                                </tbody>
                            </table>

                        </body>

                        </html>';
        $emailusr = \Config\Services::email();
        $emailusr->setFrom('localsdubai@gmail.com', "DubaiLocal");
        $emailusr->setTo($email_user);
        $emailusr->setSubject("Thanks for contacting us");
        $emailusr->setMessage($messageusr);
        if ($emailusr->send()) {
            echo 'Email successfully sent';
            return true;
        } else {
            $data = $emailusr->printDebugger(['headers']);
            print_r($data);
        }

        // echo $saveEntries;
        // echo $name . " - " . $email . " - " . $phone_no . " - " . $business_id;
    }

    /* Search method */
    public function search_query()
    {
        $uri = new \CodeIgniter\HTTP\URI(current_url(true));
        $keyword =  $this->request->getVar('query');
        $category_id =  $this->request->getVar('z');
        $district_id =  $this->request->getVar('d');

        /* $keyword = $uri->getQuery(['only' => ['query']]);
        $category_id = $uri->getQuery(['only' => ['z']]);
        $district_id = $uri->getQuery(['only' => ['d']]);
        $keyword = substr($keyword, strpos($keyword, "=") + 1);
        $category_id = substr($category_id, strpos($category_id, "=") + 1);
        $district_id = substr($district_id, strpos($district_id, "=") + 1);

        $keyword = urldecode($keyword); */


        $subCategoryModel = new SubCategoryModel();
        $CategoryModel = new CategoryModel();
        $BussinessesModel = new BussinessesModel();
        $menu_categories = $CategoryModel->menu_categories();
        $categories = $CategoryModel->allCategoriesActive();
        $menu_sub_categories = $subCategoryModel->all_sub_categories_category();



        $subcat_data = $subCategoryModel->get_subcategories_search($category_id);
        $subcategory_array = array();
        if (is_array($subcat_data) && count($subcat_data) > 0) {
            foreach ($subcat_data as $subcategory) {
                array_push($subcategory_array, $subcategory['sub_cat_id']);
            }
        }
        $find_keywords = $subCategoryModel->find_keywords_test($subcategory_array, $keyword);



        $subcategory_array = array();
        $body = "";
        if (is_array($find_keywords) && count($find_keywords) > 0) {
            foreach ($find_keywords as $keyword) {
                if ($keyword['keyword_source'] == "1") {
                    array_push($subcategory_array, $keyword['subcat_id']);
                } else if ($keyword['keyword_source'] == "2") {
                    array_push($subcategory_array, $keyword['subcat_id']);
                }
            }
        } else {
            $body .= "No results found";
        }
        if (is_array($subcategory_array) && count($subcategory_array) > 0) {
            $find_business = $BussinessesModel->get_search_business($subcategory_array, $district_id);
        } else {
            $find_business = $BussinessesModel->get_search_business_district($district_id);;
        }
        /* print("<pre>" . print_r($subcategory_array, true) . "</pre>");
        die();
        echo $body; */




        $data = [
            'sidebar_categories' => $subCategoryModel->sub_categories_with_count($category_id),
            'categories' => $categories,
            'menu_categories' => $menu_categories,
            'menu_sub_categories' => $menu_sub_categories,
            'businesses' => $find_business,
        ];
        // print("<pre>" . print_r($data['sidebar_categories'], true) . "</pre>");

        // die();
        return view('home/search', $data);
    }
    public function search_query_load_more()
    {
        $uri = new \CodeIgniter\HTTP\URI(current_url(true));
        $keyword =  $this->request->getVar('query');
        $category_id =  $this->request->getVar('z');
        $district_id =  $this->request->getVar('d');

        $limit = 21;
        $pager =  $limit * $this->request->getVar('page');
        $subCategoryModel = new SubCategoryModel();

        $BussinessesModel = new BussinessesModel();

        $subcat_data = $subCategoryModel->get_subcategories_search($category_id);
        $subcategory_array = array();
        if (is_array($subcat_data) && count($subcat_data) > 0) {
            foreach ($subcat_data as $subcategory) {
                array_push($subcategory_array, $subcategory['sub_cat_id']);
            }
        }
        $find_keywords = $subCategoryModel->find_keywords_test($subcategory_array, $keyword);



        $subcategory_array = array();
        $body = "";
        if (is_array($find_keywords) && count($find_keywords) > 0) {
            foreach ($find_keywords as $keyword) {
                if ($keyword['keyword_source'] == "1") {
                    array_push($subcategory_array, $keyword['subcat_id']);
                } else if ($keyword['keyword_source'] == "2") {
                    array_push($subcategory_array, $keyword['subcat_id']);
                }
            }
        } else {
            $body .= "No results found";
        }
        if (is_array($subcategory_array) && count($subcategory_array) > 0) {
            $find_business = $BussinessesModel->get_search_business($subcategory_array, $district_id, $pager);
        } else {
            $find_business = $BussinessesModel->get_search_business_district($district_id, $pager);
        }
        /* print("<pre>" . print_r($subcategory_array, true) . "</pre>");
        die();
        echo $body; */

        $body = "";
        $i = $pager * 0.2;

        foreach ($find_business as $business) {
            $i += 0.2;
            $rating_star = "";
            for ($k = 1; $k <= (int)number_format((float)$business['avg_rating'], 1, '.', ''); $k++) {
                $rating_star .= '<li class="list-inline-item mr-0"><span class="fa fa-star checked"></span></li>';
            }
            if ((5 - (int)$business['avg_rating']) != 0) {
                for ($j = 1; $j <= (5 - (int)number_format((float)$business['avg_rating'], 1, '.', '')); $j++) {
                    $rating_star .= '<li class="list-inline-item mr-0"><span class="fa fa-star"></span></li>';
                }
            };
            $address = "";
            $phone = "";
            if ($business['address'] != "") {
                $address = '<li><span><img src="' . base_url() . '/assets/front/images/location-icon.png" alt=""></span>' . $business['address'] . '</li>';
            }
            if ($business['phone'] == "" || $business['phone'] == "-" || $business['phone'] == " - ") {
            } else {
                $phone = '<li><span><img src="' . base_url() . '/assets/front/images/call-icon.png" alt=""></span><a href="tel:' . $business['phone'] . '">' . $business['phone'] . '</a></li>';
            }

            $body .= '<div class="card list-item wow fadeInUp" data-wow-delay=' . $i . '>
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-3">
                        <div class="business_list_img">
                            <a href="' . base_url() . '/business/' . $business['slug'] . '"> <img src="' . base_url() . '/assets/logo/' . $business['banner'] . '" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-9">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="ratings mb-2">
                                    <ul class="list-unstyled list-inline">
                                        ' . $rating_star . '
                                        <li class="list-inline-item ml-3"><span class="badge badge-primary badge-pill">' . number_format((float)$business['avg_rating'], 1, '.', '') . '</span></li>
                                    </ul>
                                </div>
                                <div class="listing-content">
                                    <h6 class="menu-title">
                                        <a href="' . base_url() . '/business/' . $business['slug'] . '"> ' . $business['name'] . '</a>

                                    </h6>
                                </div>
                                <ul class="list-unstyled contact-det">
                                        ' . $address . '
                                        ' . $phone . '
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-bottom-btn text-center">
                                    <a href="' . base_url() . '/business/' . $business['slug'] . '" class="btn btn-primary theme-btn-red view-det-btn"> View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        echo $body;
    }
}
