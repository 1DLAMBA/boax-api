<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function update(Request $request, string $id)
    {
        $validated= $request->validate([
            'card_number'=>'required',
            'pin' =>'required'
        ]);
        $user = User::findOrFail($id);
        $user->card_number = $request->card_number;
        $user->pin = $request->pin;
        $user->save();
        return response()->json([
            'accountcard' => $user->card_number,
            'accouuntpin' => $user->pin,
        ]);
    }
}
