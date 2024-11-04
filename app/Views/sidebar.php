<style>
    .sidebar {
        height: 100vh;
        background-color: #007bff;
        color: white;
    }
    .sidebar img {
        width: 100%; 
        height: auto; 
    }
    .sidebar a {
        color: white;
    }
    .sidebar a.btn {
        background-color: #0056b3; 
        border: solid 1px transparent; 
    }
    .sidebar a.btn:hover {
        background-color: #003d80; 
        color: white; 
    }
    .separator {
        border-top: 2px solid #FFFFFF; 
        margin: 15px 0; 
    }
</style>

<div class="sidebar d-flex flex-column p-3">
    <div style="display: flex; justify-content: center; align-items;">
        <img src="<?= base_url('imagens/bluepex.png') ?>" style="width: 160px; height: 110px;"/>
    </div>
    <div class="separator"></div>
    <h5 class="mb-4 text-center">Olá, <?= esc(session()->get('username')) ?>!</h5>
    <a href="/dashboard" class="d-block mb-2 btn">
    <i class="fas fa-chart-bar"></i> Dashboard
        
    </a>
    <a href="/users" class="d-block mb-2 btn">
        <i class="fas fa-wrench"></i> Gerenciamento de Usuários
    </a>

    <div class="mt-auto">
        <button onclick="window.location.href='/logout';" class="btn btn-danger w-100">Desconectar</button>
    </div>
</div>
