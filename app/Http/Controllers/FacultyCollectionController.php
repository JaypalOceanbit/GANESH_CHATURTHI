<?php

namespace App\Http\Controllers;

use App\Models\FacultyCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FacultyCollectionController extends Controller
{
    public function index(Request $request)
    {
        $query = FacultyCollection::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sponsor', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
            });
        }

        $totalAmount = (clone $query)->sum('amount') ?? 0;
        // Order by Highest Amount First
        $facultyMembers = $query->orderBy('amount', 'desc')->orderBy('name', 'asc')->paginate(15)->withQueryString();

        return view('faculty.index', compact('facultyMembers', 'totalAmount'));
    }

    public function create()
    {
        return view('faculty.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'sponsor' => 'nullable|string|max:255',
            'collection_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        FacultyCollection::create($validated);

        return redirect()->route('faculty.index')
            ->with('success', 'Faculty collection added successfully.');
    }

    public function show(FacultyCollection $faculty)
    {
        return view('faculty.show', compact('faculty'));
    }

    public function edit(FacultyCollection $faculty)
    {
        return view('faculty.edit', compact('faculty'));
    }

    public function update(Request $request, FacultyCollection $faculty)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'sponsor' => 'nullable|string|max:255',
            'collection_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $faculty->update($validated);

        return redirect()->route('faculty.index')
            ->with('success', 'Faculty collection updated successfully.');
    }

    public function destroy(FacultyCollection $faculty)
    {
        $faculty->delete();

        return redirect()->route('faculty.index')
            ->with('success', 'Faculty collection deleted successfully.');
    }

    public function exportCsv()
    {
        // Order by Highest Amount First
        $facultyMembers = FacultyCollection::orderBy('amount', 'desc')->orderBy('name', 'asc')->get();
        $filename = 'faculty_collections_' . date('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($facultyMembers) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF");
            fputcsv($file, ['SR', 'Name', 'Amount (INR)', 'Sponsor / Purpose', 'Date', 'Notes']);

            $sr = 1;
            foreach ($facultyMembers as $fac) {
                fputcsv($file, [
                    $sr++,
                    $fac->name,
                    $fac->amount,
                    $fac->sponsor ?? '',
                    $fac->collection_date ? $fac->collection_date->format('d/m/Y') : 'N/A',
                    $fac->notes ?? '',
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
