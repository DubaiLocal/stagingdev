<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function total_categories()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('*');
        $builder->where('status', '1');
        return $builder->countAllResults();
        // return $query;
    }
    public function menu_categories()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('*');
        $builder->where("status = 1");
        $builder->orderby('priority', 'asc');
        $builder->limit(5);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function allCategoriesActive()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('*');
        $builder->where("status = 1");
        $builder->orderby('priority', 'asc ');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function allCategories($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('*');
        $builder->where("md5(id)", $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_category_name($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('name');
        $builder->where("id", $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function allCategory()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function allCategoriesSubCategoryCount()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('category.id');
        $builder->select('category.name');
        $builder->select('category.slug');
        $builder->select('category.status');
        $builder->select('count(sub_category.id) as sub_count');
        $builder->join('sub_category', 'category.id = sub_category.cat_id', "left");
        $builder->orderby('ISNULL(category.priority)');
        $builder->orderby('category.priority', 'asc');
        $builder->groupBy("category.id");
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
    public function allCategoriesSubCategoryCountId($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('category.id');
        $builder->select('category.name');
        $builder->select('category.slug');
        $builder->select('category.status');
        $builder->select('count(sub_category.id) as sub_count');
        $builder->join('sub_category', 'category.id = sub_category.cat_id');
        $builder->where("md5(category.id)", $id);
        $builder->orderby('ISNULL(category.priority)');
        $builder->orderby('category.priority', 'asc');
        $builder->groupBy("category.id");
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
    public function browse_business_directory()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('category.id');
        $builder->select('category.name');
        $builder->select('category.slug');
        $builder->select('category.priority');
        $builder->select('sub_category.id as subcat_id');
        $builder->select('sub_category.name as subcat_name');
        $builder->select('sub_category.slug as subcat_slug');
        $builder->select('count(business_category.id) as count_business');
        $builder->join('sub_category', ' category.id = sub_category.cat_id', 'right');
        $builder->join('business_category', 'business_category.subcategory_id = sub_category.id');
        $builder->join('business', 'business.id = business_category.business_id');
        $builder->where("business.status = 1");
        $builder->where("category.status = 1");
        $builder->where("sub_category.status = 1");
        $builder->groupBy("sub_category.name");
        $builder->orderby('category.priority', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }
    /* public function browse_business_directory()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('category.id');
        $builder->select('category.name');
        $builder->select('category.slug');
        $builder->select('category.priority');
        $builder->select('sub_category.id as subcat_id');
        $builder->select('sub_category.name as subcat_name');
        $builder->select('sub_category.slug as subcat_slug');
        $builder->join('sub_category', ' category.id = sub_category.cat_id', 'right');
        $builder->where("category.status = 1");
        $builder->where("sub_category.status = 1");
        $builder->groupBy("sub_category.name");
        $builder->orderby('category.priority', 'asc');
        $query = $builder->get();
        
        return $query->getResultArray();
    } */
    public function get_category_id_by_slug($slug = NULL)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('category.id');
        $builder->select('category.name');
        $builder->select('category.slug');
        $builder->where('category.status', "1");
        $builder->where('category.slug', $slug);
        $query = $builder->get();
        return $query->getResultArray();
    }
    //  update category status
    public function update_category_status($id, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $res = $builder->set('status', $status)->where('id', $id)->update();
        return $res;
    }
    //  edit category
    public function edit($id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "md5(id)" => $id
        );
        $builder = $db->table('category');
        $db = $builder->where($data_array);
        return $db->get()->getResultObject();
    }
    //  edit category seo
    public function edit_cat_slug($slug)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "slug" => $slug
        );
        $builder = $db->table('category');
        $db = $builder->where($data_array);
        return $db->get()->getResultObject();
    }
    //  add category
    public function add_cat($name, $slug, $priority, $image, $cat_icon, $cat_image, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $data_array = array(
            'name' => $name,
            'slug' => $slug,
        );

        if ($image != "") {
            $new_data_array = array(
                'banner' => $image,
            );
            $data_array = array_merge($data_array, $new_data_array);
        }
        if ($cat_icon != "") {
            $new_data_array = array(
                'icon' => $cat_icon,
            );
            $data_array = array_merge($data_array, $new_data_array);
        }
        if ($cat_image != "") {
            $new_data_array = array(
                'image' => $cat_image,
            );
            $data_array = array_merge($data_array, $new_data_array);
        }
        $new_data_array = array(
            "priority" => $priority,
            "status" => $status,
            "created_at" => date('Y-m-d h:s:a'),
        );
        $data_array = array_merge($data_array, $new_data_array);
        $builder->insert($data_array);
        return $db->insertID();
    }
    //  update category
    public function update_cat($id, $name, $slug, $image, $cat_icon, $cat_image, $priority, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $data_array = array(
            'name' => $name,
            'slug' => $slug,
        );

        if ($image != "") {
            $new_data_array = array(
                'banner' => $image,
            );
            $data_array = array_merge($data_array, $new_data_array);
        }
        if ($cat_icon != "") {
            $new_data_array = array(
                'icon' => $cat_icon,
            );
            $data_array = array_merge($data_array, $new_data_array);
        }
        if ($cat_image != "") {
            $new_data_array = array(
                'image' => $cat_image,
            );
            $data_array = array_merge($data_array, $new_data_array);
        }
        $new_data_array = array(
            "priority" => $priority,
            "status" => $status,
            "modified_at" => date('Y-m-d h:s:a'),
        );
        $data_array = array_merge($data_array, $new_data_array);

        $db = $builder->where('md5(id)', $id);
        $res = $builder->update($data_array);
        /* $sql = $builder->getCompiledUpdate();
        print("<pre>" . print_r($data_array, true) . "</pre>");
        echo $id . " -> " . $image . " - " . $cat_icon . " - " . $cat_image;
        echo $sql;
        die(); */
        return $res;
    }
}
