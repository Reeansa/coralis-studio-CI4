<?php

namespace App\Controllers;

class UsersController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'profile',
        ];
        return view('pages/profile', $data);
    }
}
