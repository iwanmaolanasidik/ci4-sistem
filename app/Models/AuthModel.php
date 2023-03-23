<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['name','username','email','photo','password','active','role_id','created_at','updated_at'];
}
