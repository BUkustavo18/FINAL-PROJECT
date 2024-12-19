@extends('layouts.dashboard')

@section('content')
<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #6a6666;
    color: #000000;
    line-height: 1.6;
}

/* Form Layout */
.form-layout {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    padding: 20px;
    background-color: #6a6666;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin-top: 20px;
}

.form-layout .truck-data,
.form-layout .weighing-data {
    flex: 1;
    padding: 20px;
    background-color: #6a6666;
    border-radius: 8px;
}

/* Headings */
h2 {
    text-align: center;
    color: #ffffff;
    margin-bottom: 20px;
}

h3 {
    color: #007bff;
}

/* Form Groups */
.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #b2a9a9;
}

input[type="text"],
input[type="date"],
input[type="time"],
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #b1aaaa;
    border-radius: 5px;
    box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
}

input[type="number"]:invalid {
    border-color: #dc3545;
}

input[type="text"]:invalid,
input[type="number"]:invalid {
    border-color: #dc3545;
}

input[type="number"]:valid,
input[type="text"]:valid {
    border-color: #28a745;
}

/* Error Feedback */
.invalid-feedback {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
}

/* Button Styles */
button[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #28a745;
    color: #a39a9a;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin: 0 auto;
}

button[type="submit"]:hover {
    background-color: #218838;
}

button[type="submit"]:disabled {
    background-color: #736c6c;
    cursor: not-allowed;
}

/* Select Input */
select {
    padding: 10px;
    font-size: 16px;
}

/* Input Boxes */
input[type="text"],
input[type="number"],
input[type="date"],
input[type="time"],
select {
    margin-bottom: 12px;
}

/* Axle Inputs */
.axle-inputs input {
    width: 100px;
    margin-right: 10px;
}

.axle-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

/* Styling for each form's section */
.section {
    margin-bottom: 30px;
}

.section .form-group {
    margin-bottom: 10px;
}

.text-center {
    text-align: center;
}

/* Adjust Layout for Smaller Screens */
@media (max-width: 768px) {
    .form-layout {
        flex-direction: column;
        align-items: center;
    }

    .form-layout .truck-data,
    .form-layout .weighing-data {
        width: 100%;
    }
}

</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create log</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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

