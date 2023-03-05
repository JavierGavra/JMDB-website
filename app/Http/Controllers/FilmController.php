<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        return view ('list_film.all',[
            'films' => Film::latest()->filter(request(['search','genre']))->paginate(10)
        ]);
    }

    public function show(Film $film)
    {
        return view('list_film.detail', [
            'film'=>$film
        ]);    
        
    }
}
