<?php

namespace App\Http\Livewire\Gestor\SobreNos;

use App\Models\SobreNos;
use App\Models\SobreNosIntegrante;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Integrantes extends Component
{
    use WithFileUploads;

    public SobreNos $sobreNos;
    public $foto;
    public $nome = '';
    public $cargo = '';
    public $ordens = [];

    public function mount($sobreNosId = null)
    {
        $this->sobreNos = SobreNos::firstOrCreate(
            ['id' => $sobreNosId ?: 1],
            SobreNos::defaults()
        );

        $this->carregarOrdens();
    }

    public function updatedFoto()
    {
        $this->validate([
            'foto' => 'image|max:3072|mimes:jpg,jpeg,png,webp',
        ]);
    }

    public function salvarIntegrante()
    {
        $this->validate([
            'foto' => 'required|image|max:3072|mimes:jpg,jpeg,png,webp',
            'nome' => 'required|string|max:120',
            'cargo' => 'required|string|max:120',
        ]);

        $path = $this->foto->store('', SobreNosIntegrante::STORAGE);

        SobreNosIntegrante::create([
            'sobre_nos_id' => $this->sobreNos->id,
            'foto' => $path,
            'nome' => trim($this->nome),
            'cargo' => trim($this->cargo),
            'ordem' => ((int) $this->sobreNos->integrantes()->max('ordem')) + 1,
        ]);

        $this->reset(['foto', 'nome', 'cargo']);
        $this->carregarOrdens();

        $this->dispatchBrowserEvent('notify', ['message' => 'Integrante adicionado com sucesso!']);
    }

    public function salvarOrdenacao()
    {
        $this->validate([
            'ordens.*' => 'nullable|integer|min:1',
        ]);

        $integrantes = $this->sobreNos->integrantes()->get()
            ->sortBy(function (SobreNosIntegrante $integrante) {
                return [(int) ($this->ordens[$integrante->id] ?? $integrante->ordem ?? 9999), $integrante->id];
            })
            ->values();

        foreach ($integrantes as $index => $integrante) {
            $integrante->update(['ordem' => $index + 1]);
        }

        $this->carregarOrdens();

        $this->dispatchBrowserEvent('notify', ['message' => 'Ordenação dos integrantes atualizada!']);
    }

    public function removerIntegrante($integranteId)
    {
        $integrante = $this->sobreNos->integrantes()
            ->whereKey($integranteId)
            ->first();

        if (!$integrante) {
            return;
        }

        Storage::disk(SobreNosIntegrante::STORAGE)->delete($integrante->foto);
        $integrante->delete();

        $this->reorganizarOrdens();

        $this->dispatchBrowserEvent('notify', ['message' => 'Integrante removido com sucesso!']);
    }

    public function render()
    {
        $integrantes = $this->sobreNos->integrantes()->get();

        return view('livewire.gestor.sobre_nos.integrantes', compact('integrantes'));
    }

    private function carregarOrdens(): void
    {
        $this->ordens = $this->sobreNos->integrantes()
            ->get()
            ->mapWithKeys(function (SobreNosIntegrante $integrante) {
                return [$integrante->id => $integrante->ordem ?: 1];
            })
            ->toArray();
    }

    private function reorganizarOrdens(): void
    {
        $integrantes = $this->sobreNos->integrantes()->get()->values();

        foreach ($integrantes as $index => $integrante) {
            $integrante->update(['ordem' => $index + 1]);
        }

        $this->carregarOrdens();
    }
}
