<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Transection;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $month = $today->format('m');
        $daily = Transection::whereDay('created_at', '=', $today)->get();
        $monthly = Transection::whereMonth('created_at', '=', $month)->get();
        return view('admin.report.index', ['dailey' => $daily, 'monthly' => $monthly]);
    }
}
