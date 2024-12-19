@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Log</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('daily_logs.index') }}">Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {{ $dailyLog->date->format('Y-m-d') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Time:</strong>
            {{ $dailyLog->time }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Driver Name:</strong>
            {{ $dailyLog->driver_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Driver OTP:</strong>
            {{ $dailyLog->driver_otp }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Driver License:</strong>
            {{ $dailyLog->driver_license }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Plate Number:</strong>
            {{ $dailyLog->plate_number }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>LTO CR:</strong>
            {{ $dailyLog->lto_cr }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>LTO OR:</strong>
            {{-- Check if lto_or is a valid date and format it --}}
            @if($dailyLog->lto_or && $dailyLog->lto_or instanceof \Carbon\Carbon)
                {{ $dailyLog->lto_or->format('Y-m-d') }}
            @else
                {{ $dailyLog->lto_or }}
            @endif
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Truck Type:</strong>
            {{ $dailyLog->truck_type }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Commodity Carried:</strong>
            {{ $dailyLog->commodity_carried }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Commodity Type:</strong>
            {{ $dailyLog->commodity_type }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Origin:</strong>
            {{ $dailyLog->origin }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Destination:</strong>
            {{ $dailyLog->destination }}
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Total Weight:</strong>
            {{ $dailyLog->total_weight }} kg
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Allowable GVW:</strong>
            {{ $dailyLog->allowable_gvw }} kg
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Excess Load:</strong>
            {{ $dailyLog->excess_load ? $dailyLog->excess_load . ' kg' : 'N/A' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Excess GVW:</strong>
            {{ $dailyLog->excess_gvw ? $dailyLog->excess_gvw . ' kg' : 'N/A' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Overloaded Axles:</strong>
            {{ $dailyLog->overloaded_axles ? $dailyLog->overloaded_axles : 'N/A' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Overloaded:</strong>
            {{ ucfirst($dailyLog->overloaded) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apprehended:</strong>
            {{ ucfirst($dailyLog->apprehended) }}
        </div>
    </div>
</div>

@endsection
