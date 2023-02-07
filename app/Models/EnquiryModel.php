<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $table = 'enquiry';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    public function saveEnquiry($enq_name, $email, $phone_no, $enquiry_text, $business_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $enq_name,
            "email" => $email,
            "phone_no" => $phone_no,
            "enquiry" => $enquiry_text,
            "business_id" => $business_id,
            "created_at" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('enquiry');
        $builder->insert($data_array);
        /* $sql = $builder->getCompiledInsert();
        echo $sql;
        die; */
        return $db->insertID();
    }
    public function saveEnquiryAddBusiness($enq_name, $email, $phone_no, $enquiry_text, $url)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $enq_name,
            "email" => $email,
            "phone_no" => $phone_no,
            "url" => $url,
            "enquiry" => $enquiry_text,
            "created_at" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('enquiry');
        $builder->insert($data_array);
        /* $sql = $builder->getCompiledInsert();
        echo $sql;
        die; */
        return $db->insertID();
    }
}
