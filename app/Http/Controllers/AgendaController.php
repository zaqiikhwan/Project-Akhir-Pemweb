<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AgendaController extends Controller
{
    //
    //display listing agenda
    public function index(): View {
        $agendas = Agenda::latest()->paginate(5);
        return view('agenda.index', compact('agendas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //show form for create agenda
    public function create(): View {
        return view('agenda.create');
    }

    //store new resource in storage
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'title' => 'required',
            ['images' => 'file|image|mimes:jpeg,png,jpg,gif,svg'],
            'content' => 'required',
            'date' => 'required'
        ]);

        $input = $request->all();
        $images = array();
        if($files = $request->file('images')) {
            foreach($files as $file){
                $imagePath = 'data_file/';
                $productImage = time()."_".$file->getClientOriginalName();
                $file->move($imagePath, $productImage);
                $images[] = $productImage;
            }
        }

        $input['images'] = implode("|", $images);

        Agenda::create($input);
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dibuat');
    }

    //display specified agenda
    public function show(Agenda $agenda): View {
        return view('agenda.show', compact('agenda'));
    }

    //show agenda's edit form
    public function edit(Agenda $agenda): View {
        return view('agenda.edit', compact('agenda'));
    }

    //update specified agenda
    public function update(Request $request, Agenda $agenda): RedirectResponse {
        $request->validate([
            'title' => 'required'
        ]);

        $input = $request->all();

        if($request->hasFile('images')) {
            $images = array();
            $files = $request->file('images');

            // Hapus gambar lama yang akan dihapus
            if($request->has('deleted_images')) {
                $deletedImages = $request->input('deleted_images');
                $deletedImages = explode("|", $deletedImages);
                foreach($deletedImages as $deletedImage) {
                    $imagePath = public_path('data_file/') . $deletedImage;
                    if(file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
            // Upload dan simpan gambar baru
            foreach($files as $file) {
                $imagePath = 'data_file/';
                $productImage = time()."_".$file->getClientOriginalName();
                $file->move($imagePath, $productImage);
                $images[] = $productImage;
            }
            $input['images'] = implode("|", $images);
        }

        $agenda->update($input);
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diupdate');
    }

    //delete specified agenda
    public function destroy(Agenda $agenda): RedirectResponse {
        $agenda->delete();
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus');
    }
}
