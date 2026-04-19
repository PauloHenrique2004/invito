<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SobreNosImagem extends Model
{
    public const STORAGE = 'storage_sobre';

    protected $table = 'sobre_nos_imagens';

    protected $fillable = [
        'sobre_nos_id',
        'imagem',
        'ordem',
    ];

    public function sobreNos()
    {
        return $this->belongsTo(SobreNos::class);
    }

    public function imagemUrl(): string
    {
        return asset('storage_sobre/' . ltrim($this->imagem, '/'));
    }
}
