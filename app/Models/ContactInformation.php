<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactInformation extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'contact_information';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email',
        'linkedin',
        'phone',
        'languages',
        'address',
        'city',
        'country',
        'postal_code',
        'user_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
