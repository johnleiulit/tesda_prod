<nav class="sidebar bg-dark">
    <div class="p-3">
        <!-- Logo/Brand -->
        <div class="text-center mb-4">
            <h5 class="text-white mb-0">
                <i class="bi bi-gear-fill"></i> TESDA Admin
            </h5>
            <small class="text-muted">Management System</small>
        </div>
        
        <!-- Navigation Menu -->
        <ul class="nav nav-pills flex-column">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                   href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>
            
            <!-- User Management Section -->
            <li class="nav-item mt-3">
                <small class="text-muted text-uppercase fw-bold px-3">User Management</small>
            </li>
            
            <!-- Assessors -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.assessors.*') ? 'active' : '' }}" 
                   href="{{ route('admin.assessors.index') }}">
                    <i class="bi bi-person-badge"></i>
                    Assessors
                </a>
            </li>
            
            <!-- Applicants -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.applicants.*') ? 'active' : '' }}" 
                   href="{{ route('admin.applicants.index') }}">
                    <i class="bi bi-people"></i>
                    Applicants
                </a>
                <!-- Sub-menu for Applicants -->
                <ul class="nav nav-pills flex-column ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-list-ul"></i>
                            View All
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-search"></i>
                            Search
                        </a>
                    </li>
                </ul>
            </li>
            
            <!-- Divider -->
            <hr class="text-secondary my-3">
            
            <!-- NC Programs Section (Future) -->
            <li class="nav-item">
                <small class="text-muted text-uppercase fw-bold px-3">Programs</small>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}" 
                   href="#">
                    <i class="bi bi-book"></i>
                    NC Programs
                </a>
                <ul class="nav nav-pills flex-column ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-plus-circle"></i>
                            Add Program
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-list-ul"></i>
                            All Programs
                        </a>
                    </li>
                </ul>
            </li>
            
            <!-- Divider -->
            <hr class="text-secondary my-3">
            
            <!-- Reports Section (Future) -->
            <li class="nav-item">
                <small class="text-muted text-uppercase fw-bold px-3">Reports</small>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}" 
                   href="#">
                    <i class="bi bi-graph-up"></i>
                    Analytics
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}" 
                   href="#">
                    <i class="bi bi-file-earmark-text"></i>
                    Reports
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="text-secondary my-3">
            
            <!-- Settings Section (Future) -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" 
                   href="#">
                    <i class="bi bi-gear"></i>
                    Settings
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Footer -->
    <div class="mt-auto p-3">
        <div class="text-center">
            <small class="text-muted">
                <i class="bi bi-shield-check"></i>
                Admin Panel v1.0
            </small>
        </div>
    </div>
</nav>

<style>
/* Additional sidebar styling */
.sidebar {
    position: sticky;
    top: 0;
    height: 100vh;
    overflow-y: auto;
}

.sidebar .nav-link {
    transition: all 0.2s ease;
    border-radius: 0.375rem;
    margin: 0.125rem 0.5rem;
}

.sidebar .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: translateX(2px);
}

.sidebar .nav-link.active {
    background-color: #0d6efd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.sidebar .nav-link i {
    width: 20px;
    text-align: center;
}

/* Sub-menu styling */
.sidebar .nav .nav .nav-link {
    font-size: 0.875rem;
    padding: 0.5rem 1rem;
    margin: 0.125rem 0;
}

/* Scrollbar styling for webkit browsers */
.sidebar::-webkit-scrollbar {
    width: 4px;
}

.sidebar::-webkit-scrollbar-track {
    background: #343a40;
}

.sidebar::-webkit-scrollbar-thumb {
    background: #6c757d;
    border-radius: 2px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: #adb5bd;
}
</style>