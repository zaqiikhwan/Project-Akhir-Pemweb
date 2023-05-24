<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //

    public function create()
    {
        $news = News::create([
            'id' => 'test',
            'title' => 'My first news',
            'content' => 'This is my first news',
            'image' => 'https://example.com/image.jpg',
            'date' => '2021-05-24',
        ]);

        // $news->id;

        return view('news', [
            'id' => "test",
            'title' => "ini judul pertama",
            'content' => "ini content pertama",
            'date' => "2023-05-24",
        ]);
    }

    public function read()
    {
        $news = News::all();

        return $news;
    }


}
