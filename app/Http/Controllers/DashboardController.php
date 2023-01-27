<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Auth::user()->category;

        if ($category == 'Student') {
            return redirect()->route('activity.login');
        }
        if ($category == 'Lecturer') {
            return view('dashboard.Lecturer');
        }
        if ($category == 'Committee') {
            return view('dashboard.Committee');
        }
        if ($category == 'Coordinator') {
            return view('dashboard.Coordinator');
        }
        if ($category == 'HOSD') {
            return view('dashboard.Hosd');
        }
        if ($category == 'Dean') {
            return view('dashboard.Dean');
        }
    }
}
