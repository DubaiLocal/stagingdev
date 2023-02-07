<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactUsModel extends Model
{
    protected $table = 'contact_us';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    public function saveQueryEntries($firstName, $userEmail, $webUrl, $phone, $userQuery)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "name" => $firstName,
            "email" => $userEmail,
            "company_url" => $webUrl,
            "phone" => $phone,
            "message" => $userQuery,
            "created_at" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('contact_us');
        $id = $builder->insert($data_array);

        return $db->insertID();
    }
}
