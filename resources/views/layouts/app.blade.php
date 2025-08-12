<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'RealEstate System') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: #ffffff;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
<div class="row g-0">
    <!-- Sidebar -->
    <div class="col-md-2 sidebar">
        <h5 class="text-white text-center py-3">Menu</h5>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="#">Agents</a>
        <a href="#">Projects</a>
        <a href="#">Properties</a>
        <a href="#">Sales</a>
        <a href="#">Collections</a>
        <a href="#">Commission</a>
        <a href="#">Incentives</a>
        <a href="#">Leaderboard</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-4">
        @yield('content')
    </div>
</div>
</body>
</html>
