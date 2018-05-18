<?php

namespace App\Http\Controllers;

use App\Property;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePropertyRequest;
class PropertyController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('properties.show', ['property' => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $property = Property::find($property->id);
        
        if(Auth::user()->property_id == $property->id){
            return view('properties.edit', ['property' => $property]);
        }

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('acceso', 'No tiene acceso a esta propiedad');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        // dd($request->input('user_birthdate'));
        $property->update([
            'phone_number'  => $request->input('phone_number'),
            'rent_agency'   => $request->input('rent_agency'),
            'move_date'     => $request->input('move_date'),
            'idnumber'      => $request->input('idnumber'),
            'coefficient'   => $request->input('coefficient'),
            'area'          => $request->input('area'),
            'live_householder'  => $request->has('live_householder'),
            'updated'       => true,
        ]);

        $user = User::where('property_id', $property->id)->update([
            'name'          => $request->input('user_name'),
            'email'         => $request->input('user_email'),
            'idnumber'      => $request->input('user_idnumber'),
            'notification_address'  => $request->input('user_address'),
            'cellphone_number'      => $request->input('user_cellphone'),
            'birthdate'             => $request->input('user_birthdate'),
            'occupation'            => $request->input('user_occupation'),
        ]);

        $message = $request->input('message');
        if($message){
            $data = array(
                'name' => Auth::user()->name,
                'property_id' => $property->id,
                'property_name' => $property->name,
                'tower_name' => $property->tower->name,
                'comment' => $message,
            );

            Mail::send('emails.feedback', $data, function($message){
                $message->from('censoph@css-sas.com', 'CensoPH-San Fernando');

                $message->to('fernandoecueto@gmail.com')->subject('Feedback de San Fernando');
            });
        }
        
        if($property){
            return redirect()->route('properties.edit', ['property' => $property])->with('success', 'Propiedad Actualizada Satisfactoriamente');
        }

        return back()->withInput()->with('errors', 'Se produjeron errores al guardar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }

    public function sendFeedback(Request $request){
        

        $property = Property::find(Auth::user()->property_id);
        $data = array(
            'name' => Auth::user()->name,
            'property_id' => $property->id,
            'property_name' => $property->name,
            'tower_name' => $property->tower->name,
            'comment' => $request->input('message'),
        );

        Mail::send('emails.feedback', $data, function($message){
            $message->from('censoph@css-sas.com', 'CensoPH-San Fernando');

            $message->to('fernandoecueto@gmail.com')->subject('Feedback de San Fernando');
        });

        return redirect()->route('properties.edit', ['property' => Auth::user()->property_id])->with('success', 'Comentario Enviado. Gracias!');
    }
}
