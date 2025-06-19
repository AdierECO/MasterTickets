<div class="admin-sidebar p-4 bg-dark" style="min-height: 100vh;">
    <h4 class="mb-4 border-bottom pb-3 text-white">
        <i class="bi bi-ticket-perforated"></i> MasterTicket
    </h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/eventos*') ? 'active' : '' }} text-white" href="{{ route('admin.eventos.index') }}">
                <i class="bi bi-calendar-event me-2"></i> Eventos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/usuarios*') ? 'active' : '' }} text-white" href="{{ route('admin.usuarios.index') }}">
                <i class="bi bi-people me-2"></i> Usuarios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/auditorios*') ? 'active' : '' }} text-white" href="{{ route('admin.auditorios.index') }}">
                <i class="bi bi-building me-2"></i> Auditorios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/categorias*') ? 'active' : '' }} text-white" href="{{ route('admin.categorias.index') }}">
                <i class="bi bi-tags me-2"></i> Categorías
            </a>
        </li>
        <li class="nav-item mt-auto">
            <a class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }} text-white" href="{{ route('admin.perfil') }}">
                <i class="bi bi-person-circle me-2"></i> Mi Perfil
            </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-link text-danger text-start w-100" type="submit">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </button>
            </form>
        </li>
    </ul>
</div>