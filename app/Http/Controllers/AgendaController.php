<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
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
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $input = $request->all();
        
        if($image = $request->file('image')) {
            $imagePath = 'data_file/';
            $agendaImage = time()."_".$image->getClientOriginalName();
            $image->move($imagePath, $agendaImage);
            $input['image'] = $agendaImage;
        }

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
        
        if($image = $request->file('image')) {
            $imagePath = 'data_file/';
            $agendaImage = time()."_".$image->getClientOriginalName();
            $image->move($imagePath, $agendaImage);
            $input['image'] = $agendaImage;
        } else {
            unset($input['image']);
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
