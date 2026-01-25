<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use App\Models\User;
use App\Services\PasteFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PasteController extends Controller
{
    public function index()
    {
        //altrimenti il url condiviso non  va
            $userId = auth()->check() ? auth()->id() : null;

            $pastes = Paste::where(function ($q) use ($userId) {
                $q->where('visibility', 0)
                ->orWhere('user_id', $userId);
            })
            ->latest()
            ->paginate(10);
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

             $url = Str::random(10); 

            Paste::create([
                'title' => $request->title,
                'content' => $request->content,
                'file_path' => $path,
                'attachment_path' => $attachmentPath,
                'visibility' => $request->visibility,
                'user_id' => auth()->id(),
                'url' => $url,
            ]);

        // ritorniamo alla view
        // return redirect()->route('pastes.index');
        return redirect(route('pastes.create'))->with('status', 'Paste creato veramente bene figa!');
    }   

    // sono stupido ma non so perche mi da rosso in teoria vVa nel disco public e prende il file nel percorso
    public function download($id)
{
    // findOrFail metodo che cerca il paste, grazie documentazione e maledetta aulab. Cosi evito l'if
    $paste = Paste::findOrFail($id);

    return Storage::disk('public')->download($paste->file_path);
}

public function show($url)
{
    $paste = Paste::where('url', $url)->firstOrFail();

    if ($paste->visibility == 0) {
        return view('pastes.show', compact('paste'));
    }


    if ($paste->visibility == 1) {
        return view('pastes.show', compact('paste'));
    
    }

    return view('pastes.show', compact('paste'));
}
        
        
        //CONDIVISIONE  
        
        public function share(Request $request, $pasteId)
        {
            $paste = Paste::findOrFail($pasteId);
            
            if (auth()->id() !== $paste->user_id) {
                abort(403);
                }
                
                $user = User::where('email', $request->email)->firstOrFail();
                
                $paste->users()->attach($user->id);
                
                return back()->with('status', 'Link condiviso con successo!');
                }
                
                }
    // non funge
    //if (!$paste) {
    //     abort(404);
    // }