<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessClaimsModel extends Model
{
    protected $table = 'business_claims';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    public function saveClaims($enq_name, $email, $phone_no, $business_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $enq_name,
            "email" => $email,
            "phone" => $phone_no,
            "business_id" => $business_id,
            "status" => "0",
            "created_at" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('business_claims');
        $builder->insert($data_array);
        return $db->insertID();
    }
}
