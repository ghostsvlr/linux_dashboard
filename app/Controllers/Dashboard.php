<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Verifica se o usuário está logado
        if (!session()->get('loggedIn')) {
            return redirect()->to('/login');
        }

        return view('dashboard');
    }

    public function getSystemStatus()
    {
        // Obter informações do sistema operacional
        $cpuUsage = shell_exec("top -bn1 | grep 'Cpu(s)' | sed 's/.*, *\([0-9.]*\)%* id.*/\\1/' | awk '{print 100 - $1}'");
        $memoryUsage = shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
        $diskUsage = shell_exec("df -h / | tail -1 | awk '{print $5}'");
        
        // Informações do SO
        $osDistribution = php_uname('s');  // Exemplo: Linux
        $osVersion = php_uname('r');       // Exemplo: versão do kernel
        $osArchitecture = php_uname('m');  // Exemplo: x86_64

        return $this->response->setJSON([
            'cpu' => round($cpuUsage, 2) . '%',
            'memory' => round($memoryUsage, 2) . '%',
            'disk' => $diskUsage,
            'osDistribution' => $osDistribution,
            'osVersion' => $osVersion,
            'osArchitecture' => $osArchitecture,
        ]);
    }
}
