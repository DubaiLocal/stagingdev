<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorySeoModel extends Model
{
    protected $table = 'category_seo';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    // 
    public function get_seo_data($cat_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "cat_id" => $cat_id
        );
        $builder = $db->table('category_seo');
        $db = $builder->where($data_array);
        return $db->get()->getResultObject();
    }

    //  update category
    public function update_category_seo($id, $title, $meta_title, $meta_desc)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category_seo');
        $data_array = array(
            'title' => $title,
            'meta_title' => $meta_title,
            'meta_desc' => $meta_desc,
            'modified_at' => date('Y-m-d h:s:a'),
        );

        $db = $builder->where('id', $id);
        $res = $builder->update($data_array);
        /* $sql = $builder->getCompiledUpdate();
        print("<pre>" . print_r($data_array, true) . "</pre>");
        echo $id . " -> " . $image . " - " . $cat_icon . " - " . $cat_image;
        echo $sql;
        die(); */
        return $res;
    }
    public function insert_category_seo($cat_id, $title, $meta_title, $meta_desc)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category_seo');
        $data_array = array(
            'cat_id' => $cat_id,
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
        $builder->where("category.status", "1");
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
