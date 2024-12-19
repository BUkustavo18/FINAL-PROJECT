@extends('layouts.dashboard')

@section('content')

<!-- Recently Added Section -->
<div class="row mb-4">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Recently Added</h2>
        </div> 
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success" role="alert"> 
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered mb-4">
   <thead>
       <tr>
           <th>No</th>
           <th>Date</th>
           <th>Driver Name</th>
           <th>Plate Number</th>
           <th>Truck Type</th>
       </tr>
   </thead>
   <tbody>
       @php $i = 1; @endphp  <!-- Initialize the $i variable here -->
       @foreach ($dailyLogs as $dailyLog)
        <tr>
            <td>{{ $i++ }}</td>  <!-- Use the $i variable and increment it -->
            <td>{{ $dailyLog->date->format('Y-m-d') }}</td>
            <td>{{ $dailyLog->driver_name }}</td>
            <td>{{ $dailyLog->plate_number }}</td>
            <td>{{ $dailyLog->truck_type }}</td>
        </tr>
       @endforeach
   </tbody>
</table>
<div class="row mb-4">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2></h2>
        </div> 
    </div>
</div>
<!-- Recently Apprehended Section -->
<div class="row mb-4">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Recently Apprehended</h2>
        </div> 
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Driver Name</th>
            <th>Plate Number</th>
            <th>Apprehended</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($dailyLogs as $dailyLog)
            @if($dailyLog->apprehended === 'yes') <!-- Display only apprehended logs -->
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $dailyLog->date->format('Y-m-d') }}</td>
                    <td>{{ $dailyLog->driver_name }}</td>
                    <td>{{ $dailyLog->plate_number }}</td>
                    <td>{{ ucfirst($dailyLog->apprehended) }}</td> <!-- Capitalize the apprehended value -->
                </tr>
            @endif
        @endforeach
        @if($i == 1) <!-- Check if no apprehended logs are found -->
            <tr>
                <td colspan="5" class="text-center">No apprehended records found.</td>
            </tr>
        @endif
    </tbody>
</table>




{!! $dailyLogs->links('pagination::bootstrap-5') !!}

<p class="text-center text-primary"><small>Created By: Demdem Bukustavo</small></p>

@endsection

