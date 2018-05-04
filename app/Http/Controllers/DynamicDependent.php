<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Property;
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

    public function verify($token){
        $user = User::where('token', $token)->firstOrFail();
        $user->update(['token' => null]);

        Property::where('id', $user->property_id)
            ->update(['registered' => true]);

        return redirect()
            ->route('home')
            ->with('success', 'Cuenta Verificada!');
    }

}
