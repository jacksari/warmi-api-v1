<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    // Relacion de uno a muchos inversa
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
