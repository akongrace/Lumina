<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container{
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
        }

        .card{
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            position: relative;
        }

        h1{
            margin-top: 0;
            color: #222;
        }

        p{
            color: #555;
            font-size: 16px;
        }

        .btn{
            display: inline-block;
            padding: 12px 18px;
            margin-top: 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-admin{
            background: #0d6efd;
            color: white;
        }

        .btn-teacher{
            background: #198754;
            color: white;
        }

        .role-badge{
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .badge-admin{
            background: #e7f1ff;
            color: #0d6efd;
        }

        .badge-teacher{
            background: #eafaf1;
            color: #198754;
        }

        /* Logout button style */
        .logout-form{
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .btn-logout{
            background: #dc3545;
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">

        {{-- LOGOUT BUTTON --}}
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
        </form>

        {{-- ADMIN DASHBOARD --}}
        @if(auth()->user()->role === 'admin')

            <span class="role-badge badge-admin">Admin</span>

            <h1>Admin Dashboard</h1>
            <p>Welcome Admin! You can manage student records, update details, and protect pickup codes.</p>

            <a href="{{ route('students.index') }}" class="btn btn-admin">Manage Students</a>

        {{-- TEACHER DASHBOARD --}}
        @elseif(auth()->user()->role === 'teacher')

            <span class="role-badge badge-teacher">Teacher</span>

            <h1>Teacher Dashboard</h1>
            <p>Welcome Teacher! You can view students and monitor records, but you cannot add or edit student details.</p>

            <a href="{{ route('students.index') }}" class="btn btn-teacher">View Students</a>

        {{-- FALLBACK --}}
        @else

            <h1>Dashboard</h1>
            <p>Your account role is not recognized. Please contact the admin.</p>

        @endif

    </div>
</div>

</body>
</html>