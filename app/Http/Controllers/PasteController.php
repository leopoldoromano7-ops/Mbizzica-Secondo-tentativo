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
        //solo se utente e' auth allore dagli id senno null
        $userId = auth()->check() ? auth()->id() : null;

        //req del db
        $pastes = Paste::where(function ($q) use ($userId) {
            $q->where('visibility', 0)
                ->orWhere('user_id', $userId);
        })->latest()->paginate(10);
        // uso compact per creare una variabile che contenga tutta la collection di paste nella index
        return view('pastes.index', compact('pastes'));
    }

    public function create()
    {
        return view('pastes.create');
    }

    // Dependency injjection
    public function store(Request $request, PasteFileService $fileService)
    {
        // dd($request->all());
        //richiamo il mas asignment
        // Paste::create($request->all());

        //validazione/
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
    //inzio crud
    public function edit($id)
    {
        $paste = Paste::findOrFail($id);

        if (auth()->id() !== $paste->user_id) {
            abort(403);
        }

        return view('pastes.edit', compact('paste'));
    }

    /// copio incolo sotre
    public function update(Request $request, $id, PasteFileService $fileService)
    {
        $paste = Paste::findOrFail($id);

        // se e; authproprietareio
        if (auth()->id() !== $paste->user_id) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'visibility' => 'required|in:0,1,2',
            'attachment' => 'nullable|file|max:20480'
        ]);

        //file
        if ($data['content'] !== $paste->content) {
            $data['file_path'] = $fileService->storeFile($data['content']);
        }

        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('attachments', 'public');
        }


        $paste->update($data);

        return redirect()->route('paste.show', $paste->url);
    }
    //delete
    public function destroy($id)
    {
        $paste = Paste::findOrFail($id);

        //canzella file
        if ($paste->attachment) {
            Storage::disk('public')->delete($paste->attachment);
        }

        $paste->delete();

        return redirect()->route('pastes.index');
    }
}

    // non funge
    //if (!$paste) {
    //     abort(404);
    // }