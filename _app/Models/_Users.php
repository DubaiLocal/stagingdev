<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    public function search_nearby_loc_listing($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nearby_locations');
        $builder->select('*');
        $builder->where('district_id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function check_email($email)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where('email', $email);
        $query = $builder->get();
        if ($query->num_rows > 0) {
            return true;
        } else {
        }
        return $query->getResultArray();
    }
    public function add_user($name, $email, $password, $phone)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "password" => md5($password),
            "role" => 2,
        );
        $builder = $db->table('users');
        $builder->insert($data_array);
        return $db->insertID();
    }
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
        $builder = $db->table('businesses');
        $builder->select('*');
        $db = $builder->where('status = 0');
        $db = $builder->where('user_id', $login_id);
        return $builder->countAllResults();
    }
    public function add_bussiness($name, $category_id, $subcategory_id, $district, $description, $logo, $unique_url, $address1, $country_id, $city_id, $zip, $phone, $more_images, $login_id, $full_timing_array)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $name,
            "user_id " => $login_id,
            "category_id" => $category_id,
            "subcategory_id " => $subcategory_id,
            "description" => $description,
            "logo" => $logo,
            "unique_url" => $unique_url,
            "address1" => $address1,
            "district" => $district,
            "country_id" => $country_id,
            "city_id" => $city_id,
            "zip" => $zip,
            "phone" => $phone,
            "status" => 0,
            "created" => date('Y-m-d h:s:a'),
            "more_images" => $more_images,
            'timings' => $full_timing_array,
            'isactive' => "1",
        );
        $builder = $db->table('businesses');
        $builder->insert($data_array);
        return $db->insertID();
    }
    public function user_approved_bussiness($login_id)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('businesses.*');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('subcategories.name as sub_cat_name');
        $builder->select('cities.name as city_name');
        $builder->select('cl_user.email as user_email');
        $builder->select('countries.name as country_name');
        $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('cl_user', 'businesses.user_id = cl_user.empid');
        $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->where('businesses.status = 1');
        $builder->where('user_id', $login_id);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
        // return $query;
    }
    public function user_pending_bussiness($login_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('businesses.*');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('subcategories.name as sub_cat_name');
        $builder->select('cities.name as city_name');
        $builder->select('countries.name as country_name');
        $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->where('businesses.status = 0');
        $builder->where('user_id', $login_id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function update_business($id, $unique_url, $logo, $Email, $Phone, $Description, $more_images, $category_id, $subcategory_id, $district, $full_timing_array)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $data_array = array(
            // 'name' => $Name,
            'email' => $Email,
            'phone' => $Phone,
            'description' => $Description,
            "unique_url" => $unique_url,
            'category_id ' => $category_id,
            'subcategory_id' => $subcategory_id,
            'district' => $district,
            'timings' => $full_timing_array,
            'modified' => date('Y-m-d h:s:a'),
        );
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
        // $sql = $builder->getCompiledUpdate();
        // echo $sql;
        // die();
        return $res;
    }
}
