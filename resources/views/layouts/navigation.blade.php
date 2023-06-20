<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-3">
                <img src="{{ asset('images/brand/light.svg') }}" height="20" width="20" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
                {{ config('app.name') }}
            </span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">
            <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                </svg>
            </span>
            <span class="sidebar-text">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fas fa-user-alt fa-fw"></i>
            </span>
            <span class="sidebar-text">{{ __('Users') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <span
            class="nav-link d-flex justify-content-between align-items-center {{ !(request()->routeIs('categories.index') || request()->routeIs('locations.create')) ? 'collapsed' : '' }}"
            data-bs-toggle="collapse" data-bs-target="#submenu-categories">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-layer-group fa-fw"></i>
                </span>
                <span class="sidebar-text">Categories</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level {{ !(request()->routeIs('categories.index') || request()->routeIs('categories.create')) ? 'collapse' : '' }}"
            role="list" id="submenu-categories" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item {{ request()->routeIs('categories.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="sidebar-text">List</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('categories.create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('categories.create') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="sidebar-text">Create</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <span
            class="nav-link d-flex justify-content-between align-items-center {{ !(request()->routeIs('locations.index') || request()->routeIs('locations.create')) ? 'collapsed' : '' }}"
            data-bs-toggle="collapse" data-bs-target="#submenu-locations">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-map-marker fa-fw"></i>
                </span>
                <span class="sidebar-text">Locations</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level {{ !(request()->routeIs('locations.index') || request()->routeIs('locations.create')) ? 'collapse' : '' }}"
            role="list" id="submenu-locations" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item {{ request()->routeIs('locations.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('locations.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="sidebar-text">List</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('locations.create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('locations.create') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="sidebar-text">Create</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <span
            class="nav-link d-flex justify-content-between align-items-center {{ !(request()->routeIs('locations.index') || request()->routeIs('locations.create')) ? 'collapsed' : '' }}"
            data-bs-toggle="collapse" data-bs-target="#submenu-medias">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-tape"></i>
                </span>
                <span class="sidebar-text">Medias</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level {{ !(request()->routeIs('medias.index') || request()->routeIs('medias.create')) ? 'collapse' : '' }}"
            role="list" id="submenu-medias" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item {{ request()->routeIs('medias.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('medias.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="sidebar-text">List</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('medias.create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('medias.create') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="sidebar-text">Create</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
