<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;

class BussinessesModel extends Model
{
	protected $table = 'business';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useTimestamps = false;
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;


	public function check_existing_business($businesSlug)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('business.id');
		$builder->where('business.slug', $businesSlug);
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function update_bussiness_status($businesid, $status)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$res = $builder->set('status', $status)->where('id', $businesid)->update();
		return $res;
	}
	public function total_bussiness()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('*');
		$builder->where('status = 1');
		return $builder->countAllResults();
		// return $query;
	}
	public function total_pending_bussiness()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('*');
		$builder->where('status = 0');
		return $builder->countAllResults();
		// return $query;
	}
	public function single_bussiness($slug)
	{
		$db      = \Config\Database::connect();
		$data_array = array(
			"business.slug" => $slug,
			// "business.status" => '1',
		);
		$builder = $db->table('business');
		$builder->select('business.*');
		$builder->select('business_detail.*');
		$builder->select('avg(reviews.score) as avg_rating');
		$builder->select('count(reviews.score) as count_rating');
		$builder->join('reviews', 'reviews.business_id = business.id', 'left');
		$builder->join('business_detail', 'business_detail.business_id = business.id');
		$db = $builder->where($data_array);
		/* $sql = $builder->getCompiledSelect();
		echo $sql;
		die; */
		return $db->get()->getResultObject();
	}
	public function home_business_listings($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('business.*');
		$builder->select('business_detail.*');
		$builder->where('business.status', '1');
		if ($id != "") {
			$builder->where('business.feature_type', $id);
		}
		$builder->join('business_detail', 'business.id = business_detail.business_id');
		$builder->limit(5);
		$builder->orderBy('business.id', 'desc');
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function home_business_listings_all()
	{
		/* select * from business where id in (SELECT max(business.id) FROM `business` join business_category on business.id = business_category.business_id where business.status = 1 group by business_category.subcategory_id) order by created_at desc; */


		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('business.name');
		$builder->select('business.slug');
		$builder->select('business_detail.banner');
		$builder->select('business_detail.num_rating');
		$builder->select('business_detail.aeverage_rating');
		$builder->select('avg(reviews.score) as avg_rating');
		$builder->select('count(reviews.score) as count_rating');
		$builder->join('business_detail', 'business.id = business_detail.business_id');
		$builder->join('reviews', 'reviews.business_id = business.id', 'left');
		$subQuery = $db->table('business')->select('max(business.id)')->join('business_category', 'business.id = business_category.business_id')->where('business.status', 1)->groupBy('business_category.subcategory_id');
		$builder->whereIn('business.id', $subQuery);
		$builder->groupBy('business.id');
		$builder->orderBy('business.created_at', 'DESC');
		$builder->where('business.status', '1');
		/* if ($id != "") {
			$builder->where('business.feature_type', $id);
		}
		$builder->join('business_detail', 'business.id = business_detail.business_id');
		$builder->limit(5);
		$builder->orderBy('business.id', 'desc'); */
		$query = $builder->get();
		$builder->limit(20);
		/* $sql = $builder->getCompiledSelect();
		echo $sql;
		die(); */
		return $query->getResultArray();
	}
	//  Save business
	public function add_bussiness($featured, $name, $slug, $district, $nearby_location_id, $description, $address, $url, $status)
	{
		$db      = \Config\Database::connect();
		$data_array = array(
			"name" => $name,
			"address" => $address,
			"description" => $description,
			"url" => $url,
			"district_id " => $district,
			"nearby_loc_id " => $nearby_location_id,
			'slug' => $slug,
			'user_id' => '1',
			"feature_type" => $featured,
			"status" => $status,
			"created_at" => date('Y-m-d h:s:a'),
		);


		$builder = $db->table('business');
		$builder->insert($data_array);
		/* $sql = $builder->set($data_array)->getCompiledInsert();
		echo $sql;
		echo  "<br/>";
		print("<pre>" . print_r($data_array, true) . "</pre>");
		echo $db->getLastQuery();
		die(); */
		return $db->insertID();
	}
	//  Update business
	public function update_business($id, $featured, $name, $slug, $district, $nearby_location_id, $description, $address, $url, $status)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$data_array = array(
			"name" => $name,
			"address" => $address,
			"description" => $description,
			"url" => $url,
			"district_id " => $district,
			"nearby_loc_id " => $nearby_location_id,
			'slug' => $slug,
			"feature_type" => $featured,
			"modified_at" => date('Y-m-d h:s:a'),
		);
		if (isset($pending) && $pending == "true") {
			$new_data_array = array(
				'status' => "0",
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
	//  Save business Details
	public function add_bussiness_details($business_id, $email, $phone, $banner, $lat, $lng, $more_images, $timings, $num_rating, $aeverage_rating)
	{
		$db      = \Config\Database::connect();
		$data_array = array(
			'business_id' => $business_id,
			'email' => $email,
			"phone" => $phone,
			"banner" => $banner,
			"more_images" => $more_images,
			"lat" => $lat,
			"lng" => $lng,
			'timings' => $timings,
			'num_rating' => $num_rating,
			'aeverage_rating' => $aeverage_rating,
			'created_at' => date('Y-m-d h:s:a'),
		);
		$builder = $db->table('business_detail');
		$builder->insert($data_array);
		return $db->insertID();
	}
	// update business details
	public function update_bussiness_details($business_id, $email, $phone, $banner, $lat, $lng, $more_images, $timings, $num_rating, $aeverage_rating)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_detail');
		$data_array = array(
			'email' => $email,
			"phone" => $phone,
			"lat" => $lat,
			"lng" => $lng,
			'timings' => $timings,
			'num_rating' => $num_rating,
			'aeverage_rating' => $aeverage_rating,
			'created_at' => date('Y-m-d h:s:a'),
		);
		/* if ($pending == "true") {
			$new_data_array = array(
				'status' => "0",
			);
			$data_array = array_merge($data_array, $new_data_array);
		} */
		if ($banner != "") {
			$new_data_array = array(
				'banner' => $banner,
			);
			$data_array = array_merge($data_array, $new_data_array);
		}
		if ($more_images != "") {
			$new_data_array = array(
				'more_images' => $more_images,
			);
			$data_array = array_merge($data_array, $new_data_array);
		}
		$builder->where('md5(business_id)', $business_id);
		$res = $builder->update($data_array);
		return $res;
	}
	//  Save business category subcategory
	public function save_business_cat_subcat($business_id, $category_id, $subcategory_id)
	{
		$db      = \Config\Database::connect();
		$data_array = array(
			'business_id' => $business_id,
			'category_id' => $category_id,
			"subcategory_id" => $subcategory_id,
			'created_at' => date('Y-m-d h:s:a'),
		);
		$builder = $db->table('business_category');
		$builder->insert($data_array);
		return $db->insertID();
	}
	//  Update business category subcategory
	public function update_business_cat_subcat($business_id, $category_id, $subcategory_id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_category');
		$data_array = array(
			'category_id' => $category_id,
			"subcategory_id" => $subcategory_id,
			'modified_at' => date('Y-m-d h:s:a'),
		);
		$builder->where('md5(business_id)', $business_id);
		$res = $builder->update($data_array);
		return $res;
	}
	public function allpending_business()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('business.id');
		$builder->select('business.name');
		$builder->select('business.address');
		$builder->select('business.description');
		$builder->select('business.url');
		$builder->select('business.district_id');
		$builder->select('business.nearby_loc_id');
		$builder->select('business.slug');
		$builder->select('business.status');
		$builder->select('business.feature_type');
		$builder->select('business_detail.email');
		$builder->select('business_detail.phone');
		$builder->select('business_detail.banner');
		$builder->select('business_detail.more_images');
		$builder->select('business_detail.lat');
		$builder->select('business_detail.timings');
		$builder->select('business_detail.num_rating');
		$builder->select('business_detail.aeverage_rating');
		// $builder->select('cl_user.name as user_name');
		// $builder->select('cl_user.email as user_email');
		$builder->join('business_detail', 'business_detail.business_id = business.id');
		$builder->where("business.status", "0");
		$builder->orderBy('business.id', 'desc');
		$query = $builder->get();
		return $query->getResultArray();
	}
	// admin bussiness edit
	public function edit($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$data_array = array(
			"md5(business.id)" => $id
		);
		$builder->select('business.id');
		$builder->select('business.name');
		$builder->select('business.address');
		$builder->select('business.description');
		$builder->select('business.url');
		$builder->select('business.district_id');
		$builder->select('business.nearby_loc_id');
		$builder->select('business.slug');
		$builder->select('business.feature_type');
		$builder->select('business_detail.email');
		$builder->select('business_detail.phone');
		$builder->select('business_detail.banner');
		$builder->select('business_detail.more_images');
		$builder->select('business_detail.lat');
		$builder->select('business_detail.timings');
		$builder->select('business_detail.num_rating');
		$builder->select('business_detail.aeverage_rating');
		$builder->join('business_detail', 'business_detail.business_id = business.id');
		$db = $builder->where($data_array);
		return $db->get()->getResultObject();
	}
	public function business_category($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_category');
		$data_array = array(
			"md5(business_category.business_id)" => $id
		);
		$builder->select('category_id');
		$builder->select('subcategory_id');
		$db = $builder->where($data_array);
		return $db->get()->getResultObject();
	}

	// retun subcategory business
	public function sub_category_businesses($sub_cat_id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_category');

		$builder->select('business.id');
		$builder->select('business.name');
		$builder->select('business.description');
		$builder->join('business', 'business_category.business_id = business.id');
		$builder->where("business_category.subcategory_id", $sub_cat_id);
		$builder->where("business.status", "1");
		$builder->orderBy('business.name', 'asc');
		$query = $builder->get();
		return $query->getResultArray();
	}
	// retun subcategory business with date range
	public function sub_category_businesses_date($sub_cat_id, $from, $to)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_category');

		$builder->select('business.id');
		$builder->select('business.name');
		$builder->select('business.description');
		$builder->join('business', 'business_category.business_id = business.id');
		$builder->where("business_category.subcategory_id", $sub_cat_id);
		$builder->where("business.approved_at >=", $from);
		$builder->where("business.approved_at <=", $to);
		$builder->where("business.status", "1");

		$builder->orderBy('business.name', 'asc');
		$query = $builder->get();
		return $query->getResultArray();
	}
	// move subcategory business
	public function move_business_subcategory($category, $sub_category, $business_id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_category');
		$data_array = array(
			'category_id' => $category,
			"subcategory_id" => $sub_category,
			'modified_at' => date('Y-m-d h:s:a'),
		);
		$builder->where('business_id', $business_id);
		$res = $builder->update($data_array);
		return $res;
	}


	public function update_business_pending_status($businessid, $status, $approved_id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$data_array = array(
			"status" => $status,
			"approved_by" => $approved_id,
			"approved_at" => date('Y-m-d h:s:a'),
			"modified_at" => date('Y-m-d h:s:a'),
		);

		$builder->where('id', $businessid);
		$res = $builder->update($data_array);

		return $res;
	}
	public function add_remarks($businessid, $remarks)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_detail');
		$res = $builder->set('remarks', $remarks)->where('business_id', $businessid)->update();
		return $res;
	}

	public function all_business()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('id');
		$builder->select('name');
		$builder->select('address');
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function get_district($district_name, $address, $business_id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('*');
		$builder->like('address', $district_name);
		$builder->where('id', $business_id);

		$query = $builder->get();
		return $query->getResultArray();
	}
	public function set_district($business_id, $district_id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$data_array = array(
			"district_id " => $district_id,
		);

		$builder->where('id', $business_id);
		$res = $builder->update($data_array);
		return $res;
	}


	public function business_subcategory_id($business_id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_category');
		$builder->select('subcategory_id');
		$builder->where('business_id', $business_id);
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function check_business_name_keyword($business_name)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('sub_category_keywords');
		$builder->select('*');
		$builder->where('name', $business_name);
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function save_business_name_keyword($subcategory_id, $business_name, $type)
	{
		$db      = \Config\Database::connect();

		if ($type == "add") {
			$data_array = array(
				"name" => $business_name,
				"subcategory_id" => $subcategory_id,
				"source" => "2",
				"created_at" => date('Y-m-d h:s:a'),
			);
			$builder = $db->table('sub_category_keywords');
			$builder->insert($data_array);
			return $db->insertID();
		} else if ($type == "update") {
			$data_array = array(
				"name" => $business_name,
				"modified_at" => date('Y-m-d h:s:a'),
			);
			$builder = $db->table('sub_category_keywords');
			$builder->where('name', $business_name);
			$res = $builder->update($data_array);

			return $res;
		}
	}
	/* Search Methods */
	public function get_search_business($subcat_id, $district_id, $limit = null)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		/* $data_array = array(
			"md5(business_category.business_id)" => $id
		); */
		$builder->select('business.name');
		$builder->select('business.slug');
		$builder->select('avg(reviews.score) as avg_rating');
		$builder->select('business.address');
		$builder->select('business_detail.phone');
		$builder->select('business_detail.banner');


		$builder->join('reviews', 'reviews.business_id = business.id', "left");
		$builder->join('business_detail', 'business.id = business_detail.business_id');
		$builder->join('business_category', 'business.id = business_category.business_id');


		$builder->where('business.status', "1");
		$builder->where('reviews.status', "1");
		if ($district_id != "") {
			$builder->where('md5(business.district_id)', $district_id);
		}
		$builder->whereIn('business_category.subcategory_id', $subcat_id);
		$builder->groupBy('business.id');
		$builder->orderBy('business.approved_at', 'desc');
		if ($limit != null) {
			$builder->limit(10, $limit);
		} else {
			$builder->limit(20);
		}
		$query = $builder->get();
		/* $sql = $builder->getCompiledSelect();
		echo $sql;
		die; */
		return $query->getResultArray();
	}
	public function get_search_business_district($district_id, $limit = null)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		/* $data_array = array(
			"md5(business_category.business_id)" => $id
		); */
		$builder->select('business.name');
		$builder->select('business.slug');
		$builder->select('avg(reviews.score) as avg_rating');
		$builder->select('business.address');
		$builder->select('business_detail.phone');
		$builder->select('business_detail.banner');


		$builder->join('reviews', 'reviews.business_id = business.id', "left");
		$builder->join('business_detail', 'business.id = business_detail.business_id');
		$builder->join('business_category', 'business.id = business_category.business_id');


		$builder->where('business.status', "1");
		$builder->where('reviews.status', "1");
		if ($district_id != "") {
			$builder->where('md5(business.district_id)', $district_id);
		}
		$builder->groupBy('business.id');
		$builder->limit(20);
		if ($limit != null) {
			$builder->limit(10, $limit);
		} else {
			$builder->limit(20);
		}
		$query = $builder->get();
		/* $sql = $builder->getCompiledSelect();
		echo $sql;
		die; */
		return $query->getResultArray();
	}
	public function get_search_business_location($subcategory_array, $longitude, $latitude)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');

		$builder->select('business.name');
		$builder->select('business.slug');
		$builder->select('avg(reviews.score) as avg_rating');
		$builder->select('business.address');
		$builder->select('business_detail.phone');
		$builder->select('business_detail.banner');
		$builder->select('business_detail.id');
		$builder->select('( 6371 * acos(cos(radians(' . $latitude . ')) * cos(radians(business_detail.lat)) * cos(radians(business_detail.lng) - radians(' . $longitude . ')) + sin(radians(' . $latitude . ')) * sin(radians(business_detail.lat))) ) AS distance');
		$builder->join('reviews', 'reviews.business_id = business.id', "left");
		$builder->join('business_detail', 'business.id = business_detail.business_id');
		$builder->join('business_category', 'business.id = business_category.business_id');
		$builder->where('business_detail.lat IS NOT NULL');
		$builder->where('business.status', "1");
		$builder->where('reviews.status', "1");
		$builder->having('distance < 5 ');
		$builder->orderBy('distance');

		$builder->whereIn('business_category.subcategory_id', $subcategory_array);
		$builder->groupBy('business.id');
		$builder->limit(20);
		$query = $builder->get();
		/* $sql = $builder->getCompiledSelect();
		echo $sql;
		die; */
		return $query->getResultArray();
	}
	public function get_business_name($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business');
		$builder->select('name');
		$builder->where('id', $id);
		$query = $builder->get();
		return $query->getResultArray();
	}
}
