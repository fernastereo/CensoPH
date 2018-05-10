<?php

namespace App\Http\Controllers;

use App\Habitant;
use App\Property;
use App\Relationship;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateHabitantRequest;
use App\Http\Requests\CreateHabitantRequest;
use Illuminate\Http\Request;

class HabitantController extends Controller
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
        $relationships = Relationship::get();
        
        if(Auth::user()->property_id == $property->id){
            return view('habitants.create', ['property' => $property, 'relationships' => $relationships]);
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHabitantRequest $request)
    {
        $habitant = Habitant::create([
            'property_id' => $request->input('property_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'), 
            'occupation' => $request->input('occupation'),
            'cellphone_number' => $request->input('cellphone_number'), 
            'relationship_id' => $request->input('relationship_id'),
            'idnumber' => $request->input('idnumber'),
            'active' => true,
        ]);

        if($habitant){
            return redirect()->route('properties.edit', ['property' => $habitant->property_id])->with('success', 'Se ha ingresado un nuevo habitante');
        }

        return back()->withInput()->with('errors', 'Se produjeron errores al guardar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habitant  $habitant
     * @return \Illuminate\Http\Response
     */
    public function show(Habitant $habitant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habitant  $habitant
     * @return \Illuminate\Http\Response
     */
    public function edit(Habitant $habitant)
    {
        $property = Property::find($habitant->property_id);
        $relationships = Relationship::get();
        
        if(Auth::user()->property_id == $property->id){
            return view('habitants.edit', ['habitant' => $habitant, 'property' => $property, 'relationships' => $relationships]);
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitant  $habitant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHabitantRequest $request, Habitant $habitant)
    {
        $habitant->update([
            'property_id' => $request->input('property_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'), 
            'occupation' => $request->input('occupation'),
            'cellphone_number' => $request->input('cellphone_number'), 
            'relationship_id' => $request->input('relationship_id'),
            'idnumber' => $request->input('idnumber'),
        ]);

        if($habitant){
            return redirect()->route('properties.edit', ['property' => $habitant->property_id])->with('success', 'Se han actualizado los datos del habitante');
        }

        return back()->withInput()->with('errors', 'Se produjeron errores al guardar');
    }

    public function active(Habitant $habitant){
        
        if($habitant->active == false || !$habitant->active){
            $active = true;
        }
        else{
            $active = false;
        }

        if(Auth::user()->property_id == $habitant->property_id){
            $habitant->update([
                'active' => $active,
            ]);

            if($habitant){
                return redirect()->route('properties.edit', ['property' => $habitant->property_id])->with('success', 'Se han actualizado los datos');
            }

            return back()->withInput()->with('errors', 'Se produjeron errores al guardar'); 
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitant  $habitant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitant $habitant)
    {
        // $findHabitant = Habitant::find($habitant->id);
        // dd($habitant->id);

        // if($findHabitant->delete()){
        //     return redirect()->route('properties.edit', ['property' => $habitant->property_id])->with('success', 'Se ha eliminado el registro');
        // }

        // return back()->withInput()->with('error', 'Ocurrió un error derante la petición');
    }
}
