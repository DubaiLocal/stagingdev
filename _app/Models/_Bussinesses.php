<?php

namespace App\Models;

use CodeIgniter\Model;

class Bussinesses extends Model
{
	protected $table = 'businesses';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useTimestamps = false;
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;

	//  function start for bussiness edit page use in edit method in bussiness controller
	public function edit($id)
	{
		$db      = \Config\Database::connect();
		$data_array = array(
			"md5(id)" => $id
		);
		$builder = $db->table('businesses');
		$db = $builder->where($data_array);
		return $db->get()->getResultObject();
	}
	//  function end for bussiness edit
	//  function start for bussiness update use in update method in bussiness controller updated on 17-06-2022 by shraddha*/
	public function update_business($id, $featured, $Name, $pending, $url, $logo, $Email, $Phone, $Description, $more_images, $country_id, $city_id, $category_id, $subcategory_id, $district, $timings)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$data_array = array(
			'feature_id' => $featured,
			'name' => $Name,
			'email' => $Email,
			'phone' => $Phone,
			'description' => $Description,
			"unique_url" => $url,
			'category_id ' => $category_id,
			'subcategory_id' => $subcategory_id,
			'district' => $district,
			'city_id ' => $city_id,
			'country_id' => $country_id,
			'timings' => $timings,
			'modified' => date('Y-m-d h:s:a'),
		);
		if ($pending == "true") {
			$new_data_array = array(
				'status' => "0",
			);
			$data_array = array_merge($data_array, $new_data_array);
		}
		if ($logo != "") {
			$new_data_array = array(
				'logo' => $logo,
			);
			$data_array = array_merge($data_array, $new_data_array);
		}
		if ($more_images != "") {
			$new_data_array = array(
				'more_images' => $more_images,
			);
			$data_array = array_merge($data_array, $new_data_array);
		}

