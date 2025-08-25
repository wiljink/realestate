<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'RealEstate System') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { overflow-x: hidden; }

        /* Sidebar */
        .sidebar { min-height: 100vh; background-color: #343a40; display: flex; flex-direction: column; transition: width 0.2s; width: 200px; }
        .sidebar.collapsed { width: 60px; }
        .sidebar h5 { border-bottom: 1px solid #495057; margin-bottom: 0; text-align: center; padding: 12px; white-space: nowrap; }
        .sidebar a { color: #ffffff; padding: 12px 20px; display: flex; align-items: center; text-decoration: none; transition: all 0.2s; font-weight: 500; white-space: nowrap; }
        .sidebar a i { margin-right: 10px; min-width: 20px; text-align: center; }
        .sidebar a:hover { background-color: #495057; padding-left: 25px; }
        .sidebar.collapsed a span { display: none; }
        .sidebar .logout { margin-top: auto; border-top: 1px solid #495057; }

        /* Sidebar toggle button */
        .toggle-btn { position: absolute; top: 10px; right: -15px; background-color: #343a40; border: 1px solid #495057; border-radius: 50%; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; color: white; cursor: pointer; z-index: 1000; }

        /* Mobile toggle button */
        .mobile-toggle { display: none; }
        @media (max-width: 768px) {
            .sidebar { display: none; position: fixed; z-index: 1050; }
            .mobile-toggle { display: block; position: fixed; top: 10px; left: 10px; z-index: 1100; }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row g-0">
        <!-- Desktop Sidebar -->
        <div class="col-md-2 p-0 d-none d-md-block">
            <div class="sidebar position-relative" id="sidebar">
                <h5>Menu</h5>
                <div class="toggle-btn" id="sidebarToggle"><i class="bi bi-chevron-left"></i></div>
                <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
                <a href="{{ route('admin.agents') }}"><i class="bi bi-people"></i> <span>Agents</span></a>
                <a href="{{ route('admin.projects') }}"><i class="bi bi-building"></i> <span>Projects</span></a>
                <a href="{{ route('admin.properties') }}"><i class="bi bi-house-door"></i> <span>Properties</span></a>
                <a href="{{ route('admin.sales') }}"><i class="bi bi-cash-stack"></i> <span>Sales</span></a>
                <a href="{{ route('admin.collections') }}"><i class="bi bi-wallet2"></i> <span>Collections</span></a>
                <a href="{{ route('admin.commission') }}"><i class="bi bi-coin"></i> <span>Commission</span></a>
                <a href="{{ route('admin.incentives') }}"><i class="bi bi-gift"></i> <span>Incentives</span></a>
                <a href="{{ route('admin.leaderboard') }}"><i class="bi bi-trophy"></i> <span>Leaderboard</span></a>
                <a href="{{ route('custom.logout') }}" class="logout"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('custom.logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4 offset-md-0">
            @yield('content')
        </div>
    </div>
</div>

<!-- Mobile toggle button -->
<button class="btn btn-dark mobile-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
    <i class="bi bi-list"></i>
</button>

<!-- Mobile Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header bg-dark text-white">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-0 bg-dark d-flex flex-column">
        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="{{ route('admin.agents') }}"><i class="bi bi-people"></i> Agents</a>
        <a href="{{ route('admin.projects') }}"><i class="bi bi-building"></i> Projects</a>
        <a href="{{ route('admin.properties') }}"><i class="bi bi-house-door"></i> Properties</a>
        <a href="{{ route('admin.sales') }}"><i class="bi bi-cash-stack"></i> Sales</a>
        <a href="{{ route('admin.collections') }}"><i class="bi bi-wallet2"></i> Collections</a>
        <a href="{{ route('admin.commission') }}"><i class="bi bi-coin"></i> Commission</a>
        <a href="{{ route('admin.incentives') }}"><i class="bi bi-gift"></i> Incentives</a>
        <a href="{{ route('admin.leaderboard') }}"><i class="bi bi-trophy"></i> Leaderboard</a>
        <a href="{{ route('custom.logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
        <form id="logout-form-mobile" action="{{ route('custom.logout') }}" method="POST" style="display: none;">@csrf</form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        toggleBtn.innerHTML = sidebar.classList.contains('collapsed')
            ? '<i class="bi bi-chevron-right"></i>'
            : '<i class="bi bi-chevron-left"></i>';
    });
</script>
</body>
</html>
