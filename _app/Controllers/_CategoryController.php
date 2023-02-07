<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends BaseController
{
    public function __construct()
    {
        $session = session();
    }
    //  function for category listing
    public function index()
    {
        $CategoryModel = new Category();
        $categories = $CategoryModel->allcategories();
        $data = [
            'categories' => $categories,
        ];
        return view('admin/category/index', $data);
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
    // Function to add category on the category add page
    public function create()
    {
        if ($this->IsloggedIn()) {
            $data['add_cat'] = "active";
            return view('admin/category/add_category', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    // Function to save category 
    public function save()
    {
        $session = session();
        helper(['dubaiFunction', 'form', 'url']);
        $CategoryModel = new Category();
        $id = $this->request->getvar('id');
        $name = $this->request->getvar('name');
        $slug = slugify($name);
        $isactive = $this->request->getvar('is_active');
        $image = "";
        $icon_name = "";
        $image_input = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,2048]',
            ]
        ]);
        // If image has been uploaded then upload & create icon
        if ($image_input) {
            $img = $this->request->getFile('image');
            $image = $img->getRandomName();
            $icon_name = 'm_' . $image;
            $icon = \Config\Services::image()->withFile($img)->resize(790, 570, false, 'height')->save('assets/icon/' . $icon_name);
            $img->move('assets/image', $image);
        }
        $priority = $this->request->getvar('priority');
        if ($CategoryModel->check_priority($priority)) {
            $session->setFlashdata('error_save', 'Change priority');
            return redirect()->to(base_url() . '/admin/category/create');
        } else {
            $save = $CategoryModel->add_cat($name, $slug, $priority, $image, $icon_name, $isactive);
            if ($save) {
                $session->setFlashdata('success_save', 'Added Successfully');
                return redirect()->to(base_url() . '/admin/category/create');
            } else {
                $session->setFlashdata('error_save', 'Error inserting');
                return redirect()->to(base_url() . '/admin/category/create');
            }
        }
    }
    // Function to edit category 
    public function edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $CategoryModel = new Category();
            $data['category'] = $CategoryModel->edit($id);
            $data['hash_id'] = $id;
            return view('admin/category/edit_category', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    // Function to update category 
    public function update($id)
    {
        if ($this->IsloggedIn()) {
            $session = session();
            helper(['dubaiFunction', 'form', 'url']);
            // helper(['form', 'url']);
            $CategoryModel = new Category();
            $id = $this->request->getvar('id');
            $name = $this->request->getvar('name');
            $slug = slugify($name);
            $isactive = $this->request->getvar('is_active');
            $priority = $this->request->getvar('priority');
            $image = "";
            $image_input = $this->validate([
                'image' => [
                    'uploaded[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/png]',
                    'max_size[image,2048]',
                ]
            ]);
            $icon_name = "";
            // If image has been uploaded then upload & Delete previous image
            if ($image_input) {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('categories_3_4_2015');
                $builder_unlink->select('image');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                if ($result[0]['image'] != "") {
                    if (file_exists('assets/image/' . $result[0]['image'])) {
                        unlink('assets/image/' . $result[0]['image']);
                        unlink('assets/icon/m_' . $result[0]['image']);
                    }
                }
                $img = $this->request->getFile('image');
                $image = $img->getRandomName();
                $icon_name = 'm_' . $image;
                $icon = \Config\Services::image()->withFile($img)->resize(790, 570, false, 'height')->save('assets/icon/' . $icon_name);
                $img->move('assets/image', $image);
            }
            $result = $CategoryModel->update_cat($id, $name,$slug, $image, $icon_name, $priority, $isactive);
            if ($result) {
                $session->setFlashdata('success_save', 'Done updating');
                return redirect()->to(base_url() . '/admin/category/edit/' . $id);
            } else {
                $session->setFlashdata('error_save', 'Error updating');
                return redirect()->to(base_url() . '/admin/category/edit/' . $id);
            }
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    // function for update category status
    public function update_category_status()
    {
        $session = session();
        $userid = $this->request->getvar('UserId');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $CategoryModel = new Category();
        $update = $CategoryModel->update_category_status($userid, $status);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
    // function for update Menu category status
    public function update_menu_category_status()
    {
        $session = session();
        $catId = $this->request->getvar('CatId');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $CategoryModel = new Category();
        $update = $CategoryModel->update_menu_category_status($catId, $status);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
    // function for fetch subcategory list on click on category name
    public function fetch_subcategory($id = null)
    {
        $CategoryModel = new Category();
        $SubCategoryModel = new SubCategory();
        $subcategories = $SubCategoryModel->all_sub_categories_cat($id);
        $categoriess = $CategoryModel->all_get_categories($id);
        // $data['total_sub_categories'] = $SubCategoryModel->total_sub_categories($id);
        $data = [
            'categoriess' => $categoriess,
            'subcategories' => $subcategories,
            'sub_cat_active' => "active",
            'total_sub_categories' => $SubCategoryModel->total_sub_categories($id)
        ];
        return view('admin/subcategory/index', $data);
    }
}
