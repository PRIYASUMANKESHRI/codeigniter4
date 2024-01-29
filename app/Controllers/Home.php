<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['stuff']="Priya";
        return view('welcome_message',$data);
    }
}
