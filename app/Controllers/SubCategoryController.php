<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\Bussinesses;

class SubCategoryController extends BaseController
{
    public function __construct()
    {
        $session = session();
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

    public function index($category_id = NULL)
    {
        if ($this->IsloggedIn()) {

            $SubCategoryModel = new SubCategoryModel();
            $CategoryModel = new CategoryModel();
            $categories = $CategoryModel->allCategoriesSubCategoryCountId($category_id);
            // $categories = $CategoryModel->allCategoriesSubCategoryCount();
            $subcategories = $SubCategoryModel->search_sub_cat($category_id);
            // $data['total_sub_categories'] = $SubCategoryModel->total_sub_categories($id);
            $data = [
                'categories' => $categories,
                'subcategories' => $subcategories,
                'sub_cat_active' => "active",
            ];

            /* print("<pre>" . print_r($subcategories, true) . "</pre>");
            die(); */
            return view('admin/subcategory/index', $data);
        }
    }

    // Function to add sub-category
    public function create()
    {
        if ($this->IsloggedIn()) {
            $data['add_sub_cat'] = "active";
            $CategoryModel = new CategoryModel();
            $categories = $CategoryModel->allCategoriesActive();
            $data['categories'] = $categories;
            return view('admin/subcategory/add_subcategory', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }


    // Function to save sub-category
    public function save()
    {
        $session = session();
        helper(['dubaiFunction', 'form', 'url']);
        $image = "";
        $input = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png,image/svg]',
                'max_size[image,1024]',
            ]
        ]);
        if (!$input) {
        } else {
            $img = $this->request->getFile('image');
            $image_cat = $img->getRandomName();
            $img->move('assets/sub_cat_img', $image_cat);
            $image = $image_cat;
        }
        $sub_cat_icon = "";
        $sub_icon_input = $this->validate([
            'sub_cat_icon' => [
                'uploaded[sub_cat_icon]',
                'mime_in[sub_cat_icon,image/jpg,image/jpeg,image/png,image/svg]',
            ]
        ]);

        if ($sub_icon_input) {
            $img1 = $this->request->getFile('sub_cat_icon');
            $sub_cat_icon = $img1->getRandomName();
            $img1->move('assets/sub_cat_icon/', $sub_cat_icon);
        }

