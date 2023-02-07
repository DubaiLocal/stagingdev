<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\Front;
use App\Models\BussinessesModel;
use App\Models\CategoryModel;
use App\Models\CategorySeoModel;
use App\Models\SubCategorySeoModel;
use App\Models\SubCategoryModel;
use App\Models\DistrictsModel;
use App\Models\FeatureModel;
use App\Models\NeabyLocationModel;
use App\Models\ReviewsModel;

class SeoController extends BaseController
{

	public function userLoggedIn()
	{
		$session = session();
		if (!session()->get('userid')) {
			return 0;
		} else {
			return 1;
		}
	}
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url() . '/seo/login');
	}
	public function login()
	{
		return view('seo/login');
	}
	public function user_login()
	{
		$userModel = new UsersModel();
		$session = session();
		$email = $this->request->getvar('email');
		$pass = $this->request->getvar('password');
		$get_data = $userModel->login($email, $pass);

		if ($get_data) {
			$session->set("Email", $get_data[0]->email);
			$session->set("userid", $get_data[0]->id);
			$session->set("name", $get_data[0]->name);
			$session->set("role", $get_data[0]->role);
			$session->set("logged_in", TRUE);
			$role = $get_data[0]->role;
			if ($role == "3") {
				$session->set("logged_in_type", "seo");
				return redirect()->to(base_url() . '/seo/dashboard');
			} else {
				return redirect()->to(base_url() . '/seo/login');
			}
		} else {
			$session->setFlashdata('error_login', 'Invalid username/password');
			return redirect()->to(base_url() . '/seo/login');
		}
	}
	public function user_dashboard($login_id = null)
	{
		if ($this->userLoggedIn()) {
			$session = \Config\Services::session();
			$role = $session->get('role');
			if ($session->get('role') == "3") {

				$login_id = $session->get('userid');
				$data = [
					'login_id' => $login_id,
					'role' => $role,
					'dashboard_sidebar' => "active",

				];
				return view('seo/dashboard', $data);
			} else {
				return redirect()->to(base_url() . '/seo/login');
			}
		} else {
			return redirect()->to(base_url() . '/seo/login');
		}
	}
	/* Manage Category SEO */
	public function manage_category_seo()
	{
		if ($this->userLoggedIn()) {
			$session = \Config\Services::session();
			$role = $session->get('role');
			$login_id = $session->get('userid');
			if ($session->get('role') == "3") {
				$userModel = new UsersModel();

				$allCategories = $userModel->allCategoriesActive();
				$data = [
					'login_id' => $login_id,
					'role' => $role,
					'categories' => $allCategories,
					'manage_category_seo_sidebar' => "active",

				];
				return view('seo/category/category-listing', $data);
			} else {
				return redirect()->to(base_url() . '/seo/login');
			}
		} else {
			return redirect()->to(base_url() . '/seo/login');
		}
	}



	public function edit_category($slug = null)
	{
		if ($this->userLoggedIn()) {
			$categoryModel = new CategoryModel();
			$category = $categoryModel->edit_cat_slug($slug);
			$categorySeoModel = new CategorySeoModel();
			$cat_seo_data = $categorySeoModel->get_seo_data($category[0]->id);

			$id = $cat_seo_data[0]->id;
			$data = [
				'category' => $category[0],
				'cat_seo_data' => $cat_seo_data[0],
				'id' => $id,
				'manage_category_seo_sidebar' => "active",
			];
			return view('seo/category/edit_category', $data);
		} else {
			return redirect()->to(base_url() . '/seo/login');
		}
	}
	// Function to update category 
	public function update_category($cat_slug)
	{
		if ($this->userLoggedIn()) {
			$session = session();
			helper(['dubaiFunction', 'form', 'url']);
			// helper(['form', 'url']);
			$categorySeoModel = new CategorySeoModel();
			$id = $this->request->getvar('id');
			$title = $this->request->getvar('title');
			$meta_title = $this->request->getvar('meta_title');
			$meta_desc = $this->request->getvar('meta_desc');
			$cat_id = $this->request->getvar('cat_id');
			$result = "";
			if ($id != "") {
				$result = $categorySeoModel->update_category_seo($id, $title, $meta_title, $meta_desc);
				if ($result) {
					$session->setFlashdata('success_save', 'Done updating');
					return redirect()->to(base_url() . '/seo/category/edit/' . $cat_slug);
				} else {
					$session->setFlashdata('error_save', 'Error updating');
					return redirect()->to(base_url() . '/seo/category/edit/' . $cat_slug);
				}
			} else {
				$result = $categorySeoModel->insert_category_seo($cat_id, $title, $meta_title, $meta_desc);
				if ($result) {
					$session->setFlashdata('success_save', 'Done Inserting');
					return redirect()->to(base_url() . '/seo/category/edit/' . $cat_slug);
				} else {
					$session->setFlashdata('error_save', 'Error Inserting');
					return redirect()->to(base_url() . '/seo/category/edit/' . $cat_slug);
				}
			}
		} else {
			return redirect()->to(base_url() . '/seo/login');
		}
	}
	/* END manage category */


	public function sub_category_listing($category_id = NULL)
	{
		if ($this->userLoggedIn()) {

			$subCategorySeoModel = new SubCategorySeoModel();
			$categorySeoModel = new CategorySeoModel();
			$categories = $categorySeoModel->allCategoriesSubCategoryCountId($category_id);
			$subcategories = $subCategorySeoModel->search_sub_cat($category_id);
			$data = [
				'categories' => $categories,
				'subcategories' => $subcategories,
				'manage_category_seo_sidebar' => "active",
			];

			/* print("<pre>" . print_r($subcategories, true) . "</pre>");
            die(); */
			return view('seo/sub-category/index', $data);
		}
	}

	public function edit_sub_category($id = null)
	{
		if ($this->userLoggedIn()) {
			$data['add_sub_cat'] = "active";
			$CategoryModel = new CategoryModel();
			$SubCategoryModel = new SubCategoryModel();
			$categories = $CategoryModel->allCategoriesActive();
			$subcategory = $SubCategoryModel->edit($id);

			$subCategorySeoModel = new SubCategorySeoModel();
			$sub_cat_seo_data = $subCategorySeoModel->get_seo_data($subcategory[0]->id);

			$id = $sub_cat_seo_data[0]->id;
			$data = [
				'categories' => $categories,
				'subcategory' => $subcategory,
				'sub_cat_seo_data' => $sub_cat_seo_data[0],
				'id' => $id,
				'manage_category_seo_sidebar' => "active",
			];
			return view('seo/sub-category/edit_subcategory', $data);
		} else {
			return redirect()->to(base_url() . '/seo/login');
		}
	}
	// Function to update sub-category 
	public function update_sub_category($sub_cat)
	{
		if ($this->userLoggedIn()) {
			$session = session();
			helper(['dubaiFunction', 'form', 'url']);
			// helper(['form', 'url']);
			$categorySeoModel = new CategorySeoModel();
			$subCategorySeoModel = new SubCategorySeoModel();
			$id = $this->request->getvar('id');
			$title = $this->request->getvar('title');
			$meta_title = $this->request->getvar('meta_title');
			$meta_desc = $this->request->getvar('meta_desc');
			$sub_cat_id = $this->request->getvar('sub_cat_id');
			$result = "";
			if ($id != "") {
				$result = $subCategorySeoModel->update_sub_category_seo($id, $title, $meta_title, $meta_desc);
				if ($result) {
					$session->setFlashdata('success_save', 'Done updating');
					return redirect()->to(base_url() . '/seo/sub-category/edit/' . $sub_cat);
				} else {
					$session->setFlashdata('error_save', 'Error updating');
					return redirect()->to(base_url() . '/seo/sub-category/edit/' . $sub_cat);
				}
			} else {
				$result = $subCategorySeoModel->insert_sub_category_seo($sub_cat_id, $title, $meta_title, $meta_desc);
				if ($result) {
					$session->setFlashdata('success_save', 'Done Inserting');
					return redirect()->to(base_url() . '/seo/sub-category/edit/' . $sub_cat);
				} else {
					$session->setFlashdata('error_save', 'Error Inserting');
					return redirect()->to(base_url() . '/seo/sub-category/edit/' . $sub_cat);
				}
			}
		} else {
			return redirect()->to(base_url() . '/seo/login');
		}
	}
}
