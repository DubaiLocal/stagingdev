<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewsModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    public function saveReview($review_text, $rating, $business_id)
    {
        $db      = \Config\Database::connect();
        $data_array = array(
            "user_id" => "1",
            "business_id" => $business_id,
            "review" => $review_text,
            "score" => $rating,
            "status" => "1",
            "created_at" => date('Y-m-d H:i:s'),
        );
        $builder = $db->table('reviews');
        $builder->insert($data_array);
        return $db->insertID();
    }
}
