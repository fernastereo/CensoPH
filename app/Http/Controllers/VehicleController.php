<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Property;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateVehicleRequest;
use Illuminate\Http\Request;

class VehicleController extends Controller
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
        
        if(Auth::user()->property_id == $property->id){
            return view('vehicles.create', ['property' => $property]);
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehicleRequest $request)
    {
        $vehicle = Vehicle::create([
            'property_id' => $request->input('property_id'),
            'registration_tag' => $request->input('registration_tag'),
            'mark' => $request->input('mark'),
            'color' => $request->input('color'), 
            'active' => true,
            'motorcycle' => $request->has('motorcycle'),
        ]);

        if($vehicle){
            return redirect()->route('properties.edit', ['property' => $vehicle->property_id])->with('success', 'Se ha ingresado un nuevo vehículo');
        }

        return back()->withInput()->with('errors', 'Se produjeron errores al guardar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $property = Property::find($vehicle->property_id);
        
        if(Auth::user()->property_id == $property->id){
            return view('vehicles.edit', ['vehicle' => $vehicle, 'property' => $property]);
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update([
            'property_id' => $request->input('property_id'),
            'registration_tag' => $request->input('registration_tag'),
            'mark' => $request->input('mark'),
            'color' => $request->input('color'), 
            'active' => true,
            'motorcycle' => $request->has('motorcycle'),
        ]);

        if($vehicle){
            return redirect()->route('properties.edit', ['property' => $vehicle->property_id])->with('success', 'Se han actualizado los datos del vehículo');
        }

        return back()->withInput()->with('errors', 'Se produjeron errores al guardar');
    }

    public function active(Vehicle $vehicle){
        
        if($vehicle->active == false || !$vehicle->active){
            $active = true;
        }
        else{
            $active = false;
        }

        if(Auth::user()->property_id == $vehicle->property_id){
            $vehicle->update([
                'active' => $active,
            ]);

            if($vehicle){
                return redirect()->route('properties.edit', ['property' => $vehicle->property_id])->with('success', 'Se han actualizado los datos del vehículo');
            }

            return back()->withInput()->with('errors', 'Se produjeron errores al guardar');
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
