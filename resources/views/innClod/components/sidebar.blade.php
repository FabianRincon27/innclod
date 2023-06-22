<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('documents.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="25">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">InnClod</span>
        </a>

        <a class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="fas fa-chevron-left align-middle text-white icon-clean"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Inicio</span>
        </li>
        <li class="menu-item {{ request()->is('Documentos*') ? 'active' : '' }}">
            <a href="{{ route('documents.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fas fa-home"></i>
                <div data-i18n="Inicio">Documentos</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('Procesos*') ? 'active' : '' }}">
            <a href="{{ route('process.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fas fa-sitemap"></i>
                <div data-i18n="Inicio">Procesos</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('Tipo/Documentos*') ? 'active' : '' }}">
            <a href="{{ route('typeDocument.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fas fa-landmark"></i>
                <div data-i18n="Inicio">Tipos De Documentos</div>
            </a>
        </li>
    </ul>
</aside>
