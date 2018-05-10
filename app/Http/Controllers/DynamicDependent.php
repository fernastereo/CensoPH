<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Property;
use App\Habitant;
use App\Relationship;
use App\User;

class DynamicDependent extends Controller
{
    public function fetch(Request $request){
        $data = Property::select('name', 'id')
            ->where([['tower_id', $request->id], ['registered', false]])
            ->orderBy('name', 'asc')->get();
        return response()->json($data);
    }

    public function findsomething(Request $request){
        $data = Property::select('phone_number')->where('id', $request->id)->get();
        return response()->json($data);
    }

    public function findallhabitants(Request $request){
        // DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.id', 'contacts.phone', 'orders.price')
        //     ->get();    

        $data = Habitant::join('relationships', 'relationships.id', '=', 'habitants.relationship_id')
            ->select('habitants.id', 'habitants.property_id', 'habitants.name', 'habitants.email', 'habitants.birthdate', 'habitants.occupation', 'habitants.cellphone_number', 'habitants.idnumber', 'habitants.active', 'habitants.relationship_id', 'relationships.name AS rel_name')
            ->where('property_id', $request->property_id)
            ->get();

        // $data = Habitant::where('property_id', $request->property_id)->get();
        return response()->json($data);
    }

    public function findinactivehabitants(Request $request){
        $data = Habitant::where([['property_id', $request->property_id], ['active', false]])->get();
        return response()->json($data);
    }

    public function verify($token){
        $user = User::where('token', $token)->firstOrFail();
        $user->update(['token' => null]);

        Property::where('id', $user->property_id)
            ->update(['registered' => true]);

        return redirect()
            ->route('home')
            ->with('success', 'Cuenta Verificada!');
    }

    public function reSendVerification(User $user){
        $user->sendVerificationEmail();

        return back()->withInput()->with('msg', 'Se ha enviado un e-mail de verificación a la direccion suministrada en el registro');
    }
}
