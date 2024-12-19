<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <h1>Report Summary</h1>
    <p>Total Trucks: {{ $summary['total_trucks'] }}</p>
    <p>Apprehended Trucks: {{ $summary['overloaded_trucks'] }}</p>

    <h3>Detailed Logs</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Truck Plate</th>
                <th>Weight</th>
                <th>Apprehended</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dailyLogs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->plate_number }}</td>
                    <td>{{ $log->total_weight }}</td>
                    <td>{{ $log->apprehended ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
