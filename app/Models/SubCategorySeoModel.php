<?php

namespace App\Models;

use CodeIgniter\Model;

class SubCategorySeoModel extends Model
{
    protected $table = 'category_seo';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    //  function get subcategory based on category slug
    public function search_sub_cat($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category');
        $builder->select('sub_category.*');

        // $builder->where('status', '1');
        $builder->select('count(business_category.business_id) as count_business');
        $builder->join('business_category', 'sub_category.id= business_category.subcategory_id', 'left');
        $builder->where('md5(sub_category.cat_id)', $id);
        $builder->where('sub_category.status', "1");
        $builder->groupBy("sub_category.id");
        $builder->orderBy('sub_category.name', 'asc');
        $query = $builder->get();
        return $query->getResultObject();
    }
    public function get_seo_data($sub_cat_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "sub_cat_id" => $sub_cat_id
        );
        $builder = $db->table('sub_category_seo');
        $db = $builder->where($data_array);
        return $db->get()->getResultObject();
    }

    //  update sub-category
    public function update_sub_category_seo($id, $title, $meta_title, $meta_desc)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category_seo');
        $data_array = array(
            'title' => $title,
            'meta_title' => $meta_title,
            'meta_desc' => $meta_desc,
            'modified_at' => date('Y-m-d h:s:a'),
        );

        $db = $builder->where('id', $id);
        $res = $builder->update($data_array);
        return $res;
    }
    public function insert_sub_category_seo($sub_cat_id, $title, $meta_title, $meta_desc)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_category_seo');
        $data_array = array(
            'sub_cat_id' => $sub_cat_id,
            'title' => $title,
            'meta_title' => $meta_title,
            'meta_desc' => $meta_desc,
            'created_at' => date('Y-m-d h:s:a'),
        );
        $builder->insert($data_array);
        /* $sql = $builder->set($data_array)->getCompiledInsert();
        echo $sql;
        die(); */
        return $db->insertID();
    }
}
