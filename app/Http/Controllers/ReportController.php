<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DailyLog;
use Illuminate\Http\Request;
use PDF;


class ReportController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:report-index', ['only' => ['index','store']]);
         
    }
    
    public function index()
    {
        return view('reports.index');
    }

    public function generate(Request $request)
    {
        // Validate input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Fetch logs based on the selected date range
        $dailyLogs =DailyLog::whereBetween('date', [$request->start_date, $request->end_date])->get();

        // Generate summary data
        $summary = [
            'total_trucks' => $dailyLogs->count(),
            'overloaded_trucks' => $dailyLogs->where('apprehended', true)->count(),
        ];

        return view('reports.index', compact('dailyLogs', 'summary'));
    }

    public function exportToPDF(Request $request) {
        $dailyLogs = DailyLog::whereBetween('date', [$request->start_date, $request->end_date])->get();

        $summary = [
            'total_trucks' => $dailyLogs->count(),
            'overloaded_trucks' => $dailyLogs->where('apprehended', true)->count(),

        ];

        $pdf = PDF::loadView('reports.pdf', compact('dailylogs', 'summary'));
        // Return the generated PDF as a download
        return $pdf->download('report.pdf');
    }
}
