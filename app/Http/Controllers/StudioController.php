<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;
use Illuminate\Support\Facades\DB;

class StudioController extends Controller
{
    public function index()
    {
        return view('studio.all',[
            'studios'=>Studio::paginate(12)
        ]);
    }

    public function show(Studio $studio)
    {
        return view('studio.detail', [
            'studio'=>$studio
        ]);    
        
    }
}
