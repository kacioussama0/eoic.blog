<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index() {
        return view('donate',['settings' => Setting::first()]);
    }
}
