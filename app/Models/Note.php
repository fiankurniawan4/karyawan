<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Note extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray(): array
    {
        return [
            'judul' => $this->judul,
        ];
    }
}
