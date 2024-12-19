<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Weighbridge Record Management System</title>
    @vite(['resources/css/register.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Header Section -->
    <header>
        <h1>Weighbridge Management</h1>
        <nav>
            <a href="{{ route('welcome') }}">Home</a>
            
        </nav>
    </header>

    <!-- Main Container -->
    
        @yield('content')
        
    
</body>

</html>
