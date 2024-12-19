@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Violation Tracker</h2>
        </div>

        <!-- Add Search Bar -->
        <div class="col-md-6">
            <form action="{{ route('daily_logs.search') }}" method="GET" class="input-group mb-3">
                <input type="text" name="query" class="form-control" placeholder="Search by Driver Name or Plate Number" value="{{ request('query') }}">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="alert alert-success" role="alert"> 
        {{ session('success') }}
    </div>
@endif

<!-- Table of Results -->
<table class="table table-bordered">
   <tr>
       <th>No</th>
       <th>Date</th>
       <th>Driver Name</th>
       <th>Plate Number</th>
       <th>Apprehended</th>
       <th width="280px">Action</th>
   </tr>
   @php $i = 1; @endphp
   @forelse ($dailyLogs as $dailyLog)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $dailyLog->date->format('Y-m-d') }}</td>
        <td>{{ $dailyLog->driver_name }}</td>
        <td>{{ $dailyLog->plate_number }}</td>
        <td>{{ $dailyLog->apprehended }}</td>
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
   @empty
       <tr>
           <td colspan="6" class="text-center">No records found.</td>
       </tr>
   @endforelse
</table>

<!-- Pagination -->
{!! $dailyLogs->appends(['query' => request('query')])->links('pagination::bootstrap-5') !!}

<p class="text-center text-primary"><small>Created By: Demdem Bukustavo</small></p>
@endsection
