<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class NewsController extends Controller
{
    //
    public function upload(): View|string {
        $news = News::all();
		return view('admin.news.news', ['news' => $news]);
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'content' => 'required',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
        $title = $request->input('title');
        $content = $request->input('content');
        $date = $request->input('date');

        // isi dengan nama folder tempat kemana file diupload
        // untuk menghubungkan dengan local storage perlu menjalankan command

        // php artisan storage:link
        // jika folder belum ada maka akan dicreate
		$tujuan_upload = 'data_file';

        $nama_file = time()."_".$file->getClientOriginalName();
        // upload file
		$file->move($tujuan_upload, $nama_file);

        News::create([
            'title' => $title,
            'content' => $content,
            'image' => $nama_file,
            'date' => $date,
        ]);

        return redirect()->back();
	}

    public function delete($id) {
        $news = News::find($id);
        File::delete('data_file/'.$news->image);
        $news->delete();
        return redirect()->back();
    }

    public function editNews($id){
        $news = News::find($id);
        return view('admin.news.edit', ['news' => $news]);
    }

    public function edit(Request $request){

        $file = $request->file('file');
        $news = News::find($request->id);
        if ($file == null) {
            News::where('id', $request->id)->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'date' => $request->input('date'),
            ]);
        } else {
            File::delete('data_file/'.$news->image);
            $tujuan_upload = 'data_file';
            $nama_file = time()."_".$file->getClientOriginalName();
            // upload file
            $file->move($tujuan_upload, $nama_file);

            News::where('id', $request->id)->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'date' => $request->input('date'),
                'image' => $nama_file,
            ]);
        }

        $allNews = News::all();
        return view('admin.news.news', ['news' => $allNews]);
    }
}
