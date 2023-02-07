<?php

namespace App\Models;

use CodeIgniter\Model;

class SubCategory extends Model
{
    protected $table = 'categories_3_4_2015';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    //  function start for subcategory listing click on category use in fetch_subcategory method in category controller
    public function all_sub_categories_cat($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where('md5(parent_id)', $id);
        /* $builder->where("isactive = 1"); */
        $db = $builder->orderby('name', 'asc');
        return $db->get()->getResultObject();
    }
    public function all_sub_categories()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('id as sub_cat_id');
        $builder->select('parent_id');
        $builder->select('icon');
        $builder->select('name as sub_cat_name');
        $builder->where('parent_id !=', '0');
        $builder->where('isactive', '1');
        $query = $builder->get();
        return $query->getResultArray();
    }
    //  function start for bussiness search page select category then show subcategory on base of category use in search_sub_cat_listing method in bussiness controller
    public function search_sub_cat_listing($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where('parent_id', $id);
        $builder->where('isactive', '1');
        $query = $builder->get();
        return $query->getResultArray();
    }
    
    //  function start for edit sub-category use in edit method in sub-category controller
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
    //  function start for update sub-category use in update method in sub-category controller
    public function update_sub_cat($id, $name, $slug, $cat_id, $image, $isactive)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        if ($image == "") {
            $data_array = array(
                "parent_id" => $cat_id,
                'name' => $name,
                'slug' => $slug,
                "modified" => date('Y-m-d h:s:a'),
                "isactive" => $isactive,
            );
        } else {
            $data_array = array(
                "parent_id" => $cat_id,
                "name" => $name,
                'slug' => $slug,
                "image" => $image,
                "modified" => date('Y-m-d h:s:a'),
                "isactive" => $isactive,
            );
        }
        $builder->where('md5(id)', $id);
        $res = $builder->update($data_array);
        return $res;
    }
    //  function start for add sub-category use in save method in sub-category controller
    public function add_sub_cat($name,$slug, $image, $cat_id, $isactive)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "parent_id" => $cat_id,
            "name" => $name,
            "slug" => $slug,
            "image" => $image,
            "created" => date('Y-m-d h:s:a'),
            "isactive" => $isactive,
        );
        $builder = $db->table('categories_3_4_2015');
        $id = $builder->insert($data_array);
        return $db->insertID();
    }
    //  function start for update sub-category status use in update_sub_category_status method in subcategory controller
    public function update_sub_category_status($userid, $status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $res = $builder->set('isactive', $status)->where('id', $userid)->update();
        return $res;
    }
    public function total_sub_categories($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories_3_4_2015');
        $builder->select('*');
        $builder->where('md5(parent_id)', $id);
        return $builder->countAllResults();
        // return $query;
    }
}
