<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::with('accounts.users')->find(Auth::id());
        $accounts = $user->accounts;

        return view('admin.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.account.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'users' => 'required',
        ], [
            'name.required' => 'Please Enter the  Account Name',
            'users.required' => 'The Members feild is required',
        ]);

        $account = Account::create($request->all());
        $account->users()->attach($request->users);
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::with('users')->find($id);
        $users = User::all();

        return view('admin.account.edit', compact('account', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'users' => 'required',
        ], [
            'name.required' => 'Please Enter the  Account Name',
            'users.required' => 'The Members feild is required',
        ]);

        $account = Account::find($id);
        $account->update($request->all());
        $account->users()->sync($request->users);
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Account::destroy($id);
        return redirect()->route('admin.accounts.index');
    }
}
