<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function __construct()
    {

        $this->userModel = new \App\Models\User();
        $this->session = \Config\Services::session();
        if (isset($_SESSION['loggedIn'])) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login');
        }
    }
    public function index()
    {
        if (isset($_SESSION['loggedIn'])) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login');
        }
    }
    //login logi
    public function login()
    {
        if (isset($_SESSION['loggedIn'])) {
            return redirect()->to('/dashboard');
        } else {
            return view('login');
        }
    }
    public function logout()
    {
        session_destroy();
        return redirect()->to('/login');
    }
    //register logic
    public function register()
    {
        if (isset($_SESSION['loggedIn'])) {
            return redirect()->to('/dashboard');
        } else {
            return view('register');
        }
    }
    public function dashboard()
    {
        if (isset($_SESSION['loggedIn'])) {
            return view('dashboard',['title' => 'dashboard']);
        } else {
            return redirect()->to('/login');
        }
    }
    //login page
    public function doLogin()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        if ($this->request->getMethod() == 'post') {
            $user = $this->userModel->verifyUser($email, $password);
            if (!empty($user->resultID->num_rows > 0) || $user->resultID->num_rows > 0) {
                $data = $user->getResult();
                if (!password_verify($password, $data[0]->password)) {
                    $this->session->set('danger', 'Incorrect password');
                    return redirect()->to('/login');
                } else {
                    $sessiondata = [
                        'name' => $data[0]->name,
                        'email' => $email,
                        'loggedIn' => true,
                    ];
                    $this->session->set($sessiondata);
                    return redirect()->to('/dashboard');
                }
            } else {
                $this->session->set('danger', 'Incorrect email Id/password');
                return redirect()->to('/login');
            }
        }
    }
    //register page
    public function doRegister()
    {
        if (strtolower($this->request->getMethod()) == 'post') {
            $data = ['name' => $this->request->getVar('uname'), 'email' => $this->request->getVar('email'), 'password' => $this->request->getVar('password')];
            $resultData= $this->userModel->createUser($data);
            if(!empty($resultData)){
                 $this->session->set('success', 'Account registered successfully');
                 return redirect()->to('/login');               
            }else{
                 $this->session->set('danger', 'Failed to register');
                return redirect()->to('/register');
            }           
        } else {
            $this->session->set('danger', 'Failed to register');
            return redirect()->to('/register');
        }
    }
}
