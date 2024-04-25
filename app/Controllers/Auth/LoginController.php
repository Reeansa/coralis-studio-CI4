<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Login',
        ];
        return view('pages/auth/login', $data);
    }

    public function process(): RedirectResponse
    {
        $data = $this->request->getPost(['email', 'password']);
        $rules = [
            'email' => [
                'rules' => 'required|is_not_unique[users.email]',
                'errors' => [
                    'is_not_unique' => 'Email is not registered!',
                ],
            ],
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = model(UsersModel::class);
        $user = $model->checkEmail($data['email']);

        if (!password_verify($data['password'], $user['password'])) {
            return redirect()->with('errors', 'Password is wrong!')->back();
        }

        session()->set([
            'email' => $user['email'],
            'name' => $user['name'],
            'profile_picture' => $user['profile_picture'],
            'isLoggedIn' => true,
        ]);

        return redirect('profile')->with('success', 'Login success!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect('/')->with('success', 'Logout success!');
    }
}
