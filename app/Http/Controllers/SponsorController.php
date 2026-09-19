<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index(Request $request)
    {
        $query = Sponsor::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sponsor_item', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
            });
        }

        $totalSponsors = (clone $query)->count();
        $sponsors = $query->orderBy('name', 'asc')->paginate(15)->withQueryString();

        return view('sponsors.index', compact('sponsors', 'totalSponsors'));
    }

    public function create()
    {
        return view('sponsors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sponsor_item' => 'required|string',
            'sponsor_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        Sponsor::create($validated);

        return redirect()->route('sponsors.index')
            ->with('success', 'Sponsor added successfully.');
    }

    public function show(Sponsor $sponsor)
    {
        return view('sponsors.show', compact('sponsor'));
    }

    public function edit(Sponsor $sponsor)
    {
        return view('sponsors.edit', compact('sponsor'));
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sponsor_item' => 'required|string',
            'sponsor_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $sponsor->update($validated);

        return redirect()->route('sponsors.index')
            ->with('success', 'Sponsor updated successfully.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return redirect()->route('sponsors.index')
            ->with('success', 'Sponsor deleted successfully.');
    }
}
