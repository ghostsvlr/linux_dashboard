<?php

namespace Config;

use CodeIgniter\Database\Config;


class Database extends Config
{
    public $defaultGroup = 'default';
    
    public $default = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '34410115', 
        'database' => 'linux_dashboard2',
        'port'     => 3306,
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'cacheOn'  => false,
        'cachedir' => '',
        'charset'  => 'utf8mb4',
        'DBCollat' => 'utf8mb4_general_ci',
        'swap_pre' => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover'  => [],
        'saveQueries' => true
    ];
}
