<?php

namespace App\Models;

use CodeIgniter\Model;

class DistrictsModel extends Model
{
    protected $table = 'district';
    protected $primaryKey = 'id';
    protected $returnType = 'array';


    public function all_districts()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('district');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
