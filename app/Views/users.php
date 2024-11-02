<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .content {
            flex: 1; 
        }
        .table th, .table td {
            text-align: center;
            background-color: transparent;
        }
        .table th:first-child{
            border-top-left-radius: 8px;
        }
        .table th:last-child { 
            border-top-right-radius: 8px;
        }
        .table td:first-child{ 
            border-left: 1px solid #ddd;
        }
        .table td:last-child{ 
            border-right: 1px solid #ddd;
        }
        .table th{ 
            background-color: #c8c6c6; 
        }
        .table tr {
            border-bottom: 2px solid #ddd; 
            border-left: 1px solid transparent;
            border-right: 1px solid transparent;
            border-top: 1px solid transparent;
        }
        .btn-edit, .btn-delete {
            margin: 0 5px; /* Adiciona espaçamento entre os botões */
        }
        .btn-edit {
            background-color: transparent; /* Remove o fundo do botão de editar */
            border: 1px solid #007bff; /* Adiciona uma borda azul */
            color: #007bff; /* Cor do ícone azul */
        }
        .btn-edit:hover {
            background-color: #007bff; /* Fundo azul ao passar o mouse */
            color: white; /* Ícone branco ao passar o mouse */
        }
        .btn-delete {
            background-color: transparent; /* Remove o fundo do botão de apagar */
            border: 1px solid red; /* Adiciona uma borda vermelha */
            color: red; /* Cor do ícone vermelho */
        }
        .btn-delete:hover {
            background-color: red; /* Fundo vermelho ao passar o mouse */
            color: white; /* Ícone branco ao passar o mouse */
        }
        .action-buttons {
            width: 120px; /* Define a largura da coluna de ações */
        }
        .icon-size {
            font-size: 1.2rem; /* Aumenta o tamanho dos ícones */
        }
        .btn-cadastrar {
            position: absolute; /* Posiciona o botão */
            top: 10px; /* Distância do topo */
            right: 10px; /* Distância da direita */
        }
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #58d30c; 
            color: black; 
            border: 2px solid transparent; 
            padding: 10px 20px;
            border-radius: 5px;
            display: none; 
            z-index: 1000; 
            transition: opacity 0.5s ease-in-out; 
            max-width: 300px; 
            box-sizing: border-box; 
        }

        .custom-alert-error {
            background-color: #f8d7da; 
            color: #721c24; 
            border: 2px solid #f5c6cb;
        }

        .table th:nth-child(1), 
        .table td:nth-child(1) {
            width: 150px; 
        }
    </style>
</head>
<body class="bg-light">

<div id="customAlert" class="custom-alert">
    <span id="alertMessage">Mensagem do alerta</span>
</div>



