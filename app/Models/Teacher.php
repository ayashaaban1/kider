<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'fb',
        'twitter',
        'insta',
        'image',
        'published',
    ];

    public function subject(){
        return $this->hasMany(Subject::class);
    }
}
