<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Paste;

class Comment extends Model
{
    protected $fillable = ['paste_id', 'user_id', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paste()
    {
        return $this->belongsTo(Paste::class);
    }

        public function authorName(): string
    {
        return $this->user?->name ?? 'Guest';
    }
}
