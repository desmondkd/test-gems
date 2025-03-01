<?php

namespace App\Http\Controllers;

use App\Models\Overtime;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    public function index()
    {
        $overtimes = Overtime::where(auth()->check() && auth()->user()->role === 'manager' ? 'manager_id' : 'employee_id', auth()->id())->get();
        return view('overtime.index', compact('overtimes'));
    }

    public function create()
    {
        return view('overtime.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time'
        ]);


        $startTime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $request->start_time);
        $endTime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $request->end_time);
        $hours = $startTime->diffInMinutes($endTime) / 60;

        Overtime::create([
            'employee_id' => auth()->id(),
            'manager_id' => auth()->user()->manager_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'hours' => $hours,
            'status' => 'pending',
        ]);

        return redirect()->route('overtime.index')->with('success', 'Pengajuan lembur berhasil diajukan.');
    }

    public function approve(Overtime $overtime)
    {
        $overtime->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Pengajuan lembur disetujui.');
    }

    public function reject(Overtime $overtime)
    {
        $overtime->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Pengajuan lembur ditolak.');
    }

    public function print(Overtime $overtime)
    {
        $pdf = Pdf::loadView('overtime.print', compact('overtime'));
        return $pdf->download('overtime-' . $overtime->id . '.pdf');
    }
}
