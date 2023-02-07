<?php

namespace App\Models;

use CodeIgniter\Model;

class FrontModel extends Model
{

    protected $table = 'categories_3_4_2015';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
    public function get_category_id_by_slug($slug = NULL)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('category');
        $builder->select('category.id');
        $builder->where('category.status', "1");
        $builder->where('category.slug', $slug);
        $query = $builder->get();
        /* $sql = $builder->getCompiledSelect();
        echo $sql;
        die; */
        return $query->getResultArray();
    }
}
