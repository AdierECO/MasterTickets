<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | MasterTicket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
            --input-bg: #334155;
        }

        body {
            background-color: var(--dark-bg);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            transition: background 0.5s ease;
        }

        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            color: var(--text-muted);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .home-button:hover {
            color: var(--primary);
            transform: scale(1.1);
        }

        .auth-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            max-width: 420px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);
            overflow: hidden;
            transform: translateY(0);
            transition: all 0.3s ease;
            position: relative;
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 20px -5px rgba(0,0,0,0.2);
        }

        .auth-header {
            padding: 2rem;
            text-align: center;
            background: linear-gradient(135deg, var(--primary), #7c3aed);
        }

        .auth-body {
            padding: 2rem;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid rgba(255,255,255,0.1);
            color: var(--text-light);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            padding: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .auth-footer {
            padding: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-muted);
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .auth-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        .btn-primary { animation-delay: 0.7s; }
    </style>
</head>
<body>
    <a href="/" class="home-button" title="Volver al inicio">
        <i class="bi bi-house-door-fill" style="font-size: 1.5rem;"></i>
    </a>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="auth-card mx-auto">
                    <div class="auth-header">
                        <i class="bi bi-ticket-perforated text-white" style="font-size: 2.5rem;"></i>
                        <h2 class="text-white mt-3">MasterTicket</h2>
                        <p class="text-muted mb-0">Crea tu cuenta</p>
                    </div>

                    <div class="auth-body">
                        <form method="POST" action="{{ route('register.post') }}">
                            @csrf
                            <div class="form-group mb-3 fade-in">
                                <label for="nombre" class="form-label text-muted">Nombre</label>
                                <input type="text" name="name" id="nombre" class="form-control" required>
                            </div>

                            <div class="form-group mb-3 fade-in">
                                <label for="email" class="form-label text-muted">Correo electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group mb-3 fade-in">
                                <label for="password" class="form-label text-muted">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="form-group mb-4 fade-in">
                                <label for="confirmPassword" class="form-label text-muted">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fade-in">
                                <i class="bi bi-person-plus me-2"></i> Registrarse
                            </button>
                        </form>
                    </div>

                    <div class="auth-footer">
                        ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="auth-link">Inicia sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
