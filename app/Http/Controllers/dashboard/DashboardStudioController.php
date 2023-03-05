<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Studio;

class DashboardStudioController extends Controller
{
    public function index()
    {
        return view('dashboard.list_studio.all',[
            'studios'=>Studio::all()
        ]);
    }
    public function show(Studio $studio)
    {
        return view('dashboard.list_studio.detail', [
            'studio'=>$studio
        ]);    
    }

    public function edit(Studio $studio)
    {
        return view('dashboard.list_studio.edit', [
            'studio' => $studio
        ]);
    }

    public function update(Request $request, Studio $studio)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'region' => 'required|max:255',
            'started_at' => 'required'
        ]);

        Studio::where('id', $studio->id)->update($validateData);
        return redirect('/dashboard/studio/all')->with('success', 'Film has been Updated !');
    }
}
