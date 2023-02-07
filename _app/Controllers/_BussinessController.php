<?php

namespace App\Controllers;

use App\Models\Bussinesses;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Users;

class BussinessController extends BaseController
{
    public function __construct()
    {
        $bussinesses = new Bussinesses();
        $session = session();
    }
    //Method for login check
    public function IsloggedIn()
    {
        $session = session();
        if (!session()->get('userid')) {
            return 0;
        } else {
            return 1;
        }
    }
    /*  start code updated on 16-06-2022 by shraddha*/
    public function loadRecord($id = null)
    {
        //  code start for bussiness listing
        $bussinesses = new Bussinesses();
        $CategoryModel = new Category();
        $categoriess = $CategoryModel->all_get_categories($id);
        $bussinesses->select('businesses.*');
        $bussinesses->select('categories_3_4_2015.name as cat_name');
        $bussinesses->select('subcategories.name as sub_cat_name');
        $bussinesses->select('cities.name as city_name');
        $bussinesses->select('countries.name as country_name');
        $bussinesses->select('business_featured_type.name as featured_name');
        $bussinesses->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $bussinesses->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $bussinesses->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        $bussinesses->join('cities', 'businesses.city_id = cities.id');
        $bussinesses->join('countries', 'businesses.country_id = countries.id');
        $bussinesses->join('business_featured_type', 'businesses.feature_id = business_featured_type.Id', 'left');
        $bussinesses->orderby('businesses.id', 'desc');
        if ($id != "") {
            $bussinesses->where('md5(subcategory_id)', $id);
        }
        $bussinesses->where('businesses.status', "1");
        $business_data = $bussinesses->paginate(20);
        $data = [
            'bussinesses' => $business_data, 'pager' => $bussinesses->pager, 'categoriess' => $categoriess,
            'total_bussiness' => $bussinesses->total_bussiness($id)
        ];
        /* print("<pre>" . print_r($business_data, true) . "</pre>");
        die(); */
        return view('admin/bussiness/listing', $data);
    }
    //  code end for bussiness listing
    /*  end code updated on 16-06-2022  by shraddha*/
    /* Method for bussiness search */
    /* Ajax Search */
    public function search_ajax()
    {
        if ($this->IsloggedIn()) {
            $CategoryModel = new Category();
            $categories = $CategoryModel->all_categories();
            $request = service('request');
            $searchData = $request->getPost();
            $name = $this->request->getvar('search');
            $category = $this->request->getvar('category');
            $sub_category = $this->request->getvar('sub_category');
            $search = "";
            if (isset($searchData) && isset($searchData['search'])) {
                $search = $searchData['search'];
                $bussinesses = new Bussinesses();
                $bussinesses->select('businesses.*');
                $bussinesses->select('business_categories.name as cat_name');
                $bussinesses->select('business_sub_categories.name as sub_cat_name');
                $bussinesses->join('business_categories', 'businesses.category_id = business_categories.id');
                $bussinesses->join('business_sub_categories', 'businesses.subcategory_id = business_sub_categories.id');
                if ($category != "") {
                    $bussinesses->where('businesses.category_id', $category);
                }
                if ($sub_category != "") {
                    $bussinesses->where('businesses.subcategory_id', $sub_category);
                }
                if ($name != "") {
                    $bussinesses->havingLike('businesses.name', $name);
                    $bussinesses->orLike('businesses.email', $name);
                    $bussinesses->orLike('businesses.phone', $name);
                }
                $business_data = $bussinesses->paginate(5);
                $data = ['bussinesses' => $business_data, 'pager' => $bussinesses->pager,];
                return view('admin/bussiness/table', $data);
            } else {
                $bussinesses = new Bussinesses();
                $business_data = array();
                $data = ['bussinesses' => $business_data, 'pager' => $bussinesses->pager, 'categories' => $categories, 'search' => $search];
                return view('admin/bussiness/search', $data);
            }
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    /* Method for edit bussiness data */
    public function edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $bussinesses = new Bussinesses();
            $data['bussinesses'] = $bussinesses->edit($id);
            $data['timings'] = json_decode($data['bussinesses'][0]->timings, true);
            $data['features'] = $bussinesses->all_featured();
            $data['categories'] = $bussinesses->all_categories();
            $data['subcategories'] = $bussinesses->all_subcategory();
            $data['districts'] = $bussinesses->all_districts();
            /* print("<pre>" . print_r($bussinesses->all_nearby_location(), true) . "</pre>");
            die(); */
            $data['countries'] = $bussinesses->all_countries();
            $data['states'] = $bussinesses->all_states();
            $data['bussiness'] = $bussinesses->all_cities();
            $data['hash_id'] = $id;
            $data['pending'] = "false";
            return view('admin/bussiness/edit', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    /* Method for edit pending bussiness data */
    public function pending_edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $bussinesses = new Bussinesses();
            $data['bussinesses'] = $bussinesses->edit($id);
            $data['timings'] = json_decode($data['bussinesses'][0]->timings, true);
            $data['features'] = $bussinesses->all_featured();
            $data['categories'] = $bussinesses->all_categories();
            $data['subcategories'] = $bussinesses->all_subcategory();
            $data['districts'] = $bussinesses->all_districts();
            /* print("<pre>" . print_r($bussinesses->all_nearby_location(), true) . "</pre>");
            die(); */
            $data['countries'] = $bussinesses->all_countries();
            $data['states'] = $bussinesses->all_states();
            $data['bussiness'] = $bussinesses->all_cities();
            $data['hash_id'] = $id;
            $data['pending'] = "true";
            return view('admin/bussiness/edit', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    /* Method for update bussiness data */
    public function update($id)
    {
        if ($this->IsloggedIn()) {
            helper(['form', 'url']);
            $session = session();
            $bussinesses = new Bussinesses();
            $id = $this->request->getvar('id');
            $featured = $this->request->getvar('featured');
            $Name = $this->request->getvar('name');
            $pending = $this->request->getvar('pending');

            $Email = $this->request->getvar('email');
            $unique_url = $this->request->getvar('unique_url');
            $Phone = $this->request->getvar('phone');
            $Description = $this->request->getvar('Description');
            $category_id = $this->request->getvar('category_id');
            $subcategory_id = $this->request->getvar('subcategory_id');
            $district = $this->request->getvar('district');
            $country_id = $this->request->getvar('country_id');

            $city_id = $this->request->getvar('city_id');


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
            /* print("<pre>" . print_r($full_timing_array, true) . "</pre>");
            die(); */

            /*---------------End Create json for timings of business----------- */

            $logo = "";
            $logo_input = $this->validate(['logo' => ['uploaded[logo]', 'mime_in[logo,image/jpg,image/jpeg,image/png,image/svg]', 'max_size[logo,2048]',]]);
            $more_images = "";
            $more_images_input = $this->validate(['more_images' => ['uploaded[more_images]', 'mime_in[more_images,image/jpg,image/jpeg,image/png,image/svg]', 'max_size[more_images,2048]',]]);
            $validated = $this->validate([
                'more_images' => [
                    'uploaded[more_images]',
                    'mime_in[more_images,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[more_images,4096]',
                ],
            ]);
            if ($logo_input) {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('businesses');
                $builder_unlink->select('logo');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                /* if (file_exists('assets/image/' . $result[0]['logo'])) {
                    unlink('assets/image/' . $result[0]['logo']);
                } */
                $img = $this->request->getFile('logo');
                $logo = $img->getRandomName();
                $img->move('assets/logo', $logo);
            }
            /* if ($this->request->getFileMultiple('more_images')) {
                foreach ($this->request->getFileMultiple('more_images') as $file) {
                    print("<pre>" . print_r($file, true) . "</pre>");
                    die();
                    $file->move(WRITEPATH . 'uploads');
                    $data = [
                        'name' =>  $file->getClientName(),
                        'type'  => $file->getClientMimeType()
                    ];
                }
            }
            if (!$validated) {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('businesses');
                $builder_unlink->select('more_images');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                // if (file_exists('assets/more_images/' . $result[0]['more_images'])) {
                //     unlink('assets/more_images/' . $result[0]['more_images']);
                // }
                $more_images_img = $this->request->getFile('more_images');
                $more_images = $more_images_img->getRandomName();
                $more_images_img->move('assets/more_images', $more_images);
            } else {
            } */
            $filePreviewName = array();
            if ($validated) {
                // $session->setFlashdata('error_save', 'Error updating img');
                // return redirect()->to(base_url() . '/bussiness/edit/' . $this->request->uri->getSegment(3));
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

            $result = $bussinesses->update_business($id, $featured, $Name, $pending, $unique_url, $logo, $Email, $Phone, $Description, $more_images, $country_id, $city_id, $category_id, $subcategory_id, $district,$full_timing_array, $open_hours, $close_hours);
            if ($result) {
                $session->setFlashdata('success_save', 'Done updating');
                return redirect()->to(base_url() . '/bussiness/edit/' . $this->request->uri->getSegment(3));
            } else {
                $session->setFlashdata('error_save', 'Error updating');
                return redirect()->to(base_url() . '/bussiness/edit/' . $this->request->uri->getSegment(3));
                // return redirect()->to(base_url() . '/bussiness/listing');
            }
        } else {
            return redirect()
                ->to(base_url() . '/admin/login');
        }
    }
    // Function to fetch sub category on the businesses search page
    public function search_sub_cat_listing()
    {
        $SubCategoryModel = new SubCategory();
        $id = $this
            ->request
            ->getvar('id');
        $subcategories = $SubCategoryModel->search_sub_cat_listing($id);
        $body = "";
        foreach ($subcategories as $subcategory) {
            $body .= "<option value='" . $subcategory['id'] . "'>" . $subcategory['name'] . "</option>";
        }
        echo $body;
    }
    // Function to fetch Nearby location on the basis of Districts
    public function search_nearby_location_listing()
    {
        $SubCategoryModel = new SubCategory();
        $UserModel = new Users();
        $id = $this->request->getvar('id');
        $nearby_locations = $UserModel->search_nearby_loc_listing($id);
        $body = "";
        if($nearby_locations){
            foreach ($nearby_locations as $nearby_location) {
                $body .= "<option value='" . $nearby_location['id'] . "'>" . $nearby_location['name'] . "</option>";
            }
        }else{
            $body .= "<option value=''>No Location Found</option>";
        }
        
        echo $body;
    }
    ///added by shraddha
    // Function to add bussiness on the businesses add page
    public function create()
    {
        if ($this->IsloggedIn()) {
            $CategoryModel = new Category();
            $bussinesses = new Bussinesses();
            $categories = $CategoryModel->all_categories();
            $cities = $bussinesses->all_cities();
            $states = $bussinesses->all_states();
            $countries = $bussinesses->all_countries();
            $features = $bussinesses->all_featured();
            $subcategories = $bussinesses->all_subcategory();
            $districts = $bussinesses->all_districts();
            $data = ['categories' => $categories, 'cities' => $cities, 'states' => $states, 'countries' => $countries, 'features' => $features, 'subcategories' => $subcategories, 'districts' => $districts];
            return view('admin/bussiness/add_bussiness', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    // Function to save bussiness
    public function save()
    {
        $session = session();
        helper(['form', 'url']);
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
            // $icon = \Config\Services::image()->withFile($img)->resize(790, 570, false, 'height')->save('assets/icon/' . $icon_name);
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
            return redirect()->to(base_url() . '/bussiness/create/');
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



        /* $more_images_input = $this->validate([
            'more_images' => [
                'uploaded[more_images]',
                'mime_in[more_images,image/jpg,image/jpeg,image/png,image/svg]',
                'max_size[more_images,2048]',
            ]
        ]);
        if ($more_images_input) {
            $more_img = $this->request->getFile('more_images');
            $more_images = $more_img->getRandomName();
            $more_img->move('assets/more_images', $more_images);
        } */





        $scrap_images = "";
        $scrap_input = $this->validate([
            'scrap_images' => [
                'uploaded[scrap_images]',
                'mime_in[scrap_images,image/jpg,image/jpeg,image/png,image/svg]',
                'max_size[scrap_images,2048]',
            ]
        ]);
        if ($scrap_input) {
            $scrap_img = $this->request->getFile('scrap_images');
            $scrap_images = $scrap_img->getRandomName();
            $scrap_img->move('assets/scrap_images', $scrap_images);
        }
        $bussinesses = new Bussinesses();
        $featured = $this->request->getvar('featured');
        $name = $this->request->getvar('name');
        $category_id = $this->request->getvar('category_id');
        $subcategory_id = $this->request->getvar('subcategory_id');
        $nearby_loc = $this->request->getvar('nearby_loc');
        $description = $this->request->getvar('description');
        $unique_url = $this->request->getvar('unique_url');
        $address1 = $this->request->getvar('address1');
        $country_id = $this->request->getvar('hdn_cntry');
        $city_id = $this->request->getvar('city_id');
        $zip = "";
        $terms = $this->request->getvar('terms');

        $phone = $this->request->getvar('phone');
        $url = $this->request->getvar('url');
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
        $save_data = $bussinesses->add_bussiness($featured, $name, $category_id, $subcategory_id, $nearby_loc, $description, $logo, $unique_url, $address1, $country_id, $city_id, $zip, $terms, $phone, $url, $lat, $lng, $status, $more_images, $scrap_images, $full_timing_array);
        if ($save_data) {
            $session->setFlashdata('success_save', 'Added Successfully');
            return redirect()->to(base_url() . '/bussiness/create');
        } else {
            $session->setFlashdata('error_save', 'Error inserting');
            return redirect()->to(base_url() . '/bussiness/create');
        }
    }
    public function pending_bussiness()
    {
        $bussinesses = new Bussinesses();
        $bussiness = $bussinesses->allpending_bussiness();
        $data = [
            'bussiness' => $bussiness,
        ];
        return view('admin/bussiness/pending_bussiness', $data);
    }
    public function update_bussiness()
    {
        $session = session();
        $userid = $this->request->getvar('UserId');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $bussinesses = new Bussinesses();
        $update = $bussinesses->update_bussiness_status($userid, $status);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function ActiveInactive()
    {
        $session = session();
        $businessid = $this->request->getvar('Id');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $bussinesses = new Bussinesses();
        $update = $bussinesses->update_bussiness_active($businessid, $status);
        if ($update) {
            echo $status;
        } else {
            echo $status;
        }
    }

    public function pending_bussiness_remarks()
    {
        $business_id = $this->request->getvar('id');
        $remarks = $this->request->getvar('remarks');
        $bussinesses = new Bussinesses();
        $update_data = $bussinesses->add_remarks($business_id, $remarks);
        if ($update_data) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
