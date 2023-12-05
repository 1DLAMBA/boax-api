<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validated= $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        if (auth()->attempt($validated)) {
            $user = auth()->user();
            Log::debug($user);
    
            return response()->json([
                'user' => $user,
            ]);
        }
        return response()->json([
            'UnRecognized' => 'Your creden'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
      $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phoneno' => 'required',
            'city' => 'required',
            'address' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'password' => 'required',
        ]);
        
        
        Log::debug($request);
        
             $user = User::create($validated);
             return response()->json(['user' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return response()->json(['message'=>$user], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
