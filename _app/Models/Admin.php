<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
	public function all_pending_claims()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_claims');
		$builder->select('business_claims.*');
		$builder->select('businesses.name as business_name');

		$builder->join('businesses', 'business_claims.business_id = businesses.id');
		/* $builder->where('md5(reviews.business_id)', $business_id);
		$builder->where('status', "1"); */

		$builder->where("business_claims.status = 0");
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function pending_claims_update_status($id, $status)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_claims');
		$res = $builder->set('status', $status)->where('id', $id)->update();
		/* $sql = $builder->getCompiledUpdate();
		echo $sql;
		die; */
		return $res;
	}
	public function pending_claims_update_feature($id, $value)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('businesses');
		$res = $builder->set('feature_id', $value)->where('id', $id)->update();
		/* $sql = $builder->getCompiledUpdate();
		echo $sql;
		die; */
		return $res;
	}
	public function login($email, $pass)
	{
		$db      = \Config\Database::connect();
		$data_array = array(
			"email" => $email,
			"password" => md5($pass)
		);
		$builder = $db->table('cl_user');
		$db = $builder->where($data_array);
		return $db->get()->getResultObject();
	}



	public function total_claimed_bussiness()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('business_claims');
		$builder->select('count(business_claims) as isclaimed');
		$builder->where('status = 1');
		return $builder->countAllResults();
		// return $query;
	}
}
