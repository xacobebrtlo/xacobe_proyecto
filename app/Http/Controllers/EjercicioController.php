<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\Musculare;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EjercicioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ejercicios = Ejercicio::paginate();

        return view('ejercicio.index', compact('ejercicios'))
            ->with('i', ($request->input('page', 1) - 1) * $ejercicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ejercicio = new Ejercicio();
        $musculares = Musculare::pluck('nombre', 'id');
        return view('ejercicio.create', compact('ejercicio', 'musculares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EjercicioRequest $request): RedirectResponse
    {
        Ejercicio::create($request->validated());

        return Redirect::route('ejercicios.index')
            ->with('success', 'Ejercicio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ejercicio = Ejercicio::find($id);

        return view('ejercicio.show', compact('ejercicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ejercicio = Ejercicio::find($id);
        $musculares = Musculare::pluck('nombre', 'id');
        return view('ejercicio.edit', compact('ejercicio','musculares'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EjercicioRequest $request, Ejercicio $ejercicio): RedirectResponse
    {
        $ejercicio->update($request->validated());

        return Redirect::route('ejercicios.index')
            ->with('success', 'Ejercicio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Ejercicio::find($id)->delete();

        return Redirect::route('ejercicios.index')
            ->with('success', 'Ejercicio deleted successfully');
    }
}
