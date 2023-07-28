<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Account;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
use Mail;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($account)
    {
        // $billings = Billing::where('account_id', $account)->get();
        $acc = Account::with('billings')->find($account);
        // dd($acc);

        return inertia('Billing/Index', [
            'account' => $acc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Billing $billing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billing $billing)
    {
        //
    }

    public function send($account) 
    {
        $account = Account::find($account);
        $email = $account->email;

        Mail::send('emails.nod', [], function($m) use ($email) {
            $m->to($email)->subject("Notice of Disconnection");
        });

        return back()->banner('Notice of Disconnection has been sent.');
    }
}
