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
        News::create([
            'id' => 'test',
            'title' => 'My first news',
            'content' => 'This is my first news',
            'image' => 'https://example.com/image.jpg',
            'date' => '2021-05-24',
        ]);

        // $news->id;

        return view('news', [
            'data' => "berita berhasil ditambahkan",
        ]);
    }

    public function read()
    {
        $news = News::paginate(2);
        $total = News::count();


        return view('news', [
            'news' => $news,
            'total' => $total,
        ]);

        // return $news;
    }


}
