<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('app.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Selamat Datang</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @can('dashboard-view')
    <li class="nav-item {{ request()->is('app/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('app.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endcan

    @can('candidate-view')
    <li class="nav-item {{ request()->is('app/candidate*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('app.candidate.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Candidate</span></a>
    </li>
    @endcan

    @can('voter-view')
    <li class="nav-item {{ request()->is('app/voter*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('app.voter.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Voter</span></a>
    </li>
    @endcan

    @canany(['user-view', 'role-view'])
    <li class="nav-item {{ request()->is('app/users*') || request()->is('app/roles*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserManagement"
            aria-expanded="true" aria-controls="collapseUserManagement">
            <i class="fas fa-fw fa-users"></i>
            <span>User Management</span>
        </a>
        <div id="collapseUserManagement"
            class="collapse {{ request()->is('app/user*') || request()->is('app/role*') ? 'show' : '' }}"
            aria-labelledby="headingUserManagement" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('user-view')
                <a class="collapse-item {{ request()->is('app/user*') ? 'active' : '' }}"
                    href="{{ route('app.user.index') }}">User</a>
                @endcan
                @can('role-view')
                <a class="collapse-item {{ request()->is('app/role*') ? 'active' : '' }}"
                    href="{{ route('app.role.index') }}">Role</a>
                @endcan
            </div>
        </div>
    </li>
    @endcanany


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>