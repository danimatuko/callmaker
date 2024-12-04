<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallReportController extends Controller
{
    public function index(Request $request)
    {
        $calls = \App\Models\Call::with(['customer', 'agent'])
            ->when($request->input('agent_id'), function ($query, $agentId) {
                $query->where('agent_id', $agentId);
            })
            ->when($request->input('start_date') && $request->input('end_date'), function ($query) use ($request) {
                $query->whereBetween('call_time', [$request->start_date, $request->end_date]);
            })
            ->simplePaginate(10);

        $agents = \App\Models\Agent::all();

        return view('calls.index', compact('calls', 'agents'));
    }

}
