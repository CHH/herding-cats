<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::query()
            ->orderBy('name')
            ->get();

        return Inertia::render('Animal/Index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Animal/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalRequest $request)
    {
        Animal::create($request->validated());

        return redirect()->route('animals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return Inertia::render('Animal/Edit', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return Inertia::render('Animal/Edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalRequest $request, Animal $animal)
    {
        $animal->fill($request->validated());
        $animal->save();

        return redirect()->route('animals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
