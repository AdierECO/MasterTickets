<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Demo | MasterTicket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex align-items-center" style="height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-secondary p-4 rounded">
                <h2 class="text-center mb-4">Acceso Demo</h2>
                
                <form id="loginForm">
                    <!-- Selector de rol -->
                    <div class="mb-3">
                        <label for="rol" class="form-label">Selecciona tu rol</label>
                        <select id="rol" class="form-select" required>
                            <option value="" disabled selected>Elige una opción</option>
                            <option value="admin">Administrador</option>
                            <option value="user">Usuario</option>
                        </select>
                    </div>

                    <!-- Email ficticio -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="demo@correo.com" required>
                    </div>

                    <!-- Contraseña ficticia -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const rol = document.getElementById('rol').value;

        if (rol === 'admin') {
            window.location.href = "{{ route('admin.dashboard') }}";
        } else if (rol === 'user') {
            window.location.href = "{{ route('usuario.dashboard') }}";
        } else {
            alert("Selecciona un rol válido.");
        }
    });
</script>

</body>
</html>
