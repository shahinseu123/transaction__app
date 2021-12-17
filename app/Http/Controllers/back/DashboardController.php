<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Particular;
use App\Models\Transection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tran = Transection::orderBy('id', 'desc')->get();
        return view('admin.transaction.index', ['trans' => $tran]);
    }

    public function add_tran()
    {
        $part = Particular::all();
        return view('admin.transaction.add_transaction', ['part' => $part]);
    }

    public function create_transaction(Request $request)
    {

        $request->validate([
            'transaction_no' => 'required',
            'date' => 'required',
            'particular' => 'required',
            'amount' => 'required',
        ]);

        Transection::create($request->all());
        return redirect()->route('admin.transaction')->with('success', 'Transection created successfully');
    }

    public function delete_trans($id)
    {
        Transection::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Transaction deleted successfully');
    }

    public function edit_transaction($id)
    {
        $part = Particular::all();
        $tran = Transection::findOrFail($id);
        return view('admin.transaction.edit_transaction', ['transaction' => $tran, 'part' => $part]);
    }

    public function update_transaction(Request $request)
    {
        $request->validate([
            'transaction_no' => 'required',
            'date' => 'required',
            'particular' => 'required',
            'amount' => 'required',
        ]);
        $tra = Transection::findOrFail($request->id);
        $tra->update($request->all());
        return redirect()->back()->with('success', 'Transection updated successfully');
    }
}
