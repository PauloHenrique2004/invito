<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class SobreNos extends Model
{
    public const STORAGE = 'storage_sobre';

    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'missao',
        'visao',
        'valores',
        'selo'
    ];

    public static function defaults(): array
    {
        return [
            'titulo' => 'Cultura que se entrelaça em cada fibra',
            'descricao' => '<p>A Associação Cultural dos Moradores de Boa Vista reúne artesãs que transformam a fibra de buriti em peças que preservam saberes tradicionais, fortalecem a identidade local e geram renda para a comunidade.</p><p>Cada criação carrega trabalho manual, memória coletiva e o compromisso de valorizar a cultura regional por meio do artesanato.</p>',
            'missao' => 'Fortalecer o artesanato em fibra de buriti como expressão cultural, fonte de renda e instrumento de valorização social da comunidade.',
            'visao' => 'Ser referência na preservação da tradição artesanal de Boa Vista, ampliando oportunidades para as artesãs e reconhecendo a força da cultura local.',
            'valores' => "Tradição\nTrabalho coletivo\nIdentidade cultural\nValorização das artesãs\nImpacto social",
            'selo' => '100% artesanal',
        ];
    }

    public function imagens()
    {
        return $this->hasMany(SobreNosImagem::class)->orderBy('ordem')->orderBy('id');
    }

    public function integrantes()
    {
        return $this->hasMany(SobreNosIntegrante::class)->orderBy('ordem')->orderBy('id');
    }

    public function galeriaParaExibicao(): Collection
    {
        $imagens = $this->relationLoaded('imagens')
            ? $this->imagens
            : $this->imagens()->get();

        if ($imagens->isNotEmpty()) {
            return $imagens->map(function (SobreNosImagem $imagem) {
                return (object) [
                    'src' => $imagem->imagemUrl(),
                    'alt' => $this->titulo ?: 'Artesanato ACMBV',
                ];
            });
        }

        if (!empty($this->imagem)) {
            return collect([
                (object) [
                    'src' => asset('storage_sobre/' . ltrim($this->imagem, '/')),
                    'alt' => $this->titulo ?: 'Artesanato ACMBV',
                ],
            ]);
        }

        return collect([
            (object) [
                'src' => asset('site/img/img-2.jpeg'),
                'alt' => 'Artesanato ACMBV',
            ],
        ]);
    }
}
