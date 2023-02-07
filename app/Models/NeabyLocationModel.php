<?php

namespace App\Models;

use CodeIgniter\Model;

class NeabyLocationModel extends Model
{
    protected $table = 'nearby_locations';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function search_nearby_location_listing($district_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nearby_locations');
        $builder->select('*');
        $builder->where('district_id ', $district_id);
        $builder->where('status', '1');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function all_nearby_locations()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nearby_locations');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
