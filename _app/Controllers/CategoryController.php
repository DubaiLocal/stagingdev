<?php

namespace App\Controllers;

use App\Models\CategoryModel;
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
        $CategoryModel = new CategoryModel();
        $categories = $CategoryModel->allCategoriesSubCategoryCount();
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
    // add category
    public function create()
    {
        if ($this->IsloggedIn()) {
            $data['add_cat'] = "active";
            return view('admin/category/add_category', $data);
        } else {
            return redirect()->to(base_url() . '/admin/login');
        }
    }
    // change category status
    public function update_category_status()
    {
        $session = session();
        $id = $this->request->getvar('id');
        $status = ($this->request->getvar('status') == 1) ? 0 : 1;
        $CategoryModel = new CategoryModel();
        $update = $CategoryModel->update_category_status($id, $status);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }

    // Function to save category 
    public function save()
    {
        $session = session();
        helper(['dubaiFunction', 'form', 'url']);
        $CategoryModel = new CategoryModel();
        $name = $this->request->getvar('name');
        $slug = slugify($name);
        $status = $this->request->getvar('status');
        $priority = $this->request->getvar('priority');
        $image = "";
        $image_input = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
            ]
        ]);
        $cat_icon = "";
        $cat_icon_input = $this->validate([
            'cat_icon' => [
                'uploaded[cat_icon]',
                'mime_in[cat_icon,image/jpg,image/jpeg,image/png,image/svg]',
            ]
        ]);

        $cat_image = "";
        $cat_image_input = $this->validate([
            'cat_image' => [
                'uploaded[cat_image]',
                'mime_in[cat_image,image/jpg,image/jpeg,image/png]',
            ]
        ]);

        // If image has been uploaded then upload & Delete previous image
        if ($image_input) {

            $img = $this->request->getFile('image');
            $image = $img->getRandomName();
            $img->move('assets/category/banner', $image);
        }
        if ($cat_icon_input) {
            $img = $this->request->getFile('cat_icon');
            $cat_icon = $img->getRandomName();
            $img->move('assets/category/icon/', $cat_icon);
        }

        if ($cat_image_input) {
            $img = $this->request->getFile('cat_image');
            $cat_image = $img->getRandomName();
            $img->move('assets/category/image/', $cat_image);
        }
        $save = $CategoryModel->add_cat($name, $slug, $priority, $image, $cat_icon, $cat_image, $status);
        if ($save) {
            $session->setFlashdata('success_save', 'Added Successfully');
            return redirect()->to(base_url() . '/admin/category/create');
        } else {
            $session->setFlashdata('error_save', 'Error inserting');
            return redirect()->to(base_url() . '/admin/category/create');
        }
    }

    // Function to edit category 
    public function edit($id = null)
    {
        if ($this->IsloggedIn()) {
            $CategoryModel = new CategoryModel();
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
            $CategoryModel = new CategoryModel();
            $id = $this->request->getvar('id');
            $name = $this->request->getvar('name');
            $slug = slugify($name);
            $status = $this->request->getvar('status');
            $priority = $this->request->getvar('priority');
            $image = "";
            $image_input = $this->validate([
                'image' => [
                    'uploaded[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/png]',
                ]
            ]);
            $cat_icon = "";
            $cat_icon_input = $this->validate([
                'cat_icon' => [
                    'uploaded[cat_icon]',
                    'mime_in[cat_icon,image/jpg,image/jpeg,image/png,image/svg]',
                ]
            ]);

            $cat_image = "";
            $cat_image_input = $this->validate([
                'cat_image' => [
                    'uploaded[cat_image]',
                    'mime_in[cat_image,image/jpg,image/jpeg,image/png]',
                ]
            ]);

            // If image has been uploaded then upload & Delete previous image
            if ($image_input) {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('category');
                $builder_unlink->select('banner');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                if ($result[0]['banner'] != "") {
                    if (file_exists('assets/category/banner/' . $result[0]['banner'])) {
                        unlink('assets/category/banner/' . $result[0]['banner']);
                    }
                }
                $img = $this->request->getFile('image');
                $image = $img->getRandomName();
                $img->move('assets/category/banner', $image);
            }
            if ($cat_icon_input) {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('category');
                $builder_unlink->select('icon');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                if ($result[0]['icon'] != "") {
                    if (file_exists('assets/category/icon/' . $result[0]['icon'])) {
                        unlink('assets/category/icon/' . $result[0]['icon']);
                    }
                }
                $img = $this->request->getFile('cat_icon');
                $cat_icon = $img->getRandomName();
                $img->move('assets/category/icon/', $cat_icon);
            }

            if ($cat_image_input) {
                $db = \Config\Database::connect();
                $builder_unlink = $db->table('category');
                $builder_unlink->select('image');
                $builder_unlink->where("md5(id)", $id);
                $query = $builder_unlink->get();
                $result = $query->getResultArray();
                if ($result[0]['image'] != "") {
                    if (file_exists('assets/category/image/' . $result[0]['image'])) {
                        unlink('assets/category/image/' . $result[0]['image']);
                    }
                }
                $img = $this->request->getFile('cat_image');
                $cat_image = $img->getRandomName();
                $img->move('assets/category/image/', $cat_image);
            }

            $result = $CategoryModel->update_cat($id, $name, $slug, $image, $cat_icon, $cat_image, $priority, $status);
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
}
