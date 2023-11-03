<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Member;
use App\Models\Statement;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $account = Account::find($id);
        $members = Member::with('user')->where('account_id', $id)->get();
        $statements = Statement::with('users')->where('account_id', $id)->get();
        return view('admin.statement.index', compact('members', 'account', 'statements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paidby = Member::where([['account_id', $request->account_id], ['user_id', $request->paid_by]])->first();
        $paidby->debit = $paidby->debit + $request->paid;
        $paidby->save();

        $devider = count($request->users);
        $perhead = $request->paid / $devider;

        foreach ($request->users as $user) {

            $member = Member::where([['account_id', $request->account_id], ['user_id', $user]])->first();
            $member->ledger = $member->ledger + $perhead;
            $member->save();
        }

        $statment = Statement::create([
            'account_id' => $request->account_id,
            'paid' => $request->paid,
            'paid_by' => $request->paid_by,
            'description' => $request->description,
        ]);

        $statment->users()->sync($request->users);
        return redirect()->route('admin.account.member', $request->account_id);
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
        $statement = Statement::with('users')->find($id);
        $account = Account::with('users')->find($statement->account_id);

        return view('admin.statement.edit', compact('statement', 'account'));
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
        // return $id;
        $statement = Statement::with('users')->find($id);
        /** substract the payment which user before paid  */
        $paidby = Member::where([['account_id', $statement->account_id], ['user_id', $statement->paid_by]])->first();
        $paidby->update(['debit' => $paidby->debit - $statement->paid]);
        /** substract the  included user ledger  */
        $devider = count($statement->users);
        $perhead = $statement->paid / $devider;
        foreach ($statement->users as $user) {
            $member = Member::where([['account_id', $statement->account_id], ['user_id', $user->id]])->first();
            $member->update(['ledger' => $member->ledger - $perhead]);
        }

        /** Add the updated entries */
        $paidby = Member::where([['account_id', $statement->account_id], ['user_id', $request->paid_by]])->first();
        $paidby->debit = $paidby->debit + $request->paid;
        $paidby->save();

        $devider = count($request->users);
        $perhead = $request->paid / $devider;
        foreach ($request->users as $user) {
            $member = Member::where([['account_id', $statement->account_id], ['user_id', $user]])->first();
            $member->ledger = $member->ledger + $perhead;
            $member->save();
        }
        /** update the statemt date */
        $statement->update([
            'paid' => $request->paid,
            'paid_by' => $request->paid_by,
            'description' => $request->description,
        ]);
        $statement->users()->sync($request->users);

        return redirect()->route('admin.account.member', $statement->account_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Statement::with('users')->find($id);

        /** substrct payment  from paid Account*/
        $member = Member::where([['account_id', $data->account_id], ['user_id', $data->paid_by]])->first();
        $member->debit = $member->debit - $data->paid;
        $member->save();

        /** substrct payment  from include users Acocunt*/
        $devider = count($data->users);
        $perhead = $data->paid / $devider;
        foreach ($data->users as $user) {
            $member = Member::where([['account_id', $data->account_id], ['user_id', $user->id]])->first();
            $member->ledger = $member->ledger - $perhead;
            $member->save();
        }

        /** delete statement */
        Statement::destroy($id);
        return redirect()->route('admin.account.member', $data->account_id);
    }
}
