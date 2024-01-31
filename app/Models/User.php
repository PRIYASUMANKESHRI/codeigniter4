<?php

namespace App\Models;

use CodeIgniter\Model;
$db      = \Config\Database::connect();
$builder = $db->table('users');

class User extends Model
{
    function __construct() {
        parent::__construct();
        // $db = db_connect('default'); 
        // $builder = $db->table('users');        
    }
    
    protected $DBGroup         = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'uname' => 'required',
        'password' => 'required|min_length[10]',
        'email'    => 'required|valid_email|is_unique[users.email]',
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
        $data = ['name' => $param['name'], 'email' => $param['email'], 'password' => $password];
        // echo "<pre>";
        // print_r($this);
        // echo $this->table;die;
        $userModel->insert($data);die;
        // return $builder->insert($data);
       //return $User->insert($data, false);
        // $this->table->save($data);
        // return true;
    }

    public function verifyUser($email, $password)
    {
        return $this->table($this->table)->where('email', $email)->get();
    }
}
