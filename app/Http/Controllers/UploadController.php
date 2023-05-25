<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    public function upload(){
        $news = News::all();
		return view('upload', ['news' => $news]);
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg',
			'keterangan' => 'required',
		]);

        // News::create([
        //     // 'title' => $request['title'],
        //     // 'content' => $request['content'],
        //     'image' => $path,
        //     'date' => time().now(),
        // ]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
        $title = $request->input('title');
        $content = $request->input('content');
        $date = time();
      	// nama file
		// echo 'File Name: '.$file->getClientOriginalName();
		// echo '<br>';

        // ekstensi file
		// echo 'File Extension: '.$file->getClientOriginalExtension();
		// echo '<br>';

        // real path
		// echo 'File Real Path: '.$file->getRealPath();
		// echo '<br>';

        // ukuran file
		// echo 'File Size: '.$file->getSize();
		// echo '<br>';

        // tipe mime
		// echo 'File Mime Type: '.$file->getMimeType();

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
}
