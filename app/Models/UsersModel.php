<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function login($email, $pass)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "email" => $email,
            "password" => md5($pass)
        );
        $builder = $db->table('users');
        $db = $builder->where($data_array);
        return $db->get()->getResultObject();
    }
    public function total_pending_bussiness($login_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('business');
        $builder->select('*');
        $db = $builder->where('status = 0');
        $db = $builder->where('user_id', $login_id);
        return $builder->countAllResults();
    }
    public function user_approved_business($login_id)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('business');
        $builder->select('business.name');
        $builder->select('business.description');
        $builder->select('business.slug');
        $builder->select('users.name as user_name');
        // $builder->select('categories_3_4_2015.name as cat_name');
        // $builder->select('subcategories.name as sub_cat_name');
        // $builder->select('cities.name as city_name');
        // $builder->select('cl_user.email as user_email');
        // $builder->select('countries.name as country_name');
        // $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        // $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        // $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        // $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('users', 'business.user_id = users.id');
        // $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->where('business.status', '1');
        $builder->where('user_id', $login_id);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
        // return $query;
    }
    public function user_pending_business($login_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('business');
        $builder->select('business.id');
        $builder->select('business.name');
        $builder->select('business.description');
        $builder->select('business.slug');
        $builder->select('business.url');
        $builder->select('business_detail.remarks');
        $builder->select('business_detail.phone');
        $builder->select('category.name as cat_name');


        $builder->join('business_category', 'business.id = business_category.business_id');
        $builder->join('category', 'category.id = business_category.category_id');
        $builder->join('business_detail', 'business.id = business_detail.business_id');
        $builder->where('business.status', '0');
        $builder->where('user_id', $login_id);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
    //  Save business
    public function add_bussiness($login_id, $name, $slug, $district, $nearby_location_id, $description, $address, $url, $status)
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
            'user_id' => $login_id,
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
            "status" => $status,
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
        /* print("<pre>" . print_r($data_array, true) . "</pre>");
		$sql = $builder->getCompiledUpdate();
		echo "SQL ---} " . $sql;
		die(); */
        return $res;
    }

    public function allCategoriesActive()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('category.id');
        $builder->select('category.name');
        $builder->select('category.slug');
        $builder->select('category.status');
        $builder->select('count(sub_category.id) as sub_count');
        $builder->join('sub_category', 'category.id = sub_category.cat_id', "left");
        $builder->where("category.status = 1");
        $builder->where("sub_category.status = 1");
        $builder->orderby('ISNULL(category.priority)');
        $builder->orderby('category.priority', 'asc');
        $builder->groupBy("category.id");
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
}
