@extends('layouts.dashboard')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Daily Logs Management</h2>
        </div>
        
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('daily_logs.create') }}"><i class="fa fa-plus"></i> Add New Daily Log</a>
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert"> 
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
   <tr>
       <th>No</th>
       <th>Date</th>
       <th>Driver Name</th>
       <th>Plate Number</th>
       <th>Truck Type</th>
       <th width="280px">Action</th>
   </tr>
   @php $i = 1; @endphp  <!-- Initialize the $i variable here -->
   @foreach ($dailyLogs as $dailyLog)
    <tr>
        <td>{{ $i++ }}</td>  <!-- Use the $i variable and increment it -->
        <td>{{ $dailyLog->date->format('Y-m-d') }}</td>
        <td>{{ $dailyLog->driver_name }}</td>
        <td>{{ $dailyLog->plate_number }}</td>
        <td>{{ $dailyLog->truck_type }}</td>
        <td>
             <a class="btn btn-info btn-sm" href="{{ route('daily_logs.show', $dailyLog->id) }}"><i class="fa-solid fa-list"></i> Show</a>
             <a class="btn btn-primary btn-sm" href="{{ route('daily_logs.edit', $dailyLog->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
              <form method="POST" action="{{ route('daily_logs.destroy', $dailyLog->id) }}" style="display:inline">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
              </form>
        </td>
    </tr>
   @endforeach
</table>



{!! $dailyLogs->links('pagination::bootstrap-5') !!}


<p class="text-center text-primary"><small>Created By: Demdem Bukustavo</small></p>
@endsection

