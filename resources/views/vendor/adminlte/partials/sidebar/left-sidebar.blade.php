<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                      <a href="scans" class="nav-link">
                        <i class="fas fa-fw fa-check-circle"></i>
                        <p>Manage Scans</p>
                      </a>
                    </li>

                    @if(Auth::user()->role_id == 1){
                        <li class="nav-header">Application Settings</li>
                        <li class="nav-item">
                          <a href="devices" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-mobile"></i>
                            <p class="text">Devices Management</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="users" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-users"></i>
                            <p>Users Management</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="users/register" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-user-plus"></i>
                            <p>Register an Admin</p>
                          </a>
                        </li>
                    @endif
                    
                </ul>
                
            </ul>
        </nav>
    </div>

</aside>
