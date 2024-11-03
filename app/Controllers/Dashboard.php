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

        return view('dashboard'); // Exibe a visualização do dashboard
    }

    public function getSystemStatus()
    {
        // Executa comandos do sistema para obter o uso da CPU, memória e disco
        $cpuUsage = sys_getloadavg()[0]; // Média de carga da CPU
        $memoryUsage = shell_exec("free -m | awk 'NR==2{printf \"%s/%sMB (%.2f%%)\", $3,$2,$3*100/$2 }'");
        $diskUsage = shell_exec("df -h / | awk 'NR==2{printf \"%d/%dGB (%s)\", $3,$2,$5}'");

        return $this->response->setJSON([
            'cpu' => round($cpuUsage * 100, 2) . '%',
            'memory' => $memoryUsage,
            'disk' => $diskUsage,
        ]);
    }
}
