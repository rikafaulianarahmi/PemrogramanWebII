<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $user['username'],
                'user_id'    => $user['id'],
            ]);
            return redirect()->to('/buku');
        }

        session()->setFlashdata('error', 'Email atau password salah!');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}