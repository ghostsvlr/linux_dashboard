<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/login');
        }

        return view('dashboard');
    }

    public function getSystemStatus()
    {
        $cpuUsage = shell_exec("top -bn1 | grep 'Cpu(s)' | sed 's/.*, *\([0-9.]*\)%* id.*/\\1/' | awk '{print 100 - $1}'");
    
        $memoryInfo = shell_exec("free -m | awk 'NR==2{printf \"%s/%s\", $3,$2}'"); 
        $memoryUsage = shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
    
        $diskInfo = shell_exec("df -h / | tail -1 | awk '{printf \"%s/%s\", $3,$2}'"); 
        $diskUsage = shell_exec("df -h / | tail -1 | awk '{print $5}'");
    
        $osDistribution = php_uname('s');  
        $osVersion = php_uname('r');       
        $osArchitecture = php_uname('m');  
    
        return $this->response->setJSON([
            'cpu' => round($cpuUsage, 2) . '%',
            'memoryUsage' => round($memoryUsage, 2) . '%', 
            'memoryInfo' => $memoryInfo, 
            'disk' => $diskUsage,
            'diskInfo' => $diskInfo, 
            'osDistribution' => $osDistribution,
            'osVersion' => $osVersion,
            'osArchitecture' => $osArchitecture,
        ]);
    }
    
    
}
