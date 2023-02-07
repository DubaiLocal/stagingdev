<?php

namespace App\Models;

use CodeIgniter\Model;

class SubCategoryModel extends Model
{
    protected $table = 'sub_category';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    //  function start for subcategory listing click on category use in fetch_subcategory method in category controller
    public function all_sub_categories_category()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('id as sub_cat_id');
        $builder->select('slug');
        $builder->select('cat_id');
        $builder->select('icon');
        $builder->select('name as sub_cat_name');
        $builder->where('status', '1');
        $builder->where('priority IS NOT NULL');
        $builder->orderBy('sub_category.priority', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_subcategory_name($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('name');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_subcategories($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('id as sub_cat_id');
        $builder->select('slug');
        $builder->select('cat_id');
        $builder->select('banner');
        $builder->select('icon');
        $builder->select('name as sub_cat_name');
        $builder->where('status', '1');
        $builder->where('cat_id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_subcategories_search($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('id as sub_cat_id');
        $builder->where('status', '1');
        $builder->where('md5(cat_id)', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function find_keywords($subcategory_ids, $keyword)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category_keywords');
        $builder->select('sub_category_keywords.name');
        $builder->select('sub_category_keywords.source as keyword_source');
        $builder->select('sub_category_keywords.url');
        $builder->select('sub_category.name as subcat_name');
        $builder->select('sub_category.slug as subcat_slug');
        $builder->join('sub_category ', 'sub_category.id = sub_category_keywords.subcategory_id');
        $builder->join('category ', 'category.id = sub_category.cat_id');
        $builder->like('sub_category_keywords.name', $keyword);
        $builder->where('sub_category.status', '1');
        $builder->where('category.status', '1');
        $builder->whereIn('sub_category_keywords.subcategory_id', $subcategory_ids);
        // $builder->limit(6);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
    public function find_keywords_test($subcategory_ids, $keyword)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category_keywords');
        $builder->select('sub_category_keywords.name');
        $builder->select('sub_category_keywords.source as keyword_source');
        $builder->select('sub_category.name as subcat_name');
        $builder->select('sub_category.slug as subcat_slug');
        $builder->select('sub_category.id as subcat_id');
        $builder->join('sub_category ', 'sub_category.id = sub_category_keywords.subcategory_id');
        $builder->like('sub_category_keywords.name', $keyword);
        $builder->where('sub_category.status', '1');
        $builder->whereIn('sub_category_keywords.subcategory_id', $subcategory_ids);
        $builder->limit(6);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }

    public function single_category_subcat($id = NULL)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('sub_category.id as sub_cat_id');
        $builder->select('sub_category.slug');
        $builder->select('sub_category.banner');
        $builder->select('sub_category.name as sub_cat_name');
        if ($id == NULL) {
            $builder->where('sub_category.cat_id', 1);
        } else {
            $builder->where('md5(sub_category.cat_id)', $id);
        }
        $builder->where('sub_category.status', "1");
        $builder->orderBy('sub_category.name', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function get_subcategory_id_slug($slug)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('id');
        $builder->select('name');
        $builder->where('status', '1');
        $builder->where('slug', $slug);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_cat_subcategory_slug($slug)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('sub_category.name as subcat_name');
        $builder->select('category.name as name');
        $builder->select('category.slug as cat_slug');
        $builder->where('category.status', '1');
        $builder->where('sub_category.status', '1');
        $builder->where('sub_category.slug', $slug);
        $builder->join('category ', 'sub_category.cat_id = category.id');
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect(); 
        echo $sql;
        die;  */
        return $query->getResultArray();
    }
    //  function get subcategory based on category
    public function search_sub_cat_listing($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('*');
        $builder->where('cat_id', $id);
        $builder->where('status', '1');
        $query = $builder->get();
        return $query->getResultArray();
    }
    //  function get subcategory based on category MD5 id
    public function search_sub_cat($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('sub_category.*');
        $builder->where('md5(cat_id)', $id);
        // $builder->where('status', '1');
        $builder->select('count(business_category.business_id) as count_business');
        $builder->join('business_category', 'sub_category.id= business_category.subcategory_id', 'left');
        $builder->groupBy("sub_category.id");
        $builder->orderBy('sub_category.status', 'DESC');
        $builder->orderBy('sub_category.name', 'asc');
        $query = $builder->get();
        return $query->getResultObject();
    }
    //  add sub category
    public function add_sub_cat($name, $cat_id, $slug, $image, $cat_icon, $priority, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $data_array = array(
            'name' => $name,
            'slug' => $slug,
            'cat_id' => $cat_id,
            'priority' => $priority
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
        $new_data_array = array(
            "status" => $status,
            "created_at" => date('Y-m-d h:s:a'),
        );
        $data_array = array_merge($data_array, $new_data_array);
        $builder->insert($data_array);
        /* $sql = $builder->set($data_array)->getCompiledInsert();
        echo $sql;
        echo  "<br/>";
        print("<pre>" . print_r($data_array, true) . "</pre>");
        echo $db->getLastQuery();
        die(); */
        return $db->insertID();
    }
    //  function for get details  of sub-category 
    public function edit($id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "md5(id)" => $id
        );
        $builder = $db->table('sub_category');
        $db = $builder->where($data_array);
        return $db->get()->getResultObject();
    }


    //  update category
    public function update_sub_cat($id, $cat_id, $name, $slug, $image, $sub_cat_icon, $priority, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $data_array = array(
            'name' => $name,
            'cat_id' => $cat_id,
            'slug' => $slug,
            'priority' => $priority,
        );

        if ($image != "") {
            $new_data_array = array(
                'banner' => $image,
            );
            $data_array = array_merge($data_array, $new_data_array);
        }
        if ($sub_cat_icon != "") {
            $new_data_array = array(
                'icon' => $sub_cat_icon,
            );
            $data_array = array_merge($data_array, $new_data_array);
        }
        $new_data_array = array(
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
    //  update sub category status
    public function update_sub_category_status($id, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $res = $builder->set('status', $status)->where('id', $id)->update();
        return $res;
    }

    public function sub_categories_with_count($subcat_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('sub_category.id');
        $builder->select('sub_category.name');
        $builder->select('sub_category.slug');
        $builder->select('count(business_category.id) as count_business');
        $builder->join('business_category', 'sub_category.id= business_category.subcategory_id', 'left');
        $builder->where("sub_category.status", 1);
        // $builder->where("sub_category.cat_id", $subcat_id);
        $builder->where("md5(sub_category.cat_id)", $subcat_id);
        $builder->groupBy("sub_category.name");
        $builder->orderby('count_business', 'desc');
        //$builder->limit(8);
        $query = $builder->get();
        
        return $query->getResultArray();
    }

    public function sub_category_keywords($sub_cat_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category_keywords');
        $builder->select('sub_category_keywords.id');
        $builder->select('sub_category_keywords.name');
        $builder->where("sub_category_keywords.subcategory_id", $sub_cat_id);
        $builder->orderby('sub_category_keywords.name', 'asc');
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect(); 
        echo $sql;
        die;  */
        return $query->getResultArray();
    }


    // move subcategory keyword
    public function move_keyword_subcategory($sub_category, $keyword_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category_keywords');
        $data_array = array(
            "subcategory_id" => $sub_category,
            'modified_at' => date('Y-m-d h:s:a'),
        );
        $builder->where('id', $keyword_id);
        $res = $builder->update($data_array);
        return $res;
    }

    public function get_keyword_name($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category_keywords');
        $builder->select('name');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
