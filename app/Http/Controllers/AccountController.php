<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function remove(Request $request, string $id)
    {

       
        $user= User::findorfail($id);
        $user->notiftoggle = null; // or false

        
        $user->save();
        return response()->json([
            'Deleted' => 'Your Notif Toggle has been removed'
        ]);
       
        
        
        
    }
    public function addToggle(Request $request, string $id)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated= $request->validate([
            'account_balance'=>'required',
            'notificationmessage'=>'required',

        ]);
        $user = User::findOrFail($id);
        $user->notiftoggle = '1';
        $user->account_balance += $request->account_balance;
        $user->notificationmessage=$request->notificationmessage;

        Log::debug('Message',[$user->notificationmessage]);
        
        $user->transferin += $request->account_balance;
        $user->save();
        return response()->json([
            'account' => $user->account_balance
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $validated= $request->validate([
            'account_balance'=>'required',
            'notificationmessage'=>'required',
            
        ]);
        $user = User::findOrFail($id);
        Log::debug('user', $validated);
        $user->notiftoggle = '1';
        $newBalance = $user->account_balance - $request->account_balance;
        $newTransferout =$user->transferout - $request->account_balance;
        $user->notificationmessage=$request->notificationmesssage;
        $user->transferout=$newTransferout;

        // Log::debug('user', [$newBalance]);
        $user->account_balance=$newBalance;
        

        $user->save();
        return response()->json([
            'account' => $user->account_balance
        ]);
    }
}
