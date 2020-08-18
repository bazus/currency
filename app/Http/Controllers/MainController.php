<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class MainController extends Controller
{
    public function rates(){

        return view('rates')->with([
            'rates' => Rate::paginate(10)
        ]);
    }
}
