<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['email', 'name', 'password', 'profile_picture', 'token'];

    protected $useTimestamps    = true;

    public function checkEmail($email) {
        return $this->where('email', $email)->first();
    }

    public function checkToken($token) {
        return $this->where('token', $token)->first();
    }

    public function resetPassword($token, $password) {
        return $this->where('token', $token)->set(['password' => password_hash($password, PASSWORD_DEFAULT), 'token' => null])->update();
    }
}
