<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    // public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function courses()
    // {
    //     return $this->hasMany(Course::class)->where('status', '3');
    // }

    // public function getRouteKeyName()
    // {
    //     return "slug";
    // }
}
