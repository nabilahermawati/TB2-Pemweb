<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkExperience extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'work_experience';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'job',
        'company',
        'start_date',
        'end_date',
        'location',
        'description',
        'user_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
