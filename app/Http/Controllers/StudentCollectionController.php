<?php

namespace App\Http\Controllers;

use App\Models\StudentCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StudentCollectionController extends Controller
{
    public function index(Request $request)
    {
        $query = StudentCollection::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('room', 'like', "%{$search}%")
                  ->orWhere('group_members', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
            });
        }

        $totalAmount = (clone $query)->sum('amount') ?? 0;
        // Order by Highest Amount First
        $students = $query->orderBy('amount', 'desc')->orderBy('name', 'asc')->paginate(15)->withQueryString();

        return view('students.index', compact('students', 'totalAmount'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'room' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'is_group' => 'nullable|boolean',
            'group_members' => 'nullable|string|max:255',
            'collection_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $validated['is_group'] = $request->has('is_group');

        StudentCollection::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student collection added successfully.');
    }

    public function show(StudentCollection $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(StudentCollection $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, StudentCollection $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'room' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'is_group' => 'nullable|boolean',
            'group_members' => 'nullable|string|max:255',
            'collection_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $validated['is_group'] = $request->has('is_group');

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student collection updated successfully.');
    }

    public function destroy(StudentCollection $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student collection deleted successfully.');
    }

    public function exportCsv()
    {
        // Order by Highest Amount First
        $students = StudentCollection::orderBy('amount', 'desc')->orderBy('name', 'asc')->get();
        $filename = 'student_collections_' . date('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($students) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF");
            fputcsv($file, ['SR', 'Name / Group', 'Type', 'Group Members', 'Room', 'Amount (INR)', 'Date', 'Notes']);

            $sr = 1;
            foreach ($students as $student) {
                fputcsv($file, [
                    $sr++,
                    $student->name,
                    $student->is_group ? 'Group Contribution' : 'Individual',
                    $student->group_members ?? '',
                    $student->room,
                    $student->amount,
                    $student->collection_date ? $student->collection_date->format('d/m/Y') : 'N/A',
                    $student->notes ?? '',
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
