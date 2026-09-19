<?php

namespace App\Http\Controllers;

use App\Models\FacultyCollection;
use App\Models\StudentCollection;
use Illuminate\Http\Request;

class CollectionHistoryController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('type', 'all'); // 'all', 'students', 'faculty'
        $search = $request->input('search');

        $studentQuery = StudentCollection::query();
        $facultyQuery = FacultyCollection::query();

        if ($search) {
            $studentQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('room', 'like', "%{$search}%")
                  ->orWhere('group_members', 'like', "%{$search}%");
            });

            $facultyQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sponsor', 'like', "%{$search}%");
            });
        }

        $studentTotal = (clone $studentQuery)->sum('amount') ?? 0;
        $studentCount = (clone $studentQuery)->count();

        $facultyTotal = (clone $facultyQuery)->sum('amount') ?? 0;
        $facultyCount = (clone $facultyQuery)->count();

        $totalCollection = $studentTotal + $facultyTotal;
        $totalContributors = $studentCount + $facultyCount;

        // Order by Highest Amount First
        $students = $type === 'faculty' ? collect() : $studentQuery->orderBy('amount', 'desc')->orderBy('name', 'asc')->get();
        $faculty = $type === 'students' ? collect() : $facultyQuery->orderBy('amount', 'desc')->orderBy('name', 'asc')->get();

        return view('collections.index', compact(
            'students',
            'faculty',
            'type',
            'search',
            'studentTotal',
            'studentCount',
            'facultyTotal',
            'facultyCount',
            'totalCollection',
            'totalContributors'
        ));
    }
}
