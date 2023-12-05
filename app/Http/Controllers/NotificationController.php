<?php

namespace App\Http\Controllers;

use App\Models\notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function update(Request $request)
    {
        $validated= $request->validate([
            'userID'=>'required',
            'Message'=>'required'

        ]);
        Log::debug('Notification message', [$request->notificationmessage]);
        $notification = notification::create($validated);
        
        return response()->json([
            'notification' => $notification
        ]);
    }
    public function show(string $id)
    {
        $notification = notification::where('userID', $id)
        ->orderBy('updated_at', 'desc')
        ->get();
        return response()->json([
            'notification'=>$notification
        ]);
    }

    
}
