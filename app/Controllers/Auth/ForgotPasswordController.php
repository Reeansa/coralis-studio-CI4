<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\models\UsersModel;
use CodeIgniter\HTTP\RedirectResponse;

class ForgotPasswordController extends BaseController
{
    public function index(): string
    {
        $data = ['title' => 'Forgot Password'];
        return view('pages/auth/forgot_password', $data);
    }

    public function sendToken(): RedirectResponse
    {
        $email = $this->request->getPost(['email']);
        $rules = [
            'email' => [
                'rules' => 'required|is_not_unique[users.email]',
                'errors' => [
                    'is_not_unique' => 'Email is not registered!',
                ],
            ],
        ];

        if (!$this->validateData($email, $rules)) {
            return redirect()->back()->withInput('errors', $this->validator->getErrors());
        }

        $services = service('email');

        $model = model(UsersModel::class);
        $user = $model->checkEmail($email);

        $token = bin2hex(random_bytes(32));
        $model->where('email', $email)->set(['token' => $token])->update();

        $services->setFrom('raihanfebriyansahh@gmail.com', 'Raihan Febriyansah');
        $services->setTo($email);
        $services->setSubject('Reset Password');
        $services->setMessage('Please click the following link to reset your password: '. site_url('reset-password/'). $token);

        if ($services->send()) {
            session()->setFlashdata('success', 'Token has been sent to your email');
            return redirect()->to('forgot-password');
        } else {
            session()->setFlashdata('error', $services->printDebugger());
            return redirect()->to('forgot-password');
        }
    }

    public function resetPassword() {
        $token = $this->request->getUri()->getSegment(2);
        $model = model(UsersModel::class);
        $user = $model->checkToken($token);

        if (!$user) {
            return redirect('forgot-password')->with('error', 'Invalid token');
        }

        $data = ['title' => 'Reset Password', 'token' => $token];
        return view('pages/auth/reset_password', $data);
    }

    public function updatePassword(): RedirectResponse
    {
        $data = $this->request->getPost(['token', 'password', 'confirm_password']);
        $rules = [
            'token' => 'required|is_not_unique[users.token]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (!$this->validateData($data, $rules)) {
            return redirect()->back()->withInput('errors', $this->validator->getErrors());
        }

        $model = model(UsersModel::class);
        $user = $model->checkToken($data['token']);

        if (!$user) {
            return redirect('forgot-password')->with('error', 'Invalid token');
        }

        $model->resetPassword($user['token'], $data['password']);

        session()->setFlashdata('success', 'Password has been updated');
        return redirect('/');
    }
}
