<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PasteFileService 
{
    
    protected string $disk = 'public';
    protected string $directory = 'pastes';
    
    // Metodo per salvare il file, mai fatto spero funga
    //genero un unico id (filename) e lo salvo nel disk e   nella directory specificata
        public function storeFile(string $content): string
    {   
        $filename = uniqid('paste_') . '.txt';

        Storage::disk($this->disk)->put($this->directory . '/'. $filename, $content);


        return $this->directory . '/' . $filename;
    }

    //cosi dovrebbe leggere  il file dal percorso e ritornareil testo...
        public function read(string $path): string
    {
        return Storage::disk($this->disk)->get($path);
    }

    public function __construct()
    {
        //
    }
}
