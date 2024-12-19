@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Generate Report</h1>
    
    <form action="{{ route('reports.generate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Generate</button>
    </form>

    @if(isset($dailyLogs))
        <h2 class="mt-5">Report Summary</h2>
        <p>Total Trucks: {{ $summary['total_trucks'] }}</p>
        <p>Apprehended Trucks: {{ $summary['overloaded_trucks'] }}</p>

        <h3 class="mt-3">Detailed Logs</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Truck Plate</th>
                    <th>Weight</th>
                    <th>Apprehended</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dailyLogs as $log)
                    <tr>
                        <td>{{ $log->date }}</td>
                        <td>{{ $log->plate_number }}</td>
                        <td>{{ $log->total_weight }}</td>
                        <td>{{ $log->apprehended ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Export to PDF Button -->
       
    @endif
</div>
@endsection
