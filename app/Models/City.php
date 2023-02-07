<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    /*Code added by Yugam*/
    public function browseCities($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('cities');
        $builder->select('*');
        $builder->where("id", $data);
        $query = $builder->get();
        return $query->getResultArray();
    }
    /*End Code added by Yugam*/
}
