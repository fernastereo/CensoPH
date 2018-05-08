<?php

namespace App\Http\Controllers;

use App\Habitant;
use App\property;
use App\Relationship;
use App\Http\Requests\UpdateHabitantRequest;
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
        
        return view('habitants.create', ['property' => $property, 'relationships' => $relationships]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateHabitantRequest $request)
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
        dd($habitant->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitant  $habitant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitant $habitant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitant  $habitant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitant $habitant)
    {
        $findHabitant = Habitant::find($habitant->id);
        dd($habitant->id);

        if($findHabitant->delete()){
            return redirect()->route('properties.edit', ['property' => $habitant->property_id])->with('success', 'Se ha eliminado el registro');
        }

        return back()->withInput()->with('error', 'Ocurrió un error derante la petición');
    }
}
