<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Employees List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Roboto', sans-serif;
        }
        .card { 
            border-radius: 0.75rem; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
            margin-top: 20px;
        }
        .card-header { 
            background: linear-gradient(90deg, #0062E6, #33AEFF); 
            color: white; 
            font-weight: 600; 
            font-size: 1.4rem; 
            border-top-left-radius: 0.75rem; 
            border-top-right-radius: 0.75rem; 
        }
        .btn-primary { 
            background-color: #0056b3; 
            border-color: #0056b3; 
            font-weight: 600; 
            transition: background-color 0.3s ease; 
        }
        .btn-primary:hover { 
            background-color: #003d80; 
            border-color: #003d80; 
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
        .action-buttons .btn {
            margin-right: 5px;
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
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('employees.index') }}">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('departments.index') }}">Departments</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0"><i class="fas fa-users me-2"></i>Employees List</h2>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Add New Employee
                </a>
            </div>
            <div class="card-body">
                <table id="employeesTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Salary</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $emp)
                        <tr>
                            <td>{{ $emp->employee_id }}</td>
                            <td>{{ $emp->first_name }}</td>
                            <td>{{ $emp->last_name }}</td>
                            <td>{{ $emp->email }}</td>
                            <td>${{ number_format($emp->salary, 2) }}</td>
                            <td>{{ $emp->department->department_name }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('employees.edit', $emp->employee_id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('employees.destroy', $emp->employee_id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#employeesTable').DataTable({
                responsive: true,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                language: { 
                    searchPlaceholder: "Search employees...", 
                    search: "",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                }
            });
            $('.dataTables_filter input[type="search"]').addClass('form-control').css('width', '300px');
        });
    </script>
</body>
</html>