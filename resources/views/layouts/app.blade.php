<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.create') }}">Add Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.index') }}">Employees List</a>
            </li>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>

</body>
</html>