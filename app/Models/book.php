<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Menentukan kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
    ];
}
