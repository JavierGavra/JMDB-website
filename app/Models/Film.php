<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search']??false, function($query, $search){
            return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%');
        });

        $query->when($filters['genre']??false, function($query, $genre){
            return $query->where('genre', 'like', '%' . $genre . '%')
            ->orWhere('genre', 'like', '%' . $genre . '%');
        });
    }
}
