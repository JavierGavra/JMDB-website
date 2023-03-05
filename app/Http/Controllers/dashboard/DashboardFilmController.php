<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Film;
use App\Models\Studio;

class DashboardFilmController extends Controller
{
    public function index()
    {
        return view ('dashboard.list_film.all',[
            'films' => Film::latest()->filter(request(['search','genre']))->paginate(10)
        ]);
    }

    // public function index()
    // {
    //     return view('dashboard.list_film.all',[
    //         'films'=>Film::paginate(10)
    //     ]);
    // }

    public function show(Film $film)
    {
        return view('dashboard.list_film.detail', [
            'film'=>$film
        ]);    
        
    }

    public function create()
    {
        return view('dashboard.list_film.create', [
            'studios' => Studio::all(),
        ]);
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'synopsis' => 'required|max:255',
            'studio_id' => 'required',
            'director' => 'required|max:255',
            'genre' => 'required|max:255',
            'release' => 'required'
            // 'gambar_tujuan' => 'image|file|max:15360'
        ]);

        // if ($request->file('gambar_tujuan')) {
        //     $validateData['gambar_tujuan'] = $request->file('gambar_tujuan')->store('images');
        // }

        Film::create($validateData);
        return redirect('/dashboard/film/all')->with('success', 'Film has been added !');
    }

    public function edit(Film $film)
    {
        return view('dashboard.list_film.edit', [
            'studio' => Studio::all(),
            'film' => $film
        ]);
    }

    public function update(Request $request, Film $film)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'synopsis' => 'required',
            'studio_id' => 'required',
            'director' => 'required|max:255',
            'genre' => 'required|max:255',
            'release' => 'required'
        ]);

        Film::where('id', $film->id)->update($validateData);
        return redirect('/dashboard/film/all')->with('success', 'Film has been Updated !');
    }

    public function destroy(Film $film)
    {
        Film::destroy($film->id);
        return redirect('/dashboard/film/all')->with('success', 'Data has been deleted !');
    }
}
