<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register'); 
    }

    public function create()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $passwordConfirm = $this->request->getPost('password_confirm');

        if ($password !== $passwordConfirm) {
            return redirect()->back()->with('error', 'As senhas não coincidem');
        }

        $userModel = new UserModel();
        $existingUser = $userModel->where('username', $username)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Nome de usuário já existe');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $result = $userModel->save([
            'username' => $username,
            'password' => $hashedPassword,
        ]);

        if (!$result) {
            
            return redirect()->back()->with('error', 'Erro ao criar o usuário: ' . implode(', ', $userModel->errors()));
        }
        return redirect()->to('/login')->with('success', 'Registro realizado com sucesso. Faça login.');
    
    }

    public function createlogged()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $passwordConfirm = $this->request->getPost('password_confirm');
    
        if ($password !== $passwordConfirm) {
            return $this->response->setJSON(['success' => false, 'error' => 'As senhas não coincidem']);
        }
    
        $userModel = new UserModel();
        $existingUser = $userModel->where('username', $username)->first();
    
        if ($existingUser) {
            return $this->response->setJSON(['success' => false, 'error' => 'Nome de usuário já existe']);
        }
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $result = $userModel->save([
            'username' => $username,
            'password' => $hashedPassword,
        ]);
    
        if (!$result) {
            return $this->response->setJSON(['success' => false, 'error' => 'Erro ao criar o usuário: ' . implode(', ', $userModel->errors())]);
        }
    
        return $this->response->setJSON(['success' => true]);
    }
}    