        $SubCategoryModel = new SubCategoryModel();
        $name = $this->request->getvar('name');
        $slug = slugify($name);
        $cat_id = $this->request->getvar('category');
        $isactive = $this->request->getvar('is_active');
        $priority = $this->request->getvar('priority');
        $save = $SubCategoryModel->add_sub_cat($name, $cat_id, $slug, $image, $sub_cat_icon,$priority, $isactive);
        if ($save) {
            $session->setFlashdata('success_save', 'Subcategory Creared Successfully');
            return redirect()->to(base_url() . '/admin/sub-category/create');
        } else {
            $session->setFlashdata('error_save', 'Error Creating Subcategory');
            return redirect()->to(base_url() . '/admin/sub-category/create');
        }
    }

    // Function to edit sub-category 
    public function edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $data['add_sub_cat'] = "active";
            $CategoryModel = new CategoryModel();
            $SubCategoryModel = new SubCategoryModel();
            $categories = $CategoryModel->allCategoriesActive();
            $data['subcategory'] = $SubCategoryModel->edit($id);
            $data['categories'] = $categories;
            $data['hash_id'] = $id;
            return view('admin/subcategory/edit_subcategory', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }



    // Function to update sub-category 
    public function update($id)
    {
        if ($this->IsloggedIn()) {
            $session = session();
            helper(['dubaiFunction', 'form', 'url']);
            $image = "";
            $input = $this->validate([
                'image' => [
                    'uploaded[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/png,image/svg]',
                    'max_size[image,1024]',
                ]
            ]);
            if (!$input) {
            } else {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('sub_category');
                $builder_unlink->select('banner');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                if ($result[0]['banner'] != "") {
                    if (file_exists('assets/sub_cat_img/' . $result[0]['banner'])) {
                        unlink('assets/sub_cat_img/' . $result[0]['banner']);
                    }
                }
                $img = $this->request->getFile('image');
                $image_cat = $img->getRandomName();
                $img->move('assets/sub_cat_img', $image_cat);
                $image = $image_cat;
            }
            $sub_cat_icon = "";
            $sub_icon_input = $this->validate([
                'sub_cat_icon' => [
                    'uploaded[sub_cat_icon]',
                    'mime_in[sub_cat_icon,image/jpg,image/jpeg,image/png,image/svg]',
                    'max_size[image,1024]',
                ]
            ]);


            if (!$sub_icon_input) {
                /* echo "Not Validated sub category icon ";
                echo "Validation error" . $sub_icon_input;
                die(); */
            } else {
                /* echo "Validated sub category icon ";
                print_r($sub_icon_input);
                die(); */
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('sub_category');
                $builder_unlink->select('icon');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                if ($result[0]['icon'] != "") {
                    if (file_exists('assets/sub_cat_icon/' . $result[0]['icon'])) {
                        unlink('assets/sub_cat_icon/' . $result[0]['icon']);
                    }
                }
                $img1 = $this->request->getFile('sub_cat_icon');
                $sub_cat_icon = $img1->getRandomName();

                $img1->move('assets/sub_cat_icon/', $sub_cat_icon);
            }
            $SubCategoryModel = new SubCategoryModel();
            $name = $this->request->getvar('name');
            $slug = slugify($name);
            $cat_id = $this->request->getvar('category');
            $isactive = $this->request->getvar('is_active');
            $priority = $this->request->getvar('priority');
            $update = $SubCategoryModel->update_sub_cat($id, $cat_id, $name, $slug, $image, $sub_cat_icon, $priority,  $isactive);
            if ($update) {
                $session->setFlashdata('success_save', 'Subcategory Updated Successfully');
                return redirect()->to(base_url() . '/admin/sub-category/edit/' . $id);
            } else {
                $session->setFlashdata('error_save', 'Error Updating Subcategory');
                return redirect()->to(base_url() . '/admin/sub-category/edit/' . $id);
            }
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    // change sub category status
    public function update_sub_category_status()
    {
        $session = session();
        $id = $this->request->getvar('id');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $SubCategoryModel = new SubCategoryModel();
        $update = $SubCategoryModel->update_sub_category_status($id, $status);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
    /* Get Subcategory based on Category */
    public function sub_cat_listing()
    {
        $SubCategoryModel = new SubCategoryModel();
        $id = $this->request->getvar('id');
        $subcategories = $SubCategoryModel->search_sub_cat_listing($id);
        $body = "";
        $body .= "<option value=''>Select Sub Category</option>";
        foreach ($subcategories as $subcategory) {
            $body .= "<option value='" . $subcategory['id'] . "'>" . $subcategory['name'] . "</option>";
        }
        echo $body;
    }

    /* Get Subcategory based on Category for Search */
    public function get_subcategories_cat()
    {
        helper(['dubaiFunction']);
        $SubCategoryModel = new SubCategoryModel();
        $category_id = $this->request->getvar('category');
        $keyword = $this->request->getvar('keyword');
        $dist = $this->request->getvar('dist');
        $subcat_data = $SubCategoryModel->get_subcategories_search($category_id);
        $subcategory_array = array();
        if (is_array($subcat_data) && count($subcat_data) > 0) {
            foreach ($subcat_data as $subcategory) {
                array_push($subcategory_array, $subcategory['sub_cat_id']);
            }
        }
        $find_keywords = $SubCategoryModel->find_keywords($subcategory_array, $keyword);
        $body = "";
        if (is_array($find_keywords) && count($find_keywords) > 0) {
            foreach ($find_keywords as $keyword) {
                if ($keyword['keyword_source'] == "1") {
                    $keyword_name = camelCase($keyword['name']);
                    $body .= "<p class='search_keyword'>" . $keyword_name . "</p><br/>";
                    // $body .= "<a href='" . base_url() . "/businesses/" .  $keyword['subcat_slug'] . "/" . $dist . "'>" . $keyword_name . "</a><br/>";
                } else if ($keyword['keyword_source'] == "2") {
                    // $keyword_name = slugify($keyword['name']);
                    $keyword_name = camelCase($keyword['name']);
                    $body .= "<p class='search_keyword'>" . $keyword_name . "</p><br/>";
                    // $body .= "<a href='" . base_url() . "/business/" .  $keyword_name . "'>" . $keyword['name'] . "</a><br/>";
                } else if ($keyword['keyword_source'] == "4") {

                    // $body .= "<p>" . $keyword['name'] . "</p><br/>";
                    $body .= "<a href='" . $keyword['url']. "' target='_blank'>" . $keyword['name'] . "</a><br/>";
                }
            }
        } else {
            $body .= "No results found";
        }
        echo $body;
        // echo json_encode($subcat_data);
    }
    public function get_subcategories_cat_test()
    {
        helper(['dubaiFunction']);
        $SubCategoryModel = new SubCategoryModel();
        $category_id = $this->request->getvar('category');
        $keyword = $this->request->getvar('keyword');
        $subcat_data = $SubCategoryModel->get_subcategories_search($category_id);
        $subcategory_array = array();
        if (is_array($subcat_data) && count($subcat_data) > 0) {
            foreach ($subcat_data as $subcategory) {
                array_push($subcategory_array, $subcategory['sub_cat_id']);
            }
        }
        $find_keywords = $SubCategoryModel->find_keywords($subcategory_array, $keyword);
        $body = "";
        if (is_array($find_keywords) && count($find_keywords) > 0) {
            foreach ($find_keywords as $keyword) {
                if ($keyword['keyword_source'] == "1") {
                    $keyword_name = camelCase($keyword['name']);
                    $body .= "<p class='search_keyword'>" . $keyword_name . "</p><br/>";
                    // $body .= "<a href='" . base_url() . "/search?query=" . $keyword['name'] . "&z=" . $category_id . "'>" . $keyword_name . "</a><br/>";
                } else if ($keyword['keyword_source'] == "2") {
                    $keyword_name = slugify($keyword['name']);
                    $body .= "<p>" . $keyword['name'] . "</p><br/>";
                    // $body .= "<a href='" . base_url() . "/business/" .  $keyword_name . "'>" . $keyword['name'] . "</a><br/>";
                }
            }
        } else {
            $body .= "No results found";
        }
        echo $body;
        // echo json_encode($subcat_data);
    }
}
