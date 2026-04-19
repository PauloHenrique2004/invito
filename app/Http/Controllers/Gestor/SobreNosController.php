<?php

namespace App\Http\Controllers\Gestor;


use App\Http\Requests\SobreNosRequest;
use App\Models\SobreNos;
use Illuminate\Support\Facades\Session;

class SobreNosController extends Controller
{
    public function edit()
    {
        $sobreNos = SobreNos::with(['imagens', 'integrantes'])
            ->firstOrCreate(['id' => 1], SobreNos::defaults());

        $sobreNos->load(['imagens', 'integrantes']);

        return view('gestor.sobre_nos.edit', compact('sobreNos'));
    }

    public function update(SobreNosRequest $request)
    {
        $sobreNos = SobreNos::firstOrCreate(['id' => 1], SobreNos::defaults());
        $sobreNos->fill($request->validated());
        $sobreNos->save();

        Session::flash('notify', 'Sobre Nós atualizado com sucesso!');

        return redirect()->route('gestor.sobre-nos.edit');
    }
}
