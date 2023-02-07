<?php

namespace App\Controllers;

use App\Models\BussinessesModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\Users;
use App\Models\FeatureModel;
use App\Models\DistrictsModel;
use App\Models\NeabyLocationModel;
use App\Models\ReviewsModel;

class BussinessController extends BaseController
{
    public function __construct()
    {
    }
    //Method for login check
    public function IsloggedIn()
    {
        $session = session();
        if (session()->get('logged_in_type') != "admin") {
            return 0;
        } else {
            return 1;
        }
    }
    public function activeInactive()
    {
        $session = session();
        $businesid = $this->request->getvar('id');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $businessModel = new BussinessesModel();
        $update = $businessModel->update_bussiness_status($businesid, $status);
        if ($update) {
            echo $status;
        } else {
            echo $status;
        }
    }
    public function check_existing_business()
    {
        helper(['dubaiFunction']);
        $session = session();
        $busines_name = $this->request->getvar('name');
        $slug = slugify($busines_name);
        $businessModel = new BussinessesModel();
        $check = $businessModel->check_existing_business($slug);
        if (is_array($check) && count($check) > 0) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function load_businesses()
    {
        //  code start for bussiness listing

        $businessModel = new BussinessesModel();
        $CategoryModel = new CategoryModel();
        $categoriess = $CategoryModel->allCategoriesActive();
        $businessModel->select('business.id');
        $businessModel->select('business.name');
        $businessModel->select('business.address');
        $businessModel->select('business.description');
        $businessModel->select('business.url');
        $businessModel->select('business.district_id');
        $businessModel->select('business.nearby_loc_id');
        $businessModel->select('business.slug');
        $businessModel->select('business.status');
        $businessModel->select('business.feature_type');
        $businessModel->select('business_detail.email');
        $businessModel->select('business_detail.phone');
        $businessModel->select('business_detail.banner');
        $businessModel->select('business_detail.more_images');
        $businessModel->select('business_detail.lat');
        $businessModel->select('business_detail.timings');
        $businessModel->select('business_detail.num_rating');
        $businessModel->select('business_detail.aeverage_rating');
        $businessModel->join('business_detail', 'business_detail.business_id = business.id');
        // $businessModel->orderby('TRIM(business.name)', 'asc');
        $businessModel->orderby('business.created_at', 'desc');
        /* if ($id != "") {
            $businessModel->where('md5(subcategory_id)', $id);
        } */
        $businessModel->where('business.status', "1");
        $business_data = $businessModel->paginate(20);
        $data = [
            'businesses' => $business_data, 'pager' => $businessModel->pager, 'categoriess' => $categoriess
        ];
        /* print("<pre>" . print_r($business_data, true) . "</pre>");
        die(); */
        return view('admin/business/listing', $data);
    }

    public function load_businesses_search($query = NULL)
    {
        //  code start for bussiness listing
        $uri = new \CodeIgniter\HTTP\URI(current_url(true));
        $query = $uri->getQuery(['only' => ['search']]);
        $query = substr($query, strpos($query, "=") + 1);
        $query = str_replace('+', ' ', $query);

        $businessModel = new BussinessesModel();
        $CategoryModel = new CategoryModel();
        $categoriess = $CategoryModel->allCategoriesActive();
        $businessModel->select('business.id');
        $businessModel->select('business.name');
        $businessModel->select('business.address');
        $businessModel->select('business.description');
        $businessModel->select('business.url');
        $businessModel->select('business.district_id');
        $businessModel->select('business.nearby_loc_id');
        $businessModel->select('business.slug');
        $businessModel->select('business.status');
        $businessModel->select('business.feature_type');
        $businessModel->select('business_detail.email');
        $businessModel->select('business_detail.phone');
        $businessModel->select('business_detail.banner');
        $businessModel->select('business_detail.more_images');
        $businessModel->select('business_detail.lat');
        $businessModel->select('business_detail.timings');
        $businessModel->select('business_detail.num_rating');
        $businessModel->select('business_detail.aeverage_rating');
        $businessModel->join('business_detail', 'business_detail.business_id = business.id');
        // $businessModel->orderby('TRIM(business.name)', 'asc');
        $businessModel->like('business.name', $query, 'after');
        $businessModel->orderby('business.created_at', 'desc');
        /* if ($id != "") {
            $businessModel->where('md5(subcategory_id)', $id);
        } */
        // $businessModel->where('business.name', $query);
        $businessModel->where('business.status', "1");
        /* $sql = $businessModel->getCompiledSelect();
        echo $sql;
        die; */
        $business_data = $businessModel->paginate(20);
        $data = [
            'businesses' => $business_data, 'pager' => $businessModel->pager, 'categoriess' => $categoriess
        ];
        /* print("<pre>" . print_r($business_data, true) . "</pre>");
        die(); */
        return view('admin/business/listing', $data);
    }
    public function load_businesses_subcategory($subcategory_id = NULL)
    {
        //  code start for bussiness listing


        $businessModel = new BussinessesModel();
        $CategoryModel = new CategoryModel();
        $categoriess = $CategoryModel->allCategoriesActive();
        $businessModel->select('business.id');
        $businessModel->select('business.name');
        $businessModel->select('business.address');
        $businessModel->select('business.description');
        $businessModel->select('business.url');
        $businessModel->select('business.district_id');
        $businessModel->select('business.nearby_loc_id');
        $businessModel->select('business.slug');
        $businessModel->select('business.status');
        $businessModel->select('business.feature_type');
        $businessModel->select('business_detail.email');
        $businessModel->select('business_detail.phone');
        $businessModel->select('business_detail.banner');
        $businessModel->select('business_detail.more_images');
        $businessModel->select('business_detail.lat');
        $businessModel->select('business_detail.timings');
        $businessModel->select('business_detail.num_rating');
        $businessModel->select('business_detail.aeverage_rating');
        $businessModel->join('business_detail', 'business_detail.business_id = business.id');
        $businessModel->join('business_category', 'business_category.business_id = business.id');
        $businessModel->orderby('business.created_at', 'desc');
        /* if ($id != "") {
            $businessModel->where('md5(subcategory_id)', $id);
        } */
        $businessModel->where('business.status', "1");
        $businessModel->where('md5(business_category.subcategory_id)', $subcategory_id);
        /* $sql = $businessModel->getCompiledSelect();
        echo $sql;
        die; */
        $business_data = $businessModel->paginate(20);
        $data = [
            'businesses' => $business_data, 'pager' => $businessModel->pager, 'categoriess' => $categoriess
        ];
        /* print("<pre>" . print_r($business_data, true) . "</pre>");
        die(); */
        return view('admin/business/listing', $data);
    }


    // Function to add bussiness on the businesses add page
    public function create()
    {
        if ($this->IsloggedIn()) {
            $CategoryModel = new CategoryModel();
            $businessModel = new BussinessesModel();
            $featureModel = new FeatureModel();
            $districtsModel = new DistrictsModel();
            $categories = $CategoryModel->allCategoriesActive();
            $features = $featureModel->all_featured();
            $districts = $districtsModel->all_districts();
            $data = ['categories' => $categories, 'features' => $features, 'districts' => $districts];
            return view('admin/business/add_business', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }



    // Function to save bussiness
    public function save()
    {
        $session = session();
        helper(['form', 'url', 'dubaiFunction']);
        $logo = "";
        $logo_input = $this->validate([
            'logo' => [
                'uploaded[logo]',
                'mime_in[logo,image/jpg,image/jpeg,image/png,image/svg]',
                'max_size[logo,2048]',
            ]
        ]);
        if ($logo_input) {
            $logo_img = $this->request->getFile('logo');
            $logo = $logo_img->getRandomName();
            // $icon_name = 'm_' . $image;
            /* $subcategory_thumbnail = \Config\Services::image()->withFile($logo_img)->resize(275, 220, true, 'height')->save('assets/subcategory-business-thumbnail/275x220-' . $logo);
            $banner_thumbnail = \Config\Services::image()->withFile($logo_img)->resize(590, 375, true, 'height')->save('assets/business-thumbnail/590x375-' . $logo); */
            $logo_img->move('assets/logo', $logo);
        }
        $more_images = "";
        $validated = $this->validate([
            'more_images' => [
                'uploaded[more_images]',
                'mime_in[more_images,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[more_images,10240]',
            ],
        ]);

        $filePreviewName = array();
        if (!$validated) {
            $session->setFlashdata('error_save', 'Error Saving more image');
            return redirect()->to(base_url() . '/admin/business/create');
            // return redirect()->to(site_url('/bussiness/listing'));
        } else {
            // Grab the file by name given in HTML form
            $files = $this->request->getFileMultiple('more_images');


            foreach ($files as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('assets/more_images', $newName);
                    array_push($filePreviewName, $newName);
                }
            }
        }
        if (count($filePreviewName) != 0) {
            $more_images =  implode(",", $filePreviewName);
        }
        $business = new BussinessesModel();

        $featured = $this->request->getvar('featured');
        $name = $this->request->getvar('name');
        $slug = slugify($name);
        $category_id = $this->request->getvar('category_id');
        $subcategory_id = $this->request->getvar('subcategory_id');
        $district = $this->request->getvar('district');
        $nearby_location = $this->request->getvar('nearby_loc');
        $description = $this->request->getvar('description');
        $url = $this->request->getvar('unique_url');
        $address = $this->request->getvar('address');
        $email = $this->request->getvar('email');
        // $num_rating = $this->request->getvar('num_rating');
        $num_rating = rand(15, 25);
        $aeverage_rating = rand(40, 46) / 10;

        $phone = $this->request->getvar('phone');
        $lat = $this->request->getvar('lat');
        $lng = $this->request->getvar('lng');


        $status = "0";

        /*----------- Create json for timings of business------------ */

        $full_timing_array = array();
        $full_timing = array();
        $open_hours = $this->request->getPost('open_hours');
        $close_hours = $this->request->getvar('close_hours');
        for ($i = 0; $i < sizeof($open_hours); $i++) {
            $full_timing = array(
                'opening' => date('Y-m-d H:i:s', strtotime($open_hours[$i])),
                'closing' => date('Y-m-d H:i:s', strtotime($close_hours[$i]))
            );
            array_push($full_timing_array, $full_timing);
        }
        $full_timing_array =  json_encode($full_timing_array);

        /*---------------End Create json for timings of business----------- */
        $save_business = $business->add_bussiness($featured, $name, $slug, $district, $nearby_location, $description, $address, $url, $status);
        if ($save_business) {


            $save_business_detail = $business->add_bussiness_details($save_business, $email, $phone, $logo, $lat, $lng, $more_images, $full_timing_array, $num_rating, $aeverage_rating);
            if ($save_business_detail) {
                $save_business_cat_subcat = $business->save_business_cat_subcat($save_business, $category_id, $subcategory_id);
                if ($save_business_cat_subcat) {
                    $session->setFlashdata('success_save', 'Added Successfully');
                    return redirect()->to(base_url() . '/admin/business/create');
                } else {
                    $session->setFlashdata('error_save', 'Error inserting Business Category');
                    return redirect()->to(base_url() . '/admin/business/create');
                }
            } else {
                $session->setFlashdata('error_save', 'Error inserting Business Details');
                return redirect()->to(base_url() . '/admin/business/create');
            }
        } else {
            $session->setFlashdata('error_save', 'Error inserting Business');
            return redirect()->to(base_url() . '/admin/business/create');
        }
    }
    public function pending_business()
    {
        $businessModel = new BussinessesModel();
        // $business = $businessModel->allpending_business();

        $businessModel->select('business.id');
        $businessModel->select('business.name');
        $businessModel->select('business.address');
        $businessModel->select('business.description');
        $businessModel->select('business.url');
        $businessModel->select('business.district_id');
        $businessModel->select('business.nearby_loc_id');
        $businessModel->select('business.slug');
        $businessModel->select('business.status');
        $businessModel->select('business.feature_type');
        $businessModel->select('users.name as user_name');
        $businessModel->select('users.email as user_email');
        $businessModel->select('business_detail.email');
        $businessModel->select('business_detail.phone');
        $businessModel->select('business_detail.banner');
        $businessModel->select('business_detail.more_images');
        $businessModel->select('business_detail.lat');
        $businessModel->select('business_detail.timings');
        $businessModel->select('business_detail.remarks');
        $businessModel->select('business_detail.num_rating');
        $businessModel->select('business_detail.aeverage_rating');
        $businessModel->join('business_detail', 'business_detail.business_id = business.id');
        $businessModel->join('users', 'users.id = business.user_id');
        $businessModel->where("business.status", "0");
        $businessModel->orderBy('business.id', 'desc');

        $business_data = $businessModel->paginate(20);
        $data = [
            'businesses' => $business_data, 'pager' => $businessModel->pager
        ];

        return view('admin/business/pending_business', $data);
    }

    public function update_business_pending_status()
    {
        if ($this->IsloggedIn()) {
            $session = session();
            $businessId = $this->request->getvar('businessId');
            $status = ($this->request->getvar('status') == 1) ? 0 : 1;
            $BussinessesModel = new BussinessesModel();
            $approved_id = session()->get('userid');
            $reviewsModel = new ReviewsModel();
            // Insert review
            $review_text = "test self";
            $rating = rand(40, 46) / 10;
            $save_rating = $reviewsModel->saveReview($review_text, $rating, $businessId);

            $update = $BussinessesModel->update_business_pending_status($businessId, $status, $approved_id);
            if ($update) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }


    /* Method for update bussiness data */
    public function update($id)
    {
        if ($this->IsloggedIn()) {
            $session = session();
            helper(['form', 'url', 'dubaiFunction']);
            $logo = "";
            $logo_input = $this->validate([
                'logo' => [
                    'uploaded[logo]',
                    'mime_in[logo,image/jpg,image/jpeg,image/png,image/svg]',
                    'max_size[logo,2048]',
                ]
            ]);
            if ($logo_input) {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('business');
                $builder_unlink->select('business_detail.banner');
                $builder_unlink->join('business_detail', 'business.id = business_detail.business_id');
                $builder_unlink->where("md5(business.id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                if ($result[0]['banner'] != "") {
                    if (file_exists('assets/logo/' . $result[0]['banner'])) {
                        unlink('assets/logo/' . $result[0]['banner']);
                        // unlink('assets/subcategory-business-thumbnail/' . $result[0]['banner'] . '-275x220');
                        // unlink('assets/business-thumbnail/' . $result[0]['banner'] . '-590x375');
                    }
                }
                $img = $this->request->getFile('logo');
                $logo = $img->getRandomName();
                // $subcategory_thumbnail = \Config\Services::image()->withFile($img)->resize(275, 220, true, 'height')->save('assets/subcategory-business-thumbnail/275x220-' . $logo);
                // $banner_thumbnail = \Config\Services::image()->withFile($img)->resize(590, 375, true, 'height')->save('assets/business-thumbnail/590x375-' . $logo);
                $img->move('assets/logo', $logo);
            }
            $more_images = "";
            $validated = $this->validate([
                'more_images' => [
                    'uploaded[more_images]',
                    'mime_in[more_images,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[more_images,10240]',
                ],
            ]);
            $filePreviewName = array();
            if ($validated) {
                $session->setFlashdata('error_save', 'Error Saving more image');
                return redirect()->to(base_url() . '/admin/business/edit/' . $this->request->uri->getSegment(4));
            } else {
                // Grab the file by name given in HTML form
                $files = $this->request->getFileMultiple('more_images');
                foreach ($files as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move('assets/more_images', $newName);
                        array_push($filePreviewName, $newName);
                    }
                }
            }
            if (count($filePreviewName) != 0) {
                $more_images =  implode(",", $filePreviewName);
            }
            $business = new BussinessesModel();
            $id = $this->request->getvar('id');
            $featured = $this->request->getvar('featured');
            $name = $this->request->getvar('name');
            $slug = slugify($name);
            $category_id = $this->request->getvar('category_id');
            $subcategory_id = $this->request->getvar('subcategory_id');
            $district = $this->request->getvar('district');
            $nearby_location = $this->request->getvar('nearby_loc');
            $description = $this->request->getvar('Description');
            $url = $this->request->getvar('unique_url');
            $address = $this->request->getvar('address');
            $email = $this->request->getvar('email');
            $num_rating = $this->request->getvar('num_rating');
            $aeverage_rating = $this->request->getvar('aeverage_rating');
            $phone = $this->request->getvar('phone');
            $pending = $this->request->getvar('pending');
            $lat = $this->request->getvar('lat');
            $lng = $this->request->getvar('lng');
            $status = "1";
            /*----------- Create json for timings of business------------ */

            $full_timing_array = array();
            $full_timing = array();
            $open_hours = $this->request->getPost('open_hours');
            $close_hours = $this->request->getvar('close_hours');
            for ($i = 0; $i < sizeof($open_hours); $i++) {
                $full_timing = array(
                    'opening' => date('Y-m-d H:i:s', strtotime($open_hours[$i])),
                    'closing' => date('Y-m-d H:i:s', strtotime($close_hours[$i]))
                );
                array_push($full_timing_array, $full_timing);
            }
            $full_timing_array =  json_encode($full_timing_array);

            /*---------------End Create json for timings of business----------- */


            // $update_business = $business->update_business($id, $featured, $Name, $slug, $district, $nearby_location, $Description, $address, $unique_url);


            $update_business = $business->update_business($id, $featured, $name, $slug, $district, $nearby_location, $description, $address, $url, $status);
            if ($update_business) {
                $save_business_detail = $business->update_bussiness_details($id, $email, $phone, $logo, $lat, $lng, $more_images, $full_timing_array, $num_rating, $aeverage_rating);
                if ($save_business_detail) {
                    $save_business_cat_subcat = $business->update_business_cat_subcat($id, $category_id, $subcategory_id);
                    if ($save_business_cat_subcat) {
                        $session->setFlashdata('success_save', 'Done updating');
                        return redirect()->to(base_url() . '/admin/business/edit/' . $this->request->uri->getSegment(4));
                    } else {
                        $session->setFlashdata('error_save', 'Error Updating Business Category');
                        return redirect()->to(base_url() . '/admin/business/edit/' . $this->request->uri->getSegment(4));
                    }
                } else {
                    $session->setFlashdata('error_save', 'Error updating Business Details');
                    return redirect()->to(base_url() . '/admin/business/edit/' . $this->request->uri->getSegment(4));
                }
            } else {
                $session->setFlashdata('error_save', 'Error Updaing Business');
                return redirect()->to(base_url() . '/admin/business/edit/' . $this->request->uri->getSegment(4));
            }
        } else {
            return redirect()
                ->to(base_url() . '/admin/login');
        }
    }

    /* Method for edit pending pending bussiness */
    public function pending_edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $bussinessesModel = new BussinessesModel();
            $featureModel = new FeatureModel();
            $CategoryModel = new CategoryModel();
            $SubCategoryModel = new SubCategoryModel();
            $districtsModel = new DistrictsModel();
            $NeabyLocationModel = new NeabyLocationModel();
            $data['bussinesses'] = $bussinessesModel->edit($id);
            $data['timings'] = json_decode($data['bussinesses'][0]->timings, true);
            $data['features'] = $featureModel->all_featured();
            $data['categories'] = $CategoryModel->allCategoriesActive();
            $data['business_category'] = $bussinessesModel->business_category($id);
            $data['subcategories'] = $SubCategoryModel->all_sub_categories_category();
            $data['districts'] = $districtsModel->all_districts();
            $data['nearby_locations'] = $NeabyLocationModel->all_nearby_locations();
            $data['hash_id'] = $id;
            $data['pending'] = "true";
            return view('admin/business/edit', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }

    /* Preview Pending business */
    public function single_business_preview($slug)
    {
        if ($this->IsloggedIn()) {
        }
        $CategoryModel = new CategoryModel();
        $SubCategoryModel = new SubCategoryModel();
        $business = new BussinessesModel();
        $business_data = $business->single_bussiness($slug);
        $menu_categories = $CategoryModel->menu_categories();
        $menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
        /* print("<pre>" . print_r($business_data, true) . "</pre>");
        die(); */
        if ($business_data[0]->slug == "") {
            return redirect()->to(base_url());
        }
        $loggedin = "0";
        $session = session();
        if (session()->get('logged_in_type') == "admin") {
            $preview = "1";
            $loggedin = "1";
        }
        /* else {
            $session->setFlashdata('error_login', 'Please Login to continue');
            return redirect()->to(base_url() . '/login');
        } */
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
            ];
        return view('home/bussiness_detail', $data);
    }
    /* Method for edit bussiness data */
    public function edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $bussinesses = new BussinessesModel();
            $featureModel = new FeatureModel();
            $districtsModel = new DistrictsModel();
            $CategoryModel = new CategoryModel();
            $SubCategoryModel = new SubCategoryModel();
            $NeabyLocationModel = new NeabyLocationModel();
            $data['bussinesses'] = $bussinesses->edit($id);
            $data['timings'] = json_decode($data['bussinesses'][0]->timings, true);
            $data['features'] = $featureModel->all_featured();
            $data['categories'] = $CategoryModel->allCategoriesActive();
            $data['business_category'] = $bussinesses->business_category($id);
            $data['subcategories'] = $SubCategoryModel->all_sub_categories_category();
            $data['districts'] = $districtsModel->all_districts();
            $data['nearby_locations'] = $NeabyLocationModel->all_nearby_locations();
            /* print("<pre>" . print_r($bussinesses->all_nearby_location(), true) . "</pre>");
            die(); */
            $data['hash_id'] = $id;
            $data['pending'] = "false";
            return view('admin/business/edit', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function pending_business_remarks()
    {
        $business_id = $this->request->getvar('id');
        $remarks = $this->request->getvar('remarks');
        $bussinesses = new BussinessesModel();
        $update_data = $bussinesses->add_remarks($business_id, $remarks);
        if ($update_data) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
