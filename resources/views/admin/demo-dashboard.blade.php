<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Admin - MasterTicket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --sidebar-width: 250px;
            --dark-bg: #1e293b;
            --darker-bg: #0f172a;
            --primary: #6366f1;
        }
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        .admin-sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--darker-bg);
            position: fixed;
            left: 0;
            top: 0;
            color: white;
        }
        .admin-main {
            margin-left: var(--sidebar-width);
            padding: 20px;
            background: #f8fafc;
            min-height: 100vh;
        }
        .nav-link {
            color: #94a3b8;
            border-radius: 5px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background: #334155;
            color: white;
        }
        .card-metric {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card-metric:hover {
            transform: translateY(-5px);
        }
        .badge-active {
            background: #10b981;
        }
        .section-content {
            display: none;
        }
        .section-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="admin-sidebar p-4">
        <h4 class="mb-4 border-bottom pb-3 text-white">
            <i class="bi bi-ticket-perforated"></i> MasterTicket
        </h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-section="dashboard">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="eventos">
                    <i class="bi bi-calendar-event me-2"></i> Eventos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="usuarios">
                    <i class="bi bi-people me-2"></i> Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="auditorios">
                    <i class="bi bi-building me-2"></i> Auditorios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="categorias">
                    <i class="bi bi-tags me-2"></i> Categorías
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link" href="#" data-section="perfil">
                    <i class="bi bi-person-circle me-2"></i> Mi Perfil
                </a>
            </li>
            <li class="list-group-item text-danger" role="presentation">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-link text-danger text-start w-100" type="submit">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="admin-main">
        <!-- Dashboard -->
        <div class="section-content active" id="dashboard">
            <div class="container-fluid">
                <h2 class="mb-4 text-dark">Panel de Administración</h2>
                
                <!-- Metric Cards -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card card-metric bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-calendar-check"></i> Eventos Activos</h5>
                                <p class="card-text display-5">24</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card card-metric bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-people-fill"></i> Usuarios</h5>
                                <p class="card-text display-5">1,842</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card card-metric bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-currency-dollar"></i> Ventas Hoy</h5>
                                <p class="card-text display-5">$12,450.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Eventos Recientes -->
                <div class="card border-0 shadow">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Últimos Eventos</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Evento</th>
                                        <th>Fecha</th>
                                        <th>Lugar</th>
                                        <th>Asistentes</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Concierto de Rock</td>
                                        <td>15/10/2023 20:00</td>
                                        <td>Auditorio Nacional</td>
                                        <td>1,250</td>
                                        <td><span class="badge badge-active">Activo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Festival Jazz</td>
                                        <td>22/10/2023 18:30</td>
                                        <td>Plaza de Toros</td>
                                        <td>3,400</td>
                                        <td><span class="badge badge-active">Activo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Obra de Teatro</td>
                                        <td>05/11/2023 17:00</td>
                                        <td>Teatro Principal</td>
                                        <td>650</td>
                                        <td><span class="badge bg-warning">Próximo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Eventos -->
        <div class="section-content" id="eventos">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Gestión de Eventos</h2>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>Nuevo Evento
                    </button>
                </div>
                
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Lugar</th>
                                        <th>Categoría</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Concierto de Rock</td>
                                        <td>15/10/2023 20:00</td>
                                        <td>Auditorio Nacional</td>
                                        <td>Música</td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Festival de Jazz</td>
                                        <td>22/10/2023 18:30</td>
                                        <td>Plaza de Toros</td>
                                        <td>Música</td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Obra de Teatro</td>
                                        <td>05/11/2023 17:00</td>
                                        <td>Teatro Principal</td>
                                        <td>Teatro</td>
                                        <td><span class="badge bg-warning">Próximo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Usuarios -->
        <div class="section-content" id="usuarios">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Gestión de Usuarios</h2>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>Nuevo Usuario
                    </button>
                </div>
                
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Registro</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Juan Pérez</td>
                                        <td>juan@example.com</td>
                                        <td>Administrador</td>
                                        <td>15/08/2023</td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>María García</td>
                                        <td>maria@example.com</td>
                                        <td>Cliente</td>
                                        <td>22/09/2023</td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Carlos López</td>
                                        <td>carlos@example.com</td>
                                        <td>Cliente</td>
                                        <td>05/10/2023</td>
                                        <td><span class="badge bg-secondary">Inactivo</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Auditorios -->
        <div class="section-content" id="auditorios">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Gestión de Auditorios</h2>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>Nuevo Auditorio
                    </button>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://via.placeholder.com/300x200?text=Auditorio+Nacional" class="card-img-top" alt="Auditorio">
                            <div class="card-body">
                                <h5 class="card-title">Auditorio Nacional</h5>
                                <p class="card-text">
                                    <i class="bi bi-geo-alt"></i> Ciudad de México<br>
                                    <i class="bi bi-people"></i> Capacidad: 10,000
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://via.placeholder.com/300x200?text=Plaza+de+Toros" class="card-img-top" alt="Auditorio">
                            <div class="card-body">
                                <h5 class="card-title">Plaza de Toros</h5>
                                <p class="card-text">
                                    <i class="bi bi-geo-alt"></i> Guadalajara<br>
                                    <i class="bi bi-people"></i> Capacidad: 15,000
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://via.placeholder.com/300x200?text=Teatro+Principal" class="card-img-top" alt="Auditorio">
                            <div class="card-body">
                                <h5 class="card-title">Teatro Principal</h5>
                                <p class="card-text">
                                    <i class="bi bi-geo-alt"></i> Monterrey<br>
                                    <i class="bi bi-people"></i> Capacidad: 2,500
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categorías -->
        <div class="section-content" id="categorias">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Gestión de Categorías</h2>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>Nueva Categoría
                    </button>
                </div>
                
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <div class="bg-primary bg-opacity-10 p-4 rounded mb-3">
                                    <i class="bi bi-music-note-beamed display-4 text-primary"></i>
                                </div>
                                <h5>Música</h5>
                                <p class="text-muted">25 eventos</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button class="btn btn-sm btn-outline-primary w-100">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <div class="bg-success bg-opacity-10 p-4 rounded mb-3">
                                    <i class="bi bi-camera-reels display-4 text-success"></i>
                                </div>
                                <h5>Cine</h5>
                                <p class="text-muted">12 eventos</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button class="btn btn-sm btn-outline-primary w-100">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <div class="bg-info bg-opacity-10 p-4 rounded mb-3">
                                    <i class="bi bi-mask display-4 text-info"></i>
                                </div>
                                <h5>Teatro</h5>
                                <p class="text-muted">18 eventos</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button class="btn btn-sm btn-outline-primary w-100">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <div class="bg-warning bg-opacity-10 p-4 rounded mb-3">
                                    <i class="bi bi-emoji-laughing display-4 text-warning"></i>
                                </div>
                                <h5>Comedia</h5>
                                <p class="text-muted">8 eventos</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button class="btn btn-sm btn-outline-primary w-100">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content" id="perfil">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-primary bg-opacity-10 p-4 rounded-circle d-inline-block mb-3">
                                        <i class="bi bi-person-circle display-4 text-primary"></i>
                                    </div>
                                    <h4>{{ strtoupper(auth()->user()->name) }}</h4>
                                    <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
                                    <span class="badge bg-{{ auth()->user()->role === 'admin' ? 'primary' : 'success' }}">
                                        {{ ucfirst(auth()->user()->role) }}
                                    </span>
                                    
                                    <hr class="my-4">
                                    
                                    <div class="text-start">
                                        <p><strong><i class="bi bi-calendar me-2"></i>Registrado:</strong> {{ auth()->user()->created_at->format('d/m/Y') }}</p>
                                        <p><strong><i class="bi bi-clock-history me-2"></i>Última actualización:</strong> {{ auth()->user()->updated_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-white border-0">
                                    <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Perfil</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('profile.update') }}">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Nombre completo</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Correo electrónico</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="current_password" class="form-label">Contraseña actual</label>
                                                <input type="password" class="form-control" id="current_password" name="current_password">
                                                <small class="text-muted">Solo necesaria si vas a cambiar la contraseña</small>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Nueva contraseña</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                                <small class="text-muted">Deja en blanco para mantener la actual</small>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-save me-2"></i>Guardar Cambios
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Cambio entre secciones
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remover active de todos los links y secciones
                document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));
                document.querySelectorAll('.section-content').forEach(el => el.classList.remove('active'));
                
                // Agregar active al link clickeado
                this.classList.add('active');
                
                // Mostrar la sección correspondiente
                const sectionId = this.getAttribute('data-section');
                document.getElementById(sectionId).classList.add('active');
            });
        });
    </script>
</body>
</html>