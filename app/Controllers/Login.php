<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->validateUser($username, $password);

        if ($user) {
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'loggedIn' => true,
            ]);
            return redirect()->to('/dashboard'); 
        } else {
            $session->setFlashdata('error', 'Usuário e/ou senha inválido!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}