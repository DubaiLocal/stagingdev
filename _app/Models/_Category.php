<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'categories_3_4_2015';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    //  function start for category listing use in index method in category controller
    public function all_categories()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where("parent_id = 0");
        $builder->where("isactive = 1");
        $builder->orderby('name', 'asc');
        // $builder->orderby('priority', 'asc');
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect(); 
        echo $sql;
        die;  */
        return $query->getResultArray();
    }
    public function categories_with_count()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.id');
        $builder->select('categories_3_4_2015.name');
        $builder->select('count(businesses.name) as count_business');
        $builder->join('businesses', 'categories_3_4_2015.id= businesses.subcategory_id', 'left');
        $builder->where("categories_3_4_2015.isactive = 1");
        $builder->where("categories_3_4_2015.parent_id != 0");
        $builder->where("businesses.status = 1");
        $builder->groupBy("categories_3_4_2015.name");
        // $builder->orderby('categories_3_4_2015.name', 'asc');
        $builder->orderby('count_business', 'desc');
        $builder->limit(5);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect(); 
        echo $sql;
        die;  */
        return $query->getResultArray();
    }
    public function categories_subcat_with_count($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.id');
        $builder->select('categories_3_4_2015.name');
        $builder->select('count(businesses.name) as count_business');
        $builder->join('businesses', 'categories_3_4_2015.id= businesses.subcategory_id', 'left');
        $builder->where("categories_3_4_2015.isactive = 1");
        $builder->where("categories_3_4_2015.parent_id != 0");
        $builder->where("categories_3_4_2015.parent_id", $id);
        $builder->where("businesses.status = 1");
        $builder->where("businesses.isactive = 1");
        $builder->where("categories_3_4_2015.isactive = 1");
        $builder->groupBy("categories_3_4_2015.name");
        // $builder->orderby('categories_3_4_2015.name', 'asc');
        $builder->orderby('count_business', 'desc');
        $builder->limit(5);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
    public function subcategory_parent($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.parent_id');
        $builder->join('categories_3_4_2015 as category', 'category.id= categories_3_4_2015.parent_id', 'left');
        $builder->where("categories_3_4_2015.isactive = 1");
        $builder->where("categories_3_4_2015.parent_id != 0");
        $builder->where("md5(categories_3_4_2015.id)", $id);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
    public function menu_categories()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where("parent_id = 0");
        $builder->where("isactive = 1");
        $builder->where("menu_item = 1");
        $builder->orderby('priority', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function browse_business_directory()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.id');
        $builder->select('categories_3_4_2015.name');
        $builder->select('categories_3_4_2015.priority');
        $builder->select('subcategory.id as subcat_id');
        $builder->select('subcategory.name as subcat_name');
        $builder->select('count(businesses.name) as count_business');
        $builder->join('categories_3_4_2015 as subcategory', ' categories_3_4_2015.id = subcategory.parent_id', 'right');
        $builder->join('businesses', 'subcategory.id= businesses.subcategory_id', 'right');
        $builder->where("categories_3_4_2015.isactive = 1");
        $builder->where("businesses.status = 1");
        $builder->where("businesses.isactive = 1");
        $builder->groupBy("subcategory.name");
        // $builder->orderby('categories_3_4_2015.name', 'asc');
        // $builder->orderby('count_business', 'desc');
        $builder->orderby('categories_3_4_2015.priority', 'asc');
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect(); 
        echo $sql;
        die;  */
        return $query->getResultArray();
    }
    public function get_cat_subcatId($id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "md5(subcategory.id)" => $id
        );
        $builder = $db->table('categories_3_4_2015');
        $builder->select('categories_3_4_2015.name');
        $builder->select('subcategory.name as subcat_name');
        $builder->join('categories_3_4_2015 as subcategory', ' categories_3_4_2015.id = subcategory.parent_id');
        $db = $builder->where($data_array);
        $query = $builder->get();
        return $query->getResultArray();
    }
    //  function start for edit category use in edit method in category controller
    public function edit($id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "md5(id)" => $id
        );
        $builder = $db->table('categories_3_4_2015');
        $db = $builder->where($data_array);
        return $db->get()->getResultObject();
    }
    //  function start for update category use in update method in category controller
    public function update_cat($id, $name,$slug, $image, $icon, $priority, $isactive)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        if ($image == "") {
            $data_array = array(
                'name' => $name,
                'slug' => $slug,
                "modified" => date('Y-m-d h:s:a'),
                "priority" => $priority,
                "isactive" => $isactive,
            );
        } else {
            $data_array = array(
                'name' => $name,
                'slug' => $slug,
                'image' => $image,
                'icon' => $icon,
                'modified' => date('Y-m-d h:s:a'),
                "priority" => $priority,
                'isactive' => $isactive,
            );
        }
        $db = $builder->where('md5(id)', $id);
        $builder->whereNotIn('priority', $priority);
        $res = $builder->update($data_array);
        return $res;
    }
    //  function start for add category use in save method in category controller
    public function add_cat($name,$slug, $priority, $image, $icon, $isactive)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $name,
            "slug" => $slug,
            "priority" => $priority,
            "image" => $image,
            "icon" => $icon,
            "created" => date('Y-m-d h:s:a'),
            "modified" => date('Y-m-d h:s:a'),
            "isactive" => $isactive,
        );
        $builder = $db->table('categories_3_4_2015');
        $id = $builder->insert($data_array);
        return $db->insertID();
    }
    public function check_priority($priority)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where('priority', $priority);
        $query = $builder->get();
        if ($query->num_rows > 0) {
            return true;
        } else {
        }
        return $query->getResultArray();
    }
    //  function start for update category status use in update_category_status method in category controller
    public function update_category_status($userid, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $res = $builder->set('isactive', $status)->where('id', $userid)->update();
        return $res;
    }
    public function update_menu_category_status($catId, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $res = $builder->set('menu_item', $status)->where('id', $catId)->update();
        return $res;
    }
    //  function start for update category status use in update_category_status method in category controller
    public function cat_name()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('business_categories');
        $builder->select('business_categories.id,business_categories.name as cat_name');
        $builder->select('business_sub_categories.cat_id,business_sub_categories.id,business_sub_categories.name as sub_cat_name');
        $builder->join('business_sub_categories', 'business_categories.id = business_sub_categories.cat_id');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getPopularCategory()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }
    //  function start for  category listing  use in index method in category controller
    public function allcategories()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where("parent_id = 0");
        // $builder->where("isactive=1");
        $builder->orderby('created', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function allCategoriesActive()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where("parent_id = 0");
        $builder->where("isactive=1");
        $builder->orderby('priority', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }
    //  function start for  get category name show in breadcrumb in subcategory listing page use in fetch_subcategory method in category controller
    public function all_get_categories($id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "md5(id)" => $id
        );
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $db = $builder->where($data_array);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
