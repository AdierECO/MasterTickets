<nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-music-note me-2"></i>MasterTicket
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                </li>
                
                <!-- Menú desplegable de Categorías -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="categoriasDropdown" style="background: linear-gradient(135deg, #1e40af 0%, #6d28d9 100%);">
                        <!-- Música -->
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Música</a>
                            <ul class="dropdown-menu dropdown-menu-dark" style="background: linear-gradient(135deg, #1e3a8a 0%, #5b21b6 100%);">
                                <li><a class="dropdown-item" href="#">Conciertos</a></li>
                                <li><a class="dropdown-item" href="#">Festivales</a></li>
                                <li><a class="dropdown-item" href="#">DJs</a></li>
                            </ul>
                        </li>
                        <!-- Deportes -->
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Deportes</a>
                            <ul class="dropdown-menu dropdown-menu-dark" style="background: linear-gradient(135deg, #1e3a8a 0%, #5b21b6 100%);">
                                <li><a class="dropdown-item" href="#">Fútbol</a></li>
                                <li><a class="dropdown-item" href="#">Baloncesto</a></li>
                                <li><a class="dropdown-item" href="#">Tenis</a></li>
                            </ul>
                        </li>
                        <!-- Teatro -->
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Teatro</a>
                            <ul class="dropdown-menu dropdown-menu-dark" style="background: linear-gradient(135deg, #1e3a8a 0%, #5b21b6 100%);">
                                <li><a class="dropdown-item" href="#">Obras Clásicas</a></li>
                                <li><a class="dropdown-item" href="#">Comedia</a></li>
                                <li><a class="dropdown-item" href="#">Musicales</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('explorar') }}">Eventos</a>
                </li>
            </ul>
            
            <!-- Botones de Login/Registro o Perfil según sesión -->
            <ul class="navbar-nav ms-auto">
                @auth
                <!-- Menú de usuario cuando hay sesión -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="me-2 d-none d-sm-inline">
                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                            <small class="d-block text-white-50">{{ ucfirst(Auth::user()->role) }}</small>
                        </div>
                        <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="background: linear-gradient(135deg, #1e40af 0%, #6d28d9 100%);">
                        <li>
                            <a class="dropdown-item" href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('usuario.dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i> Mi Panel
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <!-- Botones de Login y Registro cuando no hay sesión -->
                <li class="nav-item ms-lg-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-light">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar Sesión
                    </a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a href="{{ route('register') }}" class="btn btn-light text-primary">
                        <i class="bi bi-person-plus me-1"></i> Registrarse
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Estilos para el menú desplegable anidado */
    .dropdown-submenu {
        position: relative;
    }
    
    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        border-radius: 0 6px 6px 6px;
    }
    
    .dropdown-submenu:hover .dropdown-menu {
        display: block;
    }
    
    .dropdown-item {
        transition: all 0.3s ease;
    }
    
    .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateX(5px);
    }
    
    .navbar {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
    
    .btn-outline-light {
        border-color: rgba(255, 255, 255, 0.3);
    }
    
    .btn-light.text-primary {
        background-color: white;
        color: #2563eb !important;
        transition: all 0.3s;
    }
    
    .btn-light.text-primary:hover {
        background-color: #f8f9fa;
    }
    
    /* Estilo para el botón de logout en el dropdown */
    .dropdown-item button {
        background: none;
        border: none;
        width: 100%;
        text-align: left;
        padding: 0.25rem 1rem;
        color: inherit;
    }
    
    .dropdown-item button:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
</style>

<script>
    // Inicialización de los dropdowns
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        
        dropdownElements.forEach(function(dropdownToggle) {
            dropdownToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var dropdownMenu = this.nextElementSibling;
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            });
        });
        
        // Cerrar menús al hacer clic fuera
        document.addEventListener('click', function() {
            var dropdowns = [].slice.call(document.querySelectorAll('.dropdown-menu'));
            dropdowns.forEach(function(menu) {
                menu.style.display = 'none';
            });
        });
    });
</script>