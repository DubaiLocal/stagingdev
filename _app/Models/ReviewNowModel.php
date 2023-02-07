<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewNowModel extends Model
{
    protected $table = 'review_now';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
}
