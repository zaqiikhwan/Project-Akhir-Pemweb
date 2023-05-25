<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    //

    public function createNews(array $request) {
        // Validator::make($request, [
        //     'title' => ['string', 'max:255'],
        //     'content' => ['string'],
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        // ]);

        if ($request['foto'] != null) {
            $filenameWithExt = $request['foto']->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request['foto']->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request['foto']->storeAs('public/foto', $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.jpg';
        }

        return News::create([
            // 'title' => $request['title'],
            // 'content' => $request['content'],
            'image' => $path,
            'date' => time().now(),
        ]);
        // $news = new News;
        // $news->date = time().now();
        // $news->title = $request['title'];
        // $news->content = $request['content'];
        // $news->image = $path;
        // $news->save();
    }

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
        // paginate news, ketika lanjut ?news=2 maka akan menampilkan halaman 2
        $news = News::paginate(2);
        $total = News::count();


        return view('news', [
            'news' => $news,
            'total' => $total,
        ]);

        // return $news;
    }



}
