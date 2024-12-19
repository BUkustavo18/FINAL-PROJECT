<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <h1>Weighbridge Record Management System</h1>
        <p>Streamline weighbridge operations with efficient record management, tracking, and reporting.</p>
        <div class="btn-group">
            <a href="{{route('login')}}" class="btn">Log In</a>
            <a href="{{route('register')}}" class="btn">Register</a>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="main-content">
        <h2>About the System</h2>
        <p>Our system offers a reliable solution for managing weighbridge operations, ensuring accurate data logging,
            seamless tracking of violations, and comprehensive reporting for administrators and operators.</p>

        <div class="features">
            <div class="feature-card">
                <h3>Centralized Database</h3>
                <p>Store all vehicle weight records, violations, and reports in one secure location.</p>
            </div>
            <div class="feature-card">
                <h3>Daily Logs</h3>
                <p>Effortlessly log truck details and weighbridge data with an intuitive interface.</p>
            </div>
            <div class="feature-card">
                <h3>Violation Tracking</h3>
                <p>Track overloaded vehicles and view historical violation records easily.</p>
            </div>
            <div class="feature-card">
                <h3>Comprehensive Reports</h3>
                <p>Generate detailed daily, monthly, and annual reports for insights and compliance.</p>
            </div>
            <div class="feature-card">
                <h3>Role-Based Access</h3>
                <p>Provide secure access for operators and admins with custom roles and permissions.</p>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 Weighbridge Record Management System. All Rights Reserved.</p>
    </footer>
</body>

</html>
