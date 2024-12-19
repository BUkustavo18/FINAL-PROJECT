@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Daily Log</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('daily_logs.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('daily_logs.update', $dailyLog->id) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <!-- Date -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" class="form-control" value="{{ old('date', isset($dailyLog->date) ? \Carbon\Carbon::parse($dailyLog->date)->format('Y-m-d') : '') }}">
            </div>
        </div>

        <!-- Time -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time:</strong>
                <input type="time" name="time" class="form-control" value="{{ old('time', $dailyLog->time) }}">
            </div>
        </div>

        <!-- Driver Name -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Driver Name:</strong>
                <input type="text" name="driver_name" class="form-control" value="{{ old('driver_name', $dailyLog->driver_name) }}">
            </div>
        </div>

        <!-- Driver OTP -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Driver OTP:</strong>
                <input type="text" name="driver_otp" class="form-control" value="{{ old('driver_otp', $dailyLog->driver_otp) }}">
            </div>
        </div>

        <!-- Driver License -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Driver License:</strong>
                <input type="text" name="driver_license" class="form-control" value="{{ old('driver_license', $dailyLog->driver_license) }}">
            </div>
        </div>

        <!-- Plate Number -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Plate Number:</strong>
                <input type="text" name="plate_number" class="form-control" value="{{ old('plate_number', $dailyLog->plate_number) }}">
            </div>
        </div>

        <!-- LTO CR -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>LTO CR:</strong>
                <input type="text" name="lto_cr" class="form-control" value="{{ old('lto_cr', $dailyLog->lto_cr) }}">
            </div>
        </div>

        <!-- LTO OR -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>LTO OR:</strong>
                <input type="date" name="lto_or" class="form-control" value="{{ old('lto_or', isset($dailyLog->lto_or) ? \Carbon\Carbon::parse($dailyLog->lto_or)->format('Y-m-d') : '') }}">
            </div>
        </div>

        <!-- Truck Type -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Truck Type:</strong>
                <input type="text" name="truck_type" class="form-control" value="{{ old('truck_type', $dailyLog->truck_type) }}">
            </div>
        </div>

        <!-- Commodity Carried -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Commodity Carried:</strong>
                <input type="text" name="commodity_carried" class="form-control" value="{{ old('commodity_carried', $dailyLog->commodity_carried) }}">
            </div>
        </div>

        <!-- Commodity Type -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Commodity Type:</strong>
                <input type="text" name="commodity_type" class="form-control" value="{{ old('commodity_type', $dailyLog->commodity_type) }}">
            </div>
        </div>

        <!-- Origin -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Origin:</strong>
                <input type="text" name="origin" class="form-control" value="{{ old('origin', $dailyLog->origin) }}">
            </div>
        </div>

        <!-- Destination -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Destination:</strong>
                <input type="text" name="destination" class="form-control" value="{{ old('destination', $dailyLog->destination) }}">
            </div>
        </div>

        <!-- Axle Weights -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Axle Weights:</strong>
                <textarea name="axle_weights" class="form-control" rows="3">{{ old('axle_weights', json_encode($dailyLog->axle_weights, JSON_PRETTY_PRINT)) }}</textarea>
            </div>
        </div>

        <!-- Total Weight -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Weight (kg):</strong>
                <input type="number" name="total_weight" class="form-control" value="{{ old('total_weight', $dailyLog->total_weight) }}">
            </div>
        </div>

        <!-- Allowable GVW -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Allowable GVW (kg):</strong>
                <input type="number" name="allowable_gvw" class="form-control" value="{{ old('allowable_gvw', $dailyLog->allowable_gvw) }}">
            </div>
        </div>

        <!-- Excess Load -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Excess Load (kg):</strong>
                <input type="number" name="excess_load" class="form-control" value="{{ old('excess_load', $dailyLog->excess_load) }}">
            </div>
        </div>

        <!-- Excess GVW -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Excess GVW (kg):</strong>
                <input type="number" name="excess_gvw" class="form-control" value="{{ old('excess_gvw', $dailyLog->excess_gvw) }}">
            </div>
        </div>

        <!-- Overloaded Axles -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Overloaded Axles:</strong>
                <input type="number" name="overloaded_axles" class="form-control" value="{{ old('overloaded_axles', $dailyLog->overloaded_axles) }}">
            </div>
        </div>

        <!-- Overloaded -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Overloaded:</strong>
                <select name="overloaded" class="form-control">
                    <option value="both" {{ $dailyLog->overloaded == 'both' ? 'selected' : '' }}>Both</option>
                    <option value="gvw-only" {{ $dailyLog->overloaded == 'gvw-only' ? 'selected' : '' }}>GVW Only</option>
                    <option value="axle-only" {{ $dailyLog->overloaded == 'axle-only' ? 'selected' : '' }}>Axle Only</option>
                </select>
            </div>
        </div>

        <!-- Apprehended -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apprehended:</strong>
                <select name="apprehended" class="form-control">
                    <option value="yes" {{ $dailyLog->apprehended == 'yes' ? 'selected' : '' }}>Yes</option>
                    <option value="no" {{ $dailyLog->apprehended == 'no' ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>

<p class="text-center text-primary"><small>Created by: Demdem BUkustavo</small></p>

@endsection
