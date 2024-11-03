<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); 
        return view('users', $data);
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        if ($userModel->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'error' => 'Erro ao apagar usuário.']);
        }
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');

        $existingUser = $userModel->where('username', $username)->first();
        if ($existingUser && $existingUser['id'] != $id) {
            return $this->response->setJSON(['success' => false, 'error' => 'Já existe um usuário com esse nome.']);
        }

        if ($userModel->update($id, ['username' => $username])) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'error' => 'Erro ao atualizar usuário.']);
        }
    }
}
