<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f6f7fb;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #2c3e50;
            padding: 15px 0;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .nav-link {
            color: rgba(255, 255, 255, 0.85);
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: white;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }
        .card {
            background: #fff;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h2 {
            margin-top: 0;
            color: #2c3e50;
        }
        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
            margin-right: 10px;
            transition: 0.3s;
        }
        .btn-primary {
            background: #27ae60;
            color: #fff;
        }
        .btn-primary:hover {
            background: #219150;
        }
        .btn-info {
            background: #3498db;
            color: #fff;
        }
        .btn-info:hover {
            background: #2980b9;
        }
        .stat-card {
            text-align: center;
            padding: 20px;
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt me-2"></i>Employee System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('departments.index') }}">Departments</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                    <div class="stat-number">{{ $employeeCount ?? 0 }}</div>
                    <p>Total Employees</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-building fa-3x mb-3 text-info"></i>
                    <div class="stat-number">{{ $departmentCount ?? 0 }}</div>
                    <p>Departments</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-dollar-sign fa-3x mb-3 text-success"></i>
                    <div class="stat-number">${{ number_format($avgSalary ?? 0, 2) }}</div>
                    <p>Average Salary</p>
                </div>
            </div>
        </div>

        <div class="card">
            <h2><i class="fas fa-users"></i> Employees</h2>
            <p>Manage your employees here. View, add, edit, or delete employee records.</p>
            <a href="{{ route('employees.index') }}" class="btn btn-primary">View Employees</a>
            <a href="{{ route('employees.create') }}" class="btn btn-info">Add Employee</a>
        </div>

        <div class="card">
            <h2><i class="fas fa-building"></i> Departments</h2>
            <p>Organize and manage departments. View department details and employee assignments.</p>
            <a href="{{ route('departments.index') }}" class="btn btn-primary">View Departments</a>
            <a href="{{ route('departments.create') }}" class="btn btn-info">Add Department</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>