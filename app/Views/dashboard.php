<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .content {
            margin-left: 270px; /* Espaço para a sidebar */
            padding: 20px; /* Espaçamento interno do conteúdo */
        }

        #system-status {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .status-box {
            width: 150px;
            height: 150px;
            background-color: #333; /* Preto/cinza escuro */
            color: #fff; /* Texto branco */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1em;
            text-align: center;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <?php include 'sidebar.php'; ?> <!-- Inclui a sidebar aqui -->

    <div class="content">
        <div class="container mt-5">
            <h1>Dashboard do Sistema Operacional</h1>
            <h2>Bem-vindo, <?= session()->get('username'); ?>!</h2>

            <div id="system-status">
                <div class="status-box" id="cpu-status">CPU: Carregando...</div>
                <div class="status-box" id="memory-status">Memória: Carregando...</div>
                <div class="status-box" id="disk-status">Disco: Carregando...</div>
            </div>

        </div>
    </div>

    <script>
        function fetchSystemStatus() {
            $.ajax({
                url: '/dashboard/getSystemStatus', 
                method: 'GET',
                success: function(data) {
                    $('#cpu-status').text('CPU: ' + data.cpu);
                    $('#memory-status').text('Memória: ' + data.memory);
                    $('#disk-status').text('Disco: ' + data.disk);
                },
                error: function() {
                    $('#cpu-status').text('Erro ao obter status da CPU.');
                    $('#memory-status').text('Erro ao obter status da memória.');
                    $('#disk-status').text('Erro ao obter status do disco.');
                }
            });
        }

        $(document).ready(function() {
            fetchSystemStatus();
            setInterval(fetchSystemStatus, 5000); // Atualiza a cada 5 segundos
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