<div class="d-flex">
    <?php include 'sidebar.php'; ?> 
    <div class="content p-4">
        <div class="container position-relative"> 
            <h2 class="text-center">Lista de Usuários</h2>
            <button class="btn btn-success btn-cadastrar" data-bs-toggle="modal" data-bs-target="#cadastrarModal">
                <i class="fas fa-plus"></i> Cadastrar usuário
            </button>
            <table class="table table-bordered mt-3"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th class="action-buttons">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= esc($user['id']); ?></td>
                                <td><?= esc($user['username']); ?></td>
                                <td class="action-buttons">
                                    <button class="btn btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= esc($user['id']); ?>">
                                        <i class="fas fa-pencil-alt icon-size"></i>
                                    </button>
                                    <button class="btn btn-delete btn-sm" data-id="<?= esc($user['id']); ?>">
                                        <i class="fas fa-trash-alt icon-size"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal de Edição -->
                            <div class="modal fade" id="editModal<?= esc($user['id']); ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Editar Usuário</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm<?= esc($user['id']); ?>">
                                                <div class="mb-3">
                                                    <label for="username<?= esc($user['id']); ?>" class="form-label">Usuário</label>
                                                    <input type="text" class="form-control" id="username<?= esc($user['id']); ?>" name="username" value="<?= esc($user['username']); ?>" required>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer"> 
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary btn-save" data-id="<?= esc($user['id']); ?>">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">Nenhum usuário encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja apagar este usuário?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastrarModalLabel">Cadastrar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger error-message" style="display: none;" role="alert"></div>
                <div class="alert alert-success success-message" style="display: none;"></div>

                <form id="registerForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                    </div>

                    <button type="button" class="btn btn-primary w-100 btn-save">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).on('click', '.btn-delete', function() {
    var userId = $(this).data('id');
    var username = $('#username' + userId).val(); 

    $('#deleteConfirmModal .modal-body p').text("Tem certeza que deseja apagar o usuário: " + username + "?");
    $('#deleteConfirmModal').modal('show');

    $('#confirmDeleteBtn').off('click').on('click', function() {
        $.ajax({
            url: '/users/delete/' + userId,
            type: 'DELETE',
            success: function(response) {
                if (response.success) {
                    sessionStorage.setItem('notification', "Usuário " + username +  " apagado com sucesso!");
                    location.reload(); 
                } else {
                    alert(response.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Erro na requisição: ", textStatus, errorThrown);
                alert("Erro ao apagar o usuário. Tente novamente.");
            }
        });
        $('#deleteConfirmModal').modal('hide');
    });
});

$(document).on('click', '.btn-save', function() {
    if ($(this).closest('#cadastrarModal').length) {
        // Cadastrar usuário
        var username = $('#username').val();
        var password = $('#password').val();
        var passwordConfirm = $('#password_confirm').val();

        $.ajax({
            url: '/register/createlogged',
            type: 'POST',
            data: { 
                username: username,
                password: password,
                password_confirm: passwordConfirm
            },
            success: function(response) {
                if (response.success) {
                    sessionStorage.setItem('notification', "Usuário " + username + " criado com sucesso!");
                    sessionStorage.setItem('notificationType', 'success'); // Salvar tipo de notificação
                    location.reload(); 
                } else {
                    $('.error-message').text(response.error).show();
                    $('.success-message').hide(); 
                    sessionStorage.setItem('notification', response.error); // Salvar mensagem de erro
                    sessionStorage.setItem('notificationType', 'error'); // Salvar tipo de notificação
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Erro na requisição: ", textStatus, errorThrown);
                $('.error-message').text("Erro ao criar o usuário. Tente novamente.").show();
                $('.success-message').hide(); 
            }
        });
    } else {
        // Editar usuário
        var userId = $(this).data('id');
        var username = $('#username' + userId).val(); 

        $.ajax({
            url: '/users/update/' + userId,
            type: 'POST',
            data: { username: username },
            success: function(response) {
                if (response.success) {
                    sessionStorage.setItem('notification', "Usuário editado com sucesso!");
                    sessionStorage.setItem('notificationType', 'success'); // Salvar tipo de notificação
                    location.reload(); 
                    $('#editModal' + userId).modal('hide'); 
                } else {
                    sessionStorage.setItem('notification', response.error);
                    sessionStorage.setItem('notificationType', 'error'); // Salvar tipo de notificação
                    location.reload(); 
                    $('#editModal' + userId).modal('hide'); // Fechar o modal se houver erro
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Erro na requisição: ", textStatus, errorThrown);
            }
        });
    }
});



$(document).ready(function() {
    var notification = sessionStorage.getItem('notification');
    var notificationType = sessionStorage.getItem('notificationType');
    if (notification) {
        showAlert(notification, notificationType); // Passar o tipo de notificação
        sessionStorage.removeItem('notification'); 
        sessionStorage.removeItem('notificationType'); 
    }
});

function showAlert(message, type = 'success') {
    const alertBox = document.getElementById('customAlert');
    const alertMessage = document.getElementById('alertMessage');
    alertMessage.textContent = message; 
    alertBox.className = 'custom-alert ' + (type === 'error' ? 'custom-alert-error' : ''); // Aplicar classe de erro
    alertBox.style.display = 'block'; 
    alertBox.style.opacity = '1'; 

    setTimeout(() => {
        alertBox.style.opacity = '0'; 
        setTimeout(() => {
            alertBox.style.display = 'none'; 
        }, 500); 
    }, 5000); 
}
</script>
</body>
</html>
