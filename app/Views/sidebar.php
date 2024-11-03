<style>
    .sidebar {
        height: 100vh;
        background-color: #007bff;
        color: white;
    }
    .sidebar img {
        width: 100%; /* Faz com que a imagem ocupe toda a largura da sidebar */
        height: auto; /* Mantém a proporção da imagem */
    }
    .sidebar a {
        color: white;
    }
    .sidebar a.btn {
        background-color: #0056b3; /* Cor de fundo original */
        border: solid 1px transparent; /* Borda transparente */
    }
    .sidebar a.btn:hover {
        background-color: #003d80; /* Azul mais escuro no hover */
        color: white; /* Mantém a cor do texto branca */
    }
    .separator {
        border-top: 2px solid #FFFFFF; /* Linha branca */
        margin: 15px 0; /* Margem para separar a linha dos componentes */
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
