<?php

namespace App\Controllers;

use App\Models\Front;
use App\Models\Bussinesses;
use App\Models\Category;
use App\Models\SubCategory;

class FrontController extends BaseController
{
    public function __construct()
    {
        //$frontModel = new Front();
        $session = session();
    }
    public function index()
    {
        helper(['curl']);
        /* code for bind city name */
        $bussinesses = new Bussinesses();
        $front = new Front();
        /* $all_feature_business = $front->all_feature_business();
        $all_best_rate_business = $front->all_best_rate_business();
        $all_most_view_business = $front->all_most_view_business();
        $all_popular_business = $front->all_popular_business();
        $all_featured_business = $front->all_featured_business(); */
        $popular_categories = $front->popular_categories();
        $latest_businesses = $front->latest_businesses();
        $browse_cities = $front->browse_cities();
        /* print("<pre>" . print_r($all_feature_business, true) . "</pre>");
        die(); */
        $request = service('request');
        $searchData = $request->getPost();
        $CategoryModel = new Category();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $menu_categories = $CategoryModel->menu_categories();
        // $categories = $CategoryModel->allcategories();
        $categories = $CategoryModel->allCategoriesActive();
        $name = $this->request->getvar('search');
        $search = "";


        $blog_explore_curl = perform_http_request_blog_explore();
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
            /* 'all_best_rate_business' => $all_best_rate_business,
            'all_feature_business' => $all_feature_business,
            'all_featured_business' => $all_featured_business,
            'all_popular_business' => $all_popular_business,
            'all_most_view_business' => $all_most_view_business, */
            'popular_categories' => $popular_categories,
            'browse_cities' => $browse_cities,
            'categories' => $categories,
            'menu_categories' => $menu_categories,
            'menu_sub_categories' => $menu_sub_categories,
            'latest_businesses' => $latest_businesses,
            'blog_explore' => $blog_data,
            'tips_explore' => $tips_data,
        ];
        return view('front/index', $data);
    }
    public function bussiness()
    {
        return view('home/bussiness');
    }
    public function category()
    {
        $front = new Front();
        $menu_priority_categories = $front->menu_priority_categories();
        $single_category_subcat = $front->single_category_subcat();
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data = [
            'menu_priority_categories' => $menu_priority_categories,
            'single_category_subcat' => $single_category_subcat,
            'menu_categories' => $menu_categories,
            'menu_sub_categories' => $menu_sub_categories,
        ];
        return view('front/category-listing', $data);
    }
    public function single_category_subcat()
    {
        $front = new Front();
        $id = $this->request->getvar('id');
        $single_category_subcat = $front->single_category_subcat($id);
        $body = "";
        $body .= '<div class="tab-pane fade show active" id="' . strtolower($single_category_subcat[0]['cat_name']) . '" role="tabpanel" aria-labelledby="' . strtolower($single_category_subcat[0]['cat_name']) . '-tab">
                    <ul class="list-unstyled d-flex flex-wrap justify-content-around">';
        foreach ($single_category_subcat as $single_cat) {
            $body .=    '<li>
                            <a href="' . base_url() . '/sub-category/' . md5($single_cat['sub_cat_id']) . '" data-id="' . $single_cat['sub_cat_id'] . '">
                                <div class="category-item">
                                    <div class="img">
                                        <img src="' . base_url() . '/assets/sub_cat_img/' . $single_cat['image'] . '"
                                            alt="">
                                    </div>
                                    <div class="category-info d-flex justify-content-between align-items-center">
                                        <div>
                                            <p>' . $single_cat['sub_cat_name'] . '</p>
                                            <span>' . $single_cat['list_count'] . ' Listing</span>
                                        </div>
                                        <a href="#" class="link-icon">
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
    /* code for service list */
    public function servicelist()
    {
        $request = service('request');
        // $selectData = $request->getPost();
        $name = $this->request->getvar('id');
        $select = "";
        if ($name == "all") {
            // $select = $selectData['select li'];
            $bussinesses = new Bussinesses();
            $bussinesses->select('businesses.name,');
            /*  $bussinesses->where('businesses.FeaturedType',$name); */
            // if($name != ""){
            //     $bussinesses->where('businesses.FeaturedType',$name);
            // }
            $business_data = $bussinesses->paginate(5);
            $data = [
                'bussinesses' => $business_data,
                'pager' => $bussinesses->pager,
            ];
            print_r($data);
            die;
            return $data;
        } else {
            $bussinesses = new Bussinesses();
            $business_data = array();
            $data = [
                'bussinesses' => $business_data,
                'pager' => $bussinesses->pager,
                /* 'search' => $select */
            ];
            print_r($data);
            die;
            return view('front/index', $data);
        }
    }


    public function subcategory_listings($id = null)
    {
        $subcat_business = new Bussinesses();
        $CategoryModel = new Category();
        $SubCategoryModel = new SubCategory();
        $frontModel = new Front();
        // $subcat_listing = $front->subcat_listing($id);
        $db      = \Config\Database::connect();
        /* $subcat_business->select('businesses.name');
        $subcat_business->select('businesses.id');
        $subcat_business->select('businesses.logo'); */
        /* $CategoryModel->select('categories_3_4_2015.id as sub_cat_id');
        $CategoryModel->select('categories_3_4_2015.name as sub_cat_name');
        $CategoryModel->select('categories_3_4_2015.image');
        $CategoryModel->join('categories_3_4_2015 as category', 'category.parent_id = categories_3_4_2015.id', 'left'); */
        /* $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.id');
        $builder->select('categories_3_4_2015.name');
        $builder->select('subcategory.id as sub_cat_id');
        $builder->select('subcategory.name as sub_cat_name');
        $builder->join('categories_3_4_2015 as subcategory', ' categories_3_4_2015.id = subcategory.parent_id', 'right');
        $CategoryModel->where('md5(subcategory.parent_id)', $id); */
        $subcat_business_data = $frontModel->subcategories_category($id);
        /* print("<pre>" . print_r($subcat_business_data, true) . "</pre>");
        die(); */

        $menu_categories = $CategoryModel->menu_categories();

        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        // $subcat_business_data = $SubCategoryModel->all_sub_categories_cat($id);
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'subcat_business_data' => $subcat_business_data,
                'pager' => $subcat_business->pager,
            ];
        return view('front/sub-cat-business-list', $data);
    }
    /* Category Listing */
    public function subcategory_listings_slug($id = null)
    {
        $subcat_business = new Bussinesses();
        $CategoryModel = new Category();
        $SubCategoryModel = new SubCategory();
        $frontModel = new Front();
        $subcat_business_data = $frontModel->subcategories_category_slug($id);
        /* print("<pre>" . print_r($subcat_business_data, true) . "</pre>");
        die(); */
        $menu_categories = $CategoryModel->menu_categories();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'subcat_business_data' => $subcat_business_data,
                'pager' => $subcat_business->pager,
            ];
        return view('front/sub-cat-business-list', $data);
    }
    /* End Category Listing */


    public function subcategory_business_listings($id = null)
    {
        $subcat_business = new Bussinesses();
        $db      = \Config\Database::connect();
        // $subcat_business = $db->table('businesses b');
        $subcat_business->select('businesses.id');
        $subcat_business->select('businesses.name');
        $subcat_business->select('businesses.address1');
        $subcat_business->select('businesses.phone');
        $subcat_business->select('businesses.logo');
        $subcat_business->select('businesses.more_images');
        $subcat_business->select('avg(r.score) as avg_rating');
        $subcat_business->select('c.id as sub_cat_id');
        $subcat_business->select('c.name as sub_cat_name');
        $subcat_business->join('reviews r', 'businesses.id = r.business_id', 'left');
        $subcat_business->join('categories_3_4_2015 c', 'businesses.subcategory_id = c.id', 'left');
        $subcat_business->where('md5(c.id)', $id);
        $subcat_business->where('businesses.status', "1");
        $subcat_business->where('businesses.isactive', "1");
        // $subcat_business->where('c.isactive', "1");
        $subcat_business->groupBy('businesses.name');
        /* $sql = $subcat_business->getCompiledSelect();
        echo $sql;
        die; */
        $subcat_business_data = $subcat_business->paginate(21);
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $subcategory_parent = $CategoryModel->subcategory_parent($id);
        $sidebar_categories = $CategoryModel->categories_subcat_with_count($subcategory_parent[0]['parent_id']);
        $cat_name = $CategoryModel->get_cat_subcatId($id);
        /* print("<pre>" . print_r($subcat_business_data, true) . "</pre>");
        die(); */
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'subcat_business_data' => $subcat_business_data,
                'sidebar_categories' => $sidebar_categories,
                'cat_name' => $cat_name,
                'pager' => $subcat_business->pager,
            ];
        return view('front/business-listing', $data);
    }


    /* Subcategory Business Listing */
    public function subcategory_business_listings_slug($id = null)
    {
        $subcat_business = new Bussinesses();
        $db      = \Config\Database::connect();
        // $subcat_business = $db->table('businesses b');
        $subcat_business->select('businesses.id');
        $subcat_business->select('businesses.name');
        $subcat_business->select('businesses.address1');
        $subcat_business->select('businesses.phone');
        $subcat_business->select('businesses.logo');
        $subcat_business->select('businesses.more_images');
        $subcat_business->select('avg(r.score) as avg_rating');
        $subcat_business->select('c.id as sub_cat_id');
        $subcat_business->select('c.name as sub_cat_name');
        $subcat_business->join('reviews r', 'businesses.id = r.business_id', 'left');
        $subcat_business->join('categories_3_4_2015 c', 'businesses.subcategory_id = c.id', 'left');
        // $subcat_business->where('md5(c.id)', $id );
        $subcat_business->where('c.slug', $id);
        $subcat_business->where('businesses.status', "1");
        $subcat_business->where('businesses.isactive', "1");
        // $subcat_business->where('c.isactive', "1");
        $subcat_business->groupBy('businesses.name');
        $sql = $subcat_business->getCompiledSelect();
        echo $sql;
        die;
        $subcat_business_data = $subcat_business->paginate(21);
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $subcategory_parent = $CategoryModel->subcategory_parent($id);
        $sidebar_categories = $CategoryModel->categories_subcat_with_count($subcategory_parent[0]['parent_id']);
        $cat_name = $CategoryModel->get_cat_subcatId($id);
        /* print("<pre>" . print_r($subcat_business_data, true) . "</pre>");
        die(); */
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'subcat_business_data' => $subcat_business_data,
                'sidebar_categories' => $sidebar_categories,
                'cat_name' => $cat_name,
                'pager' => $subcat_business->pager,
            ];
        return view(
            'front/business-listing',
            $data
        );
    }
    /* End Subcategory Business Listing */


    public function show_business()
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
            ];
        return view('front/single-business', $data);
    }
    /* public function businessdetails()
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();

        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,

            ];
        return view('front/bussiness_detail', $data);
    } */
    public function single_business($id = NULL)
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $business = new Bussinesses();
        $business_data = $business->edit($id);
        $sidebar_categories = $CategoryModel->categories_with_count();
        $front = new Front();
        $claimed_business = $front->businessClaimed($id);
        $reviews = $front->all_reviews($id);
        /* print_r($reviews);
        die(); */
        $loggedin = "0";
        $session = session();
        if (session()->get('userid')) {
            $loggedin = "1";
        }
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'business_data' => $business_data,
                'sidebar_categories' => $sidebar_categories,
                'logged_in' => $loggedin,
                'isClaimed' => $claimed_business,
                'reviews' => $reviews,
            ];
        return view('front/bussiness_detail', $data);
    }
    public function single_business_preview($id = NULL)
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $business = new Bussinesses();
        $business_data = $business->edit($id);
        $sidebar_categories = $CategoryModel->categories_with_count();
        $front = new Front();
        $claimed_business = $front->businessClaimed($id);
        $reviews = $front->all_reviews($id);
        /* print_r($reviews);
        die(); */
        $loggedin = "0";
        $session = session();
        if (session()->get('userid')) {
            $loggedin = "1";
        } else {
            // $session->destroy();
            // $session = session();
            $session->setFlashdata('error_login', 'Please Login to continue');
            return redirect()->to(base_url() . '/login');
        }
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'business_data' => $business_data,
                'sidebar_categories' => $sidebar_categories,
                'logged_in' => $loggedin,
                'isClaimed' => $claimed_business,
                'reviews' => $reviews,
            ];
        return view('front/bussiness_detail_preview', $data);
    }
    public function business_listing()
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
            ];
        return view('front/business-listing', $data);
    }
    public function subcat_business_list_more()
    {
        $limit = 21;
        $page = $limit * $this->request->getVar('page');
        $id = $this->request->getVar('id');
        $body = "";
        $data['users'] = $this->fetchData($page, $id);
        foreach ($data['users'] as $single_business_data) {
            $body .= '<li id="' . $single_business_data['id'] . '">
                <a href="#">
                    <div class="category-item">
                        <div class="img">
                            <img src="' . base_url() . '/assets/front/images/category-list-img-2.jpg"
                                alt="">
                        </div>
                        <div class="category-info d-flex justify-content-between align-items-center">
                            <div>
                                <p>' . $single_business_data['name'] . '</p>
                            </div>
                            <a href="#" class="link-icon">
                                <img src="' . base_url() . '/assets/front/images/circle-red.png"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </a>
            </li>';
        }
        return $body;
    }
    function fetchData($limit, $id)
    {
        $subcat_business = new Bussinesses();
        // $dbQuery = $db->select('*')->limit($limit)->get();
        $db      = \Config\Database::connect();
        $subcat_business->select('businesses.name');
        $subcat_business->select('businesses.id');
        $subcat_business->select('categories_3_4_2015.id as sub_cat_id');
        $subcat_business->select('categories_3_4_2015.name as sub_cat_name');
        $subcat_business->join('categories_3_4_2015', 'businesses.subcategory_id = categories_3_4_2015.id', 'left');
        $subcat_business->where('md5(categories_3_4_2015.id)', $id);

        $query =  $subcat_business->limit(21, $limit)->get();
        return $query->getResultArray();
    }
    public function front_search()
    {
        $business = new Bussinesses();
        $search_business = $this->request->getvar('business');
        $search_category = $this->request->getvar('category');
        $db      = \Config\Database::connect();
        $business->select('businesses.id as business_id');
        $business->select('businesses.name');
        $business->select('businesses.address1');
        $business->select('businesses.logo');
        $business->select('businesses.phone');
        $business->select('categories_3_4_2015.id');
        $business->select('categories_3_4_2015.name as cat_name');
        $business->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id', 'left');
        $business->like('businesses.name', $search_business);
        $business->where('md5(categories_3_4_2015.id)', $search_category);
        $business->where('businesses.status', "1");
        $business->where('businesses.isactive', "1");
        $business->where('categories_3_4_2015.isactive', "1");
        $business_data = $business->paginate(21);
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_categories' => $menu_categories,
                'menu_sub_categories' => $menu_sub_categories,
                'business_data' => $business_data,
                'pager' => $business->pager,
            ];
        return view('front/search', $data);
    }
    public function fetch_business_directory()
    {
        $CategoryModel = new Category();
        $categories = $CategoryModel->all_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $categoriesDirectory = $CategoryModel->browse_business_directory();
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
        return view('front/browse-business-directory', $data);
    }
    public function about_us()
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_sub_categories' => $menu_sub_categories,
                'menu_categories' => $menu_categories,
            ];
        return view('front/about-us', $data);
    }
    public function contact_us()
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_sub_categories' => $menu_sub_categories,
                'menu_categories' => $menu_categories,
            ];
        return view('front/contact-us', $data);
    }
    public function contact_us_save()
    {
        $front = new Front();
        $name = $this->request->getvar('first_name');
        $userEmail = $this->request->getvar('email');
        $webUrl = $this->request->getvar('comp_url');
        $userQuery = $this->request->getvar('query');
        $saveEntries = $front->saveQueryEntries($name, $userEmail, $webUrl, $userQuery);
        return redirect()->to(base_url() . '/contact-us');
    }
    public function privacy_policy()
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_sub_categories' => $menu_sub_categories,
                'menu_categories' => $menu_categories,
            ];
        return view('front/privacy-policy', $data);
    }
    public function pending_bussiness()
    {
        $bussinesses = new Bussinesses();
        $bussiness = $bussinesses->allpending_bussiness();
        $data = [
            'bussiness' => $bussiness,
        ];
        return view('front/pending_bussiness', $data);
    }
    public function save_review_now_text()
    {
        $front = new Front();
        $text = $this->request->getvar('review_now_text');
        $business_id = $this->request->getvar('busi_id');
        $saveEntries = $front->saveReviewNow($text, $business_id);
        return redirect()->to(base_url() . '/business/' . md5($business_id));
    }
    public function save_enquiry()
    {
        $front = new Front();
        $enq_name = $this->request->getvar('enq_name');
        $email = $this->request->getvar('email');
        $phone_no = $this->request->getvar('phone_no');
        $enquiry_text = $this->request->getvar('enquiry_text');
        if ($this->request->getvar('busi_id')) {
            $business_id = $this->request->getvar('busi_id');
        } else {
            $business_id = "";
        }

        $saveEntries = $front->saveEnquiry($enq_name, $email, $phone_no, $enquiry_text, $business_id);
        echo $saveEntries;
        /* print_r($saveEntries);
        die(); */
        // return redirect()->to(base_url() . '/business/' . md5($business_id));
    }
    public function save_enquiry_add_business()
    {
        $front = new Front();
        $enq_name = $this->request->getvar('enq_name_add_business');
        $email = $this->request->getvar('enq_email_add_business');
        $phone_no = $this->request->getvar('enq_phone_no_add_business');
        $website_url = $this->request->getvar('enq_website_url_add_business');
        $enquiry_text = $this->request->getvar('enq_text_add_business');

        $saveEntries = $front->saveEnquiryAddBusiness($enq_name, $email, $phone_no, $enquiry_text, $website_url);
        echo $saveEntries;
        /* print_r($saveEntries);
        die(); */
        // return redirect()->to(base_url() . '/business/' . md5($business_id));
    }
    public function save_claim_business()
    {
        $front = new Front();
        $name = $this->request->getvar('name');
        $email = $this->request->getvar('email');
        $phone_no = $this->request->getvar('phone_no');
        $business_id = $this->request->getvar('busi_id');
        $saveEntries = $front->saveClaims($name, $email, $phone_no, $business_id);
        echo $saveEntries;
        // echo $name . " - " . $email . " - " . $phone_no . " - " . $business_id;
    }
    public function save_review()
    {
        $front = new Front();
        $selected_rating = $this->request->getvar('selected_rating');
        $business_id = $this->request->getvar('busi_id');
        $review_text = $this->request->getvar('review_text');
        echo $selected_rating . " - " . $business_id . " - " . session()->get('userid');
        $session = session();
        if (session()->get('userid')) {
            $loggedin = "1";
        }
        $saveEntries = $front->saveReview($review_text, $selected_rating, $business_id, session()->get('userid'));
        // return redirect()->to(base_url() . '/business/' . md5($business_id));
    }
    public function dubai_explore()
    {
        $CategoryModel = new Category();
        $menu_categories = $CategoryModel->menu_categories();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $data =
            [
                'menu_sub_categories' => $menu_sub_categories,
                'menu_categories' => $menu_categories,
            ];
        return view('front/dubai-explore', $data);
    }
    public function test_error()
    {
        helper(['curl']);
        /* code for bind city name */
        $bussinesses = new Bussinesses();
        $front = new Front();
        $bussiness = $bussinesses->all_cities();
        $all_feature_business = $front->all_feature_business();
        $all_best_rate_business = $front->all_best_rate_business();
        $all_most_view_business = $front->all_most_view_business();
        $all_popular_business = $front->all_popular_business();
        $all_featured_business = $front->all_featured_business();
        $popular_categories = $front->popular_categories();
        $latest_businesses = $front->latest_businesses();
        $browse_cities = $front->browse_cities();
        /* print("<pre>" . print_r($all_feature_business, true) . "</pre>");
        die(); */
        $request = service('request');
        $searchData = $request->getPost();
        $CategoryModel = new Category();
        $SubCategoryModel = new SubCategory();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories();
        $menu_categories = $CategoryModel->menu_categories();
        // $categories = $CategoryModel->allcategories();
        $categories = $CategoryModel->allCategoriesActive();
        $name = $this->request->getvar('search');

        $blog_explore_curl = perform_http_request_blog_explore_error();
        /* print("<pre>" . print_r($blog_explore_curl[0], true) . "</pre>");
        die(); */
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

        $data = [
            'all_best_rate_business' => $all_best_rate_business,
            'all_feature_business' => $all_feature_business,
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
        ];
        return view('front/test-error', $data);
    }
}
