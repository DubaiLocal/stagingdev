<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
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
        if (!session()->get('userid')) {
            return 0;
        } else {
            return 1;
        }
    }
    // Function to add sub-category on the sub-category add page
    public function create()
    {
        if ($this->IsloggedIn()) {
            $data['add_sub_cat'] = "active";
            $CategoryModel = new Category();
            $categories = $CategoryModel->all_categories();
            $data['categories'] = $categories;
            return view('admin/subcategory/add_subcategory', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    // Function to save sub-category on the sub-category add page
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
        $SubCategoryModel = new SubCategory();
        $name = $this->request->getvar('name');
        $slug = slugify($name);
        $cat_id = $this->request->getvar('category');
        $isactive = $this->request->getvar('is_active');
        $save = $SubCategoryModel->add_sub_cat($name, $slug, $image, $cat_id, $isactive);
        if ($save) {
            $session->setFlashdata('success_save', 'Added Successfully');
            return redirect()->to(base_url() . '/admin/sub-category/create');
        } else {
            $session->setFlashdata('error_save', 'Error inserting');
            return redirect()->to(base_url() . '/admin/sub-category/create');
        }
    }
    // Function to edit sub-category 
    public function edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $CategoryModel = new Category();
            $SubCategoryModel = new SubCategory();
            $data['categories'] = $CategoryModel->all_categories();
            $data['subcategory'] = $SubCategoryModel->edit($id);
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
            $SubCategoryModel = new SubCategory();
            $id = $this->request->getvar('id');
            $name = $this->request->getvar('name');
            $slug = slugify($name);
            $category = $this->request->getvar('category');
            $isactive = $this->request->getvar('is_active');
           
            $image = "";
            $input = $this->validate([
                'image' => [
                    'uploaded[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/png]',
                    'max_size[image,1024]',
                ]
            ]);
            if (!$input) {
                $result = $SubCategoryModel->update_sub_cat($id, $name, $slug, $category, $image, $isactive);
            } else {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('categories_3_4_2015');
                $builder_unlink->select('image');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                $img = $this->request->getFile('image');
                $image_cat = $img->getRandomName();
                $img->move('assets/sub_cat_img/', $image_cat);
                $image = $image_cat;
                $result = $SubCategoryModel->update_sub_cat($id, $name, $slug, $category, $image, $isactive);
                /* print_r($result);
                die; */
            }
            if ($result) {
                $session->setFlashdata('success_save', 'Done updating');
                return redirect()->to(base_url() . '/admin/sub-category/edit/' . $id);
            } else {
                $session->setFlashdata('error_save', 'Error updating');
                return redirect()->to(base_url() . '/admin/sub-category/edit/' . $id);
            }
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    // Function to update sub-category status on icon click
    public function update_sub_category_status()
    {
        $userid = $this->request->getvar('UserId');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $SubCategoryModel = new SubCategory();
        $update = $SubCategoryModel->update_sub_category_status($userid, $status);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
