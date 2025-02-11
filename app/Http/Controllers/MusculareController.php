<?php

namespace App\Http\Controllers;

use App\Models\Musculare;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MusculareRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MusculareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $musculares = Musculare::paginate();

        return view('musculare.index', compact('musculares'))
            ->with('i', ($request->input('page', 1) - 1) * $musculares->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $musculare = new Musculare();

        return view('musculare.create', compact('musculare'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MusculareRequest $request): RedirectResponse
    {
        Musculare::create($request->validated());

        return Redirect::route('musculares.index')
            ->with('success', 'Musculare created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $musculare = Musculare::find($id);

        return view('musculare.show', compact('musculare'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $musculare = Musculare::find($id);

        return view('musculare.edit', compact('musculare'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MusculareRequest $request, Musculare $musculare): RedirectResponse
    {
        $musculare->update($request->validated());

        return Redirect::route('musculares.index')
            ->with('success', 'Musculare updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Musculare::find($id)->delete();

        return Redirect::route('musculares.index')
            ->with('success', 'Musculare deleted successfully');
    }
}