		$builder->where('md5(id)', $id);
		$res = $builder->update($data_array);
		/* $sql = $builder->getCompiledUpdate(); 
			echo $sql;
			die; */
		return $res;
	}
	//  function end for bussiness update
	//  function start for add bussiness use in save method in bussiness controller
	public function add_bussiness($featured, $name, $category_id, $subcategory_id, $district, $description, $logo, $unique_url, $address1, $country_id, $city_id, $zip, $terms, $phone, $url, $lat, $lng, $status, $more_images, $scrap_images, $timings)
	{
		$db      = \Config\Database::connect();
		$data_array = array(
			"feature_id" => $featured,
			"name" => $name,
			"category_id" => $category_id,
			"subcategory_id " => $subcategory_id,
			"district " => $district,
			"description" => $description,
			"logo" => $logo,
			"unique_url" => $unique_url,
			"address1" => $address1,
			"country_id" => $country_id,
			"city_id" => $city_id,
			"zip" => $zip,
			"terms" => $terms,
			"phone" => $phone,
			"lat" => $lat,
			"lng" => $lng,
			"status" => $status,
			"created" => date('Y-m-d h:s:a'),
			"more_images" => $more_images,
			"scrap_images" => $scrap_images,
			'timings' => $timings,
			"isactive" => "1",
		);


		$builder = $db->table('businesses');
		$builder->insert($data_array);
		/* $sql = $builder->set($data_array)->getCompiledInsert();
		echo $sql;
		echo  "<br/>";
		print("<pre>" . print_r($data_array, true) . "</pre>");
		echo $db->getLastQuery();
		die(); */
		return $db->insertID();
	}
	//  function end for add bussiness 
	//  function start for fetch all cities in add bussiness page and use in create method in bussiness controller
	public function all_cities()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('cities');
		$builder->select('cities.*');
		$builder->select('name as city_name');
		$query = $builder->get();
		return $query->getResultArray();
	}
	//  function start for fetch all states in add bussiness page and use in create method in bussiness controller
	public function all_states()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('states');
		$builder->select('states.*');
		$builder->select('name as state_name');
		$query = $builder->get();
		return $query->getResultArray();
	}
	//  function start for fetch all country in add bussiness page and use in create method in bussiness controller
	public function all_countries()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('countries');
		$builder->select('countries.*');
		$builder->select('name as country_name');
		$query = $builder->get();
		return $query->getResultArray();
	}
	//  function start for fetch all feature in add bussiness page and use in create method in bussiness controller
	public function all_featured()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_featured_type');
		$builder->select('*');
		$db = $builder->where('isactive = 1');
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function all_subcategory()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('categories_3_4_2015');
		$builder->select('*');
		$db = $builder->where('parent_id != 0');
		$db = $builder->where('isactive = 1');
		$query = $builder->get();
		return $query->getResultArray();
	}
	
	//  function start for fetch all category in add bussiness page and use in create method in bussiness controller
	public function all_categories()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('categories_3_4_2015');
		$builder->select('*');
		$builder->where("parent_id = 0");
		$builder->where("isactive = 1");
		$query = $builder->get();
		return $query->getResultArray();
	}

	// Fetch all nearby locatiobs

	public function all_districts()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('districts');
		$builder->select('*');
		$query = $builder->get();
		return $query->getResultArray();
	}


	public function getBusinessHomeTab($data)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$builder->select('businesses.*');
		$builder->select('business_categories.name as cat_name');
		$builder->select('business_sub_categories.name as sub_cat_name');
		$builder->join('business_categories', 'businesses.category_id = business_categories.id');
		$builder->join('business_sub_categories', 'businesses.subcategory_id = business_sub_categories.id');
		if ($data != "all") {
			$builder->where("FeaturedType", $data);
		}
		$builder->limit(10);
		$query = $builder->get();
		if ($query != "") {
			return $query->getResultArray();
		} else {
			return array();
		}
	}
	function getBusinessesLatest()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$builder->select('businesses.*');
		$builder->select('business_categories.name as cat_name');
		$builder->select('business_sub_categories.name as sub_cat_name');
		$builder->join('business_categories', 'businesses.category_id = business_categories.id');
		$builder->join('business_sub_categories', 'businesses.subcategory_id = business_sub_categories.id');
		$builder->orderBy('FeaturedType', 'DESC');
		// $builder->where("FeaturedType",$data);
		$builder->limit(6);
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function browseBusinessCities($data)
	{
		$db      = \Config\Database::connect();
		// $builder = $db->table('cities');
		$builder = $db->table('businesses');
		$builder->select('businesses.name');
		$builder->select('cities.name as city_name');
		$builder->join('cities', 'businesses.city_id = cities.id');
		$builder->groupBy('businesses.city_id');
		$builder->selectCount('businesses.city_id');
		$builder->where("cities.name", $data);
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function all_bussiness($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$builder->select('*');
		$builder->where('md5(subcategory_id)', $id);
		/* $sql = $builder->getCompiledSelect();
		echo $sql;
    	die;  */
		/* $builder->where("isactive = 1"); */
		$db = $builder->orderby('created', 'DESC');
		return $db->get()->getResultObject();
	}
	public function total_bussiness($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$builder->select('*');
		$builder->where('md5(subcategory_id)', $id);
		return $builder->countAllResults();
		// return $query;
	}
	public function allpending_bussiness()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$builder->select('businesses.*');
		$builder->select('cl_user.name as user_name');
		$builder->select('cl_user.email as user_email');
		$builder->join('cl_user', 'cl_user.empid = businesses.user_id');
		$builder->where("businesses.status = 0");
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function update_bussiness_status($userid, $status)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		// $res = $builder->set('status', $status)->where('id', $userid)->update();
		// return $res;
		$data_array = array(
			'status' => $status,
			'approved_at' => date('Y-m-d h:s:a'),
		);
		$db = $builder->where('id', $userid);
		$res = $builder->update($data_array);
		return $res;
	}
	public function update_bussiness_active($businessid, $status)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$res = $builder->set('isactive', $status)->where('id', $businessid)->update();
		return $res;
	}
	public function add_remarks($businessid, $remarks)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$res = $builder->set('remarks', $remarks)->where('id', $businessid)->update();
		return $res;
	}
}
