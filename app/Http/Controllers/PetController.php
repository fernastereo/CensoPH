<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Property;
use App\Animal;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePetRequest;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($property_id)
    {
        $property = Property::find($property_id);
        $animals = Animal::get();
        
        if(Auth::user()->property_id == $property->id){
            return view('pets.create', ['property' => $property, 'animals' => $animals]);
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePetRequest $request)
    {
        // dd($request);
        $pet = Pet::create([
            'property_id' => $request->input('property_id'),
            'name' => $request->input('name'),
            'animal_id' => $request->input('animal_id'),
            'what_type' => $request->input('what_type'), 
            'breed' => $request->input('breed'),
            'active' => true,
        ]);

        if($pet){
            return redirect()->route('properties.edit', ['property' => $pet->property_id])->with('success', 'Se ha ingresado una nueva mascota');
        }

        return back()->withInput()->with('errors', 'Se produjeron errores al guardar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {

        $property = Property::find($pet->property_id);
        $animals = Animal::get();
        
        if(Auth::user()->property_id == $property->id){
            return view('pets.edit', ['pet' => $pet, 'property' => $property, 'animals' => $animals]);
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePetRequest $request, Pet $pet)
    {
        $pet->update([
            'property_id' => $request->input('property_id'),
            'name' => $request->input('name'),
            'animal_id' => $request->input('animal_id'),
            'what_type' => $request->input('what_type'), 
            'breed' => $request->input('breed'),
        ]);

        if($pet){
            return redirect()->route('properties.edit', ['property' => $pet->property_id])->with('success', 'Se han actualizado los datos de la mascota');
        }

        return back()->withInput()->with('errors', 'Se produjeron errores al guardar');
    }

    public function active(Pet $pet){
        
        if($pet->active == false || !$pet->active){
            $active = true;
        }
        else{
            $active = false;
        }

        if(Auth::user()->property_id == $pet->property_id){
            $pet->update([
                'active' => $active,
            ]);

            if($pet){
                return redirect()->route('properties.edit', ['property' => $pet->property_id])->with('success', 'Se han actualizado los datos');
            }

            return back()->withInput()->with('errors', 'Se produjeron errores al guardar'); 
        }
        
        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
