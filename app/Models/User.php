<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{    
    protected $DBGroup         = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password','created_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'uname' => 'required',
        'password' => 'required|min_length[10]',
        'email'    => 'required|valid_email|is_unique[Users.email]',
    ];
    protected $validationMessages   = [
        'uname' => 'username required',
        'password' => 'password required',
        'email' => [
            'required'   => 'email required',
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function createUser($param = array())
    {        
            $password = password_hash($param['password'], PASSWORD_BCRYPT);
            $insert = array('name' => $param['name'], 'email' => $param['email'], 'password' => $password);       
            $query = $this->db->table($this->table);
            $res = $query->insert($insert);    
            return $res;  
        
    }

    public function verifyUser($email, $password)
    {
        return $resArray=$this->table($this->table)->where('email', $email)->get();
    }
}
