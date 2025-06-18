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
            --primary-light: #818cf8;
            --dark-bg: #0f172a;
            --darker-bg: #0b1220;
            --card-bg: #1e293b;
            --card-border: #334155;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
            --input-bg: #334155;
            --input-focus: #475569;
        }

        body {
            background: linear-gradient(135deg, var(--dark-bg), var(--darker-bg));
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            margin: 0;
            color: var(--text-light);
        }

        .home-button {
            position: fixed;
            top: 25px;
            left: 25px;
            color: var(--text-muted);
            transition: all 0.3s ease;
            z-index: 100;
            background: rgba(30, 41, 59, 0.7);
            padding: 10px;
            border-radius: 50%;
            backdrop-filter: blur(5px);
            border: 1px solid var(--card-border);
        }

        .home-button:hover {
            color: var(--primary-light);
            transform: scale(1.1);
            background: rgba(99, 102, 241, 0.2);
        }

        .auth-container {
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
            padding: 20px;
        }

        .auth-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            border: 1px solid var(--card-border);
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 
                        0 10px 10px -5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
        }

        .auth-header {
            padding: 2.5rem 2rem;
            text-align: center;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            position: relative;
            overflow: hidden;
        }

        .auth-header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
        }

        .auth-logo {
            position: relative;
            display: inline-block;
        }

        .auth-logo i {
            font-size: 3rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .auth-title {
            margin-top: 1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .auth-subtitle {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .auth-body {
            padding: 2.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-muted);
            transition: all 0.3s ease;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--card-border);
            color: var(--text-light);
            padding: 0.75rem 1.25rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background-color: var(--input-focus);
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-muted);
            opacity: 0.6;
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            padding: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            border-radius: 10px;
            transition: all 0.3s ease;
            width: 100%;
            text-transform: uppercase;
            font-size: 0.9rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .auth-footer {
            padding: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-muted);
            border-top: 1px solid var(--card-border);
            background-color: rgba(15, 23, 42, 0.3);
        }

        .auth-link {
            color: var(--primary-light);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .auth-link:hover {
            color: white;
            text-decoration: underline;
        }

        /* Efectos de entrada */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .btn-primary { animation-delay: 0.5s; }
        .auth-footer { animation-delay: 0.6s; }

        /* Efecto de onda en el botón */
        @keyframes wave {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .btn-primary:hover {
            animation: wave 0.8s ease;
        }

        /* Efecto de icono */
        .bi-person-plus {
            transition: transform 0.3s ease;
        }

        .btn-primary:hover .bi-person-plus {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <a href="/" class="home-button" title="Volver al inicio">
        <i class="bi bi-house-door-fill"></i>
    </a>

    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">
                    <i class="bi bi-ticket-perforated"></i>
                </div>
                <h2 class="auth-title text-white mt-3">MasterTicket</h2>
                <p class="auth-subtitle">Crea tu cuenta</p>
            </div>

            <div class="auth-body">
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="form-group fade-in">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" name="name" id="nombre" class="form-control" required placeholder="Ingresa tu nombre">
                    </div>

                    <div class="form-group fade-in">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="tucorreo@ejemplo.com">
                    </div>

                    <div class="form-group fade-in">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Mínimo 8 caracteres">
                    </div>

                    <div class="form-group fade-in">
                        <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" required placeholder="Repite tu contraseña">
                    </div>

                    <button type="submit" class="btn btn-primary fade-in mt-4">
                        <i class="bi bi-person-plus me-2"></i> Registrarse
                    </button>
                </form>
            </div>

            <div class="auth-footer fade-in">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="auth-link">Inicia sesión</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efecto de carga
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach(el => {
                el.style.opacity = '1';
            });
        });
    </script>
</body>
</html>