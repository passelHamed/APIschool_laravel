<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lesson;

class tag extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name'
    ];

    public function lessons()
    {
        return $this->belongsToMany(lesson::class);
    }
}
