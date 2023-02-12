<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return "slug";
    }


    // Uno a muchos
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function methodologies()
    {
        return $this->hasMany(Methodology::class);
    }

    // Relacion uno a mucho inversa


    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // muchos a muchos

    // Relacion de muchos a muchos
    public function teachers()
    {
        return $this->belongsToMany(User::class);
    }
}
