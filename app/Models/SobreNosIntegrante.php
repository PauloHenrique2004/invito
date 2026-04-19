<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SobreNosIntegrante extends Model
{
    public const STORAGE = 'storage_sobre';

    protected $table = 'sobre_nos_integrantes';

    protected $fillable = [
        'sobre_nos_id',
        'foto',
        'nome',
        'cargo',
        'ordem',
    ];

    public function sobreNos()
    {
        return $this->belongsTo(SobreNos::class);
    }

    public function fotoUrl(): string
    {
        return asset('storage_sobre/' . ltrim($this->foto, '/'));
    }
}
