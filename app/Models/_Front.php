<?php

namespace App\Models;

use CodeIgniter\Model;

class Front extends Model
{
    public function all_reviews($business_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('reviews');
        $builder->select('reviews.*');
        $builder->select('cl_user.name as user_name');
        $builder->select('avg(reviews.score) as avg_rating');
        $builder->select('count(reviews.score) as count_rating');

        $builder->join('cl_user', 'reviews.user_id = cl_user.empid');
        $builder->where('md5(reviews.business_id)', $business_id);
        $builder->where('reviews.status', "1");
        $builder->orderBy('reviews.id', 'DESC');
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
    public function saveReview($review_text, $rating, $business_id, $user_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "user_id" => $user_id,
            "business_id" => $business_id,
            "review" => $review_text,
            "score" => $rating,
            "status" => "1",
            "created" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('reviews');
        $builder->insert($data_array);
        return $db->insertID();
    }
    public function businessClaimed($business_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table(' business_claims');
        $builder->select('id');
        $builder->select('status');
        // $builder->select('subcategories.name as sub_cat_name');
        // $builder->join('business_featured_type', 'businesses.feature_id = business_featured_type.Id');
        // $builder->where('status', "0");
        $builder->where('md5(business_id)', $business_id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function saveEnquiry($enq_name, $email, $phone_no, $enquiry_text, $business_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $enq_name,
            "email" => $email,
            "phone_no" => $phone_no,
            "enquiry" => $enquiry_text,
            "business_id" => $business_id,
            "created_at" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('enquiry');
        $builder->insert($data_array);
        /* $sql = $builder->getCompiledInsert();
        echo $sql;
        die; */
        return $db->insertID();
    }
    public function saveEnquiryAddBusiness($enq_name, $email, $phone_no, $enquiry_text, $url)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $enq_name,
            "email" => $email,
            "phone_no" => $phone_no,
            "url" => $url,
            "enquiry" => $enquiry_text,
            "created_at" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('enquiry');
        $builder->insert($data_array);
        /* $sql = $builder->getCompiledInsert();
        echo $sql;
        die; */
        return $db->insertID();
    }
    public function saveClaims($enq_name, $email, $phone_no, $business_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $enq_name,
            "email" => $email,
            "phone_no" => $phone_no,
            "business_id" => $business_id,
            "status" => "0",
            "created" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('business_claims');
        $builder->insert($data_array);
        return $db->insertID();
    }
    public function saveReviewNow($text, $business_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "text" => $text,
            "busi_id" => $business_id,
            "created_date" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('review_now');
        $builder->insert($data_array);
        return $db->insertID();
    }
    public function saveQueryEntries($firstName, $userEmail, $webUrl, $userQuery)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $firstName,
            "email" => $userEmail,
            "company_url" => $webUrl,
            "msg" => $userQuery,
            "created_date" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('contact_us');
        $id = $builder->insert($data_array);
        return $db->insertID();
    }
    public function all_feature_business()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('businesses.*');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('subcategories.name as sub_cat_name');
        $builder->select('cities.name as city_name');
        $builder->select('countries.name as country_name');
        $builder->select('business_featured_type.name as featured_name');
        $builder->select('reviews.score as ratings');
        $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');

        $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->join('business_featured_type', 'businesses.feature_id = business_featured_type.Id');
        $builder->where('businesses.status', '1');
        $builder->join('reviews', 'businesses.id = reviews.business_id', "left");
        $builder->groupBy('businesses.name');
        $builder->orderBy('businesses.approved_at', "desc");
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function all_featured_business()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('businesses.*');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('subcategories.name as sub_cat_name');
        $builder->select('cities.name as city_name');
        $builder->select('countries.name as country_name');
        $builder->select('reviews.score as ratings');
        $builder->select('business_featured_type.name as featured_name');
        $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->join('business_featured_type', 'businesses.feature_id = business_featured_type.Id');
        $builder->join('reviews', 'businesses.id = reviews.business_id', "left");
        $builder->where('business_featured_type.id', '4');
        $builder->where('businesses.status', '1');
        $builder->orderBy('businesses.id', "desc");
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function all_most_view_business()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('businesses.*');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('subcategories.name as sub_cat_name');
        $builder->select('cities.name as city_name');
        $builder->select('countries.name as country_name');
        $builder->select('business_featured_type.name as featured_name');
        $builder->select('reviews.score as ratings');
        $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->join('business_featured_type', 'businesses.feature_id = business_featured_type.Id');
        $builder->join('reviews', 'businesses.id = reviews.business_id', "left");
        $builder->where('business_featured_type.id', '2');
        $builder->where('businesses.status', '1');
        $builder->orderBy('businesses.id', "desc");
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function all_best_rate_business()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('businesses.*');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('subcategories.name as sub_cat_name');
        $builder->select('cities.name as city_name');
        $builder->select('countries.name as country_name');
        $builder->select('business_featured_type.name as featured_name');
        $builder->select('reviews.score as ratings');
        $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->join('business_featured_type', 'businesses.feature_id = business_featured_type.Id');
        $builder->join('reviews', 'businesses.id = reviews.business_id', "left");
        $builder->where('business_featured_type.id', '1');
        $builder->where('businesses.status', '1');
        $builder->orderBy('businesses.id', "desc");
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function all_popular_business()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('businesses.*');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('subcategories.name as sub_cat_name');
        $builder->select('cities.name as city_name');
        $builder->select('countries.name as country_name');
        $builder->select('business_featured_type.name as featured_name');
        $builder->select('reviews.score as ratings');
        $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->join('business_featured_type', 'businesses.feature_id = business_featured_type.Id');
        $builder->join('reviews', 'businesses.id = reviews.business_id', "left");
        $builder->where('business_featured_type.id', '3');
        $builder->where('businesses.status', '1');
        $builder->where('businesses.isactive', '1');
        $builder->groupBy('businesses.name');
        $builder->orderBy('businesses.id', "desc");
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function popular_categories()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.id');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('categories_3_4_2015.image as cat_image');
        $ids = ['43', '1', '26', '55', '67'];
        $builder->whereIn('categories_3_4_2015.id', $ids);
        $builder->whereIn('categories_3_4_2015.isactive', "1");
        $builder->orderBy('categories_3_4_2015.name', 'ASC');
        $builder->limit(6);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function browse_cities()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('count(businesses.name) as count');
        $builder->select('cities.name');
        $builder->join('cities ', 'businesses.city_id = cities.id');
        $builder->where('cities.status', '1');
        $builder->groupBy('cities.name');
        $builder->orderBy('count', 'DESC');
        $builder->limit(9);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function menu_priority_categories()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where('parent_id', '0');
        $builder->limit(5);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function single_category_subcat($id = NULL)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('count(businesses.name) as list_count');
        $builder->select('categories_3_4_2015.id as sub_cat_id');
        $builder->select('categories_3_4_2015.image');
        $builder->select('categories_3_4_2015.name as sub_cat_name');
        $builder->join('businesses', 'businesses.subcategory_id = categories_3_4_2015.id', 'left');
        if ($id == NULL) {
            $builder->where('categories_3_4_2015.parent_id', 1);
        } else {
            $builder->where('md5(categories_3_4_2015.parent_id)', $id);
        }
        $builder->where('categories_3_4_2015.isactive', "1");
        $builder->where('businesses.status', "1");
        $builder->where('businesses.isactive', "1");
        $builder->groupBy('categories_3_4_2015.id');
        $builder->orderBy('categories_3_4_2015.name', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function single_category_subcat_test($id = NULL)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('count(businesses.name) as list_count');
        $builder->select('categories_3_4_2015.id as sub_cat_id');
        $builder->select('categories_3_4_2015.image');
        $builder->select('categories_3_4_2015.name as sub_cat_name');
        $builder->join('businesses', 'businesses.subcategory_id = categories_3_4_2015.id', 'left');
        if ($id == NULL) {
            $builder->where('categories_3_4_2015.parent_id', 1);
        } else {
            $builder->where('md5(categories_3_4_2015.parent_id)', $id);
        }
        $builder->where('categories_3_4_2015.isactive', "1");
        $builder->where('businesses.status', "1");
        $builder->where('businesses.isactive', "1");
        $builder->groupBy('categories_3_4_2015.id');
        $builder->orderBy('categories_3_4_2015.name', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function all_cities()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('cities');
        $builder->select('name as city_name');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function searches($s)
    {
        $db      = \Config\Database::connect();
        $builder = $this->table("businesses");
        $builder->select('businesses.name');
        $builder->select('cities.name as city_name');
        $builder->join('cities', 'businesses.city_id = cities.id');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function latest_businesses()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('businesses');
        $builder->select('businesses.*');
        $builder->select('categories_3_4_2015.name as cat_name');
        $builder->select('subcategories.name as sub_cat_name');
        // $builder->select('states.name as state_name');
        $builder->select('cities.name as city_name');
        $builder->select('countries.name as country_name');
        $builder->join('categories_3_4_2015', 'businesses.category_id = categories_3_4_2015.id');
        $builder->join('categories_3_4_2015 as subcategories', 'businesses.subcategory_id = subcategories.id');
        $builder->where('subcategories.parent_id!=', 'businesses.subcategory_id');
        $builder->where('businesses.status !=', '0');
        // $builder->join('states', 'businesses.state_id  = states.id');
        $builder->join('cities', 'businesses.city_id = cities.id');
        $builder->join('countries', 'businesses.country_id = countries.id');
        $builder->limit(6);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function subcategories_category($id = NULL)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.id');
        $builder->select('categories_3_4_2015.name');
        $builder->select('categories_3_4_2015.image');
        $builder->select('subcategory.id as sub_cat_id');
        $builder->select('subcategory.name as sub_cat_name');
        $builder->select('subcategory.image as logo');
        $builder->select('count(businesses.name) as list_count');
        $builder->join('categories_3_4_2015 as subcategory', ' categories_3_4_2015.id = subcategory.parent_id', 'right');
        $builder->join('businesses', ' businesses.subcategory_id = subcategory.id', 'right');
        $builder->where('md5(subcategory.parent_id)', $id);
        $builder->where('subcategory.isactive', "1");
        $builder->where('businesses.status', "1");
        $builder->where('businesses.isactive', "1");
        $builder->groupBy('sub_cat_name');
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
    public function subcategories_category_slug($id = NULL)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.id');
        $builder->select('categories_3_4_2015.name');
        $builder->select('categories_3_4_2015.image');
        $builder->select('subcategory.id as sub_cat_id');
        $builder->select('subcategory.name as sub_cat_name');
        $builder->select('subcategory.image as logo');
        $builder->select('count(businesses.name) as list_count');
        $builder->join('categories_3_4_2015 as subcategory', ' categories_3_4_2015.id = subcategory.parent_id', 'right');
        $builder->join('businesses', ' businesses.subcategory_id = subcategory.id', 'right');
        // $builder->where('md5(subcategory.parent_id)', $id);
        $builder->where('categories_3_4_2015.slug', $id);
        $builder->where('subcategory.isactive', "1");
        $builder->where('businesses.status', "1");
        $builder->where('businesses.isactive', "1");
        $builder->groupBy('sub_cat_name');
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
}
