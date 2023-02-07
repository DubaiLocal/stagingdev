<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\Front;
use App\Models\BussinessesModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\DistrictsModel;
use App\Models\FeatureModel;
use App\Models\NeabyLocationModel;
use App\Models\ReviewsModel;

class UserController extends BaseController
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
		return redirect()->to(base_url() . '/user/login');
	}
	public function login()
	{
		return view('user/login');
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
			$session->set("logged_in", TRUE);
			$session->set("logged_in_type", "admin");

			return redirect()->to(base_url() . '/user/dashboard');
		} else {
			$session->setFlashdata('error_login', 'Invalid username/password');
			return redirect()->to(base_url() . '/user/login');
		}
	}
	public function user_dashboard($login_id = null)
	{
		if ($this->userLoggedIn()) {
			$userModel = new UsersModel();
			$session = \Config\Services::session();
			$login_id = $session->get('userid');

			$total_pending_bussiness = $userModel->total_pending_bussiness($login_id);
			$data = [
				'login_id' => $login_id,
				'total_pending_bussiness' => $total_pending_bussiness,
				'dashboard_sidebar' => "active",

			];
			return view('user/dashboard', $data);
		} else {
			return redirect()->to(base_url() . '/user/login');
		}
	}
	public function user_approved_bussiness()
	{
		if ($this->userLoggedIn()) {
			$userModel = new UsersModel();
			$session = session();
			$login_id = session()->get('userid');
			$user_approved_bussiness = $userModel->user_approved_business($login_id);

			$data = [
				'login_id' => $login_id,
				'user_approved_bussiness' => $user_approved_bussiness,
			];
			return view('user/business', $data);
		} else {
			return redirect()->to(base_url() . '/user/login');
		}
	}
	public function user_pending_business()
	{
		$userModel = new UsersModel();
		$login_id = session()->get('userid');
		$user_pending_business = $userModel->user_pending_business($login_id);

		$data = [
			'login_id' => $login_id,
			'user_pending_business' => $user_pending_business,
			'pending_bussiness_sidebar' => "active",
		];
		return view('user/pending_business', $data);
	}
	/* Preview Pending business */
	public function single_business_preview($slug)
	{
		if ($this->userLoggedIn()) {
		}
		$CategoryModel = new CategoryModel();
		$SubCategoryModel = new SubCategoryModel();
		$business = new BussinessesModel();
		$business_data = $business->single_bussiness($slug);
		$menu_categories = $CategoryModel->menu_categories();
		$menu_sub_categories = $SubCategoryModel->all_sub_categories_category();
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
				'logged_in' => $loggedin,
				'preview' => $preview,
			];
		return view('home/bussiness_detail', $data);
	}


	//add bussiness view
	public function create_business()
	{
		if ($this->userLoggedIn()) {
			$CategoryModel = new CategoryModel();
			$businessModel = new BussinessesModel();
			$featureModel = new FeatureModel();
			$districtsModel = new DistrictsModel();
			$categories = $CategoryModel->allCategoriesActive();
			$features = $featureModel->all_featured();
			$districts = $districtsModel->all_districts();
			$data = ['categories' => $categories, 'features' => $features, 'districts' => $districts];
			return view('user/business/add_business', $data);
		} else {
			return redirect()->to(base_url() . '/login');
		}
	}
	// Function to save bussiness
	public function save_business()
	{
		$session = session();
		$login_id = session()->get('userid');
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
			// $subcategory_thumbnail = \Config\Services::image()->withFile($logo_img)->resize(275, 220, true, 'height')->save('assets/subcategory-business-thumbnail/' . $logo . '-275x220');
			// $banner_thumbnail = \Config\Services::image()->withFile($logo_img)->resize(590, 375, true, 'height')->save('assets/business-thumbnail/' . $logo . '-590x375');
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
			return redirect()->to(base_url() . '/user/business/create');
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
		$userModel = new UsersModel();
		$reviewsModel = new ReviewsModel();
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
		$save_business = $userModel->add_bussiness($login_id, $name, $slug, $district, $nearby_location, $description, $address, $url, $status);
		if ($save_business) {
			// Insert review
			// $review_text = "test";
			// $rating = rand(40, 46) / 10;
			// $save_rating = $reviewsModel->saveReview($review_text, $rating, $save_business);


			// Save Business additional details
			$save_business_detail = $business->add_bussiness_details($save_business, $email, $phone, $logo, $lat, $lng, $more_images, $full_timing_array, $num_rating, $aeverage_rating);
			if ($save_business_detail) {
				$save_business_cat_subcat = $business->save_business_cat_subcat($save_business, $category_id, $subcategory_id);
				if ($save_business_cat_subcat) {
					$session->setFlashdata('success_save', 'Added Successfully');
					return redirect()->to(base_url() . '/user/business/create');
				} else {
					$session->setFlashdata('error_save', 'Error inserting Business Category');
					return redirect()->to(base_url() . '/user/business/create');
				}
			} else {
				$session->setFlashdata('error_save', 'Error inserting Business Details');
				return redirect()->to(base_url() . '/user/business/create');
			}
		} else {
			$session->setFlashdata('error_save', 'Error inserting Business');
			return redirect()->to(base_url() . '/user/business/create');
		}
	}


	/* Method for edit bussiness data */
	public function edit_business($id = null)
	{
		if ($this->userLoggedIn()) {
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

			$data['hash_id'] = $id;
			$data['pending'] = "true";
			return view('user/business/edit', $data);
		} else {
			return redirect()->to(base_url() . '/user/login');
		}
	}
	/* Method for update bussiness data */
	public function update_business($id)
	{
		if ($this->userLoggedIn()) {
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
						unlink('assets/subcategory-business-thumbnail/' . $result[0]['banner'] . '-275x220');
						unlink('assets/business-thumbnail/' . $result[0]['banner'] . '-590x375');
					}
				}
				$img = $this->request->getFile('logo');
				$logo = $img->getRandomName();
				$subcategory_thumbnail = \Config\Services::image()->withFile($img)->resize(275, 220, true, 'height')->save('assets/subcategory-business-thumbnail/' . $logo . '-275x220');
				$banner_thumbnail = \Config\Services::image()->withFile($img)->resize(590, 375, true, 'height')->save('assets/business-thumbnail/' . $logo . '-590x375');
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
			$userModel = new UsersModel();
			$id = $this->request->getvar('id');
			$featured = $this->request->getvar('featured');
			$name = $this->request->getvar('name');
			$slug = slugify($name);
			$category_id = $this->request->getvar('category_id');
			$subcategory_id = $this->request->getvar('subcategory_id');
			$district = $this->request->getvar('district');
			$nearby_location = $this->request->getvar('nearby_location');
			if ($nearby_location == "") {
				$nearby_location = NULL;
			}
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


			$update_business = $userModel->update_business($id, $featured, $name, $slug, $district, $nearby_location, $description, $address, $url, $status);
			if ($update_business) {
				$save_business_detail = $business->update_bussiness_details($id, $email, $phone, $logo, $lat, $lng, $more_images, $full_timing_array, $num_rating, $aeverage_rating);
				if ($save_business_detail) {
					$save_business_cat_subcat = $business->update_business_cat_subcat($id, $category_id, $subcategory_id);
					if ($save_business_cat_subcat) {
						$session->setFlashdata('success_save', 'Done updating');
						return redirect()->to(base_url() . '/user/business/edit/' . $this->request->uri->getSegment(4));
					} else {
						$session->setFlashdata('error_save', 'Error Updating Business Category');
						return redirect()->to(base_url() . '/user/business/edit/' . $this->request->uri->getSegment(4));
					}
				} else {
					$session->setFlashdata('error_save', 'Error updating Business Details');
					return redirect()->to(base_url() . '/user/business/edit/' . $this->request->uri->getSegment(4));
				}
			} else {
				$session->setFlashdata('error_save', 'Error Updating Business');
				return redirect()->to(base_url() . '/user/business/edit/' . $this->request->uri->getSegment(4));
			}
		} else {
			return redirect()
				->to(base_url() . '/admin/login');
		}
	}

	// Test Thumbnail
	public function test_thumbnail()
	{
		if ($this->userLoggedIn()) {
			return view('user/test-thumbnail');
		} else {
			return redirect()->to(base_url() . '/user/login');
		}
	}
	// Test Thumbnail
	public function test_save_thumbnail()
	{
		if ($this->userLoggedIn()) {
			$logo_input = $this->validate([
				'img_logo' => [
					'uploaded[img_logo]',
					'mime_in[img_logo,image/jpg,image/jpeg,image/png,image/svg]',
					'max_size[img_logo,2048]',
				]
			]);
			if ($logo_input) {
				$logo_img = $this->request->getFile('img_logo');
				$logo = $logo_img->getRandomName();
				// $icon_name = 'm_' . $image;
				$subcategory_thumbnail = \Config\Services::image()->withFile($logo_img)->resize(275, 220, true, 'height')->save('assets/test-thumbnail/275x220-' . $logo);
				$banner_thumbnail = \Config\Services::image()->withFile($logo_img)->resize(590, 375, true, 'height')->save('assets/test-thumbnail/590x375-' . $logo);
				$logo_img->move('assets/logo', $logo);
			}

			return view('user/test-thumbnail');
		} else {
			return redirect()->to(base_url() . '/use/login');
		}
	}
}
