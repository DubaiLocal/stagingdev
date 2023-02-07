<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Front;
use App\Models\BussinessesModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\DistrictsModel;

class UserController extends BaseController
{
	public function register()
	{
		return view('user/register');
	}
	public function save_user()
	{
		$userModel = new Users();
		$session = session();
		$name = $this->request->getvar('name');
		$email = $this->request->getvar('email');
		$password = $this->request->getvar('password');
		$phone = $this->request->getvar('phone');
		if ($userModel->check_email($email)) {
			$session->setFlashdata('error_save', 'Email Already in use,Please Enter another Email');
			return redirect()->to(base_url() . '/register');
		} else {
			$save_user = $userModel->add_user($name, $email, $password, $phone);
			if ($save_user) {
				$session->setFlashdata('success_save', 'Registered Successfully');
				return redirect()->to(base_url() . '/login');
			} else {
				$session->setFlashdata('error_save', 'Error inserting');
				return redirect()->to(base_url() . '/register');
			}
		}
	}
	public function login()
	{
		return view('user/login');
	}
	public function user_login()
	{
		$userModel = new Users();
		$session = session();
		$email = $this->request->getvar('email');
		$pass = $this->request->getvar('password');
		$get_data = $userModel->login($email, $pass);
		if ($get_data) {
			$email = $session->set("Email", $get_data[0]->email);
			$session->set("userid", $get_data[0]->id);
			$session->set("name", $get_data[0]->name);
			$session->set("logged_in", TRUE);
			return redirect()->to(base_url() . '/dashboard');
		} else {
			$session->setFlashdata('error_login', 'Invalid username/password');
			return redirect()->to(base_url() . '/register');
		}
	}
	public function user_dashboard($login_id = null)
	{
		if ($this->userLoggedIn()) {
			$userModel = new Users();
			$session = \Config\Services::session();
			$login_id = $session->get('userid');

			$total_pending_bussiness = $userModel->total_pending_bussiness($login_id);
			$data = [
				'login_id' => $login_id,
				'total_pending_bussiness' => $total_pending_bussiness,
			];
			return view('user/dashboard', $data);
		} else {
			return redirect()->to(base_url() . '/login');
		}
	}
	public function add_bussiness()
	{
		if ($this->userLoggedIn()) {
			$CategoryModel = new CategoryModel();
			$SubCategoryModel = new SubCategoryModel();
			$DistrictsModel = new DistrictsModel();
			$categories = $CategoryModel->allCategoriesActive();
			// $bussiness = $bussinesses->all_cities();
			// $states = $bussinesses->all_states();
			// $countries = $bussinesses->all_countries();
			$subcategories = $SubCategoryModel->all_sub_categories_category();
			$districts = $DistrictsModel->all_districts();
			$data = ['categories' => $categories, 'subcategories' => $subcategories, 'districts' => $districts];
			return view('user/business/add_bussiness', $data);
		} else {
			return redirect()->to(base_url() . '/login');
		}
	}
	public function save_bussiness()
	{
		/*--------------START Find business with the name which user posted ---------------*/
		/* $name = $this->request->getvar('name');
		$bussinesses = new BussinessesModel();
		$bussinesses->select('businesses.*');
		$bussinesses->havingLike('businesses.name', $name);
		$business_name_db = $bussinesses->countAllResults();
		print("<pre>" . print_r($business_name_db, true) . "</pre>");
		die(); */

		/*--------------END Find business with the name which user posted -------------------*/



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
				'max_size[more_images,4096]',
			],
		]);
		$filePreviewName = array();
		if (!$validated) {
			$session->setFlashdata('error_save', 'Error Saving more image');
			return redirect()->to(base_url() . '/add-business');
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
		$userModel = new Users();
		$name = $this->request->getvar('name');
		$category_id = $this->request->getvar('category_id');
		$subcategory_id = $this->request->getvar('subcategory_id');
		$district = $this->request->getvar('district');
		$description = $this->request->getvar('description');
		$unique_url = $this->request->getvar('unique_url');
		$address1 = $this->request->getvar('address1');
		$country_id = $this->request->getvar('country_id');
		$city_id = $this->request->getvar('city_id');
		$zip = $this->request->getvar('zip');
		$phone = $this->request->getvar('phone');
		$login_id = session()->get('userid');

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


		$save_data = $userModel->add_bussiness($name, $category_id, $subcategory_id, $district, $description, $logo, $unique_url, $address1, $country_id, $city_id, $zip, $phone, $more_images, $login_id, $full_timing_array);
		if ($save_data) {
			$session->setFlashdata('success_save', 'Added Successfully');
			return redirect()->to(base_url() . '/add-business');
		} else {
			$session->setFlashdata('error_save', 'Error inserting');
			return redirect()->to(base_url() . '/add-business');
		}
	}
	public function user_approved_bussiness()
	{
		$userModel = new Users();
		$session = session();
		$login_id = session()->get('userid');
		$user_approved_bussiness = $userModel->user_approved_bussiness($login_id);
		$data = [
			'login_id' => $login_id,
			'user_approved_bussiness' => $user_approved_bussiness,
		];
		return view('user/my_bussiness', $data);
	}
	public function user_pending_bussiness()
	{
		$userModel = new Users();
		$login_id = session()->get('userid');
		$user_pending_bussiness = $userModel->user_pending_bussiness($login_id);
		$data = [
			'login_id' => $login_id,
			'user_pending_bussiness' => $user_pending_bussiness,
		];
		return view('user/pending_bussiness', $data);
	}
	public function user_logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url() . '/login');
	}
	public function userLoggedIn()
	{
		$session = session();
		if (!session()->get('userid')) {
			return 0;
		} else {
			return 1;
		}
	}
	public function update_user_business($id)
	{
		if ($this->userLoggedIn()) {

			$session = session();
			$name = $this->request->getvar('name');
			// $bussinesses = new BussinessesModel();
			// $bussinesses->select('businesses.*');
			// $bussinesses->where('businesses.name', $name);
			// $business_name_db = $bussinesses->countAllResults();

			// if ($business_name_db == 2) {
			// 	$session->setFlashdata('error_save', 'Please Set Your business Name');
			// 	return redirect()->to(base_url() . '/mybussiness');
			// }




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
					'max_size[more_images,4096]',
				],
			]);

			$filePreviewName = array();
			if ($validated) {
				$session->setFlashdata('error_save', 'Error updating img');
				return redirect()->to(base_url() . '/user-business/edit/' . $this->request->uri->getSegment(3));
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

			$id = $this->request->getvar('id');
			// $Name = $this->request->getvar('name');
			$unique_url = $this->request->getvar('unique_url');
			$Email = $this->request->getvar('email');
			$Phone = $this->request->getvar('phone');
			$Description = $this->request->getvar('description');
			$category_id = $this->request->getvar('category_id');
			$subcategory_id = $this->request->getvar('subcategory_id');
			$district = $this->request->getvar('district');
			// $country_id = $this->request->getvar('country_id');
			// $city_id = $this->request->getvar('city_id');

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


			$userModel = new Users();
			// $result = $userModel->update_business($id, $Name, $PageUrl, $logo, $Email, $Phone, $Description, $more_images, $country_id, $city_id, $category_id, $subcategory_id);


			$result = $userModel->update_business($id, $unique_url, $logo, $Email, $Phone, $Description, $more_images, $category_id, $subcategory_id, $district, $full_timing_array);

			if ($result) {
				$session->setFlashdata('success_save', 'Done updating');
				// return redirect()->to(base_url() . '/pending-bussiness');
				return redirect()->to(base_url() . '/business/edit/' . $this->request->uri->getSegment(3));
			} else {
				$session->setFlashdata('error_save', 'Error updating');
				return redirect()->to(base_url() . '/pending-bussiness');
			}
		} else {
			return redirect()->to(base_url() . '/login');
		}
	}
	public function user_business_edit($id = NULL)
	{
		if ($this->userLoggedIn()) {
			$bussinesses = new BussinessesModel();
			$data['bussinesses'] = $bussinesses->edit($id);
			$data['timings'] = json_decode($data['bussinesses'][0]->timings, true);
			$data['categories'] = $bussinesses->all_categories();
			$data['subcategories'] = $bussinesses->all_subcategory();
			$data['districts'] = $bussinesses->all_districts();
			$data['countries'] = $bussinesses->all_countries();
			$data['states'] = $bussinesses->all_states();
			$data['bussiness'] = $bussinesses->all_cities();
			$data['hash_id'] = $id;
			return view('user/business/edit', $data);
		} else {
			return redirect()->to(base_url() . '/login');
		}
	}
}
