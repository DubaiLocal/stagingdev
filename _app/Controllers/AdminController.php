<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\UsersModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\BussinessesModel;
use App\Models\BusinessCategoryModel;
use App\Models\DistrictsModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        $adminModel = new Admin();
        $session = session();
    }
    public function index()
    {
        return view('admin/login');
    }
    public function dashboard()
    {
        if ($this->IsloggedIn()) {
            $adminModel = new Admin();
            $CategoryModel = new CategoryModel();
            $BussinessesModel = new BussinessesModel();
            $data['total_categories'] = $CategoryModel->total_categories();
            $data['total_bussiness'] = $BussinessesModel->total_bussiness();
            $data['total_pending_bussiness'] = $BussinessesModel->total_pending_bussiness();
            $data['total_claimed_bussiness'] = $adminModel->total_claimed_bussiness();
            return view('admin/dashboard', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function login()
    {
        $adminModel = new Admin();
        $UsersModel = new UsersModel();
        $session = session();
        $email = $this->request->getvar('email');
        if ($email != 'admin@dubailocal.net') {
            $session->setFlashdata('error_login', 'Invalid username/password');
            return redirect()->to(base_url() . '/login');
        }
        $pass = $this->request->getvar('password');
        $get_data = $UsersModel->login($email, $pass);
        if ($get_data) {
            $newdata = array(
                // 'name' => $get_data[0]->Name,
                'Email'     => $get_data[0]->email,
                'userid'     => $get_data[0]->id,
                'logged_in' => TRUE
            );
            // $session->set("name",$get_data[0]->Name);
            $session->set("Email", $get_data[0]->email);
            $session->set("userid", $get_data[0]->id);
            $session->set("logged_in", TRUE);
            $session->set("logged_in_type", "admin");
            return redirect()->to(base_url() . '/admin/dashboard');
        } else {
            $session->setFlashdata('error_login', 'Invalid username/password');
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . '/admin/login');
    }
    public function IsloggedIn()
    {
        $session = session();
        if (!session()->get('userid')) {
            return 0;
        } else {
            return 1;
        }
    }
    /* public function header_menu_front(){
        if($this->IsloggedIn()){  
            $adminModel = new Admin();
            $data['total_claimed_bussiness'] = $adminModel->total_claimed_bussiness();
            return view('admin/header_menu_front',$data);   
        } 
        else{
            return redirect()->to(base_url().'/admin/login'); 
        } 
    } */
    public function pending_claims()
    {
        $adminModel = new Admin();
        $pending_claims = $adminModel->all_pending_claims();
        $data = [
            'pending_claims' => $pending_claims,
        ];
        return view('admin/pending_claims', $data);
    }
    public function pending_claims_update_status()
    {
        $session = session();
        $id = $this->request->getvar('id');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $adminModel = new Admin();
        $update = $adminModel->pending_claims_update_status($id, $status);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function pending_claims_update_feature()
    {
        $session = session();
        $id = $this->request->getvar('id');
        $value = $this->request->getvar('val');
        // echo $id . " - " . $value;
        $adminModel = new Admin();
        $update = $adminModel->pending_claims_update_feature($id, $value);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }




    public function add_district_from_address()
    {
        if ($this->IsloggedIn()) {
            return view('admin/add-district');
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function save_district_from_address()
    {
        if ($this->IsloggedIn()) {
            $session = session();
            $BussinessesModel = new BussinessesModel();
            $DistrictsModel = new DistrictsModel();
            $all_business = $BussinessesModel->all_business();
            $all_district = $DistrictsModel->all_districts();
            if (is_array($all_business) && count($all_business) > 0) {
                foreach ($all_business as $single_business) {
                    if (is_array($all_district) && count($all_district) > 0) {
                        foreach ($all_district as $single_district) {
                            $get_district = $BussinessesModel->get_district($single_district['name'], $single_business['address'], $single_business['id']);
                            // print("<pre>" . print_r($get_district[0]['id'], true) . "</pre>");

                            if ($get_district) {
                                $set_district = $BussinessesModel->set_district($get_district[0]['id'], $single_district['id']);
                                if ($set_district) {
                                    print("<pre>" . print_r($set_district, true) . "</pre>");
                                    echo $get_district[0]['id'] . ") " . $single_business['address'] . " --} " . $single_district['id'] . ") " . $single_district['name'] . "<br/>";
                                    // $session->setFlashdata('success_save', 'District Changed Successfully');
                                    return redirect()->to(base_url() . '/admin/add-district-from-address');
                                }
                                // print("<pre>" . print_r($get_district, true) . "</pre>");
                            }
                        }
                    }
                }
            }
            // die();
            // print("<pre>" . print_r($all_business, true) . "</pre>");
            /* die();


            if ($save_district) {
                $session->setFlashdata('success_save', 'District Changed Successfully');
                return redirect()->to(base_url() . '/add-district-from-address');
            } */
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function add_business_name_keywords()
    {
        if ($this->IsloggedIn()) {
            return view('admin/add-business-keyword');
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function save_business_name_keywords()
    {
        if ($this->IsloggedIn()) {
            $session = session();
            $BussinessesModel = new BussinessesModel();
            $all_business = $BussinessesModel->all_business();

            if (is_array($all_business) && count($all_business) > 0) {
                foreach ($all_business as $single_business) {
                    $check_business_name_keyword = $BussinessesModel->check_business_name_keyword($single_business['name']);
                    $business_sub_cat_id = $BussinessesModel->business_subcategory_id($single_business['id']);

                    $save_keyword = "";
                    if (is_array($check_business_name_keyword) && count($check_business_name_keyword) > 0) {
                        $save_keyword = $BussinessesModel->save_business_name_keyword('0', $single_business['name'], "update");
                    } else {
                        $save_keyword = $BussinessesModel->save_business_name_keyword($business_sub_cat_id[0]['subcategory_id'], $single_business['name'], "add");
                    }
                }
                if ($save_keyword) {
                    $session->setFlashdata('success_save', 'Business Names added to keywords Successfully');
                    return redirect()->to(base_url() . '/admin/add-business-name-in-keywords');
                } else {
                    $session->setFlashdata('error_save', 'Business Names has not added to keywords');
                    return redirect()->to(base_url() . '/admin/add-business-name-in-keywords');
                }
            }
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }

    // Move subcategory business


    public function move_subcategory_business()
    {
        if ($this->IsloggedIn()) {
            $session = session();

            $CategoryModel = new CategoryModel();
            $categories = $CategoryModel->allCategoriesActive();

            $data = ['categories' => $categories];

            return view('admin/move-subcategory-business', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function sub_category_business()
    {
        if ($this->IsloggedIn()) {
            function convert_date($input_date)
            {
                // Remove time zone information from the string so that it can be parsed
                $index = strpos($input_date, "GMT");
                $datePicker = substr($input_date, 0, $index - 1);
                $datePHP = strtotime($datePicker);
                $date = date('Y-m-d', $datePHP);
                return $date;
            }
            $session = session();
            $BussinessesModel = new BussinessesModel();
            $sub_cat_id = $this->request->getvar('id');
            $from = $this->request->getvar('from');
            $to = $this->request->getvar('to');
            $body = "";
            if (isset($from) && $from != "") {

                $from_date = convert_date($from);
                $to_date = convert_date($to);
                $businesses = $BussinessesModel->sub_category_businesses_date($sub_cat_id, $from_date, $to_date);
                foreach ($businesses as $business) {
                    $description = str_replace("'", "", $business['description']);
                    $body .= "<option value='" . $business['id'] . "' data-description = '" . $description . "'>" . $business['name'] . "</option>";
                }
            }
            if (!(isset($from)) && $from == "") {
                $businesses = $BussinessesModel->sub_category_businesses($sub_cat_id);


                foreach ($businesses as $business) {
                    $description = str_replace("'", "", $business['description']);
                    $body .= "<option value='" . $business['id'] . "' data-description = '" . $description . "'>" . $business['name'] . "</option>";
                }
            }


            echo $body;
        }
    }
    public function save_move_subcategory_business()
    {
        if ($this->IsloggedIn()) {
            $session = session();
            helper('filesystem');
            $BussinessesModel = new BussinessesModel();
            $CategoryModel = new CategoryModel();
            $SubCategoryModel = new SubCategoryModel();

            $from_category = $this->request->getvar('move_from_category');
            $from_category_name = $CategoryModel->get_category_name($from_category);

            $from_sub_category = $this->request->getvar('move_from_sub_category');
            $from_sub_category_name = $SubCategoryModel->get_subcategory_name($from_sub_category);

            $move_to_category = $this->request->getvar('move_to_category');
            $to_category_name = $CategoryModel->get_category_name($move_to_category);

            $move_to_sub_category = $this->request->getvar('move_to_sub_category');
            $to_sub_category_name = $SubCategoryModel->get_subcategory_name($move_to_sub_category);

            $business_array = $this->request->getvar('business_array');

            if (is_array($business_array) && count($business_array) > 0) {
                foreach ($business_array as $business) {
                    $update_category = $BussinessesModel->move_business_subcategory($move_to_category, $move_to_sub_category, $business);
                    if ($update_category) {
                        $businesss_name = $BussinessesModel->get_business_name($business);
                        $data = $businesss_name[0]['name'] . " from  " . $from_category_name[0]['name'] . "(" . $from_sub_category_name[0]['name'] . ") moved to " . $to_category_name[0]['name'] . "(" . $to_sub_category_name[0]['name'] . ")   on " . date("d-F-Y H:i:s") . "\r\n";
                        write_file(FCPATH . 'move_business_log.txt', $data, 'a+');
                    }
                }
                if ($update_category) {
                    return "1";
                }
            }

            // $business = $BussinessesModel->move_business_subcategory($move_to_category, $move_to_sub_category, $business_array);

        }
    }


    // Move subcategory Keywords


    public function move_subcategory_keywords()
    {
        if ($this->IsloggedIn()) {
            $session = session();

            $CategoryModel = new CategoryModel();
            $categories = $CategoryModel->allCategoriesActive();

            $data = ['categories' => $categories];

            return view('admin/move-subcategory-keywords', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function sub_category_keywords()
    {
        if ($this->IsloggedIn()) {
            $session = session();
            $SubCategoryModel = new SubCategoryModel();
            $sub_cat_id = $this->request->getvar('id');
            $keywords = $SubCategoryModel->sub_category_keywords($sub_cat_id);

            $body = "";
            foreach ($keywords as $keyword) {
                $name = str_replace("'", "", $keyword['name']);
                $body .= "<option value='" . $keyword['id'] . "'>" . $name . "</option>";
            }
            echo $body;
        }
    }
    public function save_move_subcategory_keywords()
    {
        if ($this->IsloggedIn()) {
            $session = session();
            helper('filesystem');
            $CategoryModel = new CategoryModel();
            $SubCategoryModel = new SubCategoryModel();

            $from_category = $this->request->getvar('move_from_category');
            $from_category_name = $CategoryModel->get_category_name($from_category);

            $from_sub_category = $this->request->getvar('move_from_sub_category');
            $from_sub_category_name = $SubCategoryModel->get_subcategory_name($from_sub_category);

            $move_to_category = $this->request->getvar('move_to_category');
            $to_category_name = $CategoryModel->get_category_name($move_to_category);

            $move_to_sub_category = $this->request->getvar('move_to_sub_category');
            $to_sub_category_name = $SubCategoryModel->get_subcategory_name($move_to_sub_category);

            $keywords_array = $this->request->getvar('keywords_array');

            if (is_array($keywords_array) && count($keywords_array) > 0) {
                foreach ($keywords_array as $keyword) {

                    $update_category = $SubCategoryModel->move_keyword_subcategory($move_to_sub_category, $keyword);
                    // $update_keyword = $BussinessesModel->move_business_subcategory($move_to_category, $move_to_sub_category, $business);

                    if ($update_category) {
                        $keyword_name = $SubCategoryModel->get_keyword_name($keyword);
                        $data = $keyword_name[0]['name'] . " from  " . $from_category_name[0]['name'] . "(" . $from_sub_category_name[0]['name'] . ") moved to " . $to_category_name[0]['name'] . "(" . $to_sub_category_name[0]['name'] . ")   on " . date("d-F-Y H:i:s") . "\r\n";
                        write_file(FCPATH . 'move_keywords_log.txt', $data, 'a+');
                    }
                }
                if ($update_category) {
                    return "1";
                }
            }

            // $business = $BussinessesModel->move_business_subcategory($move_to_category, $move_to_sub_category, $business_array);

        }
    }

    // Add Multiple Business Category/Subcategory
    public function add_multiple_business_category()
    {
        if ($this->IsloggedIn()) {
            $session = session();

            $CategoryModel = new CategoryModel();
            $categories = $CategoryModel->allCategoriesActive();

            $data = ['categories' => $categories];

            return view('admin/multiple-business-category', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function save_multiple_business_category()
    {
        if ($this->IsloggedIn()) {
            $session = session();
            helper('filesystem');
            $BussinessesModel = new BussinessesModel();
            $BusinessCategoryModel = new BusinessCategoryModel();
            $CategoryModel = new CategoryModel();
            $SubCategoryModel = new SubCategoryModel();

            $from_category = $this->request->getvar('move_from_category');
            $from_category_name = $CategoryModel->get_category_name($from_category);

            $from_sub_category = $this->request->getvar('move_from_sub_category');
            $from_sub_category_name = $SubCategoryModel->get_subcategory_name($from_sub_category);

            $move_to_category = $this->request->getvar('move_to_category');
            $to_category_name = $CategoryModel->get_category_name($move_to_category);

            $move_to_sub_category = $this->request->getvar('move_to_sub_category');
            $to_sub_category_name = $SubCategoryModel->get_subcategory_name($move_to_sub_category);

            $business_array = $this->request->getvar('business_array');

            if (is_array($business_array) && count($business_array) > 0) {
                foreach ($business_array as $business) {
                    $check_business_category = $BusinessCategoryModel->check_business_cat_subcat($business, $move_to_category, $move_to_sub_category);
                    if (is_array($check_business_category) && count($check_business_category) > 0) {
                        continue;
                    }
                    $insert_business_category = $BussinessesModel->save_business_cat_subcat($business, $move_to_category, $move_to_sub_category);
                    if ($insert_business_category) {
                        $businesss_name = $BussinessesModel->get_business_name($business);
                        $data = $businesss_name[0]['name'] . " from  " . $from_category_name[0]['name'] . "(" . $from_sub_category_name[0]['name'] . ") added to " . $to_category_name[0]['name'] . "(" . $to_sub_category_name[0]['name'] . ")   on " . date("d-F-Y H:i:s") . "\r\n";
                        write_file(FCPATH . 'multiple_business_category_log.txt', $data, 'a+');
                    }
                }
                if ($insert_business_category) {
                    return "1";
                }
            }

            // $business = $BussinessesModel->move_business_subcategory($move_to_category, $move_to_sub_category, $business_array);

        }
    }

    // Upload CSV for keywords
    public function upload_keywords_csv()
    {
        if ($this->IsloggedIn()) {
            $session = session();

            $CategoryModel = new CategoryModel();
            $categories = $CategoryModel->allCategoriesActive();

            $data = ['categories' => $categories];

            return view('admin/upload-csv-keywords', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    public function save_upload_keywords_csv()
    {
        if ($this->IsloggedIn()) {
            $session = session();
            $category = $this->request->getvar('category');
            // $sub_category = $this->request->getvar('sub_category');
            $SubCategoryModel = new SubCategoryModel();

            if ($file = $this->request->getFile('csv')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('assets/keywordscsvfile/', $newName);
                    $file = fopen("assets/keywordscsvfile/" . $newName, "r");
                    $i = 0;
                    $numberOfFields = 4;
                    $csvArr = array();

                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        if ($i > 0 && $num == $numberOfFields) {
                            // $csvArr[$i]['id'] = $filedata[0];
                            $csvArr[$i]['subcategory_id'] = $filedata[0];
                            $csvArr[$i]['name'] = $filedata[1];
                            $csvArr[$i]['url'] = $filedata[2];
                            $csvArr[$i]['source'] = $filedata[3];
                            // $csvArr[$i]['created_at'] = $filedata[5];
                            // $csvArr[$i]['modified_at'] = $filedata[6];
                        }
                        $i++;
                    }
                    fclose($file);
                    if (is_array($csvArr) && count($csvArr) > 0) {
                        $keywords = $SubCategoryModel->get_keywords_id($category);
                        $keyword_ids = array();
                        if (is_array($keywords) && count($keywords) > 0) {

                            foreach ($keywords as $keyword) {
                                array_push($keyword_ids, $keyword['id']);
                                $delete_keyword = $SubCategoryModel->delete_keyword($keyword['id']);
                            }
                        }
                        $flag = 0;
                        if ($delete_keyword) {
                            foreach ($csvArr as $userdata) {
                                $save_keyword = $SubCategoryModel->save_keywords($userdata['subcategory_id'], $userdata['name'], $userdata['url'], $userdata['source']);
                                if ($save_keyword) {
                                    $flag = 1;
                                }
                            }
                            if ($flag == 1) {
                                $session->setFlashdata('success_save', 'Keywords Updated Successfully');
                                return redirect()->to(base_url() . '/admin/upload-keywords-csv');
                            }
                        }
                    }
                } else {
                    echo "0";
                }
            } else {
                echo "0";
            }
        }
    }
}
