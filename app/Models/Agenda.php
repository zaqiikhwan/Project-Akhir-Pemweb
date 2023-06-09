<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'ulid',
        'images',
        'title',
        'content',
        'date'
    ];
}
