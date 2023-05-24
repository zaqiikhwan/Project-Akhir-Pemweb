<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'title',
        'content',
        'image',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // Example usage:
    // $news = News::create([
    //     'title' => 'My first news',
    //     'content' => 'This is my first news',
    //     'image' => 'https://example.com/image.jpg',
    //     'date' => '2021-05-24',
    // ]);

}
