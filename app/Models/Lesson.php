<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    // Uno a muchos inversa
    public function section(){
        return $this->belongsTo(Section::class);
    }
}
