<?php

namespace App\Models;

use CodeIgniter\Model;

class FeatureModel extends Model
{
	protected $table = 'business_featured_type';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useTimestamps = false;
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;

	public function all_featured()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_featured_type');
		$builder->select('*');
		$query = $builder->get();
		/* $sql = $builder->getCompiledSelect(); 
        echo $sql;
        die;  */
		return $query->getResultArray();
	}
}
