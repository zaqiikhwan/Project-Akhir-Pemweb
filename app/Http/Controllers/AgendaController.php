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
                $agendaImage = time()."_".$file->getClientOriginalName();
                $file->move($imagePath, $agendaImage);
                $images[] = $agendaImage;
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
            'title' => 'required',
        ]);

        $input = $request->all();
        $existingImages = [];
    
        // Hapus gambar lama yang akan dihapus dari database
        if ($request->has('deleted_images')) {
            $deletedImages = $request->input('deleted_images');
            $deletedImages = explode("|", $deletedImages);

            // Hapus gambar dari array images
            $existingImages = explode("|", $agenda->images); // link1|link2|link3
            $existingImages = array_diff($existingImages, $deletedImages);

            // Hapus gambar dari penyimpanan
            foreach ($deletedImages as $deletedImage) {
                $imagePath = public_path('data_file/') . $deletedImage;
                if (is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $input['images'] = implode("|", $existingImages);
        }
    

        if ($request->hasFile('images')) {
            $files = $request->file('images');

            // Upload dan simpan gambar baru
            $images = [];
            foreach ($files as $file) {
                $imagePath = 'data_file/';
                $agendaImage = time() . "_" . $file->getClientOriginalName();
                $file->move($imagePath, $agendaImage);
                $images[] = $agendaImage;
            }

            // Menggabungkan gambar baru dengan gambar lama
            $images = array_merge($existingImages, $images);
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
