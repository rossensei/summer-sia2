<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return inertia('Account/Index', [
            'accounts' => $accounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Account/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'fname' => 'string|required',
            'lname' => 'string|required',
            'address' => 'string|required',
            'email' => 'string|required|unique:accounts',
            'phone_no' => 'string|required',
            'type' => 'string|required',
        ]);

        Account::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'address' => $request->address,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'type' => $request->type,
        ]);

        return redirect(route('accounts'))->banner('Consumer account has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        return inertia('Account/Edit', [
            'account' => $account
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $fields = $request->validate([
            'fname' => 'string|required',
            'lname' => 'string|required',
            'address' => 'string|required',
            'email' => 'email|required|unique:accounts',
            'phone_no' => 'string|required',
            'type' => 'string|required',
        ]);

        // $account = Account:find;
        
        $account->update($fields);

        return back()->banner('Consumer account information has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect(route('accounts'))->banner('Consumer account deleted successfully!');
    }

    public function search($searchKey) 
    {
        return inertia('Account/Index', [
            'accounts' => Account::where('fname', 'like' , "%".$searchKey."%")
                                    ->orWhere('lname', 'like' , "%".$searchKey."%")
                                    ->get()
        ]);
    }

    public function toggleActive(Account $account) {
        $account->active = !$account->active;

        $account->save();

        return back()->banner('Account status has been updated.');
    }
}
