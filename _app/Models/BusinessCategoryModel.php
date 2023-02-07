<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessCategoryModel extends Model
{
    protected $table = 'business_category';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function check_business_cat_subcat($business_id,$category,$sub_category)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('business_category');
        $builder->select('*');
        $builder->where('business_id', $business_id);
        $builder->where('category_id', $category);
        $builder->where('subcategory_id', $sub_category);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
