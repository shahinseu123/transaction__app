<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Particular;
use Illuminate\Http\Request;

class ParticularController extends Controller
{
    public function index()
    {
        $part = Particular::all();
        return view('admin.particular.index', ['part' => $part]);
    }

    public function add_particular(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Particular::create($request->all());
        return redirect()->back()->with('success', 'Particular created successfully');
    }

    public function delete_particular($id)
    {
        Particular::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Particular deleted successfully');
    }
}
