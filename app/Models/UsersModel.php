<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $allowedFields = [
        'id_users', 'full_name', 'username', 'password', 'address', 'phone_number', 'email'
    ];
}
