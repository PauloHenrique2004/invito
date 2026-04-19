<?php

namespace App\Http\Livewire\Gestor\SobreNos;

use App\Models\SobreNos;
use App\Models\SobreNosImagem;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Imagens extends Component
{
    use WithFileUploads;

    public SobreNos $sobreNos;
    public $novasImagens = [];
    public $ordens = [];

    public function mount($sobreNosId = null)
    {
        $this->sobreNos = SobreNos::firstOrCreate(
            ['id' => $sobreNosId ?: 1],
            SobreNos::defaults()
        );

        $this->carregarOrdens();
    }

    public function updatedNovasImagens()
    {
        $this->validate([
            'novasImagens.*' => 'image|max:3072|mimes:jpg,jpeg,png,webp',
        ]);
    }

    public function salvarImagens()
    {
        $this->validate([
            'novasImagens' => 'required|array|min:1',
            'novasImagens.*' => 'image|max:3072|mimes:jpg,jpeg,png,webp',
        ]);

        $ordem = (int) $this->sobreNos->imagens()->max('ordem');

        foreach ($this->novasImagens as $arquivo) {
            $ordem++;
            $path = $arquivo->store('', SobreNosImagem::STORAGE);

            SobreNosImagem::create([
                'sobre_nos_id' => $this->sobreNos->id,
                'imagem' => $path,
                'ordem' => $ordem,
            ]);

            if (empty($this->sobreNos->imagem)) {
                $this->sobreNos->forceFill(['imagem' => $path])->save();
            }
        }

        $this->novasImagens = [];
        $this->carregarOrdens();

        $this->dispatchBrowserEvent('notify', ['message' => 'Imagens adicionadas com sucesso!']);
    }

    public function salvarOrdenacao()
    {
        $this->validate([
            'ordens.*' => 'nullable|integer|min:1',
        ]);

        $imagens = $this->sobreNos->imagens()->get()
            ->sortBy(function (SobreNosImagem $imagem) {
                return [(int) ($this->ordens[$imagem->id] ?? $imagem->ordem ?? 9999), $imagem->id];
            })
            ->values();

        foreach ($imagens as $index => $imagem) {
            $imagem->update(['ordem' => $index + 1]);
        }

        $this->carregarOrdens();

        $this->dispatchBrowserEvent('notify', ['message' => 'Ordenação atualizada com sucesso!']);
    }

    public function removerImagem($imagemId)
    {
        $imagem = $this->sobreNos->imagens()
            ->whereKey($imagemId)
            ->first();

        if (!$imagem) {
            return;
        }

        Storage::disk(SobreNosImagem::STORAGE)->delete($imagem->imagem);

        if ($this->sobreNos->imagem === $imagem->imagem) {
            $this->sobreNos->forceFill(['imagem' => null])->save();
        }

        $imagem->delete();
        $this->reorganizarOrdens();

        $this->dispatchBrowserEvent('notify', ['message' => 'Imagem removida com sucesso!']);
    }

    public function render()
    {
        $imagens = $this->sobreNos->imagens()->get();

        return view('livewire.gestor.sobre_nos.imagens', compact('imagens'));
    }

    private function carregarOrdens(): void
    {
        $this->ordens = $this->sobreNos->imagens()
            ->get()
            ->mapWithKeys(function (SobreNosImagem $imagem) {
                return [$imagem->id => $imagem->ordem ?: 1];
            })
            ->toArray();
    }

    private function reorganizarOrdens(): void
    {
        $imagens = $this->sobreNos->imagens()->get()->values();

        foreach ($imagens as $index => $imagem) {
            $imagem->update(['ordem' => $index + 1]);
        }

        $this->carregarOrdens();
    }
}
