<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Exports\TodoExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class TodoController extends Controller
{
    //store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'assignee' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today',
            'time_tracked' => 'nullable|numeric',
            'status' => ['nullable', Rule::in(['pending', 'open', 'in_progress', 'completed'])],
            'priority' => ['required', Rule::in(['low', 'medium', 'high'])],
        ]);

        $todo = Todo::create([
            'title' => $request->title,
            'assignee' => $request->assignee,
            'due_date' => $request->due_date,
            'time_tracked' => $request->time_tracked ?? 0,
            'status' => $request->status ?? 'pending',
            'priority' => $request->priority,
        ]);

        return response()->json($todo, 201);
    }

    public function export(Request $request)
    {
        $query = Todo::query();

        // Flexible Filtering
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('assignee')) {
            // Support: "Risna Berti" or "Risna,Berti"
            $assignees = str_contains($request->assignee, ',')
                ? array_map('trim', explode(',', $request->assignee))
                : [trim($request->assignee)];
            $query->whereIn('assignee', $assignees);
        }

        if ($request->filled('status')) {
            $statuses = explode(',', $request->status);
            $query->whereIn('status', $statuses);
        }

        if ($request->filled('priority')) {
            $priorities = explode(',', $request->priority);
            $query->whereIn('priority', $priorities);
        }

        if ($request->filled('due_date_start') && $request->filled('due_date_end')) {
            $query->whereBetween('due_date', [$request->due_date_start, $request->due_date_end]);
        }

        if ($request->filled('time_min') && $request->filled('time_max')) {
            $query->whereBetween('time_tracked', [$request->time_min, $request->time_max]);
        }

        // Debug log jika perlu
        // Log::info('Filtered SQL:', [$query->toSql()]);
        // Log::info('Filtered Result Count:', ['count' => $query->count()]);

        return Excel::download(new TodoExport($query), 'todo_report.xlsx');
    }

    public function chart(Request $request)
    {
        $type = $request->query('type');

        switch ($type) {
            case 'status':
                $data = Todo::selectRaw('status, COUNT(*) as total')
                    ->groupBy('status')
                    ->pluck('total', 'status');
                return response()->json(['status_summary' => $data]);

            case 'priority':
                $data = Todo::selectRaw('priority, COUNT(*) as total')
                    ->groupBy('priority')
                    ->pluck('total', 'priority');
                return response()->json(['priority_summary' => $data]);

            case 'assignee':
                $todos = Todo::all();
                $summary = [];

                foreach ($todos->groupBy('assignee') as $assignee => $group) {
                    $summary[$assignee] = [
                        'total_todos' => $group->count(),
                        'total_pending_todos' => $group->where('status', 'pending')->count(),
                        'total_timetracked_completed_todos' => $group->where('status', 'completed')->sum('time_tracked'),
                    ];
                }

                return response()->json(['assignee_summary' => $summary]);

            default:
                return response()->json(['error' => 'Invalid type'], 400);
        }
    }
}