<form method="POST" action="{{ route('daily_logs.store') }}">
    @csrf
    <div class="form-layout">
        <!-- Truck Data Information (Left) -->
        <section class="truck-data">
            <h2>Truck Data Information</h2>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="{{ old('date') }}" required class="@error('date') is-invalid @enderror">
                @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="time">Time (HH:MM AM/PM):</label>
                <input type="time" id="time" name="time" value="{{ old('time') }}" required class="@error('time') is-invalid @enderror">
                @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="driver_name">Driver Name:</label>
                <input type="text" id="driver_name" name="driver_name" value="{{ old('driver_name') }}" required class="@error('driver_name') is-invalid @enderror">
                @error('driver_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="driver_otp">TOP (Temporary Operator's Permit):</label>
                <input type="text" id="driver_otp" name="driver_otp" value="{{ old('driver_otp') }}" required class="@error('driver_otp') is-invalid @enderror">
                @error('driver_otp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="driver_license">Driver's License:</label>
                <input type="text" id="driver_license" name="driver_license" value="{{ old('driver_license') }}" required class="@error('driver_license') is-invalid @enderror">
                @error('driver_license') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="plate_number">Plate Number (Tractor Head &amp; Trailer):</label>
                <input type="text" id="plate_number" name="plate_number" value="{{ old('plate_number') }}" required class="@error('plate_number') is-invalid @enderror">
                @error('plate_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="lto_cr">LTO CR No.:</label>
                <input type="text" id="lto_cr" name="lto_cr" value="{{ old('lto_cr') }}" required class="@error('lto_cr') is-invalid @enderror">
                @error('lto_cr') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="lto_or">LTO OR Date:</label>
                <input type="date" id="lto-or" name="lto_or" value="{{ old('lto_or') }}" required class="@error('lto_or') is-invalid @enderror">
                @error('lto_or') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="truck_type">Truck/Trailer Type:</label>
                <select id="truck_type" name="truck_type" required aria-label="Select truck or trailer type" class="@error('truck_type') is-invalid @enderror" onchange="updateGVW()">
                    <option value="" disabled {{ old('truck_type') == '' ? 'selected' : '' }}>Select</option>
                    <option value="1-1" {{ old('truck_type') == '1-1' ? 'selected' : '' }}>1-1 (6 wheels)</option>
                    <option value="1-2" {{ old('truck_type') == '1-2' ? 'selected' : '' }}>1-2 (10 wheels)</option>
                    <option value="1-3" {{ old('truck_type') == '1-3' ? 'selected' : '' }}>1-3 (14 wheels)</option>
                    <option value="11-1" {{ old('truck_type') == '11-1' ? 'selected' : '' }}>11-1 (10 wheels)</option>
                    <option value="11-2" {{ old('truck_type') == '11-2' ? 'selected' : '' }}>11-2 (14 wheels)</option>
                    <option value="11-3" {{ old('truck_type') == '11-3' ? 'selected' : '' }}>11-3 (18 wheels)</option>
                    <option value="12-1" {{ old('truck_type') == '12-1' ? 'selected' : '' }}>12-1 (14 wheels)</option>
                    <option value="12-2" {{ old('truck_type') == '12-2' ? 'selected' : '' }}>12-2 (18 wheels)</option>
                    <option value="12-3" {{ old('truck_type') == '12-3' ? 'selected' : '' }}>12-3 (22 wheels)</option>
                    <option value="11-11" {{ old('truck_type') == '11-11' ? 'selected' : '' }}>11-11 (14 wheels)</option>
                    <option value="11-12" {{ old('truck_type') == '11-12' ? 'selected' : '' }}>11-12 (18 wheels)</option>
                    <option value="12-11" {{ old('truck_type') == '12-11' ? 'selected' : '' }}>12-11 (18 wheels)</option>
                    <option value="12-12" {{ old('truck_type') == '12-12' ? 'selected' : '' }}>12-12 (22 wheels)</option>
                </select>
                @error('truck_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="commodity_carried">Commodity Carried:</label>
                <input type="text" id="commodity-carried" name="commodity_carried" value="{{ old('commodity_carried') }}" required class="@error('commodity_carried') is-invalid @enderror">
                @error('commodity_carried') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="commodity_type">Commodity Type:</label>
                <input type="text" id="commodity_type" name="commodity_type" value="{{ old('commodity_type') }}" required class="@error('commodity_type') is-invalid @enderror">
                @error('commodity_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="origin">Origin:</label>
                <input type="text" id="origin" name="origin" value="{{ old('origin') }}" required class="@error('origin') is-invalid @enderror">
                @error('origin') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" id="destination" name="destination" value="{{ old('destination') }}" required class="@error('destination') is-invalid @enderror">
                @error('destination') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </section>

       
        <!-- Weighing Data (Right) -->
    <section class="weighing-data">
        <h2>Weighing Data</h2>
        <div class="axle_weights">
         <label>Weight per Axle (kgs):</label>
            <div class="axle_weights">
                <input type="number" name="1st-axle" placeholder="1st Axle" value="{{ old('1st-axle') }}" required oninput="calculateTotalWeight()" oninput="calculateExcessLoad()">
                <input type="number" name="2nd-axle" placeholder="2nd Axle" value="{{ old('2nd-axle') }}" oninput="calculateTotalWeight()" oninput="calculateExcessLoad()">
                <input type="number" name="3rd-axle" placeholder="3rd Axle" value="{{ old('3rd-axle') }}" oninput="calculateTotalWeight()" oninput="calculateExcessLoad()">
                <input type="number" name="4th-axle" placeholder="4th Axle" value="{{ old('4th-axle') }}" oninput="calculateTotalWeight()" oninput="calculateExcessLoad()">
                <input type="number" name="5th-axle" placeholder="5th Axle" value="{{ old('5th-axle') }}" oninput="calculateTotalWeight()" oninput="calculateExcessLoad()">
                <input type="number" name="6th-axle" placeholder="6th Axle" value="{{ old('6th-axle') }}" oninput="calculateTotalWeight()" oninput="calculateExcessLoad()">
                <input type="number" name="7th-axle" placeholder="7th Axle" value="{{ old('7th-axle') }}" oninput="calculateTotalWeight()" oninput="calculateExcessLoad()">
                <input type="number" name="8th-axle" placeholder="8th Axle" value="{{ old('8th-axle') }}" oninput="calculateTotalWeight()" oninput="calculateExcessLoad()">
            </div>
        </div>
        <div class="form-group">
            <label for="total_weight">Total Weight (kgs):</label>
            <input type="number" id="total_weight" name="total_weight" value="{{ old('total_weight') }}" required readonly>
        </div>
        <div class="form-group">
            <label for="allowable_gvw">Allowable GVW (kgs):</label>
            <input type="text" id="allowable_gvw" name="allowable_gvw" value="{{ old('allowable_gvw') }}" readonly>
        </div>
        <div class="form-group">
            <label for="excess_load">Excess Load per Axle (kgs):</label>
            <input type="text" id="excess_load" name="excess_load" value="{{ old('excess_load') }}" readonly>
        </div>
    
        <div class="form-group">
            <label for="excess_gvw">Excess Load per GVW (kgs):</label>
            <input type="text" id="excess-gvw" name="excess_gvw" value="{{ old('excess_gvw') }}" readonly>
        </div>
        <div class="form-group">
            <label for="overloaded_axles">Number of Overloaded Axles:</label>
            <input type="number" id="overloaded-axles" name="overloaded_axles" value="{{ old('overloaded_axles') }}" required class="@error('overloaded_axles') is-invalid @enderror">
         @error('overloaded_axles') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
                <label for="overloaded">Overloaded:</label>
            <select id="overloaded" name="overloaded">
                <option value="" disabled selected>{{ old('overloaded') ?: 'Select' }}</option>
                <option value="both" {{ old('overloaded') == 'both' ? 'selected' : '' }}>Both (GVW &amp; Axle)</option>
                <option value="gvw-only" {{ old('overloaded') == 'gvw-only' ? 'selected' : '' }}>GVW Only</option>
                <option value="axle-only" {{ old('overloaded') == 'axle-only' ? 'selected' : '' }}>Axle Only</option>
            </select>
        </div>
        <div class="form-group">
            <label for="apprehended">Apprehended:</label>
            <select id="apprehended" name="apprehended" required>
                <option value="" disabled selected>{{ old('apprehended') ?: 'Select' }}</option>
                <option value="yes" {{ old('apprehended') == 'yes' ? 'selected' : '' }}>Yes</option>
                <option value="no" {{ old('apprehended') == 'no' ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </section>

        
        <!-- Submit Button -->
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-sm mt-4"><i class="fa fa-save"></i> Save Log</button>
        </div>
    </div>
</form>

<script>

    // Set today's date as the default value for the date input
window.onload = function () {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Month is 0-indexed
    const day = String(today.getDate()).padStart(2, '0');

    const dateInput = document.getElementById('date');
    dateInput.value = `${year}-${month}-${day}`; // Format: YYYY-MM-DD
};

// Update GVW based on selected truck type
function updateGVW() {
    const truckType = document.getElementById('truck_type').value;
    const gvwInput = document.getElementById('allowable_gvw');
    const gvwMapping = {
        '1-1': 15000,
        '1-2': 25000,
        '1-3': 35000,
        '11-1': 30000,
        '11-2': 40000,
        '11-3': 50000,
        '12-1': 35000,
        '12-2': 45000,
        '12-3': 55000,
        '11-11': 45000,
        '11-12': 55000,
        '12-11': 50000,
        '12-12': 60000,
    };
    gvwInput.value = gvwMapping[truckType] || 'N/A';
}

// Calculate total weight
function calculateTotalWeight() {
    const axleInputs = document.querySelectorAll('.axle_weights input[type="number"]');
    let totalWeight = 0;

    axleInputs.forEach((input) => {
        const weight = parseFloat(input.value);
        if (!isNaN(weight)) {
            totalWeight += weight;
        }
    });

    document.getElementById('total_weight').value = totalWeight;
    calculateExcessLoad();
}

// Calculate excess load per axle and GVW
function calculateExcessLoad() {
    const allowable_gvw = parseFloat(document.getElementById('allowable_gvw').value);
    const totalWeight = parseFloat(document.getElementById('total_weight').value);
    const axleInputs = document.querySelectorAll('.axle_weights input[type="number"]');
    const excessLoadInput = document.getElementById('excess_load');
    const excessGVWInput = document.getElementById('excess-gvw');
    let excessLoad = 0;

    axleInputs.forEach((input) => {
        const weight = parseFloat(input.value);
        if (!isNaN(weight) && weight > 13500) { // Updated max axle weight
            excessLoad += weight - 13500;
        }
    });

    const excessGVW = !isNaN(totalWeight) && !isNaN(allowable_gvw) && totalWeight > allowable_gvw ? totalWeight - allowable_gvw : 0;

    excessLoadInput.value = excessLoad > 0 ? excessLoad : 0;
    excessGVWInput.value = excessGVW > 0 ? excessGVW : 0;
}

    
</script>

@endsection
