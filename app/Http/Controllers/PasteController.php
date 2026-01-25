<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use App\Services\PasteFileService;
use Illuminate\Http\Request;

class PasteController extends Controller
{
    public function index()
    {
        //logica per le card / = modello, prendi tutti i pste
        $pastes = Paste::all();
        // uso compact per creare una variabile che contenga tutta la collection di paste nella index
        return view('pastes.index', compact('pastes'));
    }

    public function create()
    {
        return view('pastes.create');
    }

    public function store(Request $request, PasteFileService $fileService)
    {
        // dd($request->all());
        //richiamo il mas asignment
        // Paste::create($request->all());

        
            $request->validate([
                'attachment' => 'nullable|file|max:5120|mimes:jpg,jpeg,png,pdf,txt,doc,docx'
            ]);
            
            $path = $fileService->storeFile($request->content);
            
            $attachmentPath = null;
            
            if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            }

            Paste::create([
                'title' => $request->title,
                'content' => $request->content,
                'file_path' => $path,
                'attachment_path' => $attachmentPath,
            ]);

        // ritorniamo alla view
        // return redirect()->route('pastes.index');
        return redirect(route('pastes.create'))->with('status', 'Paste creato veramente bene figa!');
    }   
}
