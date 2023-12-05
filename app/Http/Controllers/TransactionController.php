<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
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
    public function store(Request $request)
    {
        $validated= $request->validate([
            'userID'=>'required',
            'amount'=> 'required',
            'receivername'=>'required',
            'transactionType'=>'required'
        ]);
        Log::debug($request);
        $transaction = Transaction::create($validated);
        return response()->json([
            'status' => $transaction
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction = Transaction::where('userID', $id)->orderBy('updated_at', 'desc') // Assuming you want to order by the creation date
        ->take(10) // Retrieve only the latest 3 transactions
        ->get();
        log::alert($transaction);
        return response()->json([
            'message'=>$transaction], 201
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
