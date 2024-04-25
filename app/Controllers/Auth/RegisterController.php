<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\RedirectResponse;

class RegisterController extends BaseController
{
    public function index(): String
    {
        $data = [
            'title' => 'Register',
        ];
        return view('pages/auth/register', $data);
    }

    public function process(): RedirectResponse
    {
        $data = $this->request->getPost(['email', 'name', 'password', 'profile_picture']);
        $rules = [
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'is_unique' => 'Email is already registered!'
                ]
            ],
            'name' => 'required',
            'password' => 'required|min_length[8]',
            'profile_picture' => 'uploaded[profile_picture]|max_size[profile_picture,1024]|is_image[profile_picture]',
        ];

        if (!$this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('profile_picture');
        if (!$file->move(ROOTPATH . 'public/assets/images/profile/', $file->getRandomName())) {
            return view('pages/auth/register');
        }

        $valid = $this->validator->getValidated();
        $model = model(UsersModel::class);
        $model->insert([
            'email' => $valid['email'],
            'name' => $valid['name'],
            'password' => password_hash($valid['password'], PASSWORD_DEFAULT),
            'profile_picture' => $file->getName(),
        ]);
        return redirect()->with('success', 'Success registered, please login!')->to('/');
    }
}
