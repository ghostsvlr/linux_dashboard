<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="<?= base_url('imagens/icon.png') ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .password-toggle {
            cursor: pointer;
            position: absolute; 
            right: 15px; 
            top: 70%; 
            transform: translateY(-50%); 
            z-index: 10; 
        }
        .position-relative {
            position: relative; 
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center bg-light" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div style="display: flex; justify-content: center; align-items;">
                            <img src="<?= base_url('imagens/bluepex-azul.png') ?>" style="width: 160px; height: 110px;"/>
                        </div>
                        <div class="separator" style="border-top: 2px solid; margin: 15px 0;" ></div>
                        <h3 class="card-title text-center mb-4">Login</h3>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php if(session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php endif; ?>

                        <form action="<?= site_url('login/authenticate') ?>" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>

                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="position-absolute password-toggle" onclick="togglePassword()">
                                    <i id="password-eye" class="fas fa-eye"></i>
                                </span>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                        <a href="/register" class="btn btn-secondary w-100 mt-3">Cadastre-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const passwordEye = document.getElementById("password-eye");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordEye.classList.remove("fa-eye");
                passwordEye.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                passwordEye.classList.remove("fa-eye-slash");
                passwordEye.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
