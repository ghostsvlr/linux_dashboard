<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Verifica se o usuário está logado
        if (!session()->get('loggedIn')) {
            return redirect()->to('/login'); // Redireciona para a página de login se não estiver logado
        }

        // Aqui você pode buscar dados do sistema operacional e outras informações necessárias
        // Exemplo: obter informações de uso da CPU, memória, disco, etc.

        return view('dashboard'); // Exibe a visualização do dashboard
    }
}
