<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Collapse header -->
    <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
                <a href="#">
                    <img src="{{ asset('img/brand/blue.png') }}">
                </a>
            </div>
            <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main"
                    aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item {{ Request::route()->named('dashboard') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('dashboard') ? 'active' : '' }}"
                href="{{ route('dashboard') }}" wire:navigate>
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
        </li>
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Panel de Administración</h6>
    <ul class="navbar-nav">
        {{-- <li class="nav-item {{ Request::route()->named('ejemplo.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('ejemplo.index') ? 'active' : '' }}"
                href="{{ route('ejemplo.index') }}" wire:navigate>
                <i class="fas fa-book text-purple"></i> Ejemplo
            </a>
        </li> --}}
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Otras Acciones</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item {{ Request::route()->named('profile.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('profile.index') ? 'active' : '' }}"
                href="{{ route('profile.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Perfil
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('categories.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('categories.index') ? 'active' : '' }}"
                href="{{ route('categories.index') }}" wire:navigate>
                <i class="fas fa-tags text-blue"></i> Categorias
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('units.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('units.index') ? 'active' : '' }}"
                href="{{ route('units.index') }}" wire:navigate>
                <i class="fas fa-th text-blue"></i> Unidades    
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('brands.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('brands.index') ? 'active' : '' }}"
                href="{{ route('brands.index') }}" wire:navigate>
                <i class="fas fa-th-list text-blue"></i> Marcas    
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('products.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('products.index') ? 'active' : '' }}"
                href="{{ route('products.index') }}" wire:navigate>
                <i class="fas fa-box text-blue"></i> Productos    
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('purchases.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('purchases.index') ? 'active' : '' }}"
                href="{{ route('purchases.index') }}" wire:navigate>
                <i class="fas fa-box text-blue"></i> Compras 
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('sales.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('sales.index') ? 'active' : '' }}"
                href="{{ route('sales.index') }}" wire:navigate>
                <i class="fas fa-box text-blue"></i> Ventas 
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('providers.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('providers.index') ? 'active' : '' }}"
                href="{{ route('providers.index') }}" wire:navigate>
                <i class="fas fa-clipboard-list text-blue"></i> Proveedores    
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('employees.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('employees.index') ? 'active' : '' }}"
                href="{{ route('employees.index') }}" wire:navigate>
                <i class="fas fa-users text-blue"></i> Empleados    
            </a>
        </li>

        <li class="nav-item {{ Request::route()->named('movements.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('movements.index') ? 'active' : '' }}"
                href="{{ route('movements.index') }}" wire:navigate>
                <i class="fas fa-arrows-alt-h text-blue"></i> Movimientos
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt text-gray"></i> Cerrar Sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

</div>
