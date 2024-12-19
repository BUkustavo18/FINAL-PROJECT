<?php

namespace App\Http\Controllers;

use App\Models\DailyLog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class DailyLogController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:dailylog-list|dailylog-create|dailylog-edit|dailylog-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:dailylog-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:dailylog-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:dailylog-delete', ['only' => ['destroy']]);
    }
    
    // Display listing of daily logs
    public function index(): View
    {
        $dailyLogs = DailyLog::paginate(10); // Use pagination
        return view('daily_logs.index', compact('dailyLogs'));
    }

    // Show the form for creating a new daily log
    public function create(): View
    {
        return view('daily_logs.create');
    }

    // Store a newly created daily log
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'driver_name' => 'required|string',
            'driver_otp' => 'required|string',
            'driver_license' => 'required|string',
            'plate_number' => 'required|string',
            'lto_cr' => 'required|string',
            'lto_or' => 'required|date',
            'truck_type' => 'required|string',
            'commodity_carried' => 'required|string',
            'commodity_type' => 'required|string',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'total_weight' => 'required|integer',
            'allowable_gvw' => 'required|integer',
            'excess_load' => 'nullable|integer',
            'excess_gvw' => 'nullable|integer',
            'overloaded_axles' => 'nullable|integer',
            'overloaded' => 'nullable|in:both,gvw-only,axle-only',
            'apprehended' => 'required|in:yes,no',
        ]);

        DailyLog::create($validated);

        return redirect()->route('daily_logs.index')->with('success', 'Daily log created successfully!');
    }

    //display

   //display specified daily log
   public function show(DailyLog $dailyLog): View {
        return view('daily_logs.show', compact('dailyLog'));

   }

    // Show the form for editing the specified daily log
   public function edit(DailyLog $dailyLog): View {
        return view('daily_logs.edit', compact('dailyLog'));
   }

    // Update the specified daily log in the database
    public function update(Request $request, DailyLog $dailyLog): RedirectResponse
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'driver_name' => 'required|string',
            'driver_otp' => 'required|string',
            'driver_license' => 'required|string',
            'plate_number' => 'required|string',
            'lto_cr' => 'required|string',
            'lto_or' => 'required|date',
            'truck_type' => 'required|string',
            'commodity_carried' => 'required|string',
            'commodity_type' => 'required|string',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'total_weight' => 'required|integer',
            'allowable_gvw' => 'required|integer',
            'excess_load' => 'nullable|integer',
            'excess_gvw' => 'nullable|integer',
            'overloaded_axles' => 'nullable|integer',
            'overloaded' => 'nullable|in:both,gvw-only,axle-only',
            'apprehended' => 'required|in:yes,no',
        ]);

       
        $dailyLog->update($validated);

        return redirect()->route('daily_logs.index')->with('success', 'Daily log updated successfully!');
    }

    // Remove the specified daily log from the database
    public function destroy(DailyLog $dailyLog): RedirectResponse
    {
        
        $dailyLog->delete();

        return redirect()->route('daily_logs.index')->with('success', 'Daily log deleted successfully!');
    }

    public function search(Request $request) {
        $query = $request->input('query');

        // Filter daily logs based on the search query
        $dailyLogs = DailyLog::where('driver_name', 'LIKE', "%{$query}%")
            ->orWhere('plate_number', 'LIKE', "%{$query}%")
            ->paginate(10);

        // Return the view with filtered results
        return view('daily_logs.track', compact('dailyLogs'))->with('success', 'Search results displayed.');
    }

    public function page():View {
        $dailyLogs = DailyLog::paginate(10);  // Pagination if necessary

        // Return the view with the daily logs
        return view('daily_logs.page', compact('dailyLogs'));

    }

    
}
