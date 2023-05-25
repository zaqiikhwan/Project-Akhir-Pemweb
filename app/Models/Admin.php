<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'id', // This is the ulid field
        'username',
        'email',
        'password'
    ];
}